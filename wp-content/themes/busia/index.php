<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package radiantthemes
 */
get_header(); ?>
<?php
if (empty($_REQUEST['blog-style'])) {
    $_REQUEST['blog-style']=0;
}?>
<div id="primary" class="content-area">
	<main id="main" <?php post_class( 'site-main' ); ?> >
		<?php if ( $_REQUEST['blog-style'] ) : ?>
		<?php include get_parent_theme_file_path( '/inc/blog/blog-' .$_REQUEST['blog-style'] . '.php' ); ?>
	<?php else : ?>
		<?php include get_parent_theme_file_path( '/inc/blog/blog-' . get_theme_mod( 'blog-style', 'default' ) . '.php' ); ?>
	<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
	get_footer();
