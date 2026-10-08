<?php
if (is_page() || is_singular('post') && get_post_meta($post->ID, 'finaxio_meta_options', true)) {
    $finaxio_meta = get_post_meta($post->ID, 'finaxio_meta_options', true);
} else {
    $finaxio_meta = array();
}
if (is_array($finaxio_meta) && array_key_exists('finaxio_builder_footer', $finaxio_meta) && $finaxio_meta['meta_footer_layout'] != 'no') {
    $finaxio_builder = $finaxio_meta['finaxio_builder_footer'];
} else {
    $finaxio_builder = finaxio_option('finaxio_builder_footer');
}

if (true == post_type_exists('finaxio_builder')):
    $footer_args = array(
        'p' => $finaxio_builder,
        'post_type' => 'finaxio_builder',
    );
    $footer_has_style = new WP_Query($footer_args);
    if ($footer_has_style->have_posts()):
        while ($footer_has_style->have_posts()):
            $footer_has_style->the_post(); ?>
            <div class="finaxio-builder-footer">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
        wp_reset_postdata();

    endif;

endif;
?>