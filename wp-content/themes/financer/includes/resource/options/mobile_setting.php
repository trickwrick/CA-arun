<?php

return array(

    'title'         => esc_html__( 'Mobile Sidebar Settings', 'financer' ),
    'id'            => 'mobile_setting',
    'desc'          => '',
    'icon'          => 'el el-font',
    'fields'        => array(
        
		
		//Mobile Contact Info
		array(
			'id'      => 'mobile_info_title_v1',
			'type'    => 'text',
			'title'   => __( 'Title', 'financer' ),
		),
		//Address
		array(
			'id'      => 'mobile_address_v1',
			'type'    => 'text',
			'title'   => __( 'Address', 'financer' ),
		),
		//Phone No.
		array(
			'id'      => 'mobile_phone_no_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'financer' ),
		),
		//Email Address
		array(
			'id'      => 'mobile_email_address_v1',
			'type'    => 'text',
			'title'   => __( 'Email Address', 'financer' ),
		),
		array(
            'id' => 'show_mobile_social_icon',
            'type' => 'switch',
            'title' => esc_html__('Enable/Disable Social Icons', 'financer'),
			'default' => false,
       ),
    ),
);