<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
global $wp_query;
$data  = \FINANCER\Includes\Classes\Common::instance()->data( 'single' )->get();

$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );

$layout = ( $layout ) ? $layout : 'full';
$sidebar = ( $sidebar ) ? $sidebar : '';

if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xl-12 col-lg-12 col-md-12' : 'col-xl-8 col-lg-8 col-md-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>

<?php if ( class_exists( '\Elementor\Plugin' )): ?>
	<?php do_action( 'financer_banner', $data ); ?>
<?php else: ?>
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
<?php endif; ?>

<!-- Shop Page Section -->
<section class="shop-page-section pt_150 pb_150 te-shop-archive__custom">
    <div class="container">
        <div class="row clearfix">
            <!-- sidebar area -->
            <?php if( $data->get( 'layout' ) == 'left' ): ?>
            <!--Start Thm Sidebar Box-->
            <div class="sidebar-side col-xl-4 col-lg-4 col-md-12">
                <aside class="sidebar">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </aside>
            </div>
            <?php endif; ?>
            
            <!-- sidebar area -->	
            <div class="content-side <?php echo esc_attr($class); ?> <?php if ( $data->get( 'layout' ) == 'left' ) echo 'left-sidebar'; elseif ( $data->get( 'layout' ) == 'right' ) echo 'right-sidebar'; ?>">
                <div class="our-shop">
                    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                    <!--Sort By-->
                    <div class="items-sorting">
                        <?php
                            /**
                             * woocommerce_before_shop_loop hook
                             *
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            do_action( 'woocommerce_before_shop_loop' );
                        ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
					?>
                    
                    <?php if ( have_posts() ) : ?>
                
                        <?php woocommerce_product_loop_start(); ?>
            
                            <?php woocommerce_product_subcategories(); ?>
            
                            <?php while ( have_posts() ) : the_post(); ?>
            
                                <?php wc_get_template_part( 'content', 'product' ); ?>
            
                            <?php endwhile; // end of the loop. ?>
            
                        <?php woocommerce_product_loop_end(); ?>
            
                        <?php
                            /**
                             * woocommerce_after_shop_loop hook
                             *
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action( 'woocommerce_after_shop_loop' );
                        ?>
            
                    <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
            
                        <?php wc_get_template( 'loop/no-products-found.php' ); ?>
            
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- sidebar area -->
            <?php if( $data->get( 'layout' ) == 'left' ): ?>
            <div class="sidebar-side col-xl-4 col-lg-4 col-md-12">
                <aside class="sidebar">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </aside>
            </div>
            <?php endif; ?>
            
        </div>
	</div>
</section>

<?php
}
get_footer( 'shop' );
