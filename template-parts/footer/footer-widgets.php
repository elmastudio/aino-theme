<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Aino
 */

if ( is_active_sidebar( 'footer-1' ) ||
		is_active_sidebar( 'footer-2' ) ||
		is_active_sidebar( 'footer-3' ) ||
		is_active_sidebar( 'footer-4' ) ||
		is_active_sidebar( 'footer-5' ) ||
		is_active_sidebar( 'footer-6' ) ) : ?>

	<aside class="footer-widget-wrap widget-area widget-area-default" role="complementary">

		<?php
		if ( is_active_sidebar( 'footer-1' ) ) {
			?>
				<div id="footer-widget-1" class="footer-widget col-margins">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			<?php
		}

		if ( is_active_sidebar( 'footer-2' ) ) {
			?>
				<div id="footer-widget-2" class="footer-widget col-margins">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			<?php
		}

		if ( is_active_sidebar( 'footer-3' ) ) {
			?>
				<div id="footer-widget-3" class="footer-widget col-margins">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
			<?php
		}

		if ( is_active_sidebar( 'footer-4' ) ) {
			?>
				<div id="footer-widget-4" class="footer-widget">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			<?php
		}

		if ( is_active_sidebar( 'footer-5' ) ) {
			?>
				<div id="footer-widget-5" class="footer-widget">
					<?php dynamic_sidebar( 'footer-5' ); ?>
				</div>
			<?php
		}

		if ( is_active_sidebar( 'footer-6' ) ) {
			?>
				<div id="footer-widget-6" class="footer-widget">
					<?php dynamic_sidebar( 'footer-6' ); ?>
				</div>
			<?php
		}

		?>
	</aside>

<?php endif; ?>
