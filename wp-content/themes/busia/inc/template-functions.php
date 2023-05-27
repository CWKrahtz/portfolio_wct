<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package radiantthemes
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function busia_body_classes( $classes ) {
	$classes[] = 'radiantthemes';
	$classes[] = 'radiantthemes-' . get_template();
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'busia_body_classes' );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function busia_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'busia_pingback_header' );
/**
 * Customize the title for the 404 page.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function busia_change_404_title($title) {
    if (is_404()) {
        $title = esc_html__( 'Page Not Found', 'busia' );
    }
    return $title;
}
add_filter( 'pre_get_document_title', 'busia_change_404_title', 50 );
/**
 * Adjust the quantity input values for Simple Products
 *
 * @param array $args Arguments.
 * @param array $product Product.
 *
 * @return array
 */
function busia_woocommerce_quantity_input_args( $args, $product ) {
	$args['input_value'] = empty( $args['input_value'] ) ? 1 : $args['input_value'];
	$args['max_value']   = 100; // Maximum value.
	return $args;
}
add_filter( 'woocommerce_quantity_input_args', 'busia_woocommerce_quantity_input_args', 10, 2 ); // Simple products.
/**
 * Adjust the quantity input values for Variable Products
 *
 * @param array $args Arguments.
 * @return array
 */
function busia_woocommerce_available_variation( $args ) {
	$args['max_qty'] = 100; // Maximum value (variations).
	return $args;
}
add_filter( 'woocommerce_available_variation', 'busia_woocommerce_available_variation' ); // Variations.
