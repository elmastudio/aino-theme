<?php
/**
 * Template part for displaying single posts
 *
 * @package Aino
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header push-center outer-margins">
		<?php if ( has_category() ) : ?>
			<div class="entry-cats">
				<?php the_category( ' ' ); ?>
			</div><!-- end .entry-cats -->
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

		<?php aino_author(); ?>

			<span class="entry-comments"><?php comments_popup_link( esc_html__( 'Leave a reply', 'aino' ), esc_html__( 'Comment 1', 'aino' ), esc_html__( 'Comments %', 'aino' ), 'comments-link' ); ?><span aria-hidden="true">&#44;</span></span>

			<?php aino_estimated_read_time(); ?>

			<?php aino_posted_on(); ?>

		</div><!-- .entry-meta -->

		<?php aino_edit_link(); ?>

	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() ) : ?>
		<figure class="post-thumb push-center outer-margins">
			<?php the_post_thumbnail(); ?>
		</figure><!-- .post-thumb -->
	<?php endif; ?>

	<div class="entry-content col push-center default-margins">
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

	<div class="entry-footer col push-center outer-margins">

		<?php aino_entry_meta(); ?>

		<?php
		// Author bio.
		if ( get_the_author_meta( 'description' ) ) :
			get_template_part( 'template-parts/post/authorbox' );
		endif;
		?>

	</div><!-- .entry-footer -->
</article><!-- #post-## -->

<?php if ( '1' === get_theme_mod( 'aino_displayrelatedposts', '1' ) ) : ?>

	<?php get_template_part( 'template-parts/post/relatedposts' ); ?>

<?php endif; ?>
