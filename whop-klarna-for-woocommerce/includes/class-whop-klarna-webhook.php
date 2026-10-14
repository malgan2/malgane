<?php
/**
 * Receives Whop's payment webhooks and updates the matching WooCommerce order.
 *
 * The webhook body is only used to learn which payment changed. The payment itself is
 * then read back from the Whop API, so an order's status always comes from Whop and never
 * from the body of a request.
 */

defined( 'ABSPATH' ) || exit;

final class Whop_Klarna_Webhook {

	const ROUTE_NAMESPACE = 'whop-klarna/v1';
	const ROUTE           = '/webhook';

	/** Order meta remembering the last payment status applied, so repeat deliveries are no-ops. */
	const META_LAST_STATUS = '_whop_last_payment_status';

	public static function init() {
		add_action( 'rest_api_init', array( __CLASS__, 'register_route' ) );
	}

	public static function url() {
		return rest_url( self::ROUTE_NAMESPACE . self::ROUTE );
	}

	public static function register_route() {
		register_rest_route(
			self::ROUTE_NAMESPACE,
			self::ROUTE,
			array(
				'methods'             => 'POST',
				'callback'            => array( __CLASS__, 'handle' ),
				// Whop can't log in; requests are authenticated by their signature instead.
				'permission_callback' => '__return_true',
			)
		);
	}

	public static function handle( WP_REST_Request $request ) {
		$gateway = self::gateway();
		if ( ! $gateway ) {
			return new WP_REST_Response( array( 'error' => 'payment method not loaded' ), 503 );
		}

		$body  = $request->get_body();
		$valid = Whop_Klarna_Signature::verify(
			$body,
			$request->get_header( 'webhook-id' ),
			$request->get_header( 'webhook-timestamp' ),
			$request->get_header( 'webhook-signature' ),
			trim( $gateway->get_option( 'webhook_secret' ) )
		);
		if ( ! $valid ) {
			$gateway->log( 'Rejected a webhook with a missing or invalid signature. Check that the webhook secret in the Klarna settings matches the one in Whop.', 'warning' );
			return new WP_REST_Response( array( 'error' => 'invalid signature' ), 401 );
		}

		$event = json_decode( $body, true );
		$type  = is_array( $event ) && isset( $event['type'] ) ? (string) $event['type'] : '';
		if ( 0 !== strpos( $type, 'payment.' ) ) {
			return new WP_REST_Response( array( 'ignored' => $type ), 200 );
		}

		$payment_id = self::find_payment_id( isset( $event['data'] ) ? $event['data'] : null );
		if ( '' === $payment_id ) {
			$gateway->log( sprintf( 'Ignored a %s webhook without a payment ID.', $type ), 'warning' );
			return new WP_REST_Response( array( 'ignored' => 'no payment id' ), 200 );
		}

		try {
			$payment = $gateway->api()->get_payment( $payment_id );
		} catch ( Exception $e ) {
			$gateway->log( sprintf( 'Webhook %s for %s: could not read the payment from Whop: %s', $type, $payment_id, $e->getMessage() ), 'error' );
			// A non-2xx answer makes Whop retry the delivery later.
			return new WP_REST_Response( array( 'error' => 'could not read payment' ), 502 );
		}

		if ( empty( $payment['id'] ) ) {
			$payment['id'] = $payment_id;
		}
		$result = self::apply_payment( $gateway, $payment );
		$gateway->log( sprintf( 'Webhook %s for %s: %s.', $type, $payment_id, $result ) );

		return new WP_REST_Response( array( 'result' => $result ), 200 );
	}

	/**
	 * Updates the order the payment belongs to. Returns a short description of what happened.
	 */
	public static function apply_payment( WC_Gateway_Whop_Klarna $gateway, array $payment ) {
		$order = self::find_order( $payment );
		if ( ! $order ) {
			return 'no matching order';
		}
		if ( $order->get_payment_method() !== $gateway->id ) {
			return 'order does not use Klarna';
		}

		$payment_id = (string) $payment['id'];
		$status     = isset( $payment['status'] ) ? (string) $payment['status'] : '';

		if ( $order->is_paid() ) {
			return 'order already paid';
		}

		$fingerprint = $payment_id . ':' . $status;
		if ( $order->get_meta( self::META_LAST_STATUS ) === $fingerprint ) {
			return 'already handled';
		}
		$order->update_meta_data( self::META_LAST_STATUS, $fingerprint );

		switch ( $status ) {
			case 'paid':
				$problem = self::amount_problem( $order, $payment );
				if ( '' !== $problem ) {
					/* translators: 1: Whop payment ID, 2: what doesn't match */
					$order->update_status( 'on-hold', sprintf( __( 'Whop reports Klarna payment %1$s as paid, but %2$s. Check the payment in Whop before fulfilling this order.', 'whop-klarna-for-woocommerce' ), $payment_id, $problem ) );
					return 'paid, amount mismatch';
				}
				/* translators: %s: Whop payment ID */
				$order->add_order_note( sprintf( __( 'Klarna payment confirmed by Whop (payment %s).', 'whop-klarna-for-woocommerce' ), $payment_id ) );
				$order->payment_complete( $payment_id );
				return 'paid';

			case 'pending':
				if ( $order->has_status( 'pending' ) ) {
					/* translators: %s: Whop payment ID */
					$order->update_status( 'on-hold', sprintf( __( 'Klarna payment %s is processing at Whop. The order will update when it completes.', 'whop-klarna-for-woocommerce' ), $payment_id ) );
				} else {
					$order->save();
				}
				return 'pending';

			case 'void':
			case 'uncollectible':
				if ( $order->has_status( array( 'pending', 'on-hold' ) ) ) {
					/* translators: 1: Whop payment ID, 2: Whop payment status */
					$order->update_status( 'failed', sprintf( __( 'Klarna payment %1$s was not completed (Whop status: %2$s).', 'whop-klarna-for-woocommerce' ), $payment_id, $status ) );
				} else {
					$order->save();
				}
				return 'not collected';

			default:
				$order->save();
				return 'status ' . $status;
		}
	}

	/**
	 * The order is identified by the metadata this plugin attached when it created the
	 * checkout, and must carry the matching order key. Payments for anything else sold
	 * through the same Whop account have no such metadata and are ignored.
	 */
	private static function find_order( array $payment ) {
		$metadata = isset( $payment['metadata'] ) && is_array( $payment['metadata'] ) ? $payment['metadata'] : array();

		if ( ! empty( $metadata['wc_order_id'] ) ) {
			$order = wc_get_order( absint( $metadata['wc_order_id'] ) );
			$key   = isset( $metadata['wc_order_key'] ) ? (string) $metadata['wc_order_key'] : '';
			return $order && hash_equals( $order->get_order_key(), $key ) ? $order : null;
		}

		// Fallback if Whop ever stops copying metadata onto payments. `meta_key`/`meta_value`
		// rather than `meta_query`, which the classic (non-HPOS) order store ignores.
		if ( ! empty( $payment['checkout_configuration_id'] ) ) {
			$checkout_id = (string) $payment['checkout_configuration_id'];
			$orders      = wc_get_orders(
				array(
					'limit'          => 1,
					'payment_method' => WC_Gateway_Whop_Klarna::ID,
					'meta_key'       => WC_Gateway_Whop_Klarna::META_CHECKOUT_ID, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
					'meta_value'     => $checkout_id, // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
				)
			);
			$order = $orders ? $orders[0] : null;
			return $order && $order->get_meta( WC_Gateway_Whop_Klarna::META_CHECKOUT_ID ) === $checkout_id ? $order : null;
		}

		return null;
	}

	/**
	 * Returns why the paid amount doesn't cover the order, or '' when it does. Tax that
	 * Whop adds on top makes the total higher, which is fine; a discount or a different
	 * currency is not.
	 */
	private static function amount_problem( WC_Order $order, array $payment ) {
		$currency = isset( $payment['currency'] ) ? strtolower( (string) $payment['currency'] ) : '';
		if ( strtolower( $order->get_currency() ) !== $currency ) {
			/* translators: 1: currency paid in, 2: order currency */
			return sprintf( __( 'it was charged in %1$s instead of %2$s', 'whop-klarna-for-woocommerce' ), strtoupper( $currency ), $order->get_currency() );
		}

		$amount = null;
		foreach ( array( 'total', 'subtotal' ) as $field ) {
			if ( isset( $payment[ $field ]['amount'] ) && is_numeric( $payment[ $field ]['amount'] ) ) {
				$amount = (float) $payment[ $field ]['amount'];
				break;
			}
		}
		if ( null === $amount ) {
			return __( 'Whop did not report the amount', 'whop-klarna-for-woocommerce' );
		}

		$order_total = (float) $order->get_total();
		if ( $amount + 0.005 < $order_total ) {
			/* translators: 1: amount paid, 2: order total */
			return sprintf( __( 'only %1$s was paid for an order total of %2$s', 'whop-klarna-for-woocommerce' ), wc_format_decimal( $amount, wc_get_price_decimals() ), wc_format_decimal( $order_total, wc_get_price_decimals() ) );
		}

		return '';
	}

	private static function find_payment_id( $data ) {
		if ( ! is_array( $data ) ) {
			return '';
		}
		$candidates = array(
			isset( $data['id'] ) ? $data['id'] : null,
			isset( $data['payment_id'] ) ? $data['payment_id'] : null,
			isset( $data['payment']['id'] ) ? $data['payment']['id'] : null,
		);
		foreach ( $candidates as $candidate ) {
			if ( is_string( $candidate ) && preg_match( '/^pay_[A-Za-z0-9]+$/', $candidate ) ) {
				return $candidate;
			}
		}
		return '';
	}

	private static function gateway() {
		$gateways = WC()->payment_gateways() ? WC()->payment_gateways()->payment_gateways() : array();
		return isset( $gateways[ WC_Gateway_Whop_Klarna::ID ] ) ? $gateways[ WC_Gateway_Whop_Klarna::ID ] : null;
	}
}
