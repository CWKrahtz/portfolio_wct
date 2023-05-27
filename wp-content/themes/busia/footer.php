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
		</div>
		<!-- #content -->
	</div>
	<!-- #page -->
<?php
wp_reset_postdata();
if ( get_post_type( get_the_ID() ) == 'elementor_library' || get_post_type( get_the_ID() ) == 'mega_menu') {
} else {
	$footerBuilder_id = esc_html( get_post_meta( get_the_ID(), 'custom_footer', true ) );
	if ( $footerBuilder_id ) {
		$template = get_page_by_path( $footerBuilder_id, OBJECT, 'elementor_library' );
		if ( true == get_theme_mod( 'footer_custom_stucking' ) && ! wp_is_mobile() ) {
			echo '<div class="footer-custom-stucking-container"></div>
			<footer class="wraper_footer custom-footer footer-custom-stucking-mode">';
		} else {
			echo '<footer class="wraper_footer custom-footer">';
		}
		echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template->ID );
		echo '</footer>';
	} else {
		include get_parent_theme_file_path( 'inc/footer/footer-style-default.php' );
	}
}
?>
	</div>
<!-- radiantthemes-website-layout -->
<?php wp_footer(); ?>
	</body>
</html>
