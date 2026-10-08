<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Template Path
 * @author     Template Path
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

$banner_shape_image_v1   = $data->get( 'banner_shape_image_v1' );
$banner_shape_image_v2   = $data->get( 'banner_shape_image_v2' );

?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>
	
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