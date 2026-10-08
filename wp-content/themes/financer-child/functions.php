<?php
/**
 * Theme functions and definitions.
 */
function financer_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'financer-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'financer-minified-style' , get_template_directory_uri() . '/style.css' );
    }

    wp_enqueue_style( 'financer-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'financer-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'financer_child_enqueue_styles' );