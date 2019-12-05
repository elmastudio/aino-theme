<?php
/**
 * Displays footer social menu if assigned
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

<?php
if ( has_nav_menu( 'social-footer' ) ) :
	?>

	<?php if ( has_nav_menu( 'social-footer' ) ) : ?>

		<nav id="social-footer-nav" class="social-footer-nav social-nav" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'aino' ); ?>">
		<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'social-footer',
					'menu_class'      => 'social-links-menu',
					'container_class' => 'menu-social-container',
					'depth'           => 1,
					'link_before'     => '<span class=" screen-reader-text">',
					'link_after'      => '</span> ' . aino_get_svg( array( 'icon' => 'chain' ) ),
				)
			);
		?>
		</nav><!-- .footer-social-nav -->

	<?php endif; ?>

<?php endif; ?>
