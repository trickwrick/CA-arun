<?php
$options = financer_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Dark  Logo Settings
$dark_logo = $options->get( 'dark_color_logo' );
$dark_logo_dimension = $options->get( 'dark_color_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

    <?php if($options->get('show_seach_form_v2')){ ?>
	<!--Search Popup-->
    <div id="search-popup" class="search-popup">
        <div class="popup-inner">
            <div class="upper-box">
                <figure class="logo-box"><?php echo financer_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?></figure>
                <div class="close-search"><span class="fa fa-solid fa-times"></span></div>
            </div>
            <div class="overlay-layer"></div>
            <div class="container">
                <div class="search-form">
                    <?php get_template_part('searchform1')?>
                </div>
            </div>
        </div>
    </div>
    <!--End Search Popup-->
    <?php } ?>
    
    <!-- Main Header -->
    <header class="header home_four">
    
        <!-- Main Header -->
        <div class="main_header">
            <div class="container"> 
                <div class="main_header_inner">
                    <div class="main_header_logo">
                        <figure>
                            <?php echo financer_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                        </figure>
                    </div>
                    <div class="menu_right_area">
                        <?php if( $options->get( 'show_header_topbar_v2' )){ ?>
                        <div class="header_top">
                            <div class="header_top_inner">
                                <?php if( $options->get( 'show_phone_no_v2' ) || $options->get( 'show_email_address_v2' )){ ?>
                                <ul class="info_box">
                                    <?php if( $options->get( 'show_phone_no_v2' )){ ?><li><i class="icon-24"></i><a href="tel:<?php echo esc_attr($options->get('phone_no_v2')); ?>"><?php echo wp_kses($options->get('phone_no_v2'), true); ?></a></li><?php } ?>
                                    <?php if( $options->get( 'show_email_address_v2' )){ ?><li><i class="icon-25"></i><a href="mailto:<?php echo esc_attr($options->get('email_address_v2')); ?>"><?php echo wp_kses($options->get('email_address_v2'), true); ?></a></li><?php } ?>
                                </ul>
                                <?php } ?>
                                <?php
									if( $options->get( 'show_header_social_icon_v2' )){
								?>
                                <div class="social_box">
                                    <div class="title"><?php echo wp_kses($options->get('social_title_v2'), true); ?></div>
                                    <ul class="social_links">
                                        <?php echo (financer_get_social_icon()); ?>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="header_lower">
                            <div class="main_header_menu menu_area">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler">
                                    <div class="menu-bar">
                                        <i class="fas fa-bars"></i>
                                    </div>
                                </div>
                                <nav class="main-menu">
                                    <div class="collapse navbar-collapse show" id="navbarSupportedContent">
                                        <ul class="navigation">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
											'container_class'=>'navbar-collapse collapse navbar-right',
											'menu_class'=>'nav navbar-nav',
											'fallback_cb'=>false,
											'items_wrap' => '%3$s',
											'container'=>false,
											'depth'=>'3',
											'walker'=> new Bootstrap_walker()
										)); ?>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            
                            <?php if($options->get('show_btn_v2') || $options->get('show_seach_form_v2')){ ?>
                            <div class="header_right_content">
                                <?php if($options->get('show_seach_form_v2')){ ?>
                                <button class="search-toggler"><i class="icon-50"></i></button>
                                <?php } ?>
                                <?php if($options->get('show_btn_v2')){ ?>
                                <div class="link-btn"><a href="<?php echo esc_url($options->get('btn_link_v2')); ?>" class="btn_style_one"><?php echo wp_kses($options->get('btn_title_v2'), true); ?></a></div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div> 
                    </div>          
                </div>
            </div>
        </div>
        <!-- End Main Header -->
    
        <!-- Sticky Header-->
        <div class="sticky_header">
            <div class="container">
                <div class="main_header_inner">
                    <div class="main_header_logo">
                        <figure>
                            <?php echo financer_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                        </figure>
                    </div>
                    <div class="main_header_menu menu_area">
                        <nav class="main-menu">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                    
                    <?php if($options->get('show_btn_v2') || $options->get('show_seach_form_v2')){ ?>
                    <div class="header_right_content">
                        <?php if($options->get('show_seach_form_v2')){ ?>
                        <button class="search-toggler"><i class="icon-50"></i></button>
                        <?php } ?>
                        <?php if($options->get('show_btn_v2')){ ?>
                        <div class="link-btn"><a href="<?php echo esc_url($options->get('btn_link_v2')); ?>" class="btn_style_one"><?php echo wp_kses($options->get('btn_title_v2'), true); ?></a></div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>            
            </div> 
        </div>
        <!-- End Sticky Header-->
    
        <?php get_template_part('templates/header/mobile_settings'); ?>
    
    </header>
    <!-- End Main Header -->