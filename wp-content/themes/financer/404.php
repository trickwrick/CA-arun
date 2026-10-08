<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Financer
 * @author     Template Path <admin@template_path.com>
 * @version    1.0
 */

	$allowed_html = wp_kses_allowed_html( 'post' ); 
?>
<?php get_header();
$data = \FINANCER\Includes\Classes\Common::instance()->data( '404' )->get();
	$options = financer_WSH()->option();

	$error_image   = $options->get( '404_page_error_image' );
	$error_image   = financer_set( $error_image, 'url', FINANCER_URI . '/assets/images/resource/error_image.png' );
	

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>

<!-- Page Breadcrumb -->
<section class="page_breadcrumb">
    
    <div class="page_breadcrumb_shape_one float-bob-x">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/shape_icon_13.png" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
    </div>
    <div class="page_breadcrumb_shape_two float-bob-y">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icons/shape_icon_1.png" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
    </div> 
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
   
<!-- Error Section -->
<section class="error_section pt_150 pb_150">
    <div class="container">
        <div class="error_content centred">
            <?php if($error_image){ ?>
            <div class="error_image_box float-bob-x">
                <img src="<?php echo esc_url($error_image); ?>" alt="<?php esc_attr_e('Awesome Image', 'financer'); ?>">
            </div>
            <?php } ?>
            
            <h2>
                <span>
                <?php 
                    if( $options->get( '404_page_tag_title' ) ){
                        echo wp_kses( $options->get( '404_page_tag_title' ), true );
                    }else{
                        esc_html_e( 'Oops!', 'financer' );
                    }
                ?>
                </span>
                <?php if( $options->get( '404_page_text' ) ):?>
                    <?php echo wp_kses( $options->get( '404_page_text' ), true );?>
                <?php else:?>
                    <?php esc_html_e( 'That Page Can Not be Found.', 'financer' );?>
                <?php endif;?>
            </h2>
            
            <?php if (! $options->get( 'back_home_btn' ) ) : ?>
            <div class="error_btn_box">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn_style_two"><span>
                	<?php 
						if( $options->get( 'back_home_btn_label' ) ){
							echo wp_kses( $options->get( 'back_home_btn_label' ), true );
						}else{
							esc_html_e( 'Back to Homepage', 'financer' );
						}
					?></span>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Error Section End -->
         
<?php }
get_footer(); ?>
