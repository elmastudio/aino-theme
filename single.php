<?php
/**
 * The template for displaying all single posts
 *
 * @package Aino
 */

get_header(); ?>

<?php echo gutenberg_block_template_part( 'header' ); ?>

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

			<?php
				endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php echo gutenberg_block_template_part( 'footer' ); ?>