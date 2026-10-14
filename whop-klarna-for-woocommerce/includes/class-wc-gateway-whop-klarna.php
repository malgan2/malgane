<?php
/**
 * The "Klarna" payment method at checkout.
 *
 * When the buyer places an order, this asks Whop for a checkout page that offers Klarna
 * only, for exactly the order total, and sends the buyer there. Whop then tells the store
 * how the payment went through the webhook (see Whop_Klarna_Webhook).
 */

defined( 'ABSPATH' ) || exit;

class WC_Gateway_Whop_Klarna extends WC_Payment_Gateway {

	const ID = 'whop_klarna';

	/** Order meta holding the Whop checkout configuration (`ch_...`) the buyer was sent to. */
	const META_CHECKOUT_ID = '_whop_checkout_configuration_id';

	/**
	 * Countries Klarna is offered in through Whop: the US, Canada, Australia and the EU
	 * countries where Klarna operates. Editable in the settings.
	 */
	const DEFAULT_COUNTRIES = array( 'US', 'CA', 'AU', 'AT', 'BE', 'CZ', 'DK', 'FI', 'FR', 'DE', 'GR', 'IE', 'IT', 'NL', 'PL', 'PT', 'RO', 'ES', 'SE' );

	public function __construct() {
		$this->id                 = self::ID;
		$this->has_fields         = false;
		$this->method_title       = __( 'Klarna (via Whop)', 'whop-klarna-for-woocommerce' );
		$this->method_description = __( 'Let customers pay with Klarna. They finish paying on a secure Whop checkout page that only offers Klarna, then come back to your store.', 'whop-klarna-for-woocommerce' );
		$this->supports           = array( 'products' );

		$this->init_form_fields();
		$this->init_settings();

		$this->title       = $this->get_option( 'title' );
		$this->description = $this->get_option( 'description' );
		$this->max_amount  = (float) $this->get_option( 'max_amount' );

		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_thankyou_' . $this->id, array( $this, 'thankyou_message' ) );
	}

	public function init_form_fields() {
		// rest_url() needs the rewrite system, which isn't ready during very early loads.
		$webhook_url = isset( $GLOBALS['wp_rewrite'] ) ? Whop_Klarna_Webhook::url() : '';

		$this->form_fields = array(
			'enabled'           => array(
				'title'   => __( 'Enable/Disable', 'whop-klarna-for-woocommerce' ),
				'type'    => 'checkbox',
				'label'   => __( 'Offer Klarna at checkout', 'whop-klarna-for-woocommerce' ),
				'default' => 'no',
			),
			'title'             => array(
				'title'       => __( 'Title', 'whop-klarna-for-woocommerce' ),
				'type'        => 'text',
				'description' => __( 'The payment method name customers see at checkout.', 'whop-klarna-for-woocommerce' ),
				'default'     => __( 'Klarna', 'whop-klarna-for-woocommerce' ),
				'desc_tip'    => true,
			),
			'description'       => array(
				'title'       => __( 'Description', 'whop-klarna-for-woocommerce' ),
				'type'        => 'textarea',
				'description' => __( 'Shown under the title when customers select Klarna.', 'whop-klarna-for-woocommerce' ),
				'default'     => __( 'Buy now, pay later with Klarna. You will be taken to a secure checkout page to finish paying.', 'whop-klarna-for-woocommerce' ),
				'desc_tip'    => true,
			),
			'credentials_title' => array(
				'title'       => __( 'Whop account', 'whop-klarna-for-woocommerce' ),
				'type'        => 'title',
				'description' => __( 'Find these in your Whop business dashboard, under the developer settings.', 'whop-klarna-for-woocommerce' ),
			),
			'sandbox'           => array(
				'title'       => __( 'Test mode', 'whop-klarna-for-woocommerce' ),
				'type'        => 'checkbox',
				'label'       => __( 'Use the Whop sandbox (no real money moves)', 'whop-klarna-for-woocommerce' ),
				'description' => __( 'Sandbox needs its own API key, company ID and webhook from sandbox.whop.com.', 'whop-klarna-for-woocommerce' ),
				'default'     => 'no',
			),
			'api_key'           => array(
				'title'       => __( 'API key', 'whop-klarna-for-woocommerce' ),
				'type'        => 'password',
				'description' => __( 'Needs permission to create checkout configurations and read payments.', 'whop-klarna-for-woocommerce' ),
				'default'     => '',
			),
			'company_id'        => array(
				'title'       => __( 'Company ID', 'whop-klarna-for-woocommerce' ),
				'type'        => 'text',
				'description' => __( 'Starts with biz_.', 'whop-klarna-for-woocommerce' ),
				'default'     => '',
				'placeholder' => 'biz_',
			),
			'product_id'        => array(
				'title'       => __( 'Product ID (optional)', 'whop-klarna-for-woocommerce' ),
				'type'        => 'text',
				'description' => __( 'A Whop product (prod_...) to file store orders under. Leave empty to let Whop decide.', 'whop-klarna-for-woocommerce' ),
				'default'     => '',
				'placeholder' => 'prod_',
			),
			'webhook_secret'    => array(
				'title'       => __( 'Webhook secret', 'whop-klarna-for-woocommerce' ),
				'type'        => 'password',
				'description' => $webhook_url
					/* translators: %s: webhook URL */
					? sprintf( __( 'In Whop, create a webhook for the payment events (payment.succeeded, payment.pending, payment.failed) pointing to %s, then paste its secret (ws_...) here. Orders are only marked as paid when this is set up.', 'whop-klarna-for-woocommerce' ), '<code>' . esc_html( $webhook_url ) . '</code>' )
					: '',
				'default'     => '',
			),
			'limits_title'      => array(
				'title'       => __( 'When to offer Klarna', 'whop-klarna-for-woocommerce' ),
				'type'        => 'title',
				'description' => __( 'Klarna is hidden at checkout when an order falls outside these rules, so customers never land on a checkout page with nothing to pay with.', 'whop-klarna-for-woocommerce' ),
			),
			'allowed_countries' => array(
				'title'       => __( 'Billing countries', 'whop-klarna-for-woocommerce' ),
				'type'        => 'multiselect',
				'class'       => 'wc-enhanced-select',
				'options'     => WC()->countries ? WC()->countries->get_countries() : array(),
				'description' => __( 'Only customers billing to these countries see Klarna.', 'whop-klarna-for-woocommerce' ),
				'default'     => self::DEFAULT_COUNTRIES,
			),
			'min_amount'        => array(
				'title'       => __( 'Minimum order total', 'whop-klarna-for-woocommerce' ),
				'type'        => 'price',
				'description' => __( 'Leave empty for no minimum.', 'whop-klarna-for-woocommerce' ),
				'default'     => '',
			),
			'max_amount'        => array(
				'title'       => __( 'Maximum order total', 'whop-klarna-for-woocommerce' ),
				'type'        => 'price',
				'description' => __( 'Klarna through Whop allows up to $10,000 in the US. Leave empty for no maximum.', 'whop-klarna-for-woocommerce' ),
				'default'     => '10000',
			),
			'debug'             => array(
				'title'       => __( 'Debug log', 'whop-klarna-for-woocommerce' ),
				'type'        => 'checkbox',
				'label'       => __( 'Log every Whop request and webhook', 'whop-klarna-for-woocommerce' ),
				/* translators: %s: link to WooCommerce logs */
				'description' => sprintf( __( 'Errors are always logged. View logs under %s (source: whop-klarna).', 'whop-klarna-for-woocommerce' ), '<a href="' . esc_url( admin_url( 'admin.php?page=wc-status&tab=logs' ) ) . '">' . esc_html__( 'WooCommerce → Status → Logs', 'whop-klarna-for-woocommerce' ) . '</a>' ),
				'default'     => 'no',
			),
		);
	}

	public function is_available() {
		if ( ! parent::is_available() ) {
			return false;
		}
		if ( '' === trim( $this->get_option( 'api_key' ) ) || '' === trim( $this->get_option( 'company_id' ) ) ) {
			return false;
		}

		$total = $this->get_order_total();
		$min   = (float) $this->get_option( 'min_amount' );
		if ( $min > 0 && $total > 0 && $total < $min ) {
			return false;
		}

		// Before the customer enters an address the country is unknown, so keep Klarna
		// listed; process_payment() checks the country again.
		$country = $this->current_billing_country();
		if ( '' !== $country && ! $this->is_country_allowed( $country ) ) {
			return false;
		}

		return true;
	}

	public function process_payment( $order_id ) {
		$order = wc_get_order( $order_id );
		if ( ! $order ) {
			wc_add_notice( __( 'We could not find your order. Please try again.', 'whop-klarna-for-woocommerce' ), 'error' );
			return array( 'result' => 'failure' );
		}

		if ( ! $this->is_country_allowed( $order->get_billing_country() ) ) {
			wc_add_notice( __( 'Klarna is not available for your billing country. Please choose another payment method.', 'whop-klarna-for-woocommerce' ), 'error' );
			return array( 'result' => 'failure' );
		}

		$plan = array(
			'plan_type'     => 'one_time',
			'initial_price' => (float) wc_format_decimal( $order->get_total(), wc_get_price_decimals() ),
			'currency'      => strtolower( $order->get_currency() ),
			/* translators: %s: order number */
			'title'         => sprintf( __( 'Order #%s', 'whop-klarna-for-woocommerce' ), $order->get_order_number() ),
			'visibility'    => 'hidden',
		);
		$product_id = trim( $this->get_option( 'product_id' ) );
		if ( '' !== $product_id ) {
			$plan['product_id'] = $product_id;
		}

		try {
			$checkout = $this->api()->create_checkout_configuration(
				array(
					'account_id'                   => trim( $this->get_option( 'company_id' ) ),
					'plan'                         => $plan,
					'payment_method_configuration' => array(
						'enabled'                   => array( 'klarna' ),
						'disabled'                  => array(),
						'include_platform_defaults' => false,
					),
					// Whop copies this onto the payment; the webhook uses it to find the order.
					'metadata'                     => array(
						'wc_order_id'  => (string) $order->get_id(),
						'wc_order_key' => $order->get_order_key(),
						'source'       => 'whop-klarna-for-woocommerce',
					),
					'redirect_url'                 => $this->get_return_url( $order ),
				)
			);
		} catch ( Exception $e ) {
			$this->log( sprintf( 'Could not start Klarna checkout for order %d: %s', $order->get_id(), $e->getMessage() ), 'error' );
			wc_add_notice( __( 'We could not start the Klarna checkout. Please try again or choose another payment method.', 'whop-klarna-for-woocommerce' ), 'error' );
			return array( 'result' => 'failure' );
		}

		$order->update_meta_data( self::META_CHECKOUT_ID, $checkout['id'] );
		$order->save();
		/* translators: %s: Whop checkout configuration ID */
		$order->add_order_note( sprintf( __( 'Customer sent to the Klarna checkout on Whop (checkout %s).', 'whop-klarna-for-woocommerce' ), $checkout['id'] ) );
		$this->log( sprintf( 'Order %d: created Whop checkout %s.', $order->get_id(), $checkout['id'] ) );

		return array(
			'result'   => 'success',
			'redirect' => $checkout['purchase_url'],
		);
	}

	/**
	 * Klarna can take a moment to confirm, and the order only turns paid once Whop's
	 * webhook arrives, so tell the buyer that instead of leaving them guessing.
	 */
	public function thankyou_message( $order_id ) {
		$order = wc_get_order( $order_id );
		if ( $order && ! $order->is_paid() && $order->has_status( array( 'pending', 'on-hold' ) ) ) {
			echo '<p class="woocommerce-info">' . esc_html__( 'We are confirming your Klarna payment. You will get an email as soon as it is confirmed.', 'whop-klarna-for-woocommerce' ) . '</p>';
		}
	}

	public function api() {
		return new Whop_Klarna_API( trim( $this->get_option( 'api_key' ) ), 'yes' === $this->get_option( 'sandbox' ) );
	}

	public function is_country_allowed( $country ) {
		$allowed = $this->get_option( 'allowed_countries' );
		if ( ! is_array( $allowed ) ) {
			$allowed = self::DEFAULT_COUNTRIES;
		}
		return '' !== (string) $country && in_array( strtoupper( (string) $country ), $allowed, true );
	}

	/**
	 * Errors and warnings are always logged; everything else only with debug logging on.
	 */
	public function log( $message, $level = 'info' ) {
		if ( 'info' === $level && 'yes' !== $this->get_option( 'debug' ) ) {
			return;
		}
		wc_get_logger()->log( $level, $message, array( 'source' => 'whop-klarna' ) );
	}

	private function current_billing_country() {
		$order_id = absint( get_query_var( 'order-pay' ) );
		if ( $order_id ) {
			$order = wc_get_order( $order_id );
			return $order ? (string) $order->get_billing_country() : '';
		}
		return WC()->customer ? (string) WC()->customer->get_billing_country() : '';
	}
}
