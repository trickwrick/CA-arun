<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'financer_setup_theme' );
add_action( 'after_setup_theme', 'financer_load_default_hooks' );


function financer_setup_theme() {

	load_theme_textdomain( 'financer', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'responsive-embeds' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	
    
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	/*---------- Register image sizes ----------*/
	
	//Register image sizes
	add_image_size( 'financer_300x340', 300, 340, true ); //financer_300x340 Team Grid
	add_image_size( 'financer_410x250', 410, 250, true ); //financer_410x250 Blog Grid
	
	
	/*---------- Register image sizes ends ----------*/
	
	
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'financer' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'financer_admin_init', 2000000 );
}

/**
 * [financer_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function financer_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [financer_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function financer_widgets_init() {

	global $wp_registered_sidebars;
	$theme_options = get_theme_mod( 'financer' . '_options-mods' );
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'financer' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'financer' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget_title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'financer'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'financer'),
		'before_widget'=>'<div class="footer_column"><div id="%1$s" class="footer_widget footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h4 class="footer_widget_title">',
		'after_title' => '</h4>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
		register_sidebar(array(
		  'name' => esc_html__( 'Blog Listing', 'financer' ),
		  'id' => 'blog-sidebar',
		  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'financer' ),
		  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
		  'after_widget'=>'</div>',
		  'before_title' => '<h5 class="widget_title">',
		  'after_title' => '</h5>'
		));
		//Shop Widget
		register_sidebar(array(
		  'name' => esc_html__( 'Shop Widget', 'financer' ),
		  'id' => 'shop-sidebar',
		  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'financer' ),
		  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
		  'after_widget'=>'</div>',
		  'before_title' => '<h5 class="widget_title">',
		  'after_title' => '</h5>'
		));
	}
	if ( ! is_object( financer_WSH() ) ) {
		return;
	}

	$sidebars = financer_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( financer_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget single-sidebar-box sidebar-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget_title">',
			'after_title'   => '</h5>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'financer_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function financer_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'financer' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'financer' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'financer' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'financer' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'financer' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'financer' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'financer' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'financer' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'financer' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'financer_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function financer_enqueue_scripts() {
	$options = financer_WSH()->option();
	
    //styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'financer-font-awesome', get_template_directory_uri() . '/assets/css/fontawesome-all.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/assets/css/icomoon.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/assets/css/owl.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' );
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/css/aos.css' );
	wp_enqueue_style( 'financer-global', get_template_directory_uri() . '/assets/css/global.css' );
	wp_enqueue_style( 'financer-header', get_template_directory_uri() . '/assets/css/elements-css/header.css' );
	wp_enqueue_style( 'financer-footer', get_template_directory_uri() . '/assets/css/elements-css/footer.css' );
	wp_enqueue_style( 'financer-main', get_stylesheet_uri() );
	wp_enqueue_style( 'financer-main-style', get_template_directory_uri() . '/assets/css/style.css' );
	wp_enqueue_style( 'financer-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	wp_enqueue_style( 'financer-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'financer-tut', get_template_directory_uri() . '/assets/css/tut.css' );
	wp_enqueue_style( 'financer-gutenberg', get_template_directory_uri() . '/assets/css/gutenberg.css' );
	wp_enqueue_style( 'financer-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	
	
    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/js/owl.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'product-filter', get_template_directory_uri().'/assets/js/product-filter.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bxslider', get_template_directory_uri().'/assets/js/bxslider.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-bootstrap-touchspin', get_template_directory_uri().'/assets/js/jquery.bootstrap-touchspin.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'aos', get_template_directory_uri().'/assets/js/aos.js', array( 'jquery' ), '2.1.2', true );	
	wp_enqueue_script( 'financer-script', get_template_directory_uri().'/assets/js/main.js', array(), false, true );
	
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'financer_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function financer_fonts_url() {
	
	$fonts_url = '';
	
		
		$font_families['Urbanist']     = 'Urbanist:wght@300,400,500,600,700,800,900&display=swap';
		$font_families['Inter']        = 'Inter:wght@300,400,500,600,700,800,900&display=swap';

		$font_families = apply_filters( 'FINANCER/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function financer_theme_styles() {
    wp_enqueue_style( 'financer-theme-fonts', financer_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'financer_theme_styles' );
add_action( 'admin_enqueue_scripts', 'financer_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) financer_set function

/**
 * [financer_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'financer_set' ) ) {
	function financer_set( $var, $key, $def = '' ) {

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}


//Contact Form 7 List
function get_contact_form_7_list()
{
	$contact_forms = array();
	$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
	if (!empty($cf7)) {
		foreach ($cf7 as $cform) {
			if (isset($cform)) {
				if (isset($cform->ID) && isset($cform->post_title)) {
					$contact_forms[$cform->ID] = $cform->post_title;
				}
			}
		}
	}
    return $contact_forms;
}

function financer_admin_style()
{
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/css/admin.css');
    wp_enqueue_media();
    wp_enqueue_script('financer-admin-scripts', get_template_directory_uri().'/assets/js/admin.js', array('jquery'), false, true);
    wp_enqueue_script('financer-upload-img', get_template_directory_uri() . '/assets/js/img_upload.js', array('jquery'), false, true);
}
add_action('admin_enqueue_scripts', 'financer_admin_style');


// 2) financer_add_editor_styles function

function financer_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'financer_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = financer_WSH()->option(); 
if( financer_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}


/*********** Related Product **********/

function financer_related_products_limit() {

  global $product;

	

	$args['posts_per_page'] = 6;

	return $args;
}

function financer_register_block_patterns() {
    register_block_pattern(
        'financer/custom-pattern-1',
        array(
            'title'       => __('Custom Pattern 1', 'financer'),
            'description' => __('Description of Custom Pattern 1.', 'financer'),
            'content'     => '<!-- Your block pattern content here -->',
            'categories'  => array('text'),
            'keywords'    => array('pattern', 'layout', 'custom'),
        )
    );

    // Add more block patterns as needed
}
add_action('init', 'financer_register_block_patterns');
function financer_register_block_styles() {
    // Register custom block styles for specific blocks
    register_block_style(
        'core/paragraph',
        array(
            'name'         => 'financer-custom-style-1',
            'label'        => __('Custom Style 1', 'financer'),
            'style_handle' => 'financer-custom-style-1-css', // Enqueue your custom style CSS
        )
    );

    // Add more custom block styles as needed
}
add_action('init', 'financer_register_block_styles');