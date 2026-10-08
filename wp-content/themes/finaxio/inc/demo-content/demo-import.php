<?php

/**
 * Import demo data.
 */

// Disable regenerating images while importing media
add_filter('ocdi/regenerate_thumbnails_in_content_import', '__return_false');
add_filter('ocdi/plugin_intro_text', '__return_false');
add_filter('ocdi/disable_pt_branding', '__return_true');


function finaxio_ocdi_confirmation_dialog_options($options)
{
	return array_merge($options, array(
		'width' => 400,
		'dialogClass' => 'wp-dialog',
		'resizable' => false,
		'height' => 'auto',
		'modal' => true,
	)
	);
}
add_filter('ocdi/confirmation_dialog_options', 'finaxio_ocdi_confirmation_dialog_options', 10, 1);



function finaxio_import_demo_files()
{
	return [

		// demo 01
		[
			'import_file_name' => 'Home 01 - Light',
			'categories' => array('Light'),
			'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/content.xml',
			'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/widget.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/customizer.dat',
			'local_import_json' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/theme-options.json',
					'option_name' => 'finaxio_theme_options',
				),
			),
			'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/inc/demo-content/demo/demo-1.jpg',
			'preview_url' => 'https://finaxio.themeori.com/',
		],

		// demo 02
		[
			'import_file_name' => 'Home 02 - Light',
			'categories' => array('Light'),
			'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/content.xml',
			'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/widget.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/customizer.dat',
			'local_import_json' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/theme-options.json',
					'option_name' => 'finaxio_theme_options',
				),
			),
			'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/inc/demo-content/demo/demo-2.jpg',
			'preview_url' => 'https://finaxio.themeori.com/home-02-light/',
		],


		// demo 03
		[
			'import_file_name' => 'Home 03 - Light',
			'categories' => array('Light'),
			'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/content.xml',
			'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/widget.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/customizer.dat',
			'local_import_json' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/theme-options.json',
					'option_name' => 'finaxio_theme_options',
				),
			),
			'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/inc/demo-content/demo/demo-3.jpg',
			'preview_url' => 'https://finaxio.themeori.com/home-03-light/',
		],


		// demo 05
		[
			'import_file_name' => 'Home 01 - Dark',
			'categories' => array('Dark'),
			'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/content.xml',
			'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/widget.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/customizer.dat',
			'local_import_json' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/theme-options.json',
					'option_name' => 'finaxio_theme_options',
				),
			),
			'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/inc/demo-content/demo/dark-1.jpg',
			'preview_url' => 'https://finaxio.themeori.com/home-01-dark/',
		],


		// demo 06
		[
			'import_file_name' => 'Home 02 - Dark',
			'categories' => array('Dark'),
			'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/content.xml',
			'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/widget.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/customizer.dat',
			'local_import_json' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/theme-options.json',
					'option_name' => 'finaxio_theme_options',
				),
			),
			'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/inc/demo-content/demo/dark-2.jpg',
			'preview_url' => 'https://finaxio.themeori.com/home-02-dark/',
		],

		// demo 07
		[
			'import_file_name' => 'Home 03 - Dark',
			'categories' => array('Dark'),
			'local_import_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/content.xml',
			'local_import_widget_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/widget.wie',
			'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/customizer.dat',
			'local_import_json' => array(
				array(
					'file_path' => trailingslashit(get_template_directory()) . '/inc/demo-content/demo/theme-options.json',
					'option_name' => 'finaxio_theme_options',
				),
			),
			'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . '/inc/demo-content/demo/dark-3.jpg',
			'preview_url' => 'https://finaxio.themeori.com/home-03-dark/',
		],


	];
}

add_filter('ocdi/import_files', 'finaxio_import_demo_files');

/**
 * Add CSF json
 */
if (!function_exists('finaxio_after_content_import_execution')) {
	function finaxio_after_content_import_execution($selected_import_files, $import_files, $selected_index)
	{

		$downloader = new OCDI\Downloader();

		if (!empty($import_files[$selected_index]['import_json'])) {

			foreach ($import_files[$selected_index]['import_json'] as $index => $import) {
				$file_path = $downloader->download_file($import['file_url'], 'demo-import-file-' . $index . '-' . date('Y-m-d__H-i-s') . '.json');
				$file_raw = OCDI\Helpers::data_from_file($file_path);
				update_option($import['option_name'], json_decode($file_raw, true));
			}
		} else if (!empty($import_files[$selected_index]['local_import_json'])) {

			foreach ($import_files[$selected_index]['local_import_json'] as $index => $import) {
				$file_path = $import['file_path'];
				$file_raw = OCDI\Helpers::data_from_file($file_path);
				update_option($import['option_name'], json_decode($file_raw, true));
			}
		}
	}

	add_action('ocdi/after_content_import_execution', 'finaxio_after_content_import_execution', 3, 99);
}

/* After Import */

if (!function_exists('finaxio_after_import')) {
	function finaxio_after_import($selected_import)
	{

		//Set Menu
		$main_menu = get_term_by('name', esc_html__('Main Menu', 'finaxio'), 'nav_menu');

		set_theme_mod(
			'nav_menu_locations',
			array(
				'header-menu' => $main_menu->term_id,
			)
		);

		$home_page = get_page_by_title(esc_html__('Home One - Light', 'finaxio'));

		//Set Front page
		if (isset($home_page->ID)) {
			update_option('page_on_front', $home_page->ID);
			update_option('show_on_front', 'page');
		}

		// Set Post Page
		$blog_page = get_page_by_title(esc_html__('Blog', 'finaxio'));
		if (isset($blog_page->ID)) {
			update_option('page_for_posts', $blog_page->ID);
		}
	}
	add_action('ocdi/after_import', 'finaxio_after_import');
}

/* Theme Page Demo Import */

if (!function_exists('finaxio_ocdi_page')) {
	function finaxio_ocdi_page($args)
	{

		$args['parent_slug'] = 'finaxio';
		$args['menu_slug'] = 'finaxio-demo';
		$args['menu_title'] = esc_html__('Demo Import', 'finaxio');
		$args['capability'] = 'manage_options';

		return $args;

	}
	add_filter('ocdi/plugin_page_setup', 'finaxio_ocdi_page');
}