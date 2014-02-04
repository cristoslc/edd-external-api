<?php

/**
 * Below is an example call to the external API.
 *
 * currently supports either a purchase, a refund, or details about a purchase (via trans_type variable)
 *
 * REQUIRED FOR ALL: key, token, trans_type, source_url, purchase ID, payment ID
 *
 * FOR DETAILS: returns an array success(bool) and message
 *
 * note that both the product ID and purchase ID are required here
 *
 * passing a price will override the set download price, and passing a zero will set it to zero (free).
 * otherwise it will use the set product price
 *
 */

$url	= 'http://your-site/edd-external-api/';

$args = array(
	'method'	=> 'POST',
	'sslverify' => false,
	'body'		=> array(
		'key'			=> 'YOUR-KEY',
		'token'			=> 'YOUR-TOKEN',
		'trans_type'	=> 'details',
		'product_id'	=> 'YOUR-PRODUCT-ID',
		'payment_id'	=> 'YOUR-PAYMENT-ID',
		'source_name'	=> 'EXTERNAL-SITE-NAME',
		'source_url'	=> 'EXTERNAL-SITE-URL',
		'receipt'		=> false
	),
);

$response	= wp_remote_post( $url, $args );
$body		= wp_remote_retrieve_body( $response );
$data		= json_decode( $body );

