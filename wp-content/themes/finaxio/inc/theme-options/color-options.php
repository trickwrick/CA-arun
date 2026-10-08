<?php

CSF::createSection($finaxio_theme_option, array(
    'title'  => esc_html__('Theme Colors', 'finaxio'),
    'icon'   => 'fas fa-palette',
    'id'     => 'theme_color_settings',
    'fields' => array(
        array(
            'id'    => 'primary_color_1',
            'type'  => 'color',
            'title' => esc_html__('Primary Color 1', 'finaxio'),
            'output' => ':root',
            'output_mode' => '--primary-color-1',
            'default' => '#ec1113'
        ),

        array(
            'id'    => 'primary_color_2',
            'type'  => 'color',
            'title' => esc_html__('Primary Color 2', 'finaxio'),
            'output' => ':root',
            'output_mode' => '--primary-color-2',
            'default' => '#0054ff'
        ),

        array(
            'id'    => 'primary_color_3',
            'type'  => 'color',
            'title' => esc_html__('Primary Color 3', 'finaxio'),
            'output' => ':root',
            'output_mode' => '--primary-color-3',
            'default' => '#0d9b4d'
        ),

    )
));
