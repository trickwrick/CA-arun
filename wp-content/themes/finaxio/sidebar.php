<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package finaxio
 */

if (is_singular(array('post', 'service')) && get_post_meta($post->ID, 'finaxio_meta_options', true)) {
	$finaxio_meta = get_post_meta($post->ID, 'finaxio_meta_options', true);
} else {
	$finaxio_meta = array();
}


if (is_array($finaxio_meta) && array_key_exists('site_layout', $finaxio_meta) && $finaxio_meta['site_layout'] != 'full-width') {
	$selected_sidebar = $finaxio_meta['site_sidebars'];
} else if (is_home() || is_archive()) {
	$selected_sidebar = finaxio_option('blog_sidebar', 'sidebar-1');
} else if (is_singular('post')) {
	$selected_sidebar = finaxio_option('single_sidebar', 'sidebar-1');
} else if (is_singular('service')) {
	$selected_sidebar = finaxio_option('service_sidebar', 'sidebar-1');
} else {
	$selected_sidebar = 'sidebar-1';
}
?>

<div class="all__sidebar">
	<?php if (is_active_sidebar($selected_sidebar)) {
		dynamic_sidebar($selected_sidebar);
	} ?>
</div><!-- #secondary -->