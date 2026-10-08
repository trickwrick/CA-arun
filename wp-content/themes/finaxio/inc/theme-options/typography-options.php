<?php


CSF::createSection($finaxio_theme_option, array(
    'title'  => esc_html__('Typography', 'finaxio'),
    'icon'   => 'fas fa-font',
    'id'     => 'typography_settings',
    'fields' => array(


      array(
        'id'             => 'body_typography',
        'type'           => 'typography',
        'title'          => esc_html__('Body Typography', 'finaxio'),
        'output'         => 'body',
        'extra_styles'   => true,
        'text_align'     => false,
        'text_transform' => false,
        'default'        => array(
          'font-family'  => 'DM Sans',
          'type'         => 'google',
          'font-weight'  => '400',
          'unit'         => 'px',
          'extra-styles' => array('400', '500','700',),
        ),
      ),


        array(
          'id'             => 'h_typography',
          'type'           => 'typography',
          'title'          => esc_html__('Heading Typography', 'finaxio'),
          'output'         => 'h1,h2,h3,h4,h5,h6',
          'extra_styles'   => true,
          'text_align'     => false,
          'text_transform' => false,
          'default'        => array(
            'font-family'  => 'DM Sans',
            'type'         => 'google',
            'font-weight'  => '700',
            'unit'         => 'px',
            'extra-styles' => array('400', '500', '700', ),
          ),
        ),


     
    )
  ));