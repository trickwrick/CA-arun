<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'financer' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		//Favicon Style
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'financer' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'financer' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.png' ),
		),
		
		//Light Logo Style
		array(
            'id' => 'light_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Light Color Logo', 'financer'),
            'default' => true,
        ),
		array(
			'id'       => 'light_color_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Light Logo Image', 'financer' ),
			'subtitle' => esc_html__( 'Insert site Light logo image', 'financer' ),
			'required' => array( 'light_logo_show', '=', true ),
		),
		array(
			'id'       => 'light_color_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Light Logo Dimentions', 'financer' ),
			'subtitle' => esc_html__( 'Select Light Logo Dimentions', 'financer' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'light_logo_show', '=', true ),
		),
		
		//Dark Logo Style
		array(
            'id' => 'dark_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Dark Color Logo', 'financer'),
            'default' => true,
        ),
		array(
			'id'       => 'dark_color_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Dark Logo Image', 'financer' ),
			'subtitle' => esc_html__( 'Insert site Dark logo image', 'financer' ),
			'required' => array( 'dark_logo_show', '=', true ),
		),
		array(
			'id'       => 'dark_color_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Dark Logo Dimentions', 'financer' ),
			'subtitle' => esc_html__( 'Select Dark Logo Dimentions', 'financer' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'dark_logo_show', '=', true ),
		),
		
		//Mobile Logo Style
		array(
            'id' => 'mobile_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Mobile Logo', 'financer'),
            'default' => true,
        ),
		array(
			'id'       => 'mobile_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Mobile Logo Image', 'financer' ),
			'subtitle' => esc_html__( 'Insert site Mobile logo image', 'financer' ),
			'required' => array( 'mobile_logo_show', '=', true ),
		),
		array(
			'id'       => 'mobile_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Mobile Logo Dimentions', 'financer' ),
			'subtitle' => esc_html__( 'Select Mobile Logo Dimentions', 'financer' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'mobile_logo_show', '=', true ),
		),
		
		
		//End Logo Settings
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
		),
	),
);
