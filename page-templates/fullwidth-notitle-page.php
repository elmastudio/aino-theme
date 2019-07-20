<?php
/**
 * Template Name: Fullwidth, No Title
 *
 * Description: A page template for a Full Width Page without page title.
 *
 * @package Aino
 * @since Aino 0.0.1
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/page/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
