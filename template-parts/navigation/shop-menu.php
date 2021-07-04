<?php
/**
 * Displays WooCommerce cart and account link
 *
 * @package Aino
 * @since.1.4.0
 */

?>

	<?php if ( is_user_logged_in() ) { ?>
		<li class="show-account"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"
			title="<?php _e('Account', 'aino'); ?>"><?php _e('Account','aino'); ?></a></li>
	<?php }
	else { ?>
		<li class="show-account"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','aino'); ?>"><?php _e('Login','aino'); ?></a></li>
		<?php } ?>
		<li class="show-cart">
			<a class="cart-count" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View cart', 'aino' ); ?>">
			<?php echo sprintf ( _n( 'Cart (%d)', 'Cart (%d)', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() , 'aino'); ?></a>
		</li>