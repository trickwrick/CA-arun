<?php
if (!defined('ABSPATH')) exit;
if (class_exists('CSF')) {
  // Set a unique slug-like ID
  $finaxio_metabox = 'finaxio_meta_options';

  CSF::createMetabox($finaxio_metabox, array(
    'title'     => esc_html__('Settings', 'finaxio'),
    'post_type' => array('page', 'post', 'service', 'portfolio'),
  ));

  CSF::createSection($finaxio_metabox, array(
    'title'  => esc_html__('Global Options', 'finaxio'),
    'icon'   => 'fas fa-border-all',
    'fields' => array(

      array(
        'id'      => 'dark_mode',
        'type'    => 'button_set',
        'title'   => esc_html__('Dark Mode', 'finaxio'),
        'options' => array(
          'dark-mode'   => esc_html__('Yes', 'finaxio'),
          'light-mode'    => esc_html__('No', 'finaxio'),
        ),
        'default' => 'light-mode',
      ),

      
      array(
        'id'      => 'rtl_mode',
        'type'    => 'button_set',
        'title'   => esc_html__('RTL Mode', 'finaxio'),
        'options' => array(
          'rtl-mode'   => esc_html__('Yes', 'finaxio'),
          'non-rtl-mode'    => esc_html__('No', 'finaxio'),
        ),
        'default' => 'non-rtl-mode',
      ),

      array(
        'id'      => 'section_padding',
        'type'    => 'button_set',
        'title'   => esc_html__('Content Padding', 'finaxio'),
        'options' => array(
          'section-padding'     => esc_html__('Yes', 'finaxio'),
          'section-nopading'    => esc_html__('No', 'finaxio'),
        ),
        'default' => 'section-padding',
      ),

      array(
        'id'      => 'layout_enable',
        'type'    => 'button_set',
        'title'   => esc_html__('Custom Layout', 'finaxio'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'finaxio'),
          'no'    => esc_html__('No', 'finaxio'),
        ),
        'default' => 'no',
      ),

      array(
        'id'       => 'site_layout',
        'type'     => 'palette',
        'title'    => esc_html__('Select Layout', 'finaxio'),
        'options'  => array(
          'left-sidebar'   => array('#cccccc', '#eeeeee', '#eeeeee'),
          'full-width'     => array('#dddddd', '#dddddd', '#dddddd'),
          'right-sidebar'  => array('#eeeeee', '#eeeeee', '#cccccc'),
        ),
        'default'    => 'full-width',
        'dependency' => array('layout_enable', '==', 'yes'),
      ),

      array(
        'id'          => 'site_sidebars',
        'type'        => 'select',
        'title'       => esc_html__('Sidebars', 'finaxio'),
        'placeholder' => esc_html__('Select a Sidebar', 'finaxio'),
        'options'     => 'sidebars',
        'dependency' => array(
          array('site_layout', 'any', 'left-sidebar,right-sidebar'),
          array('layout_enable',   '==', 'yes'),
        ),
      ),

    )
  ));

  CSF::createSection($finaxio_metabox, array(
    'title'     => esc_html__('Header Options', 'finaxio'),
    'icon'      => 'fas fa-heading',
    'fields'    => array(

      array(
        'id'      => 'meta_header_layout',
        'type'    => 'button_set',
        'title'   => esc_html__('Custom Header', 'finaxio'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'finaxio'),
          'no'    => esc_html__('No', 'finaxio'),
        ),
        'default' => 'no',
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
      'dependency'  => array(
        array('meta_header_layout', '==', 'yes'),
      ),
    ),

    )
  ));

  CSF::createSection($finaxio_metabox, array(
    'title'     => esc_html__('Breadcrumb Settings', 'finaxio'),
    'icon'      => 'fas fa-pager',
    'fields'    => array(

      array(
        'id'      => 'breadcrumb_enable',
        'type'    => 'button_set',
        'title'   => esc_html__('Enable Banner', 'finaxio'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'finaxio'),
          'no'    => esc_html__('No', 'finaxio'),
        ),
        'default' => 'yes',
      ),

      array(
        'id'      => 'custom_title',
        'type'    => 'button_set',
        'title'   => esc_html__('Custom Title', 'finaxio'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'finaxio'),
          'no'    => esc_html__('No', 'finaxio'),
        ),
        'default' => 'no',
        'dependency'  => array('breadcrumb_enable', '==', 'yes'),
      ),
      array(
        'id'          => 'page_title',
        'type'        => 'text',
        'title'       => esc_html__('Banner Title', 'finaxio'),
        'default'     => esc_html__('Custom Title', 'finaxio'),
        'dependency'  => array(
          array('breadcrumb_enable', '==', 'yes'),
          array('custom_title', '==', 'yes'),
        ),
      ),

      array(
        'id'                    => 'breadcrumb_banner',
        'type'                  => 'background',
        'title'                 => esc_html__('Custom Background', 'finaxio'),
        'output'                => '.page__banner',
        'background_gradient'   => false,
        'background_origin'     => false,
        'background_clip'       => false,
        'background_blend_mode' => false,
        'background-color'      => false,
        'dependency'  => array('breadcrumb_enable', '==', 'yes'),
      ),

    )
  ));

  CSF::createSection($finaxio_metabox, array(
    'title'  => esc_html__('Footer Options', 'finaxio'),
    'icon'   => 'fas fa-stream',
    'fields' => array(

      array(
        'id'      => 'meta_footer_layout',
        'type'    => 'button_set',
        'title'   => esc_html__('Custom Footer', 'finaxio'),
        'options' => array(
          'yes'   => esc_html__('Yes', 'finaxio'),
          'no'    => esc_html__('No', 'finaxio'),
        ),
        'default' => 'no',
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
      'dependency'  => array(
        array('meta_footer_layout', '==', 'yes'),
      ),
    ),


    )
  ));
}
