<?php

if (!defined('ABSPATH'))
    exit; // No access of directly access
// Update Post Support
$cpt_support = get_option('elementor_cpt_support');

//check if option DOESN'T exist in db
if (!$cpt_support) {
    $cpt_support = ['page', 'post', 'service', 'portfolio', 'finaxio_builder'];
    update_option('elementor_cpt_support', $cpt_support);
}

// Disable default colors & default fonts
$disable_default_colors = 'yes';
$disable_default_fonts = 'yes';
update_option('elementor_disable_color_schemes', $disable_default_colors);
update_option('elementor_disable_typography_schemes', $disable_default_fonts);

// Register categories
function finaxio_toolkit_widget_categories($elements_manager)
{

    $elements_manager->add_category(
        'finaxio-toolkit',
        [
            'title' => esc_html__('Finaxio Toolkit', 'finaxio-toolkit'),
            'icon' => 'fa fa-plug',
        ]
    );

    $elements_manager->add_category(
        'finaxio-builder',
        [
            'title' => esc_html__('Theme Builder', 'finaxio-toolkit'),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'finaxio_toolkit_widget_categories');

// Number of Comments
function finaxio_comments_count()
{
    $comments_number = get_comments_number();
    if ($comments_number == 0) {
        echo esc_html__('Comment', 'finaxio-toolkit') . ' (0)';
    } elseif ($comments_number == 1) {
        echo esc_html__('Comment', 'finaxio-toolkit') . ' (1)';
    } else {
        echo esc_html__('Comments', 'finaxio-toolkit') . ' (' . $comments_number . ')';
    }
}


// Post Category
function finaxio_post_categories()
{
    $options = array();
    $post_categories_terms = get_terms(
        array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        )
    );

    if (!empty($post_categories_terms) && !is_wp_error($post_categories_terms)) {
        foreach ($post_categories_terms as $term) {
            $options[$term->slug] = $term->name;
        }
    }

    return $options;
}

// Portfolio Category
function finaxio_portfolio_categories()
{
    $options = array();
    $portfolio_categories_terms = get_terms(
        array(
            'taxonomy' => 'portfolio_category',
            'hide_empty' => true,
        )
    );

    if (!empty($portfolio_categories_terms) && !is_wp_error($portfolio_categories_terms)) {
        foreach ($portfolio_categories_terms as $term) {
            $options[$term->slug] = $term->name;
        }
    }

    return $options;
}

// Display Menu
function finaxio_nav_menu()
{
    $menu_list = get_terms(
        array(
            'taxonomy' => 'nav_menu',
            'hide_empty' => true,
        )
    );
    $options = [];
    if (!empty($menu_list) && !is_wp_error($menu_list)) {
        foreach ($menu_list as $menu) {
            $options[$menu->term_id] = $menu->name;
        }
        return $options;
    }
}


// Display Template Builders 
function finaxio_template_builder()
{

    $template_list = array(
        'post_type' => 'finaxio_builder',
        'posts_per_page' => -1,
    );

    $templates = get_posts($template_list);

    $options = [];

    if (!empty($templates) && !is_wp_error($templates)) {
        foreach ($templates as $template) {
            $options[$template->ID] = $template->post_title;
        }
        return $options;
    }
}



// contact form remove auto p tag and space 
add_filter('wpcf7_autop_or_not', '__return_false');

/*
disable Custom Post Types from Search Results
*/

function exclude_cpt_from_search($query)
{
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $exclude_post_type = 'finaxio_builder'; 
        $query->set('post_type', array_diff(get_post_types(), array($exclude_post_type)));
    }
}
add_action('pre_get_posts', 'exclude_cpt_from_search');