<?php
/**
 * Displays footer site info
 *
 * @package Aino
 */

?>

<div class="site-info">

	<?php $blog_info = get_bloginfo( 'name' ); ?>

		<?php if ( get_theme_mod( 'footer_siteinfo' ) ) : ?>

			<span><?php echo wp_kses_post( get_theme_mod( 'footer_siteinfo' ) ); ?></span>

		<?php else : ?>

			<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>

			<a href="<?php echo esc_url( __( 'https://wpaino.com', 'aino' ) ); ?>" class="imprint">
				<?php
				/* translators: %s: theme name */
				printf( esc_html__( 'Powered by %s.', 'aino' ), 'Aino' );
				?>
			</a>

		<?php endif; ?>

		<?php
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
		}
		?>

</div><!-- end .site-info -->
