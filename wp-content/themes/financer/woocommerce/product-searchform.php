<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<!-- Sidebar Widget -->
<div class="sidebar_search_box" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">
    <form class="search-form" method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="form-group">
            <input type="text" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" placeholder="<?php esc_attr_e( 'Search', 'financer' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </form>
</div>
