<?php
/**
 * Displays footer site info
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

<div class="site-info">
	<?php $blog_info = get_bloginfo( 'name' ); ?>
	<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
		<a href="<?php echo esc_url( __( 'https://wpaino.com', 'aino' ) ); ?>" class="imprint">
			<?php
			/* translators: %s: theme name */
			printf( esc_html__( 'Proudly powered by %s.', 'aino' ), 'Aino' );
			?>
		</a>
		<?php
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
		}
		?>
</div><!-- end .site-info -->
