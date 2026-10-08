<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for plugin finaxio
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
add_action('tgmpa_register', 'finaxio_register_required_plugins');
function finaxio_register_required_plugins()
{

	$plugins = array(

		array(
			'name' => esc_html__('Finaxio Toolkit', 'finaxio'),
			'slug' => 'finaxio-toolkit',
			'source' => get_template_directory() . '/inc/tgm/plugins/finaxio-toolkit.zip',
			'required' => true,
			'version' => '1.0.0',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
			'is_callable' => '',
		),

		array(
			'name' => esc_html__('One Click Demo Import', 'finaxio'),
			'slug' => 'one-click-demo-import',
			'required' => false,
		),

		array(
			'name' => esc_html__('Appointment Booking', 'finaxio'),
			'slug'      => 'booked',
			'source'    => 'https://envato.themeori.net/plugins/booked.zip',
			'required' => false,
		),

		array(
			'name' => esc_html__('Envato Market', 'finaxio'),
			'slug' => 'envato-market',
			'source' => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
			'required' => false,
		),

		array(
			'name' => esc_html__('Elementor Website Builder', 'finaxio'),
			'slug' => 'elementor',
			'required' => true,
		),

		array(
			'name' => esc_html__('HTML Forms', 'finaxio'),
			'slug' => 'html-forms',
			'required' => false,
		),

	);


	$config = array(
		'id' => 'finaxio',
		'default_path' => '',
		'menu' => 'tgmpa-install-plugins',
		'parent_slug' => 'finaxio',
		'capability' => 'manage_options',
		'has_notices' => true,
		'dismissable' => true,
		'dismiss_msg' => '',
		'is_automatic' => false,
		'message' => '',

	);

	tgmpa($plugins, $config);
} 