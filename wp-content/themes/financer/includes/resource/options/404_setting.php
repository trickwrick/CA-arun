<?php

return array(
	'title'      => esc_html__( '404 Page Settings', 'financer' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'financer' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'financer' ),
				'e' => esc_html__( 'Elementor', 'financer' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'financer' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'required' => [ '404_source_type', '=', 'e' ],
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'section',
			'title'    => esc_html__( '404 Default', 'financer' ),
			'indent'   => true,
			'required' => [ '404_source_type', '=', 'd' ],
		),
		//404 Banner Info
		array(
			'id'      => '404_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'financer' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'financer' ),
			'default' => true,
		),
		array(
			'id'       => '404_banner_subheading',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section SubTitle', 'financer' ),
			'desc'     => esc_html__( 'Enter the subtitle to show in banner section', 'financer' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'financer' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'financer' ),
			'required' => array( '404_page_banner', '=', true ),
		),
		
		//404 Page Section Info
		array(
			'id'       => '404_page_error_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( '404 Error Image', 'financer' ),
			'desc'     => esc_html__( 'Insert 404 Error Image V2', 'financer' ),
		),
		array(
			'id'    => '404_page_tag_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Page Tag Title', 'financer' ),
			'desc'  => esc_html__( 'Enter 404 section Page Tag Title that you want to show', 'financer' ),
			'desc'     => esc_html__( 'Oops!', 'financer' ),
		),
		array(
			'id'    => '404_page_text',
			'type'  => 'textarea',
			'title' => esc_html__( '404 Page Description', 'financer' ),
			'desc'  => esc_html__( 'Enter 404 page description that you want to show.', 'financer' ),
			
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switch',
			'title' => esc_html__( 'Show Button', 'financer' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'financer' ),
			'default'  => false,
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'financer' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'financer' ),
			'default'  => esc_html__( 'Back to Homepage', 'financer' ),
			'required' => array( 'back_home_btn', '=', true ),
		),
		array(
			'id'     => '404_post_settings_end',
			'type'   => 'section',
			'indent' => false,
		),
	),
);