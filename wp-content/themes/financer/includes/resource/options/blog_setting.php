<?php

return array(
	'title'  => esc_html__( 'Blog Page Settings', 'financer' ),
	'id'     => 'blog_setting',
	'desc'   => '',
	'icon'   => 'el el-indent-left',
	'fields' => array(
		array(
			'id'      => 'blog_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Blog Source Type', 'financer' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'financer' ),
				'e' => esc_html__( 'Elementor', 'financer' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'blog_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'financer' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'blog_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'blog_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Blog Default', 'financer' ),
			'indent'   => true,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'blog_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'financer' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'financer' ),
			'default' => true,
		),
		array(
			'id'       => 'blog_banner_subheading',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner SubTitle', 'financer' ),
			'desc'     => esc_html__( 'Enter the subtitle to show in banner section', 'financer' ),
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'blog_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'financer' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'financer' ),
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'blog_banner_shape_image_v1',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Banner Shape Image V1', 'financer' ),
			'desc'     => esc_html__( 'Insert Shape image to show in banner section', 'financer' ),
			'default'  => '',
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'blog_banner_shape_image_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Banner Shape Image V2', 'financer' ),
			'desc'     => esc_html__( 'Insert Shape image to show in banner section', 'financer' ),
			'default'  => '',
			'required' => array( 'blog_page_banner', '=', true ),
		),
		
		//Layout Style
		array(
			'id'       => 'blog_sidebar_layout',
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
			
			'default' => 'right',
		),

		array(
			'id'       => 'blog_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'financer' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'financer' ),
			'required' => array(
				array( 'blog_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => financer_get_sidebars(),
		),
		array(
			'id'      => 'blog_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Comments', 'financer' ),
			'desc'    => esc_html__( 'Enable to show post comments on posts listing', 'financer' ),
			'default' => false,
		),

		array(
			'id'      => 'blog_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'financer' ),
			'desc'    => esc_html__( 'Enable to show author on posts listing', 'financer' ),
			'default' => false,
		),
		array(
			'id'      => 'blog_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Date', 'financer' ),
			'desc'    => esc_html__( 'Enable to show post data on posts listing', 'financer' ),
			'default' => false,
		),
		array(
			'id'       => 'blog_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
	),
);