<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aino
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php if ( is_home() && ! is_front_page() ) : ?>

			<header class="page-header grid-margins">

			<?php if ( get_theme_mod( 'blog_title' ) ) : ?>
				<h1 class="page-title col col7"><?php echo wp_kses_post( get_theme_mod( 'blog_title' ) ); ?></h1>
			<?php else : ?>
				<h1 class="page-title screen-reader-text"><?php esc_html_e( 'Posts', 'aino' ); ?></h1>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'blog_title_description' ) ) : ?>
				<div class="description col col7">
					<p><?php echo wp_kses_post( get_theme_mod( 'blog_title_description' ) ); ?></p>
				</div><!-- .description -->
			<?php endif; ?>

			</header>
		<?php endif; ?>

		<main id="main" class="site-main mobile-margins" role="main">

		<div class="posts-container" id="posts-container">

		<?php
			if ( have_posts() ) :
				?>

				<?php
				// Start the Standard Loop.
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/post/content' );
				endwhile;
				?>
		<?php endif; ?>

		<?php the_posts_pagination(); ?>

		<?php
			$loadmorebtn = '<button class="loadmore btn-xl">' . __('Load more', 'aino') . '</button>';

			// don't display the button if there are not enough posts
			if ( $wp_query->max_num_pages > 1 )
				echo $loadmorebtn;
		?>

	</div><!-- .posts-container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
