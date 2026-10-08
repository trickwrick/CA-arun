<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' );
$data    = \FINANCER\Includes\Classes\Common::instance()->data( 'single' )->get();

$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );

$layout = ( $layout ) ? $layout : 'full';
$sidebar = ( $sidebar ) ? $sidebar : '';

if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-8 col-md-12 col-sm-12';

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
?>

<?php if ( class_exists( '\Elementor\Plugin' )):?>
	<?php do_action( 'financer_banner', $data );?>
<?php else:?>
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
<?php endif;?>

<!-- Shop Details -->
<section class="shop-details pt_150 pb_150 te-shop__detail">
    <div class="container">
        <div class="shop-details-content">
            <div class="row">
               
                <!-- sidebar area -->
                <?php if( $data->get( 'layout' ) == 'left' ): ?>
                <!--Start Thm Sidebar Box-->
                <div class="sidebar-side col-xl-4 col-lg-4 col-md-12">
                    <aside class="sidebar sidebar_bg">
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </aside>
                </div>
                <?php endif; ?>
                    
                <!-- sidebar area -->         
                <div class="<?php echo esc_attr($class);?>">
                    <?php
                        /**
                         * woocommerce_before_main_content hook.
                         *
                         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                         * @hooked woocommerce_breadcrumb - 20
                         */
                        do_action( 'woocommerce_before_main_content' );
                    ?>
                        
                        <?php while ( have_posts() ) : ?>
                            <?php the_post(); ?>
                
                            <?php wc_get_template_part( 'content', 'single-product' ); ?>
                
                        <?php endwhile; // end of the loop. ?>
                        
                    <?php
                        /**
                         * woocommerce_after_main_content hook.
                         *
                         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                         */
                        do_action( 'woocommerce_after_main_content' );
                    ?>                   
                </div> 
                           
                <!-- sidebar area -->
                <?php if( $data->get( 'layout' ) == 'right' ): ?>
                <!--Start Thm Sidebar Box-->
                <div class="sidebar-side col-xl-4 col-lg-4 col-md-12">
                    <aside class="sidebar sidebar_bg">
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </aside>
                </div>
                <?php endif; ?>
                <!-- sidebar area -->
        	</div>
        </div>		
    </div>
</section>

<?php
}
get_footer( 'shop' );

