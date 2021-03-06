<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Aino
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

			<div class="error-404 not-found">
				<header class="entry-header push-center default-margins">
					<h1 class="entry-title"><?php esc_html_e( 'Oops! Page Not Found', 'aino' ); ?></h1>
				</header><!-- .page-header -->

				<div class="entry-content default-margins">
					<p><?php esc_html_e( 'We can&rsquo;t seem to find the page you&rsquo;re looking for. The link you clicked may be broken or the page may have been removed.', 'aino' ); ?></p>
					<p><?php esc_html_e( 'Maybe try a search instead?', 'aino' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
