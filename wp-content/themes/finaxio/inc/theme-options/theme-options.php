<?php
if (!defined('ABSPATH')) {
  exit;
}

if (class_exists('CSF')) {
  /*
 *  Set a unique slug-like ID
 */
  $finaxio_theme_option = 'finaxio_theme_options';

  CSF::createOptions($finaxio_theme_option, array(
    'menu_title'      => esc_html__('Theme Options', 'finaxio'),
    'framework_title' => wp_kses(
      sprintf(__("Theme Options <small>By ThemeOri</small>", 'finaxio')),
      array('small'   => array())
    ),
    'menu_slug'       => 'finaxio-options',
    'show_search'     => false,
    'menu_type'       => 'submenu',
    'menu_parent'     => 'finaxio',
    'menu_position'   => 2,    
    'footer_credit'   => wp_kses(
      __('Developed by: <a target="_blank" href="https://themeforest.net/user/themeori/portfolio">ThemeOri</a>', 'finaxio'),
      array(
        'a'           => array(
          'href'      => array(),
          'target'    => array()
        ),
      )
    ),
    'footer_text'     => esc_html__('ThemeOri Core Framework', 'finaxio'),
    'defaults'        => finaxio_default_options(),
  ));

  /*
 * Global Options
 */
  require_once 'global-options.php';

  /*
 * Typography Options
 */
  require_once 'typography-options.php';


  /*
 * Theme Color Options
 */
  require_once 'color-options.php';

  /*
 * General Setting
 */
  require_once 'customization.php';
    /*
 * Default Blog
 */
  require_once 'default-blog.php';

  /*
 * Site Layout
 */
require_once 'site-layout.php';

  /*
 * 404 Page Options
 */
require_once 'error-page-options.php';


  /*
 * Theme Builder
 */
require_once 'theme-builder.php';


  /*
 * Backup Options
 */

  CSF::createSection($finaxio_theme_option, array(
    'title'  => esc_html__('Backup', 'finaxio'),
    'icon'   => 'fas fa-file-alt',
    'fields' => array(
      array(
        'type' => 'backup',
      ),
    )
  ));
}
