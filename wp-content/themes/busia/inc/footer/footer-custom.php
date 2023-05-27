<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package radiantthemes
 */
?>
<?php
$footerBuilder_id = get_theme_mod( 'footer_list_text' );
?>
<!-- wraper_footer -->
<?php if ( true == get_theme_mod( 'footer_custom_stucking' ) && ! wp_is_mobile() ) { ?>
	<div class="footer-custom-stucking-container"></div>
	<footer class="wraper_footer custom-footer footer-custom-stucking-mode">
<?php } else { ?>
	<footer class="wraper_footer custom-footer">
<?php } ?>	
		<?php echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footerBuilder_id ); ?>	
</footer>
<!-- wraper_footer -->
