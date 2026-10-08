<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'financer' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'financer' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'financer' ),
				'e' => esc_html__( 'Elementor', 'financer' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'financer' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'header_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'header_style_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Settings', 'financer' ),
			'required' => array( 'header_source_type', '=', 'd' ),
		),

		//Header Settings
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'financer' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'financer' ),
		    'options'  => array(

			    'header_v1'  => array(
				    'alt' => esc_html__( 'Header Style 1', 'financer' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v1.png',
			    ),
			    'header_v2'  => array(
				    'alt' => esc_html__( 'Header Style 2', 'financer' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v2.png',
			    ),
				'header_v3'  => array(
				    'alt' => esc_html__( 'Header Style 3', 'financer' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v3.png',
			    ),
				'header_v4'  => array(
				    'alt' => esc_html__( 'Header Style 4', 'financer' ),
				    'img' => get_template_directory_uri() . '/assets/images/redux/header/header_v4.png',
			    ),
			),
			'required' => array( 'header_source_type', '=', 'd' ),
			'default' => 'header_v4',
	    ),

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style One Settings', 'financer' ),
			'required' => array( 'header_style_settings', '=', 'header_v1' ),
		),
				
		//Search Icon
		array(
            'id' => 'show_seach_form_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon', 'financer'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		
		//Button
		array(
            'id' => 'show_btn_v1',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'financer'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v1' ),
        ),
		array(
			'id'      => 'btn_title_v1',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'financer' ),
			'required' => array( 'show_btn_v1', '=', true ),
		),
		array(
			'id'      => 'btn_link_v1',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'financer' ),
			'required' => array( 'show_btn_v1', '=', true ),
		),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Two Settings', 'financer' ),
			'required' => array( 'header_style_settings', '=', 'header_v2' ),
		),
		
		//Header Topbar
		array(
            'id' => 'show_header_topbar_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Header Topbar', 'financer'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		//Phone No
		array(
            'id' => 'show_phone_no_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Phone No.', 'financer'),
            'default' => false,
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'phone_no_v2',
			'type'    => 'text',
			'title'   => __( 'Phone No.', 'financer' ),
			'required' => array( 'show_phone_no_v2', '=', true ),
		),
		
		//Email Address
		array(
            'id' => 'show_email_address_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Email Address', 'financer'),
            'default' => false,
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'email_address_v2',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'financer' ),
			'required' => array( 'show_email_address_v2', '=', true ),
		),
		
		//Social Icon
		array(
            'id' => 'show_header_social_icon_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icon', 'financer'),
            'default' => false,
            'required' => array( 'show_header_topbar_v2', '=', true ),
        ),
		array(
			'id'      => 'social_title_v2',
			'type'    => 'text',
			'title'   => __( 'Social Title', 'financer' ),
			'required' => array( 'show_header_social_icon_v2', '=', true ),
		),
		
		//Search Icon
		array(
            'id' => 'show_seach_form_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon', 'financer'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		
		//Button
		array(
            'id' => 'show_btn_v2',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'financer'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v2' ),
        ),
		array(
			'id'      => 'btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'financer' ),
			'required' => array( 'show_btn_v2', '=', true ),
		),
		array(
			'id'      => 'btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'financer' ),
			'required' => array( 'show_btn_v2', '=', true ),
		),
		
        /***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Three Settings', 'financer' ),
			'required' => array( 'header_style_settings', '=', 'header_v3' ),
		),
		
		//Search Icon
		array(
            'id' => 'show_seach_form_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon', 'financer'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		
		//Button
		array(
            'id' => 'show_btn_v3',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'financer'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v3' ),
        ),
		array(
			'id'      => 'btn_title_v3',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'financer' ),
			'required' => array( 'show_btn_v3', '=', true ),
		),
		array(
			'id'      => 'btn_link_v3',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'financer' ),
			'required' => array( 'show_btn_v3', '=', true ),
		),
		
		/***********************************************************************
								Header Version 4 Start
		************************************************************************/
		array(
			'id'       => 'header_v4_settings_section_start',
			'type'     => 'section',
			'indent'      => true,
			'title'    => esc_html__( 'Header Style Four Settings', 'financer' ),
			'required' => array( 'header_style_settings', '=', 'header_v4' ),
		),
				
		//Search Icon
		array(
            'id' => 'show_seach_form_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Search Icon', 'financer'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		
		//Button
		array(
            'id' => 'show_btn_v4',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Button', 'financer'),
            'default' => false,
            'required' => array( 'header_style_settings', '=', 'header_v4' ),
        ),
		array(
			'id'      => 'btn_title_v4',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'financer' ),
			'required' => array( 'show_btn_v4', '=', true ),
		),
		array(
			'id'      => 'btn_link_v4',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'financer' ),
			'required' => array( 'show_btn_v4', '=', true ),
		),
		
		array(
			'id'       => 'header_style_section_end',
			'type'     => 'section',
			'indent'      => false,
			'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);
