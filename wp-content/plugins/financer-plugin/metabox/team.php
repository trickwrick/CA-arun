<?php
return array(
	'title'      => 'Financer Team Setting',
	'id'         => 'financer_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'team' ),
	'sections'   => array(
		array(
			'id'     => 'financer_team_meta_setting',
			'fields' => array(
				
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'financer' ),
				),
				//Social Icons
				array(
					'id'        => 'social_media_tabs',
					'type'      => 'repeater',
					'icon' => 'el-icon-thumbs-up',
					'title'     => __('Add Social Media', 'financer'),
					'group_values' => true,
					'sortable' => true,
					'fields'    => array(
						array(
							'id' => 'select_social_media',
							'type'     => 'select',
							'data' => get_fontawesome_icons(),
							'title' => esc_html__('Choose Social Media', 'financer'),
						),
						array(
							'id'      => 'link_social_media',
							'type'    => 'text',
							'title'   => __('Link', 'financer'),
						),
					)
				),
				
				//Team Info
				array(
                    'id' => 'show_team_info',
                    'type' => 'switch',
                    'title' => esc_html__('Show/Hide Team Information', 'financer'),
                    'desc' => esc_html__('Enable to Show Team Information Area', 'financer'),
                ),
				array(
					'id'    => 'info_title',
					'type'  => 'text',
					'title' => esc_html__( 'Info Title', 'financer' ),
					'required' => array('show_team_info', '=', true),
				),
				array(
                    'id'        => 'team_info_tabs',
                    'type'      => 'repeater',
                    'icon' => 'el-icon-thumbs-up',
                    'title'     => __('Team Info', 'financer'),
					'required' => array('show_team_info', '=', true),
                    'group_values' => true,
                    'sortable' => true,
                    'fields'    => array(
                        array(
                            'id'      => 'tab_title',
                            'type'    => 'text',
                            'title'   => __('Title', 'financer'),
                        ),
                        array(
                            'id'      => 'tab_text',
                            'type'    => 'text',
                            'title'   => __('Text', 'financer'),
                        ),
                    )
                ),
				
			),
		),
	),
);