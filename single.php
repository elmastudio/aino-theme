<?php
/**
 * The template for displaying all single posts
 *
 * @package Aino
 * @since Aino 0.0.1
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();
			?>

			<?php
				get_template_part( 'template-parts/post/content', 'single' );
			?>

			<?php if ( comments_open() || get_comments_number() ) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/post/nav-single' ); ?>

			<?php
				endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
