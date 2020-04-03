<?php
/**
 * Displays footer social menu if assigned
 *
 * @package Aino
 */

?>

<?php
if ( has_nav_menu( 'footer-menu' ) ) :
	?>

	<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>

		<nav id="footer-menu-nav" class="footer-menu-nav footer-nav" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'aino' ); ?>">
		<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'footer-menu',
					'menu_class'      => 'footer-menu',
					'container_class' => 'menu-footer-container',
				)
			);
		?>
		</nav><!-- .footer-social-nav -->

	<?php endif; ?>

<?php endif; ?>

<?php
if ( function_exists( 'the_privacy_policy_link' ) ) {
	the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
}
?>
