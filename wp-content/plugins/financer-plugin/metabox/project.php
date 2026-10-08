<?php
return array(
    'title'      => 'Financer Project Setting',
    'id'         => 'financer_meta_projects',
    'icon'       => 'el el-cogs',
    'position'   => 'normal',
    'priority'   => 'core',
    'post_types' => array( 'project' ),
    'sections'   => array(
        array(
            'id'     => 'projects_meta_setting',
            'fields' => array(
                
				//Project Detail Description
				array(
                    'id'    => 'project_description',
                    'type'  => 'textarea',
                    'title' => esc_html__('Project Detail Page Description', 'financer'),
                ),
				
				//Project Detail Image
				array(
                    'id'       => 'project_image',
                    'type'     => 'media',
                    'url'      => true,
                    'title'    => esc_html__('Projects Detail Image', 'financer'),
                    'desc'     => esc_html__('Insert Projects Detail Page Image URl', 'financer'),
                ),
				
				//Tabs Info
				array(
                    'id'        => 'projects_tabs',
                    'type'      => 'repeater',
                    'icon' => 'el-icon-thumbs-up',
                    'title'     => __('Project Information', 'financer'),
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
                            'title'   => __('Description', 'financer'),
                        ),
                    )
                ),
				
				//Social Icon Title
				array(
					'id'    => 'social_icon_title',
					'type'  => 'text',
					'title' => esc_html__( 'Social Title', 'financer' ),
				),
				
				//Social Icons
				array(
					'id'        => 'project_social_media_tabs',
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
            ),
        ),
    ),
);