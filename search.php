<?php
/**
 * The template for displaying search results pages
 *
 * @package Aino
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php
		if ( have_posts() ) :
			?>

			<header class="page-header">
				<h1 class="page-title"><span><?php esc_html_e( 'Search Results for:', 'aino' ); ?></span><?php echo get_search_query(); ?></h1>
			</header><!-- .page-header -->

			<main id="main" class="site-main mobile-margins" role="main">

			<div id="posts-container" class="posts-container cf">

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

			<?php the_posts_pagination(); ?>

			<?php
				$loadmorebtn = '<button class="loadmore btn-xl">' . __('Load more', 'aino') . '</button>';

				// don't display the button if there are not enough posts
				if ( $wp_query->max_num_pages > 1 )
					echo $loadmorebtn;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_footer();
