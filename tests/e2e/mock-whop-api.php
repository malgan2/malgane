<?php
// Test-only: stands in for api.whop.com so the plugin can be exercised end to end.
add_filter( 'pre_http_request', function ( $pre, $args, $url ) {
	if ( ! preg_match( '#^https://(sandbox-)?api\.whop\.com/api/v1/(.*)$#', $url, $m ) ) {
		return $pre;
	}
	$dir  = WP_CONTENT_DIR . '/whop-mock/';
	@mkdir( $dir );
	file_put_contents( $dir . 'requests.jsonl', wp_json_encode( array( 'url' => $url, 'method' => $args['method'], 'headers' => $args['headers'], 'body' => isset( $args['body'] ) ? $args['body'] : null ) ) . "\n", FILE_APPEND );
	$reply = function ( $code, $data ) {
		return array( 'headers' => array(), 'body' => wp_json_encode( $data ), 'response' => array( 'code' => $code, 'message' => '' ), 'cookies' => array(), 'filename' => null );
	};
	if ( file_exists( $dir . 'fail' ) ) {
		return $reply( 500, array( 'error' => array( 'message' => 'mock outage' ) ) );
	}
	$path = $m[2];
	if ( 'POST' === $args['method'] && 'checkout_configurations' === $path ) {
		$n = (int) @file_get_contents( $dir . 'counter' ) + 1;
		file_put_contents( $dir . 'counter', $n );
		$body = json_decode( $args['body'], true );
		return $reply( 200, array( 'id' => 'ch_test' . $n, 'purchase_url' => 'https://whop.com/checkout/ch_test' . $n, 'metadata' => $body['metadata'] ) );
	}
	if ( 'GET' === $args['method'] && preg_match( '#^payments/(pay_\w+)$#', $path, $p ) ) {
		$payments = json_decode( (string) @file_get_contents( $dir . 'payments.json' ), true ) ?: array();
		return isset( $payments[ $p[1] ] ) ? $reply( 200, $payments[ $p[1] ] ) : $reply( 404, array( 'error' => array( 'message' => 'not found' ) ) );
	}
	return $reply( 404, array( 'error' => array( 'message' => 'unknown mock route ' . $path ) ) );
}, 10, 3 );
