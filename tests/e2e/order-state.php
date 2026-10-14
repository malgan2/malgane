<?php
// Prints an order's state as JSON for e2e.mjs. Usage: php order-state.php <wordpress dir> <order id>
$_SERVER['HTTP_HOST'] = '127.0.0.1:8899';
require $argv[1] . '/wp-load.php';
$o = wc_get_order( (int) $argv[2] );
$notes = array_map( function ( $n ) { return $n->content; }, wc_get_order_notes( array( 'order_id' => $o->get_id() ) ) );
echo wp_json_encode( array( 'status' => $o->get_status(), 'key' => $o->get_order_key(), 'txn' => $o->get_transaction_id(), 'paid' => $o->is_paid(), 'checkout' => $o->get_meta( '_whop_checkout_configuration_id' ), 'method' => $o->get_payment_method(), 'notes' => $notes, 'hpos' => get_option( 'woocommerce_custom_orders_table_enabled' ) ) );
