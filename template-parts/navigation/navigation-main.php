<?php
/**
 * Displays main navigation
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'aino' ); ?>">
	<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_class'     => 'main-menu',
				'menu_id'        => 'main-menu',
				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			)
		);
		?>
</nav><!-- #site-navigation -->
