<?php
$options = financer_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Dark  Logo Settings
$dark_logo = $options->get( 'dark_color_logo' );
$dark_logo_dimension = $options->get( 'dark_color_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>

	<?php if($options->get('show_seach_form_v1')){ ?>
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
    <header class="header">
    
        <!-- Main Header -->
        <div class="main_header">
            <div class="container"> 
                <div class="main_header_inner">
                    <div class="main_header_logo">
                        <figure>
                            <?php echo financer_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                        </figure>
                    </div>
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
                    <?php if($options->get('show_btn_v1') || $options->get('show_seach_form_v1')){ ?>
                    <div class="header_right_content">
                        <?php if($options->get('show_seach_form_v1')){ ?>
                        <button class="search-toggler"><i class="icon-50"></i></button>
                        <?php } ?>
                        <?php if($options->get('show_btn_v1')){ ?>
                        <div class="link-btn"><a href="<?php echo esc_url($options->get('btn_link_v1')); ?>" class="btn_style_one"><?php echo wp_kses($options->get('btn_title_v1'), true); ?></a></div>
                        <?php } ?>
                    </div>
                    <?php } ?> 
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
                    <?php if($options->get('show_btn_v1') || $options->get('show_seach_form_v1')){ ?>
                    <div class="header_right_content">
                        <?php if($options->get('show_seach_form_v1')){ ?>
                        <button class="search-toggler"><i class="icon-50"></i></button>
                        <?php } ?>
                        <?php if($options->get('show_btn_v1')){ ?>
                        <div class="link-btn"><a href="<?php echo esc_url($options->get('btn_link_v1')); ?>" class="btn_style_one"><?php echo wp_kses($options->get('btn_title_v1'), true); ?></a></div>
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