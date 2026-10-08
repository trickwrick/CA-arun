<?php

  // 404 page options

  CSF::createSection($finaxio_theme_option, array(
    'title'  => esc_html__('404 Error Page', 'finaxio'),
    'icon'   => 'fas fa-exclamation-circle',
    'id'     => '404_error',
    'parent' => 'general_setting',
    'fields' => array(

      array(
        'id'    => 'error_page_main',
        'type'  => 'text',
        'title' => esc_html__('404 Main', 'finaxio'),
      ),


      array(
        'id'    => 'error_page_title',
        'type'  => 'text',
        'title' => esc_html__('404 Title', 'finaxio'),
      ),

      array(
        'id'    => 'error_page_content',
        'type'  => 'textarea',
        'title' => esc_html__('404 Content', 'finaxio'),
      ),

      array(
        'id'      => 'error_page_btn',
        'type'    => 'button_set',
        'title'   => esc_html__('Home Button', 'finaxio'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'finaxio'),
          'no'    => esc_html__('No', 'finaxio'),
        ),
        'default' => 'yes',
        'desc'    => esc_html__('Enable or Disable', 'finaxio'),
      ),

      array(
        'id'    => 'error_page_btn_text',
        'type'  => 'text',
        'title' => esc_html__('Button Text', 'finaxio'),
        'dependency'  => array('error_page_btn', '==', 'yes'),
      ),

    )
  ));