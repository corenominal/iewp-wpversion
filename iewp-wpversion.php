<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 * Plugin Name: IEWP WordPress Version
 * Plugin URI: https://github.com/corenominal/iewp-wpversion
 * Description: A simple WordPress plugin that returns the version number of WordPress. Once activated, the WP version can be obtained in JSON format from "yourdomain.com/wp-json/iewp-wpversion/version".
 * Author: Philip Newborough
 * Version: 0.0.1
 * Author URI: https://corenominal.org
 */

/**
 * Register the endpoint
 */
function iewp_wpversion_register_endpoint()
{
	// endpoint:/wp-json/iewp-wpversion/version
	register_rest_route( 'iewp-wpversion', '/version', array(
        'methods' => 'GET',
        'callback' => 'iewp_wpversion_version',
		'show_in_index' => false,
    ));
}
add_action( 'rest_api_init', 'iewp_wpversion_register_endpoint' );

/**
 * Return WordPress Vesion
 */
function iewp_wpversion_version()
{
    $data['version'] = get_bloginfo( 'version' );
    return $data;
}
