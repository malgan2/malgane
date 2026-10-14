<?php
/**
 * Verifies the Standard Webhooks signature Whop puts on every webhook delivery.
 *
 * Whop signs `{webhook-id}.{webhook-timestamp}.{raw body}` with HMAC-SHA256, keyed with the
 * literal bytes of the endpoint's secret (the whole `ws_...` string, prefix included), and
 * sends `v1,{base64 signature}` entries in the `webhook-signature` header.
 */

defined( 'ABSPATH' ) || exit;

final class Whop_Klarna_Signature {

	/** Deliveries older or newer than this many seconds are rejected, to stop replays. */
	const TOLERANCE_SECONDS = 300;

	/**
	 * @param string      $payload   Raw request body, exactly as received.
	 * @param string|null $id        `webhook-id` header.
	 * @param string|null $timestamp `webhook-timestamp` header (Unix seconds).
	 * @param string|null $header    `webhook-signature` header.
	 * @param string      $secret    The webhook secret shown in Whop.
	 * @param int|null    $now       Current Unix time; only tests pass this.
	 */
	public static function verify( $payload, $id, $timestamp, $header, $secret, $now = null ) {
		if ( '' === (string) $secret || empty( $id ) || empty( $timestamp ) || empty( $header ) ) {
			return false;
		}
		if ( ! ctype_digit( (string) $timestamp ) ) {
			return false;
		}

		$now = null === $now ? time() : (int) $now;
		if ( abs( $now - (int) $timestamp ) > self::TOLERANCE_SECONDS ) {
			return false;
		}

		$expected = self::sign( $payload, $id, $timestamp, $secret );

		foreach ( preg_split( '/\s+/', trim( (string) $header ) ) as $entry ) {
			$parts = explode( ',', $entry, 2 );
			if ( 2 === count( $parts ) && 'v1' === $parts[0] && hash_equals( $expected, $parts[1] ) ) {
				return true;
			}
		}

		return false;
	}

	/** Returns the base64 signature (without the `v1,` prefix). */
	public static function sign( $payload, $id, $timestamp, $secret ) {
		return base64_encode( hash_hmac( 'sha256', $id . '.' . $timestamp . '.' . $payload, (string) $secret, true ) );
	}
}
