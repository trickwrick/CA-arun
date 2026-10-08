<?php if (!defined('ABSPATH')) {
  die;
} // Cannot access directly.

/**
 * Theme Admin Pages
 */

if (!class_exists('Finaxio_Admin')) {

  class Finaxio_Admin
  {
    private static $instance = null;

    public static function init()
    {
      if (is_null(self::$instance)) {
        self::$instance = new self();
      }
      return self::$instance;
    }

    public function __construct()
    {
      add_action('admin_menu', array($this, 'finaxio_admin_page'), 1);
      add_action('admin_enqueue_scripts', array($this, 'finaxio_theme_page_assets'));

    }

    public function finaxio_admin_page()
    {

      add_menu_page(
        esc_html__('Finaxio', 'finaxio'),
        esc_html__('Finaxio', 'finaxio'),
        'manage_options',
        'finaxio',
        array(
          $this,
          'finaxio_theme_welcome'
        ),
        get_theme_file_uri('inc/admin/assets/img/icon.svg'),
        2
      );

      add_submenu_page(
        'finaxio',
        esc_html__('Welcome', 'finaxio'),
        esc_html__('Welcome', 'finaxio'),
        'manage_options',
        'finaxio',
        array($this, 'finaxio_theme_welcome'),
      );
      if (class_exists('CSF')) {
        add_submenu_page(
          'finaxio',
          'Template Builder',
          'Template Builder',
          'manage_options',
          'edit.php?post_type=finaxio_builder',
        );
      }

    }

    public function finaxio_theme_welcome()
    {
      get_template_part('inc/admin/' . 'welcome');
    }
    public function finaxio_theme_page_assets()
    {
      wp_enqueue_style('finaxio-admin', get_theme_file_uri('inc/admin/assets/css/admin.css'), array(), FINAXIO_VERSION, 'all');
    }

  }

  Finaxio_Admin::init();
}