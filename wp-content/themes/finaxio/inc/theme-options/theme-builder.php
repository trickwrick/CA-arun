<?php

CSF::createSection($finaxio_theme_option, array(
  'title'  => esc_html__('Theme Builder', 'finaxio'),
  'icon'   => 'fas fa-heading',
  'id'     => 'theme_builder',
  'fields' => array()
));


CSF::createSection($finaxio_theme_option, array(
  'title'  => esc_html__('Header', 'finaxio'),
  'icon'   => 'fas fa-eye',
  'id'     => 'general_header',
  'parent' => 'theme_builder',
  'fields' => array(

    array(
      'id'      => 'custom_header',
      'type'    => 'button_set',
      'title'   => esc_html__('Overwrite Theme Header', 'finaxio'),
      'options' => array(
        'yes'   => esc_html__('Yes', 'finaxio'),
        'no'    => esc_html__('No', 'finaxio'),
      ),
      'default' => 'no',
      'desc'    => esc_html__('Enable or Disable', 'finaxio'),
    ),

     // Theme Builder Options
     array(
      'id'             => 'finaxio_builder_header',
      'type'           => 'select',
      'title'          => esc_html__('Select a Template', 'finaxio'),
      'options'        => 'posts',
      'query_args'     => array(
        'post_type'      => 'finaxio_builder',
        'posts_per_page' => -1,
      ),
      'dependency' => array('custom_header', '==', 'yes'),
    ),


  )
));

CSF::createSection($finaxio_theme_option, array(
  'title'  => esc_html__('Footer', 'finaxio'),
  'icon'   => 'fas fa-eye',
  'id'     => 'general_footer',
  'parent' => 'theme_builder',
  'fields' => array(

    array(
      'id'      => 'custom_footer',
      'type'    => 'button_set',
      'title'   => esc_html__('Overwrite Theme Footer', 'finaxio'),
      'options' => array(
        'yes'   => esc_html__('Yes', 'finaxio'),
        'no'    => esc_html__('No', 'finaxio'),
      ),
      'default' => 'no',
      'desc'    => esc_html__('Enable or Disable', 'finaxio'),
    ),

     // Theme Builder Options
     array(
      'id'             => 'finaxio_builder_footer',
      'type'           => 'select',
      'title'          => esc_html__('Select a Template', 'finaxio'),
      'options'        => 'posts',
      'query_args'     => array(
        'post_type'      => 'finaxio_builder',
        'posts_per_page' => -1,
      ),
      'dependency' => array('custom_footer', '==', 'yes'),
    ),


  )
));



CSF::createSection($finaxio_theme_option, array(
  'title'  => esc_html__('Breadcrumb', 'finaxio'),
  'icon'   => 'fas fa-eye',
  'id'     => 'general_breadcrumb',
  'parent' => 'theme_builder',
  'fields' => array(

    array(
      'id'      => 'custom_breadcrumb',
      'type'    => 'button_set',
      'title'   => esc_html__('Overwrite Theme Breadcrumb', 'finaxio'),
      'options' => array(
        'yes'   => esc_html__('Yes', 'finaxio'),
        'no'    => esc_html__('No', 'finaxio'),
      ),
      'default' => 'no',
      'desc'    => esc_html__('Enable or Disable', 'finaxio'),
    ),

     // Theme Builder Options
     array(
      'id'             => 'finaxio_builder_breadcrumb',
      'type'           => 'select',
      'title'          => esc_html__('Select a Template', 'finaxio'),
      'options'        => 'posts',
      'query_args'     => array(
        'post_type'      => 'finaxio_builder',
        'posts_per_page' => -1,
      ),
      'dependency' => array('custom_breadcrumb', '==', 'yes'),
    ),


  )
));




CSF::createSection($finaxio_theme_option, array(
  'title'  => esc_html__('404 Page', 'finaxio'),
  'icon'   => 'fas fa-eye',
  'id'     => 'general_404',
  'parent' => 'theme_builder',
  'fields' => array(

    array(
      'id'      => 'custom_404',
      'type'    => 'button_set',
      'title'   => esc_html__('Overwrite Theme 404 Page', 'finaxio'),
      'options' => array(
        'yes'   => esc_html__('Yes', 'finaxio'),
        'no'    => esc_html__('No', 'finaxio'),
      ),
      'default' => 'no',
      'desc'    => esc_html__('Enable or Disable', 'finaxio'),
    ),

     // Theme Builder Options
     array(
      'id'             => 'finaxio_builder_404',
      'type'           => 'select',
      'title'          => esc_html__('Select a Template', 'finaxio'),
      'options'        => 'posts',
      'query_args'     => array(
        'post_type'      => 'finaxio_builder',
        'posts_per_page' => -1,
      ),
      'dependency' => array('custom_404', '==', 'yes'),
    ),


  )
));
