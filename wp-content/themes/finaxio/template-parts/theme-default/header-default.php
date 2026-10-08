<?php
$site_logo = finaxio_option('default_logo');
$site_logo_2 = finaxio_option('default_logo_2');
$mobile_logo = finaxio_option('mobile_logo_1');
$default_search = finaxio_option('default_search', true);
$sticky_header = finaxio_option('sticky_header', false);

if ($sticky_header == 'yes') {
	$sticky_enable = 'header__sticky';
} else {
	$sticky_enable = 'disable_sticky_header';
}
?>


<!-- Menu Bar Area Start -->
<div class="header__two-menu-bar">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 d-flex align-items-center justify-content-between f-default-header">

				<div class="header__two-menu-bar-logo">
					<?php
					if (has_custom_logo()) {
						the_custom_logo();
					} else {
						if (!empty($site_logo['url']) && !empty($site_logo_2['url'])) { ?>
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img class="dark-n" src="<?php echo esc_url($site_logo['url']); ?>"
									alt="<?php bloginfo('name'); ?>">
								<img class="light-n" src="<?php echo esc_url($site_logo_2['url']); ?>"
									alt="<?php bloginfo('name'); ?>">
							</a>
							<?php
						} else {
							?>
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img class="dark-n" src="<?php echo get_theme_file_uri(); ?>/assets/img/logo-3.png"
									alt="<?php bloginfo('name'); ?>">
								<img class="light-n" src="<?php echo get_theme_file_uri(); ?>/assets/img/logo-4.png"
									alt="<?php bloginfo('name'); ?>">
							</a>
							<?php
						}
					}
					?>
					
					<div class="responsive-menu"></div>
				</div>

				<?php if (has_nav_menu('header-menu')): ?>

					<div class="header__area-menu-bar-main-menu header__two-menu-bar-main-menu header-meanmenu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header-menu',
								'menu_id' => 'mobilemenu',
							)
						);
						?>
					</div>

				<?php endif; ?>

				
			</div>
		</div>
	</div>
</div>
<!-- Menu Bar Area End -->