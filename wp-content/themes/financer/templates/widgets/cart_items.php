<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;?>

<?php do_action( 'woocommerce_before_cart_contents' ); ?>

<?php if(  WC()->cart->get_cart() ):
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

	if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
?>
		
<div class="cart-product post-block">
    <div class="inner-box">
        <div class="cross-icon product-remove">
            <?php
				echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'woocommerce_cart_item_remove_link',
					sprintf(
						'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
						esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
						/* translators: %s is the product name */
						esc_attr( sprintf( __( 'Remove %s from cart', 'financer' ), wp_strip_all_tags( $product_name ) ) ),
						esc_attr( $product_id ),
						esc_attr( $cart_item_key ),
						esc_attr( $_product->get_sku() )
					),
					$cart_item_key
				);
			?>
        </div>
        <div class="image <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
            <?php
            	$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
            
            	if ( ! $_product->is_visible() )
            		echo esc_attr($thumbnail);
            	else
            		printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
            ?>
        </div>
        <h6>
            <?php
        		if ( ! $_product->is_visible() )
        			echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
        		else
        			echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );
            ?>
            
        </h6>
                
        <div class="quantity-text price-box"><?php esc_html_e('Quantity', 'financer'); ?> <?php echo wp_kses_post($cart_item['quantity']); ?></div>
        <div class="price"><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );?></div>
        
        
    </div>
</div>	

<?php
	}
}

?>
	<p class="woocommerce-mini-cart__totals cart-total"><?php do_action( 'woocommerce_widget_shopping_cart_total' ); ?></p>
	
	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
	
	<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>
	
	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); 

else: ?>
<div class="cart-content">
	<p class="center-align"><?php esc_html_e( 'There is no item in your cart',  'financer' ); ?></p>
</div>
<?php endif;?>