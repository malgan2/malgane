<?php
/**
 * Makes the payment method show up in the block-based Checkout (the default checkout page
 * in current WooCommerce). Which orders it is offered for is still decided on the server,
 * by WC_Gateway_Whop_Klarna::is_available().
 */

defined( 'ABSPATH' ) || exit;

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class Whop_Klarna_Blocks_Support extends AbstractPaymentMethodType {

	protected $name = 'whop_klarna';

	public function initialize() {
		$this->settings = get_option( 'woocommerce_whop_klarna_settings', array() );
	}

	public function is_active() {
		return 'yes' === $this->get_setting( 'enabled', 'no' );
	}

	public function get_payment_method_script_handles() {
		wp_register_script(
			'whop-klarna-blocks',
			WHOP_KLARNA_URL . 'assets/js/blocks.js',
			array( 'wc-blocks-registry', 'wc-settings', 'wp-element', 'wp-html-entities' ),
			WHOP_KLARNA_VERSION,
			true
		);
		return array( 'whop-klarna-blocks' );
	}

	public function get_payment_method_data() {
		return array(
			'title'       => $this->get_setting( 'title', __( 'Klarna', 'whop-klarna-for-woocommerce' ) ),
			'description' => $this->get_setting( 'description', '' ),
			'supports'    => array( 'products' ),
		);
	}
}
