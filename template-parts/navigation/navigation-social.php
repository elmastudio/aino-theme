<?php
/**
 * Displays social navigation
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

<nav id="social-header-nav" class="social-header-nav social-nav" role="navigation" aria-label="<?php esc_attr_e( 'Header Social Links Menu', 'aino' ); ?>">
	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'social',
			'menu_class'      => 'social-links-menu',
			'container_class' => 'menu-social-container',
			'depth'           => 1,
			'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>' . aino_get_svg( array( 'icon' => 'chain' ) ),
		)
	);
	?>
</nav><!-- end .social-header-nav -->
