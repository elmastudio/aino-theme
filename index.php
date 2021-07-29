<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aino
 */
get_header();

// the query
echo gutenberg_block_template_part( 'index' );

get_footer();
