<?php

/**
 * Hookup all the tags here.
 *
 * @package FINANCER
 * @author  Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version 1.0
 */

/**
 * Load the default config
 */
//financer_load_default_hooks
function financer_load_default_hooks() {

	$config = financer_WSH()->config( 'default' );

	if ( is_array( $config ) ) {

		foreach ( $config as $key => $more ) {

			foreach ( $more as $k => $value ) {
				$func = is_array( $value ) ? $value[0] : $value;

				$priority = isset( $value[1] ) ? $value[1] : 99;
				$params   = isset( $value[2] ) ? $value[2] : 2;

				add_action( $key, $func, $priority, $params );
			}
		}
	}
}

/**
 * [financer_main_header_area description]
 *
 * @return [type] [description]
 */

//financer_main_header_area
function financer_main_header_area() {

	$options     = financer_WSH()->option();
    
    $header_type = '';
    $header_e = 0;
    $header_d = '';

    if( is_page() ) {
        $header_type = get_post_meta( get_the_ID(), 'header_source_type', true );
        $header_e    = get_post_meta( get_the_ID(), 'header_new_elementor_template', true );
        $header_d    = get_post_meta( get_the_ID(), 'header_style_settings');
	}
	
	if( ! $header_type || $header_type == 'd' ) {
	    
    	$header_type = $options->get( 'header_source_type' );
        $header_e = $options->get('header_elementor_template');
        $header_d = $options->get('header_style_settings');
        
	}
        if ( $header_type == 'e' AND class_exists( '\Elementor\Plugin' ) AND $header_e ) {
            echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_e );

            return false;
        } elseif ( $header_type == 'd' AND class_exists( '\Elementor\Plugin' ) AND $header_d ) {
            //need to change
			$header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
			$header_option = $options->get( 'header_style_settings' );
			$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
		}else {
			//need to change
            $header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
			$header_option = $options->get( 'header_style_settings' );
			$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
		}

	//need to change
	if ( $header == 'header_v1' ) {
		financer_template_load( 'templates/header/default-header.php' );
	} elseif ( $header == 'header_v2' ) {
		financer_template_load( 'templates/header/header_v2.php' );
	} elseif ( $header == 'header_v3' ) {
		financer_template_load( 'templates/header/header_v3.php' );
	} elseif ( $header == 'header_v4' ) {
		financer_template_load( 'templates/header/header_v4.php' );
	} else {
		financer_template_load( 'templates/header/header_v4.php' );
	}
}

/**
 * [financer_main_footer_area description]
 *
 * @return [type] [description]
 */
//financer_main_footer_area
function financer_main_footer_area() {

	$options     = financer_WSH()->option();
    
    $footer_type = '';
    $footer_e = 0;
    $footer_d = '';

    if( is_page() ) {
        $footer_type = get_post_meta( get_the_ID(), 'footer_source_type', true );
        $footer_e    = get_post_meta( get_the_ID(), 'footer_new_elementor_template', true );
        $footer_d    = get_post_meta( get_the_ID(), 'footer_style_settings');
	}
	
	if( ! $footer_type || $footer_type == 'd' ) {
	    
    	$footer_type = $options->get( 'footer_source_type' );
        $footer_e = $options->get('footer_elementor_template');
        $footer_d = $options->get('footer_style_settings');
        
	}

        if ( $footer_type == 'e' AND class_exists( '\Elementor\Plugin' ) AND $footer_e ) {
            echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_e );

            return false;
        } elseif ( $footer_type == 'd' AND class_exists( '\Elementor\Plugin' ) AND $footer_d ) {
            //need to change
			$footer_meta = get_post_meta( get_the_ID(), 'footer_style_settings');
			$footer_option = $options->get( 'footer_style_settings' );
			$footer = ( $footer_meta ) ? $footer_meta['0'] : $footer_option;
		}else {
            //need to change
			$footer_meta = get_post_meta( get_the_ID(), 'footer_style_settings');
			$footer_option = $options->get( 'footer_style_settings' );
			$footer = ( $footer_meta ) ? $footer_meta['0'] : $footer_option;
		}

	//need to change
	if ( $footer == 'footer_v1' ) {
		financer_template_load( 'templates/footer/default-footer.php' );
	} else {
		financer_template_load( 'templates/footer/default-footer.php' );
	}
}

/**
 * [financer_sidebar description]
 *
 * @return [type] [description]
 */
//financer_sidebar
function financer_sidebar( $data ) {

	financer_template_load( 'templates/sidebar.php', compact( 'data' ) );
}

/**
 * [financer_banner description]
 *
 * @return [type] [description]
 */
//financer_banner
function financer_banner( $data ) {

	financer_template_load( 'templates/banner/banner.php', compact( 'data' ) );

}