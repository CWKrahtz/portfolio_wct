<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package radiantthemes
 */
get_header();
?>
<?php include get_parent_theme_file_path( '/inc/single/single-' . get_theme_mod( 'blog_single_layout_style', 'default' ) . '.php' ); ?>
<?php
get_footer();
