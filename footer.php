<?php
/**
 * The template for displaying the footer
 *
 * @package Aino
 */

?>

	</div><!-- #content -->
</div><!-- .content-wrap -->

	<footer id="colophon" class="site-footer">

		<div class="footer-wrap col12 push-center">

		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>

		<div class="footer-info grid-margins">

		<?php get_template_part( 'template-parts/footer/footer', 'menu-social' ); ?>

		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>

		<?php get_template_part( 'template-parts/footer/footer', 'menu' ); ?>

		</div>

		</div><!-- .footer-wrap -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<div id="top-of-site-pixel-anchor"></div>

<?php wp_footer(); ?>

</body>
</html>
