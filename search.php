<?php
/**
 * The template for displaying search results pages
 *
 * @package Aino
 * @since Aino 0.0.1
 * @version 0.0.1
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php
		if ( have_posts() ) :
			?>

			<header class="page-header">
				<h1 class="page-title f1"><span><?php esc_html_e( 'Search Results for:', 'aino' ); ?></span><?php echo get_search_query(); ?></h1>
			</header><!-- .page-header -->

			<main id="main" class="site-main" role="main">

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

			<?php
			the_posts_pagination(
				array(
					'next_text'          => aino_get_svg(
						array( 'icon' => 'baseline-chevron_right-24px' )
					)
					. '<span class="meta-nav">' . esc_html__( 'Older posts', 'aino' ) . '</span> ' .
					'<span class="screen-reader-text">' . esc_html__( 'Older posts', 'aino' ) . '</span> ',
					'prev_text'          => aino_get_svg(
						array( 'icon' => 'baseline-chevron_left-24px' )
					)
					. '<span class="meta-nav">' . esc_html__( 'Newer posts', 'aino' ) . '</span> ' .
					'<span class="screen-reader-text">' . esc_html__( 'Newer posts', 'aino' ) . '</span> ',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'aino' ) . ' </span>',
				)
			);
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	get_footer();
