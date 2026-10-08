<?php

namespace FINANCERPLUGIN\Element;


class Elementor {
	static $widgets = array(
		//Home Page One
		'banner',
		'funfacts',
		'hero_title',
		'button',
		'icon_box',
		'service_card',
		'transparent_title',
		'video_section',
		'animation_image',
		'team_grid',
		'subscribe_form',
		'testimonials_carousel',
		'faqs',
		'clients_carousel',
		'float_image',
		'download_app',
		'pricing_plan',
		'blog_grid',
		'service_tabs',
		'testimonials_grid',
		'project_grid',
		'form'
		
		
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = FINANCERPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\FINANCERPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'financer',
			[
				'title' => esc_html__( 'Financer', 'financer' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'financer' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();