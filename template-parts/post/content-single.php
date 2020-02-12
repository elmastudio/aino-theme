<?php
/**
 * Template part for displaying single posts
 *
 * @package Aino
 * @since Aino 0.0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_category() ) : ?>
			<div class="entry-cats">
				<?php the_category( ',' ); ?>
			</div><!-- end .entry-cats -->
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

		<?php aino_posted_on(); ?>

			<span class="entry-comments"><?php comments_popup_link( esc_html__( 'Leave a reply', 'aino' ), esc_html__( 'Comment 1', 'aino' ), esc_html__( 'Comments %', 'aino' ), 'comments-link' ); ?></span>

			<?php aino_estimated_read_time(); ?>

		</div><!-- .entry-meta -->

		<?php aino_edit_link(); ?>

	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<figure class="post-thumb">
			<?php the_post_thumbnail(); ?>
		</figure><!-- .post-thumb -->
	<?php endif; ?>

	<div class="entry-content col">
		<?php
			the_content(
				sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aino' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aino' ),
					'after'  => '</div>',
				)
			);
			?>
	</div><!-- .entry-content -->

	<footer class="entry-footer col cf">

		<?php if ( function_exists( 'sharing_display' ) ) : ?>
			<span id="sharing-footer" class="sharing">
				<?php sharing_display( '', true ); ?>
			</span>
		<?php endif; ?>

		<?php aino_entry_meta(); ?>

		<?php
		// Author bio.
		if ( get_the_author_meta( 'description' ) ) :
			get_template_part( 'template-parts/post/authorbox' );
		endif;
		?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php if ( '1' === get_theme_mod( 'aino_displayrelatedposts', '1' ) ) : ?>

	<?php get_template_part( 'template-parts/post/relatedposts' ); ?>

<?php endif; ?>
