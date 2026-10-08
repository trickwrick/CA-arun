<?php
$options = financer_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Mobile  Logo Settings
$mobile_logo = $options->get( 'mobile_logo' );
$mobile_logo_dimension = $options->get( 'mobile_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

	
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><?php esc_html_e('X', 'financer'); ?></div>        
        <nav class="menu-box">
            <div class="nav-logo">
				<?php if( $options->get( 'mobile_logo' ) == true ):?>
				<?php echo financer_logo( $logo_type, $mobile_logo, $mobile_logo_dimension, $logo_text, $logo_typography ); ?>
                <?php else:?>
                <a href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/mobile-logo.png" alt="<?php bloginfo( 'name' );?>"></a>
                <?php endif;?>
            </div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <?php if($options->get('mobile_info_title_v1')){ ?><h4><?php echo wp_kses($options->get('mobile_info_title_v1'), true); ?></h4><?php } ?>
                <ul>
                    <?php if($options->get('mobile_address_v1')){ ?><li><?php echo wp_kses($options->get('mobile_address_v1'), true); ?></li><?php } ?>
                    <?php if($options->get('mobile_phone_no_v1')){ ?><li><a href="tel:<?php echo esc_attr($options->get('mobile_phone_no_v1')); ?>"><?php echo wp_kses($options->get('mobile_phone_no_v1'), true); ?></a></li><?php } ?>
                    <?php if($options->get('mobile_email_address_v1')){ ?><li><a href="mailto:<?php echo esc_attr($options->get('mobile_email_address_v1')); ?>"><?php echo wp_kses($options->get('mobile_email_address_v1'), true); ?></a></li><?php } ?>
                </ul>
            </div>
            
            <?php
				if( $options->get( 'show_mobile_social_icon' )){
			?>
            <ul class="social-links centred">
                <?php echo (financer_get_social_icon()); ?>
            </ul>
            <?php } ?>
        </nav>
    </div>
    <!-- End Mobile Menu -->