<?php
/**
 * Blog Main File.
 *
 * @package FINANCER
 * @author  ThemeKalia
 * @version 1.0
 */
get_header();
global $wp_query;
$data  = \FINANCER\Includes\Classes\Common::instance()->data( 'blog' )->get();

$options = financer_WSH()->option();

$blog_banner_shape_image_v1 = $options->get( 'blog_banner_shape_image_v1' );
$blog_banner_shape_image_v1 = financer_set( $blog_banner_shape_image_v1, 'url' );

$blog_banner_shape_image_v2 = $options->get( 'blog_banner_shape_image_v2' );
$blog_banner_shape_image_v2 = financer_set( $blog_banner_shape_image_v2, 'url' );	

$blog_banner_subheading = $options->get( 'blog_banner_subheading' );

$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-8 col-md-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>
	
    <?php if ( $data->get( 'enable_banner' ) ) : ?>
		<?php do_action( 'financer_banner', $data );?>
    <?php 
		else:
	?>
    <!-- Page Breadcrumb -->
    <section class="page_breadcrumb">
        <?php if($blog_banner_shape_image_v1) { ?>
        <div class="page_breadcrumb_shape_one float-bob-x">
            <img src="<?php echo esc_url( $blog_banner_shape_image_v1 ); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
        </div>
        <?php } ?>
        
        <?php if($blog_banner_shape_image_v2) { ?>
        <div class="page_breadcrumb_shape_two float-bob-y">
            <img src="<?php echo esc_url( $blog_banner_shape_image_v2 ); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
        </div>
        <?php } ?>  
        <div class="container">
            <div class="breadcrumb_content centred">
                <?php if($blog_banner_subheading){ ?><div class="breadcrumb_sutitle"><h6><?php echo wp_kses($blog_banner_subheading); ?></h6></div><?php } ?>
                <h1 class="breadcrumb_title"><?php if ($data->get('title')) { echo wp_kses($data->get('title'), true); } else { echo esc_html(get_bloginfo('name')); } ?></h1>
                
				<?php if(financer_the_breadcrumb()){ ?>
                <ul class="breadcrumb_menu">
                    <?php echo financer_the_breadcrumb(); ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Page Breadcrumb End -->
    <?php endif;?>
    
    
    <!-- Blog Section -->
    <section class="blog_section">
        <div class="container">
            <div class="row">
                <?php
                    if ( $data->get( 'layout' ) == 'left' ) {
                        do_action( 'financer_sidebar', $data );
                    }
                ?>
                <div class="content-side <?php echo esc_attr( $class ); ?> <?php if ( $data->get( 'layout' ) == 'left' ) echo 'pl-0'; elseif ( $data->get( 'layout' ) == 'right' ) echo ''; ?>">
                    <div class="blog-page-content blog-detail">
                        <div class="thm-unit-test">
                            
                            <?php
                                while ( have_posts() ) :
                                    the_post();
                                    financer_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                                endwhile;
                                wp_reset_postdata();
                            ?>
                                
                        </div>
                        
                        <!--Pagination-->
                    	<div class="pagination-wrapper" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900">
                        	<?php financer_the_pagination( $wp_query->max_num_pages );?>
                        </div>
                    </div>
                </div>
                <?php
                    if ( $data->get( 'layout' ) == 'right' ) {
                        do_action( 'financer_sidebar', $data );
                    }
                ?>
            </div>
        </div>
    </section>
    <!--End blog area--> 
	<?php
}
get_footer();
