<?php get_header();
$data = \FINANCER\Includes\Classes\Common::instance()->data('single-team')->get(); 
$banner_image   = $data->get( 'banner_image' );
?>

<!-- Page Breadcrumb -->
<section class="page_breadcrumb">
    <?php if($data->get( 'banner_shape_image_v1' )) { ?>
    <div class="page_breadcrumb_shape_one float-bob-x">
        <img src="<?php echo esc_url( $data->get( 'banner_shape_image_v1' ) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
    </div>
    <?php } ?>
    <?php if($data->get( 'banner_shape_image_v2' )) { ?>
    <div class="page_breadcrumb_shape_two float-bob-y">
        <img src="<?php echo esc_url( $data->get( 'banner_shape_image_v2' ) ); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
    </div>
    <?php } ?>  
    <div class="container">
        <div class="breadcrumb_content centred">
            <?php if($data->get( 'subheading' )){ ?><div class="breadcrumb_sutitle"><h6><?php echo wp_kses( $data->get( 'subheading' ), true ); ?></h6></div><?php } ?>
            <h1 class="breadcrumb_title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( the_title( ) ); ?></h1>
            <?php if(financer_the_breadcrumb()){ ?>
            <ul class="breadcrumb_menu">
                <?php echo financer_the_breadcrumb(); ?>
            </ul>
            <?php } ?>
        </div>
    </div>
</section>
<!-- Page Breadcrumb End -->

<?php 
	while (have_posts()) : the_post(); 
	$show_team_info = get_post_meta(get_the_id(), 'show_team_info', true);
	$info_tabs = get_post_meta(get_the_id(), 'team_info_tabs', true);
?>

<!-- Team Details Section -->
<section class="team_details_section pt_150 pb_150">
    <div class="container">
        <div class="row">
            <?php if(has_post_thumbnail()){ ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="team_details_image">
                    <?php the_post_thumbnail('full'); ?>
                </div>
            </div>
            <?php } ?>
            
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <div class="author_content">
                    <h3 class="author_name"><?php the_title(); ?></h3>
                    <span class="author_designation"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></span>
                    <div class="author_comment">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            
             <?php 
				if($show_team_info){
				if($info_tabs){
			?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                <div class="author_information">
                    <div class="author_info_title"><?php echo (get_post_meta( get_the_id(), 'info_title', true ));?></div>
                    <?php
						for ( $i=0; $i < count( $info_tabs['tab_title'] ); $i++ ) { 
						$tab_title = ( isset( $info_tabs['tab_title'][$i] ) && !empty( $info_tabs['tab_title'][$i] ) ) ? $info_tabs['tab_title'][$i] : '';
						$tab_text = ( isset( $info_tabs['tab_text'][$i] ) && !empty( $info_tabs['tab_text'][$i] ) ) ? $info_tabs['tab_text'][$i] : '';
					?>
                    <div class="author_info_item">
                        <span><?php echo wp_kses($tab_title, true); ?></span>
                        <h6><?php echo wp_kses($tab_text, true); ?></h6>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>
<!-- Team Details Section End -->

<?php endwhile; ?>
<?php get_footer(); ?>