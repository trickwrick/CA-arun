<?php
return array(
	'title'      => 'Financer Setting',
	'id'         => 'financer_meta',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'page', 'post', 'team', 'product', 'project' ),
	'sections'   => array(
		require_once FINANCERPLUGIN_PLUGIN_PATH . '/metabox/header.php',
		require_once FINANCERPLUGIN_PLUGIN_PATH . '/metabox/banner.php',
		require_once FINANCERPLUGIN_PLUGIN_PATH . '/metabox/sidebar.php',
		require_once FINANCERPLUGIN_PLUGIN_PATH . '/metabox/footer.php',
	),
);