<?php
if (!defined('ABSPATH')) exit; // No access of directly access

class Finaxio_Addons
{

	private static $_instance = null;

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function init()
	{
		// Register widgets
		add_action('elementor/widgets/register', [$this, 'finaxio_toolkit_register_widgets']);
	}

	public function finaxio_toolkit_register_widgets()
	{
		// Its is now safe to include Widgets files

		require_once('widget/image.php');
		require_once('widget/team.php');
		require_once('widget/blog-grid.php');
		require_once('widget/faq.php');
		require_once('widget/services.php');
		require_once('widget/timeline.php');
		require_once('widget/skillbar.php');
		require_once('widget/icon-box.php');
		require_once('widget/banner-slider.php');
		require_once('widget/video-icon.php');
		require_once('widget/portfolio.php');
		require_once('widget/blog-widget.php');
		require_once('widget/price-tab.php');
		require_once('widget/price-item.php');

	
	// Theme Builder

		require_once('widget/theme-builder/logo.php');
		require_once('widget/theme-builder/header-one.php');
		require_once('widget/theme-builder/list-menu.php');




		// require_once('widget/theme-builder/header-three.php');

	}
}

// Instantiate Plugin Class
Finaxio_Addons::instance()->init();