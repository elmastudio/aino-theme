<?php
/**
 * Displays header site branding and header m
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

<div class="site-branding">

	<?php
	if ( has_custom_logo() ) :
		?>
		<?php the_custom_logo(); ?>
	<?php endif; ?>

	<?php $blog_info = get_bloginfo( 'name' ); ?>
	<?php
	if ( ! empty( $blog_info ) ) :
		?>
		<?php
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</h1>
		<?php else : ?>
			<p class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</p>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( true !== get_theme_mod( 'sitedescription' ) ) : ?>
		<p class="site-description">
			<?php bloginfo( 'description' ); ?>
		</p>
	<?php endif; ?>

</div><!-- .site-branding -->

<div id="nav-container" class="nav-container">

	<div id="nav-wrap" class="nav-wrap">

		<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
			<?php get_template_part( 'template-parts/navigation/navigation', 'main' ); ?>
		<?php endif; ?>

		<?php if ( false !== get_theme_mod( 'header_search' ) ) : ?>
		<div class="search-header">
			<?php get_search_form(); ?>
		</div><!-- end .search-header -->
		<?php endif; ?>

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<?php get_template_part( 'template-parts/navigation/navigation', 'social' ); ?>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'cta-header' ) ) : ?>
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'cta-header',
						'container_class' => 'header-cta-wrap',
						'depth'           => 1,
					)
				);
			?>
		<?php endif; ?>

	</div><!-- end .nav-wrap -->
</div><!-- end .nav-container -->
