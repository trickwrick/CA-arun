<?php
if (is_page() || is_singular('post') && get_post_meta($post->ID, 'finaxio_meta_options', true)) {
    $finaxio_meta = get_post_meta($post->ID, 'finaxio_meta_options', true);
} else {
    $finaxio_meta = array();
}
if (is_array($finaxio_meta) && array_key_exists('finaxio_builder_header', $finaxio_meta) && $finaxio_meta['meta_header_layout'] != 'no') {
    $finaxio_builder = $finaxio_meta['finaxio_builder_header'];
} else {
    $finaxio_builder = finaxio_option('finaxio_builder_header');
}

if (true == post_type_exists('finaxio_builder')):
    $header_args = array(
        'p' => $finaxio_builder,
        'post_type' => 'finaxio_builder',
    );
    $header_has_style = new WP_Query($header_args);
    if ($header_has_style->have_posts()):
        while ($header_has_style->have_posts()):
            $header_has_style->the_post(); ?>
            <div class="finaxio-builder-header">
                <?php the_content(); ?>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    endif;
endif;
?>