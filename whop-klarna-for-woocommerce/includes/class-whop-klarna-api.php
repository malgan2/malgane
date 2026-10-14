<?php
/**
 * Minimal client for the two Whop API calls this plugin needs.
 */

defined( 'ABSPATH' ) || exit;

class Whop_Klarna_API {

	const PRODUCTION_URL = 'https://api.whop.com/api/v1/';
	const SANDBOX_URL    = 'https://sandbox-api.whop.com/api/v1/';

	/**
	 * Responses are pinned to the API version this plugin was written against, so a
	 * later change to Whop's response shapes can't silently break it.
	 */
	const API_VERSION_DATE = '2026-10-09-2';

	/** @var string */
	private $api_key;

	/** @var string */
	private $base_url;

	public function __construct( $api_key, $sandbox = false ) {
		$this->api_key  = (string) $api_key;
		$this->base_url = $sandbox ? self::SANDBOX_URL : self::PRODUCTION_URL;
	}

	/**
	 * Creates a checkout session and returns it. The buyer pays at its `purchase_url`.
	 *
	 * @return array At least `id` (`ch_...`) and `purchase_url`.
	 * @throws Exception When the request fails or the response is missing either field.
	 */
	public function create_checkout_configuration( array $params ) {
		$config = $this->request( 'POST', 'checkout_configurations', $params );

		if ( empty( $config['id'] ) || empty( $config['purchase_url'] ) ) {
			throw new Exception( 'Whop created a checkout configuration without an id or purchase_url.' );
		}

		return $config;
	}

	/**
	 * @param string $payment_id `pay_...`
	 * @return array The payment, including `status`, `metadata`, `currency` and `total`.
	 * @throws Exception When the request fails.
	 */
	public function get_payment( $payment_id ) {
		return $this->request( 'GET', 'payments/' . rawurlencode( $payment_id ) );
	}

	/**
	 * @throws Exception On a network error, a non-2xx status or a body that isn't JSON.
	 */
	private function request( $method, $path, $body = null ) {
		$args = array(
			'method'  => $method,
			'timeout' => 30,
			'headers' => array(
				'Authorization'    => 'Bearer ' . $this->api_key,
				'Accept'           => 'application/json',
				'Api-Version-Date' => self::API_VERSION_DATE,
				'User-Agent'       => 'whop-klarna-for-woocommerce/' . WHOP_KLARNA_VERSION,
			),
		);

		if ( null !== $body ) {
			$args['headers']['Content-Type'] = 'application/json';
			$args['body']                    = wp_json_encode( $body );
		}

		$response = wp_remote_request( $this->base_url . $path, $args );

		if ( is_wp_error( $response ) ) {
			throw new Exception( sprintf( 'Whop API %s %s failed: %s', $method, $path, $response->get_error_message() ) );
		}

		$status = (int) wp_remote_retrieve_response_code( $response );
		$data   = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( $status < 200 || $status >= 300 ) {
			$message = is_array( $data ) && isset( $data['error']['message'] ) ? $data['error']['message'] : wp_remote_retrieve_body( $response );
			throw new Exception( sprintf( 'Whop API %s %s returned HTTP %d: %s', $method, $path, $status, substr( (string) $message, 0, 500 ) ) );
		}

		if ( ! is_array( $data ) ) {
			throw new Exception( sprintf( 'Whop API %s %s returned a response that is not JSON.', $method, $path ) );
		}

		return $data;
	}
}
