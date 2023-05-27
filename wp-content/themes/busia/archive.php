<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package radiantthemes
 */
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php include get_parent_theme_file_path( '/inc/blog/blog-' . get_theme_mod( 'blog-style', 'default' ) . '.php' ); ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
	get_footer();
