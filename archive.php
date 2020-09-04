<?php
/**
 * The template for displaying archive pages
 *
 * @package Aino
 */

get_header(); ?>

	<section id="primary" class="content-area">

		<?php
		if ( have_posts() ) :
			?>

			<header class="page-header grid-margins">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );

				if ( ! is_author() ) {
					the_archive_description( '<div class="description">', '</div>' );
				}
				?>

				<?php
				// Author bio.
				if ( is_author() ) :
					get_template_part( 'template-parts/post/authorbox' );
				endif;
				?>
			</header><!-- .page-header -->

			<main id="main" class="site-main mobile-margins" role="main">

				<div class="posts-container" id="posts-container">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>

				<?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/post/content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- .posts-container -->

	
		</main><!-- #main -->
	</section><!-- #primary -->

	<?php
	get_footer();
