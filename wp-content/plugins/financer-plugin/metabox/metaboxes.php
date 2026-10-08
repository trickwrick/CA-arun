<?php
if ( ! function_exists( "financer_add_metaboxes" ) ) {
	function financer_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'team.php',
			'testimonials.php',
			'project.php',
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( FINANCERPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/financer_options/boxes", "financer_add_metaboxes" );
}

