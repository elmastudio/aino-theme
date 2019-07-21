<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Aino
 * @since Aino 0.0.1
 */

if ( ! function_exists( 'aino_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function aino_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$byline = sprintf(
			/* translators: 1: author name. 2: post author, only visible to screen readers. */
			esc_html_x( '%s ', 'post author', 'aino' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
		);

		$posted_on = sprintf(
			/* translators: 1: post date. 2: post date, only visible to screen readers. */
			esc_html_x( '%s', 'post date', 'aino' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		if ( get_avatar( get_the_author_meta( 'ID' ) ) ) :
			echo '<figure class="author-avatar"><a class="author-avatar-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_avatar( get_the_author_meta( 'ID' ), 80 ) . '</a></figure>';

		endif;

		echo '<span class="aut9hor-meta-info"><span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>';

	}
	endif;


if ( ! function_exists( 'aino_entry_date_blog' ) ) :
	/**
	 * Prints HTML with information for the current post-date/time and number of comments.
	 */
	function aino_entry_date_blog() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: 1: post date. 2: post date, only visible to screen readers. */
			esc_html_x( '%s', 'post date', 'aino' ),
			'' . $time_string . ''
		);

		echo '<span class="posted-on">' . $posted_on . '</span>';

	}
endif;


if ( ! function_exists( 'aino_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories and tags.
	 */
	function aino_entry_meta() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'aino' ) );

		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			if ( $categories_list && ! is_single() ) {
				printf(
					'<span class="entry-cats">' . ( '%1$s' ) . '</span>',
					wp_kses_post( $categories_list )
				);
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ( ' ' ) );
			if ( $tags_list && is_single() ) {
				printf(
					'<span class="entry-tags">' . ( '%1$s' ) . '</span>',
					wp_kses_post( $tags_list )
				);
			}
		}
	}
endif;

if ( ! function_exists( 'aino_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 */
	function aino_edit_link() {

		$editlink = sprintf(
			esc_html_x( 'Edit Post', 'aino' ) . '<span class="edit-link">' . aino_get_svg( array( 'icon' => 'baseline-edit-24px' ) ) . '</span><span class="screen-reader-text">' . get_the_title() . '</span>'
		);

		// Edit post link.
		edit_post_link(
			$editlink
		);
	}
endif;

if ( ! function_exists( 'aino_estimated_read_time' ) ) :
	/**
	 * Prints HTML with the estimated reading time. Does not display when time to read is zero.
	 */
	function aino_estimated_read_time() {
		$minutes = aino_get_estimated_reading_time();
		if ( 0 === $minutes ) return null;
		$datetime_attr = sprintf(
			'%dm 0s',
			$minutes
		);
		/* translators: 1: The [datetime] attribute for the <time> tag. 2: Estimated reading time text, in minutes. */
		$read_time_text = sprintf( _nx( '%s min read', '%s min read', $minutes, 'Time to read', 'aino' ), $minutes );
		printf(
			'<span class="reading-time"><time datetime="%1$s"></time>%2$s</span>',
			$datetime_attr,
			$read_time_text
		);
	}
endif;

/**
 * Custom Aino Comment structure.
 *
 * @param  mixed $comment Custom comment parameter.
 * @param  mixed $args Comment arguments.
 * @param  mixed $depth Depth of the comment.
 *
 * @return void
 */
function aino_comment( $comment, $args, $depth ) {
	global $post;

	// Checks if we are using a div or ol|ul for our output.
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

	?>
	<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
	<article id="div-comment- <?php comment_ID(); ?>" class="comment-body">
		<div class="avatar-content-wrap">
			<?php
			if ( 0 !== $args['avatar_size'] ) {
				echo '<span class="comment-avatar">';
				echo get_avatar( $comment, $args['avatar_size'] );
				echo '</span>';
			}
			?>
			<div class="comment-content-wrap">
				<div class="comment-author vcard">
				<?php
				printf(
					/* translators: %s: Name of comment author. */
					'<b class="fn">%s</b> %2$s',
					get_comment_author_link( $comment ),
					// If current post author is also comment author, make it known visually.
					( $comment->user_id === $post->post_author ) ? '<span class="author-badge">' . esc_html_x( 'Author', 'aino' ) . '</span>' : ''
				);
				?>
				</div><!-- .comment-author -->
					<?php comment_text(); ?>
			</div><!-- .comment-content-wrap -->
		</div><!-- .avatar-content-wrap -->

		<footer class="comment-meta">
			<div class="comment-metadata">
				<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
					<time datetime="<?php comment_time( 'c' ); ?>">
					<?php
					printf(
						/* translators: 1: The comment date. 2: the comment time. */
						esc_html_x( '%1$s at %2$s', 'aino' ),
						get_comment_date( '', $comment ),
						get_comment_time()
					);
					?>
					</time>
				</a>
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class = "reply">',
							'after'     => '</div>',
						)
					)
				);
				?>
				<?php edit_comment_link( __( 'Edit', 'aino' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .comment-metadata -->

			<?php if ( '0' === $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'aino' ); ?></p>
			<?php endif; ?>
		</footer><!-- .comment-meta -->
	</article><!-- .comment-body -->
	<?php
}
