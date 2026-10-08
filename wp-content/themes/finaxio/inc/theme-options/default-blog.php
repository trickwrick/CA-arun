<?php

// 404 page options

CSF::createSection($finaxio_theme_option, array(
  'title' => esc_html__('Default Blog', 'finaxio'),
  'icon' => 'fas fa-exclamation-circle',
  'id' => 'default_blog',
  'parent' => 'general_setting',
  'fields' => array(


    array(
      'type' => 'subheading',
      'content' => esc_html__('Blog/Archive', 'finaxio'),
    ),

    array(
      'id' => 'blog_list_date',
      'type' => 'button_set',
      'title' => esc_html__('Show Date', 'finaxio'),
      'options' => array(
        'yes' => esc_html__('Yes', 'finaxio'),
        'no' => esc_html__('No', 'finaxio'),
      ),
      'default' => 'yes',
    ),

    array(
      'id' => 'blog_list_author',
      'type' => 'button_set',
      'title' => esc_html__('Show Author', 'finaxio'),
      'options' => array(
        'yes' => esc_html__('Yes', 'finaxio'),
        'no' => esc_html__('No', 'finaxio'),
      ),
      'default' => 'yes',
    ),

    array(
      'id' => 'blog_list_comment',
      'type' => 'button_set',
      'title' => esc_html__('Show Comment', 'finaxio'),
      'options' => array(
        'yes' => esc_html__('Yes', 'finaxio'),
        'no' => esc_html__('No', 'finaxio'),
      ),
      'default' => 'yes',
    ),

    array(
      'id' => 'blog-cta-btn',
      'type' => 'text',
      'title' => esc_html__('Button Text', 'finaxio'),
    ),

    array(
      'type'    => 'subheading',
      'content' => esc_html__('Single Blog', 'finaxio'),
    ),


    array(
      'id'      => 'blog_single_date',
      'type'    => 'button_set',
      'title'   => esc_html__('Show Date', 'finaxio'),
      'options' => array(
        'yes'   => esc_html__('Yes', 'finaxio'),
        'no'    => esc_html__('No', 'finaxio'),
      ),
      'default' => 'yes',
    ),

    array(
      'id'      => 'blog_single_author',
      'type'    => 'button_set',
      'title'   => esc_html__('Show Author', 'finaxio'),
      'options' => array(
        'yes'   => esc_html__('Yes', 'finaxio'),
        'no'    => esc_html__('No', 'finaxio'),
      ),
      'default' => 'yes',
    ),

    array(
      'id'      => 'blog_single_comment',
      'type'    => 'button_set',
      'title'   => esc_html__('Show Comment', 'finaxio'),
      'options' => array(
        'yes'   => esc_html__('Yes', 'finaxio'),
        'no'    => esc_html__('No', 'finaxio'),
      ),
      'default' => 'yes',
    ),



  )
)
);