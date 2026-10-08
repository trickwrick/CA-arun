<?php get_header();
$data    = \FINANCER\Includes\Classes\Common::instance()->data('single-project')->get();
do_action( 'financer_banner', $data );
?>

<?php while (have_posts()) : the_post();
    $project_img = get_post_meta(get_the_id(), 'project_image', true);
	$projects_tabs = get_post_meta(get_the_id(), 'projects_tabs', true);
	$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));	
?>

<!-- Project Details Banner -->
<section class="project_page_banner pt-100">
    <div class="container">
        <div class="banner_content centred">
            <div class="tag_text"><h6><?php echo implode( ', ', (array)$term_list );?></h6></div>
            <h1><?php the_title(); ?></h1>
            <p><?php echo (get_post_meta( get_the_id(), 'project_description', true ));?></p>
            
			<?php if($project_img){ ?>
            <div class="banner_image">
                <img src="<?php echo esc_url($project_img['url']); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Project Details Banner End -->

<!-- Project Info -->
<section class="project_info">
    <div class="shape_image float-bob-y"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/shape_icon_12.png" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>"></div>
    <div class="container">
        <div class="project_info_outer">
            <?php 
				if($projects_tabs) {             
				for ( $i=0; $i < count( $projects_tabs['tab_title'] ); $i++ ) { 
				$tab_title = ( isset( $projects_tabs['tab_title'][$i] ) && !empty( $projects_tabs['tab_title'][$i] ) ) ? $projects_tabs['tab_title'][$i] : '';
				$tab_text = ( isset( $projects_tabs['tab_text'][$i] ) && !empty( $projects_tabs['tab_text'][$i] ) ) ? $projects_tabs['tab_text'][$i] : '';
			?>
            <div class="project_info_item">
                <span><?php echo wp_kses_post($tab_title); ?></span>
                <h6><?php echo wp_kses_post($tab_text); ?></h6>
			</div>
            <?php } } ?>
            
			<?php
				$icons = get_post_meta(get_the_id(), 'project_social_media_tabs', true); if ($icons) : 
			?>
            <div class="project_info_item">
                <span><?php echo (get_post_meta( get_the_id(), 'social_icon_title', true ));?></span>
                <ul class="socials-links">
                    <?php
						for ( $i=0; $i < count( $icons['select_social_media'] ); $i++ ) {
						$social_icon = ( isset( $icons['select_social_media'][$i] ) && !empty( $icons['select_social_media'][$i] ) ) ? $icons['select_social_media'][$i] : '';
						$social_link = ( isset( $icons['link_social_media'][$i] ) && !empty( $icons['link_social_media'][$i] ) ) ? $icons['link_social_media'][$i] : '';
					?>
					<li><a href="<?php echo esc_url($social_link); ?>"><i class="fab <?php echo esc_attr(str_replace("fa ", " ", $social_icon)); ?>"></i></a></li>
					<?php } ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Project Info End -->

<!-- Project Details Section -->
<section class="project_details_section pb_150">    
    <div class="container">
        <?php the_content(); ?>
    </div>
</section>
<!-- Project Details Section End -->
<?php endwhile; ?>

<?php get_footer(); ?>