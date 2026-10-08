<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'financer' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'financer' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'financer' ),
				'e' => esc_html__( 'Elementor', 'financer' ),
			),
			'default' => 'd',
		),
		
		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'financer' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'financer' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'financer' ),
			'default' => false,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'financer' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'financer' ),
			'default' => false,
		),
		
		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'financer' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'financer' ),
			'default' => false,
		),
		
		array(
			'id'      => 'facebook_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Facebook Post Share', 'financer' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Facebook', 'financer' ),
			'default' => false,
		),
		array(
			'id'      => 'twitter_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Twitter Post Share', 'financer' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Twitter', 'financer' ),
			'default' => false,
		),
		array(
			'id'      => 'linkedin_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Linkedin Post Share', 'financer' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Linkedin', 'financer' ),
			'default' => false,
		),
		array(
			'id'      => 'pinterest_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Pinterest Post Share', 'financer' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Pinterest', 'financer' ),
			'default' => false,
		),
		array(
			'id'      => 'reddit_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Reddit Post Share', 'financer' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Reddit', 'financer' ),
			'default' => false,
		),
		array(
			'id'      => 'tumblr_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tumblr Post Share', 'financer' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Tumblr', 'financer' ),
			'default' => false,
		),
		array(
			'id'      => 'digg_sharing',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Digg Post Share', 'financer' ),
			'desc'    => esc_html__( 'Enable to show Post Share to Digg', 'financer' ),
			'default' => false,
		),
		
		//Author Box
		array(
			'id'      => 'single_post_author_box',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author Box', 'financer' ),
			'desc'    => esc_html__( 'Enable to show author Box on posts detail page', 'financer' ),
			'default' => false,
		),
		
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);





