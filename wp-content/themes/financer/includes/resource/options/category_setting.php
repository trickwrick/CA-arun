<?php

return  array(
    'title'      => esc_html__( 'Category Page Settings', 'financer' ),
    'id'         => 'category_setting',
    'desc'       => '', 
    'subsection' => true,
    'fields'     => array(
	    array(
		    'id'      => 'category_source_type',
		    'type'    => 'button_set',
		    'title'   => esc_html__( 'Category Source Type', 'financer' ),
		    'options' => array(
			    'd' => esc_html__( 'Default', 'financer' ),
			    'e' => esc_html__( 'Elementor', 'financer' ),
		    ),
		    'default' => 'd',
	    ),
	    array(
		    'id'       => 'category_elementor_template',
		    'type'     => 'select',
		    'title'    => __( 'Template', 'financer' ),
		    'data'     => 'posts',
		    'args'     => [
			    'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
		    ],
		    'required' => [ 'category_source_type', '=', 'e' ],
	    ),

	    array(
		    'id'       => 'category_default_st',
		    'type'     => 'section',
		    'title'    => esc_html__( 'Category Default', 'financer' ),
		    'indent'   => true,
		    'required' => [ 'category_source_type', '=', 'd' ],
	    ),
	    array(
		    'id'      => 'category_page_banner',
		    'type'    => 'switch',
		    'title'   => esc_html__( 'Show Banner', 'financer' ),
		    'desc'    => esc_html__( 'Enable to show banner on blog', 'financer' ),
		    'default' => true,
	    ),
		array(
		    'id'       => 'category_banner_subheading',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Banner SubTitle', 'financer' ),
		    'desc'     => esc_html__( 'Enter the subtitle to show in banner section', 'financer' ),
		    'required' => array( 'category_page_banner', '=', true ),
	    ),
		array(
		    'id'       => 'category_banner_title',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Banner Section Title', 'financer' ),
		    'desc'     => esc_html__( 'Enter the title to show in banner section', 'financer' ),
		    'required' => array( 'category_page_banner', '=', true ),
	    ),
	    array(
		    'id'       => 'category_banner_shape_image_v1',
		    'type'     => 'media',
		    'url'      => true,
		    'title'    => esc_html__( 'Banner Shape Image V1', 'financer' ),
			'desc'     => esc_html__( 'Insert Shape image to show in banner section', 'financer' ),
		    'default'  => '',
		    'required' => array( 'category_page_banner', '=', true ),
	    ),
		array(
			'id'       => 'category_banner_shape_image_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Banner Shape Image V2', 'financer' ),
			'desc'     => esc_html__( 'Insert Shape image to show in banner section', 'financer' ),
			'default'  => '',
		    'required' => array( 'category_page_banner', '=', true ),
		),
		//Layout Style
	    array(
		    'id'       => 'category_sidebar_layout',
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
		    'id'       => 'category_page_sidebar',
		    'type'     => 'select',
		    'title'    => esc_html__( 'Sidebar', 'financer' ),
		    'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'financer' ),
		    'required' => array(
			    array( 'category_sidebar_layout', '=', array( 'left', 'right' ) ),
		    ),
		    'options'  => financer_get_sidebars(),
	    ),
	    array(
		    'id'       => 'category_default_ed',
		    'type'     => 'section',
		    'indent'   => false,
		    'required' => [ 'category_source_type', '=', 'd' ],
	    ),
    ),
);