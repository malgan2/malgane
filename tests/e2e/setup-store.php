<?php
/**
 * Builds the test store in three steps, each in its own process so the plugins load fresh:
 *   php setup-store.php <wordpress dir> install
 *   php setup-store.php <wordpress dir> activate
 *   php setup-store.php <wordpress dir> configure <classic|hpos>   (prints the product ID)
 */

$_SERVER['HTTP_HOST'] = '127.0.0.1:8899';
list( , $wp_dir, $step ) = $argv;

if ( 'install' === $step ) {
	define( 'WP_INSTALLING', true );
	require $wp_dir . '/wp-load.php';
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	wp_install( 'Test Store', 'admin', 'admin@example.com', true, '', 'password' );
	exit;
}

require $wp_dir . '/wp-load.php';

if ( 'activate' === $step ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	update_option( 'permalink_structure', '/%postname%/' );
	foreach ( array( 'woocommerce/woocommerce.php', 'whop-klarna-for-woocommerce/whop-klarna-for-woocommerce.php' ) as $plugin_file ) {
		$activation = activate_plugin( $plugin_file );
		if ( is_wp_error( $activation ) ) {
			fwrite( STDERR, $plugin_file . ': ' . $activation->get_error_message() . "\n" );
			exit( 1 );
		}
	}
	exit;
}

// configure
WC_Install::install();
update_option( 'woocommerce_default_country', 'US:CA' );
update_option( 'woocommerce_currency', 'USD' );
update_option( 'woocommerce_calc_taxes', 'no' );

$hpos = 'hpos' === $argv[3];
if ( $hpos ) {
	wc_get_container()->get( \Automattic\WooCommerce\Internal\DataStores\Orders\DataSynchronizer::class )->create_database_tables();
}
update_option( 'woocommerce_custom_orders_table_data_sync_enabled', 'no' );
update_option( 'woocommerce_custom_orders_table_enabled', $hpos ? 'yes' : 'no' );

$test_product = new WC_Product_Simple();
$test_product->set_name( 'Test Lamp' );
$test_product->set_regular_price( '120.00' );
$test_product->set_virtual( true );
$test_product->set_status( 'publish' );
$test_product->save();

update_option(
	'woocommerce_whop_klarna_settings',
	array(
		'enabled'           => 'yes',
		'title'             => 'Klarna',
		'description'       => 'Pay later with Klarna.',
		'sandbox'           => 'no',
		'api_key'           => 'apik_test',
		'company_id'        => 'biz_test',
		'product_id'        => '',
		'webhook_secret'    => 'ws_testsecret123',
		'allowed_countries' => WC_Gateway_Whop_Klarna::DEFAULT_COUNTRIES,
		'min_amount'        => '',
		'max_amount'        => '10000',
		'debug'             => 'yes',
	)
);

echo $test_product->get_id();
