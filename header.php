<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aino
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">

	<header id="masthead" class="site-header masthead" role="banner">

		<div class="header-inner section-inner">

			<div class="site-branding">

				<?php
					// Site title or logo.
					aino_site_logo();

					// Site description.
					aino_site_description();
				?>

			</div><!-- .site-branding -->

			<div id="nav-container" class="nav-container">

				<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
					<span class="toggle-inner">
						<?php echo aino_get_svg( array( 'icon' => 'more_horiz-24px' ) ); ?>
						<span class="toggle-text"><?php esc_attr_e( 'Menu', 'aino' ); ?></span>
					</span>
				</button><!-- .nav-toggle -->

				<div class="header-navigation-wrapper">

					<?php if ( has_nav_menu( 'primary' ) ) : ?>

					<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'aino' ); ?>" role="navigation">

						<ul class="primary-menu reset-list-style">

							<?php
							if ( has_nav_menu( 'primary' ) ) {

								wp_nav_menu(
									array(
										'container'      => '',
										'items_wrap'     => '%3$s',
										'theme_location' => 'primary',
									)
								);
							}
							?>

						</ul><!-- .primary-menu -->

					</nav><!-- .primary-menu-wrapper -->

					<?php endif; ?>

				</div><!-- .header-navigation-wrapper -->

			</div><!-- .nav-container -->

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

		<?php if ( true === get_theme_mod( 'header_search' ) ) : ?>

		<div class="search-header">
			<?php get_search_form(); ?>
		</div><!-- end .search-header -->

		<?php endif; ?>

		</div><!-- .header-inner -->

	</header><!-- .masthead -->

	<?php
	// Output the menu modal.
	get_template_part( 'template-parts/navigation/modal-menu' );
	?>

	<div class="content-wrap">

		<div id="content" class="site-content">
