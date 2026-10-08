<?php
return array(
	'title'      => 'Financer Testimonials Setting',
	'id'         => 'financer_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'financer_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'author_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Author Designation', 'financer' ),
				),
				array(
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'financer' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
				),
			),
		),
	),
);