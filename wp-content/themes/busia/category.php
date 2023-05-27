<?php
/**
 * The template for displaying category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package radiantthemes
 */
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
	
		<?php if ( get_theme_mod( 'blog-style' ) ) : ?>
		<?php include get_parent_theme_file_path( '/inc/blog/blog-' .get_theme_mod( 'blog-style' ) . '.php' ); ?>
	<?php else : ?>
		<?php include get_parent_theme_file_path( '/inc/blog/blog-' . get_theme_mod( 'blog-style', 'default' ) . '.php' ); ?>
	<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
