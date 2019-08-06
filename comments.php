<?php
/**
 * The template for displaying comments
 *
 * @package Aino
 * @since Aino 0.0.1
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area col s12 cf">

	<?php
	if ( have_comments() ) :
		?>

		<h2 class="comments-title">
		<?php
		$aino_comments_number = get_comments_number();
		if ( '1' === $aino_comments_number ) {
			/* translators: %s: post title */
			printf( esc_html_x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'aino' ), esc_html( get_the_title() ) );
		} else {
			printf(
				/* translators: 1: number of comments, 2: post title */
				esc_html( _nx(
					'%1$s reply on &ldquo;%2$s&rdquo;',
					'%1$s replies on &ldquo;%2$s&rdquo;',
					$aino_comments_number,
					'comments title',
					'aino'
				) ),
				esc_html( number_format_i18n( $aino_comments_number ) ),
				esc_html( get_the_title() )
			);
		}
		?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
		<?php
		wp_list_comments(
			array(
				'avatar_size' => 56,
				'style'       => 'ol',
				'short_ping'  => true,
				'callback'    => 'aino_comment',
			)
		);
		?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'aino' ); ?></h2>
			<div class="nav-links cf">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'aino' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'aino' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
			<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'aino' ); ?></p>
		<?php
		endif;

	comment_form();
	?>

</div><!-- #comments -->
