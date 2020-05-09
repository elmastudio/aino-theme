<?php
/**
 * Displays the search form
 *
 * @package Aino
 */

?>

<div class="searchform-wrap">
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label>
				<span class="screen-reader-text"><?php echo esc_attr_x( 'Search', 'label', 'aino' ); ?></span>
				<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				<span class="search-icon"><?php echo aino_get_svg( array( 'icon' => 'baseline-search-24px' ) ); ?></span>
				<input type="search" class="search-field"
						placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'aino' ); ?>"
						value="<?php echo get_search_query(); ?>" name="s"
						title="<?php echo esc_attr_x( 'Search for:', 'label', 'aino' ); ?>" />
		</label>
		<button type="submit" class="search-submit"><span><?php echo _e( 'Search', 'submit button', 'aino' ); ?></span></button>
</form>
</div>
