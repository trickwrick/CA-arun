<?php

return array(
	'id'     => 'financer_sidebar_settings',
	'title'  => esc_html__( "Financer Sidebar Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'sidebar_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Sidebar Source Type', 'financer' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'financer' ),
				'e' => esc_html__( 'Elementor', 'financer' ),
			),
			'default'=> '',
		),
		array(
			'id'       => 'sidebar_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'sidebar_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'sidebar_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'financer' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'financer' ),
			'options'  => array(
				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'financer' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'financer' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'financer' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),
			'required' => [ 'sidebar_source_type', '=', 'd' ],
		),

		array(
			'id'       => 'sidebar_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'financer' ),
			'required' => array(
				array( 'sidebar_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => financers_get_sidebars(),
			'required' => [ 'sidebar_source_type', '=', 'd' ],
		),
	),
);