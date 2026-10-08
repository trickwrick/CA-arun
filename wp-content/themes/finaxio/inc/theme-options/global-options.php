<?php

CSF::createSection($finaxio_theme_option, array(
        'title'   => esc_html__('Global Settings', 'finaxio'),
        'icon'    => 'far fa-circle',
        'id'      => 'global_settings',
        'fields'  => array(
            array(
                'id'      => 'dark_mode',
                'type'    => 'button_set',
                'title'   => esc_html__('Dark Mode', 'finaxio'),
                'options' => array(
                    'dark-mode'  => esc_html__('Yes', 'finaxio'),
                    'light-mode' => esc_html__('No', 'finaxio'),
                ),
                'default' => 'light-mode',
                'desc'    => esc_html__('Enable or Disable', 'finaxio'),
            ),
            array(
                'id'      => 'rtl_mode',
                'type'    => 'button_set',
                'title'   => esc_html__('RTL Mode', 'finaxio'),
                'options' => array(
                    'rtl-mode'      => esc_html__('Yes', 'finaxio'),
                    'non-rtl-mode'  => esc_html__('No', 'finaxio'),
                ),
                'default' => 'non-rtl-mode',
                'desc'    => esc_html__('Enable or Disable', 'finaxio'),
            ),
            array(
                'id'      => 'preloader',
                'type'    => 'button_set',
                'title'   => esc_html__('Preloader', 'finaxio'),
                'options' => array(
                    'yes' => esc_html__('Yes', 'finaxio'),
                    'no'  => esc_html__('No', 'finaxio'),
                ),
                'default' => 'no',
                'desc'    => esc_html__('Enable or Disable', 'finaxio'),
            ),
            array(
                'id'           => 'preloader_bg',
                'type'         => 'color',
                'title'        => esc_html__('Preloader Background', 'finaxio'),
                'desc'         => esc_html__('Select a Background', 'finaxio'),
                'output'       => '.theme-loader',
                'output_mode'  => 'background-color',
                'dependency'   => array('preloader', '==', 'yes'),
            ),
            array(
                'id'      => 'theme_scroll_up',
                'type'    => 'button_set',
                'title'   => esc_html__('Scroll Up', 'finaxio'),
                'options' => array(
                    'yes' => esc_html__('Yes', 'finaxio'),
                    'no'  => esc_html__('No', 'finaxio'),
                ),
                'default' => 'no',
                'desc'    => esc_html__('Enable or Disable', 'finaxio'),
            ),
        ),
    )
);  
