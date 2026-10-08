<?php
if (!defined('ABSPATH')) {
	exit;
}

function finaxio_default_options()
{

	$finaxio_htmls = array(
		'a'      => array(
			'href'   => array(),
			'target' => array()
		),
		'strong' => array(),
		'small'  => array(),
		'span'   => array(),
		'p'      => array(),
	);

	return array(
		'footer_copyright'    => wp_kses(__('<p>Copyright 2023 - All Rights Reserved By <a href="http://themeforest.net/user/themeori">ThemeOri</a></p>', 'finaxio'), $finaxio_htmls),
		'error_page_main'     => wp_kses(__('404', 'finaxio'), $finaxio_htmls),
		'error_page_title'    => esc_html__('We will get back to you as soon as possible.', 'finaxio'),
		'error_page_btn_text' => esc_html__('Back to Home', 'finaxio'),
		'blog-page-title'     => esc_html__('Blog', 'finaxio'),
		'blog-cta-btn'        => esc_html__('Read More', 'finaxio'),
	);
}


// Display Data from Theme Option 

if (!function_exists('finaxio_option')) {
	function finaxio_option($option = '', $default = null)
	{
		$defaults = finaxio_default_options();
		$options  = get_option('finaxio_theme_options');
		$default  = (!isset($default) && isset($defaults[$option])) ? $defaults[$option] : $default;
		return (isset($options[$option])) ? $options[$option] : $default;
	}
}


/**
 * Enqueue Backend Styles And Scripts.
 **/

function finaxio_icon_assets()
{
	wp_enqueue_style('font-awsome-pro', get_theme_file_uri('assets/css/all.css'), array(), '1.0.0', 'all');
}

add_action('admin_enqueue_scripts', 'finaxio_icon_assets');


if (!function_exists('finaxio_custom_icons')) {

	function finaxio_custom_icons($icons)
	{

		// Adding new icons
		$icons[] = array(
			'title' => esc_html__('Font Awesome 5 Pro', 'finaxio'),
			'icons' => array(
				'far fa-map-marker-alt'      => 'far fa-map-marker-alt',
				'fas fa-envelope'            => 'fas fa-envelope',
				'far fa-clock'               => 'far fa-clock',
				'fal fa-envelope-open-text'  => 'fal fa-envelope-open-text',
				'fal fa-phone-alt'           => 'fal fa-phone-alt',
				'fal fa-envelope'            => 'fal fa-envelope',
				'fal fa-map-marker-alt'      => 'fal fa-map-marker-alt',
			),
		);

		return $icons;
	}

	add_filter('csf_field_icon_add_icons', 'finaxio_custom_icons');
}
