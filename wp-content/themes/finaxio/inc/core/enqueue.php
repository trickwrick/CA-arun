<?php

/**
 * Enqueue scripts and styles.
 */
/**
 * Enqueue scripts and styles.
 */
function finaxio_scripts()
{
    if (!class_exists('CSF')) {
        wp_enqueue_style('finaxio-default-fonts', "//fonts.googleapis.com/css?family=DM+Sans:400,500,700", '', '1.0.0', 'screen');
    }
    wp_enqueue_style('bootstrap', get_theme_file_uri('/assets/css/bootstrap.min.css'), null, FINAXIO_VERSION);
    wp_enqueue_style('fontawesome', get_theme_file_uri('/assets/css/all.css'), null, FINAXIO_VERSION);
    wp_enqueue_style('meanmenu', get_theme_file_uri('/assets/css/meanmenu.min.css'), null, FINAXIO_VERSION);
    wp_enqueue_style('animate', get_theme_file_uri('/assets/css/animate.css'), null, FINAXIO_VERSION);
    wp_enqueue_style('swiper-bundle', get_theme_file_uri('/assets/css/swiper-bundle.min.css'), null, FINAXIO_VERSION);
    wp_enqueue_style('magnific-popup', get_theme_file_uri('/assets/css/magnific-popup.css'), null, FINAXIO_VERSION);
    wp_enqueue_style('flaticon-finaxio', get_theme_file_uri('/assets/font/flaticon.css'), null, FINAXIO_VERSION);
    wp_enqueue_style('finaxio-sass', get_theme_file_uri('/assets/sass/style.css'), null, FINAXIO_VERSION);
    wp_enqueue_style('finaxio-style', get_stylesheet_uri(), array(), FINAXIO_VERSION);

    wp_enqueue_script('bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array('jquery'), FINAXIO_VERSION, true);
    wp_enqueue_script('popper', get_theme_file_uri('/assets/js/popper.min.js'), array('jquery'), FINAXIO_VERSION, true);
    wp_enqueue_script('meanmenu', get_theme_file_uri('/assets/js/jquery.meanmenu.min.js'), array('jquery'), FINAXIO_VERSION, true);
    wp_enqueue_script('swiper-bundle', get_theme_file_uri('/assets/js/swiper-bundle.min.js'), array('jquery'), FINAXIO_VERSION, true);
    wp_enqueue_script('magnific-popup', get_theme_file_uri('/assets/js/jquery.magnific-popup.min.js'), array('jquery'), FINAXIO_VERSION, true);
    wp_enqueue_script('progressbar', get_theme_file_uri('/assets/js/progressbar.min.js'), array('jquery'), FINAXIO_VERSION, true);
    wp_enqueue_script('isotope', get_theme_file_uri('/assets/js/isotope.pkgd.min.js'), array('jquery'), FINAXIO_VERSION, true);
    wp_enqueue_script('counterups', get_theme_file_uri('/assets/js/jquery.counterup.min.js'), array('jquery'), FINAXIO_VERSION, true);
    wp_enqueue_script('waypoints', get_theme_file_uri('/assets/js/jquery.waypoints.min.js'), array('jquery'), FINAXIO_VERSION, true);
    wp_enqueue_script('finaxio-script', get_theme_file_uri('/assets/js/custom.js'), array('jquery'), FINAXIO_VERSION, true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'finaxio_scripts');
