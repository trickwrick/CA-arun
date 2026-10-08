<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_action('init', 'finaxio_custom_post_types');
function finaxio_custom_post_types()
{
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => esc_html__('Portfolios', 'finaxio-toolkit'),
            'singular_name' => esc_html__('Portfolio', 'finaxio-toolkit'),
        ),
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'page-attributes', 'editor', 'excerpt'),
        'show_in_menu' => true,
        'menu_position' => 24,
        'menu_icon' => esc_attr__('dashicons-portfolio', 'finaxio-toolkit'),
        'public' => true,
        'rewrite' => array(
            'slug' => 'portfolio',
            'with_front' => true
        )
    ));

    register_post_type('service', array(
        'labels' => array(
            'name' => esc_html__('Services', 'finaxio-toolkit'),
            'singular_name' => esc_html__('Service', 'finaxio-toolkit'),
        ),
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'page-attributes', 'editor', 'excerpt'),
        'show_in_menu' => true,
        'menu_position' => 22,
        'menu_icon' => esc_attr__('dashicons-index-card', 'finaxio-toolkit'),
        'public' => true,
        'rewrite' => array(
            'slug' => 'service',
            'with_front' => true
        )
    ));

    register_post_type('finaxio_builder', array(
        'labels' => array(
            'name' => esc_html__('Template Builders', 'finaxio-toolkit'),
            'singular_name' => esc_html__('Template Builder', 'finaxio-toolkit'),
        ),
        'show_in_rest' => true,
        'supports' => array('title','editor'),
        'show_in_menu' => false,
        'menu_icon' => esc_attr__('dashicons-index-card', 'finaxio-toolkit'),
        'public' => true,
        'rewrite' => array(
            'slug' => 'finaxio_builder',
            'with_front' => true
        )
    ));
}


add_action('init', 'finaxio_custom_taxonomies');
function finaxio_custom_taxonomies()
{
    $portfolio_labels = array(
        'name' => esc_html__('Portfolio Categories', 'finaxio-toolkit'),
        'singular_name' => esc_html__('Portfolio Category', 'finaxio-toolkit'),
    );
    register_taxonomy('portfolio_category', 'portfolio', array(
        'labels' => $portfolio_labels,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => array(
            'slug' => 'portfolio-category',
            'with_front' => true
        ),
    ));
    $services_labels = array(
        'name' => esc_html__('Service Categories', 'finaxio-toolkit'),
        'singular_name' => esc_html__('Service Category', 'finaxio-toolkit'),
    );
    register_taxonomy('service_category', 'service', array(
        'labels' => $services_labels,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite' => array(
            'slug' => 'service-category',
            'with_front' => true
        ),
    ));
}


