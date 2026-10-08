<?php
/**
 * Theme config file.
 *
 * @package FINANCER
 * @author  ThemeKalia
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['financer_main_header'][] 	= array( 'financer_main_header_area', 99 );

$config['default']['financer_main_footer'][] 	= array( 'financer_main_footer_area', 99 );

$config['default']['financer_sidebar'][] 	    = array( 'financer_sidebar', 99 );

$config['default']['financer_banner'][] 	    = array( 'financer_banner', 99 );


return $config;
