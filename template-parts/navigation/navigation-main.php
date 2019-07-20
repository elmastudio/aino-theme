<?php
/**
 * Displays main navigation
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'aino' ); ?>">
	<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'main-menu',
			)
		);
		?>
</nav><!-- #site-navigation -->
