<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package finaxio
 */

get_header();

if (get_post_meta($post->ID, 'finaxio_meta_options', true)) {
    $finaxio_meta = get_post_meta($post->ID, 'finaxio_meta_options', true);
} else {
    $finaxio_meta = array();
}

if (array_key_exists('breadcrumb_enable', $finaxio_meta)) {
    $enable_banner = $finaxio_meta['breadcrumb_enable'];
} else {
    $enable_banner = 'yes';
}

if (array_key_exists('section_padding', $finaxio_meta)) {
    $section_padding = $finaxio_meta['section_padding'];
} else {
    $section_padding = 'section-padding';
}
?>
<main id="primary" class="site-main">
    <?php
    if ($enable_banner == 'yes') :
        get_template_part('template-parts/theme-default/' . 'breadcrumb');
    endif;
    ?>
    <div class="<?php echo esc_attr($section_padding); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-single">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php

get_footer();
