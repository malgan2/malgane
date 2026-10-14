<?php
// Router for PHP's built-in server: serves static files (including the symlinked plugin)
// and sends everything else to WordPress.
$root = getenv( 'WP_ROOT' );
$path = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );

if ( '/' !== $path && is_file( $root . $path ) && '.php' !== substr( $path, -4 ) ) {
	$types = array( 'js' => 'application/javascript', 'css' => 'text/css', 'svg' => 'image/svg+xml', 'png' => 'image/png' );
	$ext   = pathinfo( $path, PATHINFO_EXTENSION );
	header( 'Content-Type: ' . ( isset( $types[ $ext ] ) ? $types[ $ext ] : 'application/octet-stream' ) );
	readfile( $root . $path );
	return;
}

if ( is_file( $root . $path ) ) {
	$_SERVER['SCRIPT_NAME'] = $path;
	require $root . $path;
	return;
}

$_SERVER['SCRIPT_NAME'] = '/index.php';
require $root . '/index.php';
