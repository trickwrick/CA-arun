<?php

return array(
	'id'     => 'financer_banner_settings',
	'title'  => esc_html__( "Financer Banner Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'banner_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Banner Source Type', 'financer' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'financer' ),
				'e' => esc_html__( 'Elementor', 'financer' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'banner_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'financer' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'banner_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'banner_page_banner',
			'type'     => 'switch',
			'title'    => esc_html__( 'Show Banner', 'financer' ),
			'default'  => false,
			'required' => [ 'banner_source_type', '=', 'd' ],
		),
		array(
			'id'       => 'banner_banner_subheading',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Sub Title', 'financer' ),
			'desc'     => esc_html__( 'Enter the Sub Title to show in banner section', 'financer' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'financer' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'financer' ),
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_banner_shape_image_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Pattern Image', 'financer' ),
			'desc'     => esc_html__( 'Insert Shape image v1 for banner', 'financer' ),
			'default'  => '',
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_banner_shape_image_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Pattern Image V2', 'financer' ),
			'desc'     => esc_html__( 'Insert Shape image V2 for banner', 'financer' ),
			'default'  => '',
			'required' => array( 'banner_page_banner', '=', true ),
		),
		array(
			'id'       => 'banner_banner_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Feature Image', 'financer' ),
			'desc'     => esc_html__( 'Insert Feature image for banner', 'financer' ),
			'default'  => '',
			'required' => array( 
				'page_banner_style', '=', 'banner_v1' ,
				'banner_page_banner', '=', true ,
			),
		),
	),
);