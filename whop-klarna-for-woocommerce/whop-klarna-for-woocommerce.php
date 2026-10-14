<?php
/**
 * Plugin Name:          Klarna via Whop for WooCommerce
 * Description:          Adds Klarna as a payment method at WooCommerce checkout. Payments are processed by Whop.
 * Version:              1.0.0
 * Requires at least:    6.3
 * Requires PHP:         7.4
 * Requires Plugins:     woocommerce
 * WC requires at least: 8.0
 * License:              GPL-2.0-or-later
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:          whop-klarna-for-woocommerce
 */

defined( 'ABSPATH' ) || exit;

define( 'WHOP_KLARNA_VERSION', '1.0.0' );
define( 'WHOP_KLARNA_FILE', __FILE__ );
define( 'WHOP_KLARNA_DIR', plugin_dir_path( __FILE__ ) );
define( 'WHOP_KLARNA_URL', plugin_dir_url( __FILE__ ) );

// Works with both order storage modes and with the block-based checkout.
add_action(
	'before_woocommerce_init',
	static function () {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', WHOP_KLARNA_FILE, true );
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', WHOP_KLARNA_FILE, true );
		}
	}
);

add_action(
	'plugins_loaded',
	static function () {
		if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
			add_action(
				'admin_notices',
				static function () {
					echo '<div class="notice notice-error"><p>' . esc_html__( 'Klarna via Whop needs WooCommerce to be installed and active.', 'whop-klarna-for-woocommerce' ) . '</p></div>';
				}
			);
			return;
		}

		require_once WHOP_KLARNA_DIR . 'includes/class-whop-klarna-signature.php';
		require_once WHOP_KLARNA_DIR . 'includes/class-whop-klarna-api.php';
		require_once WHOP_KLARNA_DIR . 'includes/class-wc-gateway-whop-klarna.php';
		require_once WHOP_KLARNA_DIR . 'includes/class-whop-klarna-webhook.php';

		add_filter(
			'woocommerce_payment_gateways',
			static function ( $gateways ) {
				$gateways[] = 'WC_Gateway_Whop_Klarna';
				return $gateways;
			}
		);

		Whop_Klarna_Webhook::init();
	}
);

add_action(
	'woocommerce_blocks_loaded',
	static function () {
		if ( ! class_exists( \Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType::class ) ) {
			return;
		}

		require_once WHOP_KLARNA_DIR . 'includes/class-whop-klarna-blocks-support.php';

		add_action(
			'woocommerce_blocks_payment_method_type_registration',
			static function ( $registry ) {
				$registry->register( new Whop_Klarna_Blocks_Support() );
			}
		);
	}
);

add_filter(
	'plugin_action_links_' . plugin_basename( WHOP_KLARNA_FILE ),
	static function ( $links ) {
		$url = admin_url( 'admin.php?page=wc-settings&tab=checkout&section=whop_klarna' );
		array_unshift( $links, '<a href="' . esc_url( $url ) . '">' . esc_html__( 'Settings', 'whop-klarna-for-woocommerce' ) . '</a>' );
		return $links;
	}
);
