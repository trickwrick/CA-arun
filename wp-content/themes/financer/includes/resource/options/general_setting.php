<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'financer'), $val);
}

return  array(
    'title'      => esc_html__( 'General Setting', 'financer' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        //Preloader
		array(
            'id' => 'theme_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'financer'),
            'default' => false,
        ),
		array(
			'id'      => 'preloader_text',
			'type'    => 'textarea',
			'title'   => __( 'Preloader Text', 'financer' ),
			'required' => array( 'theme_preloader', '=', true ),
		),
		//Scroll To Top Button
		array(
            'id' => 'show_scroltop',
            'type' => 'switch',
            'title' => esc_html__('Enable Scroll To Top Button', 'financer'),
            'default' => false,
        ),
    ),
);
