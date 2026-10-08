<?php
/**
 * Default Template Main File.
 *
 * @package FINANCER
 * @author  ThemeKalia
 * @version 1.0
 */
get_header();
$data  = \FINANCER\Includes\Classes\Common::instance()->data( 'single' )->get();

$options = financer_WSH()->option();

$blog_banner_shape_image_v1 = $options->get( 'blog_banner_shape_image_v1' );
$blog_banner_shape_image_v1 = financer_set( $blog_banner_shape_image_v1, 'url' );

$blog_banner_shape_image_v2 = $options->get( 'blog_banner_shape_image_v2' );
$blog_banner_shape_image_v2 = financer_set( $blog_banner_shape_image_v2, 'url' );	

$blog_banner_subheading = $options->get( 'blog_banner_subheading' );

$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-8 col-md-12 col-sm-12';
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
                            
                        <?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                        
                        <div class="clearfix"></div>
                        <?php
                        $defaults = array(
                            'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'financer' ),
                            'after'  => '</div>',
        
                        );
                        wp_link_pages( $defaults );
                        ?>
                        <?php comments_template() ?>
                     
                     </div>
                 </div>
            </div>
            <?php
				if ( $layout == 'right' ) {
					$data->set('sidebar', 'default-sidebar');
					do_action( 'financer_sidebar', $data );
				}
            ?>
        
        </div>
	</div>
</section>
<!-- blog section with pagination -->
<?php get_footer(); ?>
