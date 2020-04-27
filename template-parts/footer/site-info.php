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

		<?php endif; ?>

</div><!-- end .site-info -->
