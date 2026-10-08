<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

global $wp_query;
$data  = \FINANCER\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );

$layout = ( $layout ) ? $layout : 'full';
$sidebar = ( $sidebar ) ? $sidebar : '';

if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
if( !$layout || $layout == 'full' ) $classes[] = 'col-lg-3 col-md-6 col-sm-12 shop-block'; else $classes[] = 'col-lg-4 col-md-6 col-sm-12 shop-block';  

?>

<div <?php post_class( $classes ); ?> >    
	<div class="shop-block-one aos-init aos-animate" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
    	<div class="inner-box">
			<div class="image-box">
				<a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>">
				<?php woocommerce_template_loop_product_thumbnail(); ?>
                </a>
			</div>
            
			<div class="lower-content">
                <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h5>
                <div class="rating">
                    <?php woocommerce_template_loop_rating(); ?>
                </div>
                <?php woocommerce_template_loop_price(); ?>
            </div>
             
            
		</div>
    </div>
</div>