<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package finaxio
 */
$error_page_btn = finaxio_option('error_page_btn', true);
$error_main_title = finaxio_option('error_page_main');
$finaxio_htmls = array(
    'span'   => array(),
);

get_header();
get_template_part('template-parts/theme-default/' . 'breadcrumb');
?>

<div class="error section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="error__area-title">
					<h1><?php echo wp_kses($error_main_title, $finaxio_htmls); ?></h1>
					<h3>
						<?php echo esc_html(finaxio_option('error_page_title')); ?>
					</h3>
					<?php if ($error_page_btn == 'yes'): ?>
						<a class="theme-btn3" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(finaxio_option('error_page_btn_text')); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();