<?php

CSF::createSection(
    $finaxio_theme_option,
    array(
        'title' => esc_html__('Customization', 'finaxio'),
        'icon' => 'fas fa-heading',
        'id' => 'general_setting',
        'fields' => array()
    )
);

// Deafult Header

CSF::createSection(
    $finaxio_theme_option,
    array(
        'title' => esc_html__('Default Header', 'finaxio'),
        'icon' => 'fas fa-eye',
        'id' => 'deafult_header',
        'parent' => 'general_setting',
        'fields' => array(

            array(
                'id' => 'default_logo',
                'type' => 'media',
                'title' => esc_html__('Logo - Light', 'finaxio'),
                'subtitle' => esc_html__('Light Mode Logo', 'finaxio'),
                'library' => 'image',
                'url' => false,
                'button_title' => esc_html__('Upload', 'finaxio'),
            ),

            array(
                'id' => 'default_logo_2',
                'type' => 'media',
                'title' => esc_html__('Logo - Dark', 'finaxio'),
                'subtitle' => esc_html__('Dark Mode Logo', 'finaxio'),
                'library' => 'image',
                'url' => false,
                'button_title' => esc_html__('Upload', 'finaxio'),
            ),

            array(
                'id' => 'mobile_logo_1',
                'type' => 'media',
                'title' => esc_html__('Mobile Logo', 'finaxio'),
                'subtitle' => esc_html__('Responsive Mobile Logo', 'finaxio'),
                'library' => 'image',
                'url' => false,
                'button_title' => esc_html__('Upload', 'finaxio'),
            ),


            array(
                'id' => 'default_search',
                'type' => 'button_set',
                'title' => esc_html__('Search Icon', 'finaxio'),
                'options' => array(
                    'yes' => esc_html__('Yes', 'finaxio'),
                    'no' => esc_html__('No', 'finaxio'),
                ),
                'default' => 'yes',
                'desc' => esc_html__('Enable or Disable', 'finaxio'),
            ),

            array(
                'id'      => 'sticky_header',
                'type'    => 'button_set',
                'title'   => esc_html__('Sticky Menu', 'finaxio'),
                'options' => array(
                    'yes'   => esc_html__('Yes', 'finaxio'),
                    'no'    => esc_html__('No', 'finaxio'),
                ),
                'default' => 'no',
                'desc'    => esc_html__('Enable or Disable', 'finaxio'),
            ),


        )
    )
);

// Deafult Footer

CSF::createSection($finaxio_theme_option, array(
    'title' => esc_html__('Default Footer', 'finaxio'),
    'icon' => 'fas fa-stream',
    'id' => 'default_footer',
    'parent' => 'general_setting',
    'fields' => array(
        array(
            'id' => 'footer_copyright',
            'type' => 'wp_editor',
            'title' => esc_html__('Copyright Text', 'finaxio'),
            'tinymce' => true,
            'quicktags' => true,
            'media_buttons' => false,
            'height' => '50px',
        ),

        array(
            'id' => 'footer_bottom_color',
            'type' => 'color',
            'title' => esc_html__('Copyright Color', 'finaxio'),
            'output' => '.theme-default-copyright p,.theme-default-copyright',
            'output_mode' => 'color',
        ),

        array(
            'id' => 'footer_bottom_bg',
            'type' => 'color',
            'title' => esc_html__('Copyright Background', 'finaxio'),
            'output' => '.theme-default-copyright',
            'output_mode' => 'background',
        ),

    )
)
);



// Breadcrumb Options

CSF::createSection(
    $finaxio_theme_option,
    array(
        'title' => esc_html__('Breadcrumb', 'finaxio'),
        'icon' => 'fas fa-pager',
        'id' => 'breadcrumb_options',
        'parent' => 'general_setting',
        'fields' => array(

            array(
                'id' => 'banner_breadcrumb',
                'type' => 'button_set',
                'title' => esc_html__('Enable Banner', 'finaxio'),
                'options' => array(
                    'yes' => esc_html__('Yes', 'finaxio'),
                    'no' => esc_html__('No', 'finaxio'),
                ),
                'default' => 'yes',
            ),

            array(
                'id' => 'banner_header_bg',
                'type' => 'background',
                'title' => esc_html__('Background', 'finaxio'),
                'output' => '.page__banner',
                'background_gradient' => false,
                'background_origin' => false,
                'background_clip' => false,
                'background_blend_mode' => false,
                'background-color' => false,
                'dependency' => array('banner_breadcrumb', '==', 'yes'),
            ),

        )
    )
);