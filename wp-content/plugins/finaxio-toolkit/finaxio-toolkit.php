<?php

/**
 * Plugin Name:       Finaxio Toolkit
 * Plugin URI:        http://themeforest.net/user/themeori
 * Description:       This is a Plugin Require to Run Finaxio WordPress Theme
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.2
 * Author:            ThemeOri
 * Author URI:        http://themeforest.net/user/themeori
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       finaxio-toolkit
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Load plugin textdomain.
 */

if (!function_exists('finaxio_toolkit_init')) {

	function finaxio_toolkit_init()
	{
		load_plugin_textdomain('finaxio-toolkit', false, plugin_basename(dirname(__FILE__)) . '/languages');
	}
}
add_action('plugins_loaded', 'finaxio_toolkit_init');

/**
 * Load enqueue scripts
 */

if (!function_exists('finaxio_toolkit_enqueue_scripts')) {
	function finaxio_toolkit_enqueue_scripts()
	{
		wp_enqueue_style('finaxio-toolkit-elements', plugins_url('inc/assets/css/elements.css', __FILE__), '1.0.0');
		wp_enqueue_script('finaxio-toolkit-elements', plugins_url('inc/assets/js/elements.js', __FILE__), array('jquery'), '1.0.0', true);
	}
	add_action('wp_enqueue_scripts', 'finaxio_toolkit_enqueue_scripts', 20);
}

/**
 * Load csf plugin
 */

include_once('lib/codestar-framework/codestar-framework.php');

if (class_exists('CSF')) {
	include_once('inc/sidebar-widget/recent-post-widget.php');
	include_once('inc/sidebar-widget/cta-image.php');
	include_once('inc/sidebar-widget/menu-list.php');
	include_once('inc/sidebar-widget/download.php');
}

/**
 * Load Custom Post Type
 */

include_once('inc/custom-post-type.php');
include_once('inc/builder-hook.php');

/**
 * check if elementor plugin has installed and active
 */

if (!function_exists('finaxio_toolkit_addons')) {

	function finaxio_toolkit_addons()
	{
		require_once('inc/elements/finaxio-addons.php');
		require_once('inc/elements/functions.php');
	}
}
add_action('elementor/init', 'finaxio_toolkit_addons');
