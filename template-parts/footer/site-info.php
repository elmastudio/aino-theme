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

			<span class="footer-copyright">&copy;
				<?php
				echo date_i18n(
					/* translators: Copyright date format, see https://secure.php.net/date */
					_x( 'Y', 'copyright date format', 'aino' )
				);
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
			</span><!-- .footer-copyright -->

		<?php endif; ?>
		<a href="<?php echo esc_url( __( 'https://wpaino.com', 'aino' ) ); ?>" class="powered-by">
			<?php
			/* translators: %s: theme name */
			printf( esc_html__( 'Powered by %s.', 'aino' ), 'Aino' );
			?>
		</a>
		<?php
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
		}
		?>
</div><!-- end .site-info -->
