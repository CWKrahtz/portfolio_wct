<?php
/**
 * RadiantThemes functions and definitions
 *
 * @link //developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RadiantThemes
 */

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );
/**
 * Return the Google font stylesheet URL if available.
 */
function busia_get_font_url() {
	$fonts_url = '';
	$subsets   = 'latin';
	$defaults  = busia_generate_defaults();
	$bodyFont = json_decode( get_theme_mod( 'body_font_select', $defaults['body_font_select'] ), true );
	
	$h1Font          = json_decode( get_theme_mod( 'h1_font_select', $defaults['h1_font_select'] ), true );
	$h2Font          = json_decode( get_theme_mod( 'h2_font_select', $defaults['h2_font_select'] ), true );
	$h3Font          = json_decode( get_theme_mod( 'h3_font_select', $defaults['h3_font_select'] ), true );
	$h4Font          = json_decode( get_theme_mod( 'h4_font_select', $defaults['h4_font_select'] ), true );
	$h5Font          = json_decode( get_theme_mod( 'h5_font_select', $defaults['h5_font_select'] ), true );
	$h6Font          = json_decode( get_theme_mod( 'h6_font_select', $defaults['h6_font_select'] ), true );
	$h6Font          = json_decode( get_theme_mod( 'breadcrumb_font', $defaults['breadcrumb_font'] ), true );
	$breadcrumb_font = json_decode( get_theme_mod( 'breadcrumb_font', $defaults['breadcrumb_font'] ), true );
	if ( 'off' !== $bodyFont || 'off' !== $h1Font || 'off' !== $h2Font || 'off' !== $h3Font || 'off' !== $h4Font || 'off' !== $h5Font || 'off' !== $h6Font || 'off' !== $breadcrumb_font ) {
		$font_families = array();
		if ( 'off' !== $bodyFont ) {
			$font_families[] = $bodyFont['font'] . ':' . $bodyFont['fontweight'];
		}
		if ( 'off' !== $h1Font ) {
			$font_families[] = $h1Font['font'] . ':' . $h1Font['fontweight'];
		}
		if ( 'off' !== $h2Font ) {
			$font_families[] = $h2Font['font'] . ':' . $h2Font['fontweight'];
		}
		if ( 'off' !== $h3Font ) {
			$font_families[] = $h3Font['font'] . ':' . $h3Font['fontweight'];
		}
		if ( 'off' !== $h4Font ) {
			$font_families[] = $h4Font['font'] . ':' . $h4Font['fontweight'];
		}
		if ( 'off' !== $h5Font ) {
			$font_families[] = $h5Font['font'] . ':' . $h5Font['fontweight'];
		}
		if ( 'off' !== $h6Font ) {
			$font_families[] = $h6Font['font'] . ':' . $h6Font['fontweight'];
		}
		if ( 'off' !== $breadcrumb_font ) {
			$font_families[] = $breadcrumb_font['font'] . ':' . $breadcrumb_font['fontweight'];
		}
		$query_args = array(
			'family'  => urlencode( implode( '|', $font_families ) ),
			'subset'  => urlencode( $subsets ),
			'display' => urlencode( 'fallback' ),
		);
		$fonts_url  = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
/**
 * Enqueue scripts for our Customizer preview
 *
 * @return void
 */
if ( ! function_exists( 'busia_customizer_preview_scripts' ) ) {
	function busia_customizer_preview_scripts() {
		wp_enqueue_script(
			'radiantthemes-customizer-preview',
			trailingslashit( get_template_directory_uri() ) . 'assets/js/customizer-preview.js',
			array( 'customize-preview', 'jquery' ),
			time(),
			true
		);
	}
}
add_action( 'customize_preview_init', 'busia_customizer_preview_scripts' );
/**
 * Output our Customizer styles in the site header
 */
function busia_customizer_css_styles() {
	$defaults = busia_generate_defaults();
	$styles   = '';
	$bodyFont         = json_decode( get_theme_mod( 'body_font_select', $defaults['body_font_select'] ), true );
	$custom_body_font = get_theme_mod( 'custom_body_font_select' );
	$h1Font         = json_decode( get_theme_mod( 'h1_font_select', $defaults['h1_font_select'] ), true );
	$custom_h1_font = get_theme_mod( 'custom_h1_font_select' );
	$h2Font         = json_decode( get_theme_mod( 'h2_font_select', $defaults['h2_font_select'] ), true );
	$custom_h2_font = get_theme_mod( 'custom_h2_font_select' );
	$h3Font         = json_decode( get_theme_mod( 'h3_font_select', $defaults['h3_font_select'] ), true );
	$custom_h3_font = get_theme_mod( 'custom_h3_font_select' );
	$h4Font         = json_decode( get_theme_mod( 'h4_font_select', $defaults['h4_font_select'] ), true );
	$custom_h4_font = get_theme_mod( 'custom_h4_font_select' );
	$h5Font         = json_decode( get_theme_mod( 'h5_font_select', $defaults['h5_font_select'] ), true );
	$custom_h5_font = get_theme_mod( 'custom_h5_font_select' );
	$h6Font         = json_decode( get_theme_mod( 'h6_font_select', $defaults['h6_font_select'] ), true );
	$custom_h6_font = get_theme_mod( 'custom_h6_font_select' );
	$body_color = get_theme_mod( 'body_color_select', $defaults['body_color_select'] );
	$h1_color   = get_theme_mod( 'h1_color_select', $defaults['h1_color_select'] );
	$h2_color   = get_theme_mod( 'h2_color_select', $defaults['h2_color_select'] );
	$h3_color   = get_theme_mod( 'h3_color_select', $defaults['h3_color_select'] );
	$h4_color   = get_theme_mod( 'h4_color_select', $defaults['h4_color_select'] );
	$h5_color   = get_theme_mod( 'h5_color_select', $defaults['h5_color_select'] );
	$h6_color   = get_theme_mod( 'h6_color_select', $defaults['h6_color_select'] );
	$button_typography             = json_decode( get_theme_mod( 'button_typography', $defaults['button_typography'] ), true );
	$button_background_color       = get_theme_mod( 'button_background_color' );
	$button_background_color_hover = get_theme_mod( 'button_background_color_hover');
	$button_typography_color       = get_theme_mod( 'button_typography_color');
	$button_typography_hover       = get_theme_mod( 'button_typography_hover');
	$button_padding_top            = get_theme_mod( 'button_padding_top');
	$button_padding_right          = get_theme_mod( 'button_padding_right');
	$button_padding_bottom         = get_theme_mod( 'button_padding_bottom');
	$button_padding_left           = get_theme_mod( 'button_padding_left');
	$button_padding_unit           = get_theme_mod( 'button_padding_unit' );
	$short_header_bg_color            = get_theme_mod( 'short_header_bg_color' );
	$short_header_bg_media            = get_theme_mod( 'short_header_bg_media' );
	$short_header_bg_repeat           = get_theme_mod( 'short_header_bg_repeat' );
	$short_header_bg_size             = get_theme_mod( 'short_header_bg_size' );
	$short_header_bg_attachment       = get_theme_mod( 'short_header_bg_attachment' );
	$short_header_bg_pos              = get_theme_mod( 'short_header_bg_pos' );
	$short_header_border_bottom_color = get_theme_mod( 'radiant_alpha_color_picker' );
	$short_header_padding_top         = get_theme_mod( 'inner_page_padding_top', '10' );
	$short_header_padding_bottom      = get_theme_mod( 'inner_page_padding_bottom', '10' );
	$short_header_padding_unit        = get_theme_mod( 'inner_page_padding_unit', 'px' );
	$inner_page_banner_title_font    = json_decode( get_theme_mod( 'inner_page_banner_title_font', $defaults['inner_page_banner_title_font'] ), true );
	$inner_page_banner_subtitle_font = json_decode( get_theme_mod( 'inner_page_banner_subtitle_font', $defaults['inner_page_banner_subtitle_font'] ), true );
	$breadcrumb_font           = json_decode( get_theme_mod( 'breadcrumb_font', $defaults['breadcrumb_font'] ), true );
	$breadcrumb_padding_top    = get_theme_mod( 'breadcrumb_padding_top', '10' );
	$breadcrumb_padding_bottom = get_theme_mod( 'breadcrumb_padding_bottom', '10' );
	$breadcrumb_padding_unit   = get_theme_mod( 'breadcrumb_padding_unit', 'px' );
	$scroll_to_top_background_color = get_theme_mod( 'scroll_to_top_background_color', '#ffffff' );
	$scroll_to_top_icon_color       = get_theme_mod( 'scroll_to_top_icon_color', '##F4245F' );
	for ( $i = 1; $i <= 10; $i++ ) {
		if ( get_theme_mod( 'webfontName' . $i ) ) {
			$styles .= '@font-face {';
			$styles .= 'font-family:"' . esc_attr( get_theme_mod( 'webfontName' . $i ) ) . '";';
			$styles .= "src: url('";
			$styles .= wp_get_attachment_url( get_theme_mod( 'webfontFile' . $i ) ) . ';';
			$styles .= "')";
			$styles .= '}';
		}
	}
	// Header One Styles
	$styles .= 'h1 {';
	if ( ! empty( $custom_h1_font ) ) {
		$styles .= "font-family: '" . $custom_h1_font . "';";
	} else {
		$styles .= "font-family:'" . $h1Font['font'] . "'," . $h1Font['category'] . ';';
		$styles .= 'font-weight:' . ( $h1Font['fontweight'] == 'regular' ? 'normal' : $h1Font['fontweight'] ) . ';';
	}
	$styles .= $h1Font['textalign'] ? 'text-align:' . ( $h1Font['textalign'] ) . ';' : '';
	$styles .= $h1Font['texttransform'] ? 'text-transform:' . ( $h1Font['texttransform'] ) . ';' : '';
	$styles .= $h1Font['textsize'] ? 'font-size:' . ( $h1Font['textsize'] ) . ( $h1Font['textsizeunit'] ) . ';' : '';
	$styles .= $h1Font['textlineheight'] ? 'line-height:' . ( $h1Font['textlineheight'] ) . ( $h1Font['lineheightunit'] ) . ' ;' : '';
	$styles .= $h1Font['textletterspacing'] ? 'letter-spacing:' . ( $h1Font['textletterspacing'] ) . ( $h1Font['letterspacingunit'] ) . ';' : '';
	$styles .= $h1Font['textmargintop'] ? 'margin-top:' . ( $h1Font['textmargintop'] ) . ( $h1Font['textmargintopunit'] ) . ';' : '';
	$styles .= $h1Font['textmarginright'] ? 'margin-right:' . ( $h1Font['textmarginright'] ) . ( $h1Font['textmarginrightunit'] ) . ';' : '';
	$styles .= $h1Font['textmarginbottom'] ? 'margin-bottom:' . ( $h1Font['textmarginbottom'] ) . ( $h1Font['textmarginbottomunit'] ) . ';' : '';
	$styles .= $h1Font['textmarginleft'] ? 'margin-left:' . ( $h1Font['textmarginleft'] ) . ( $h1Font['textmarginleftunit'] ) . ';' : '';
	$styles .= $h1_color ? 'color:' . ( $h1_color ) . ';' : '';
	$styles .= '}';
	// Header Two Styles
	$styles .= 'h2 {';
	$styles .= "font-family:'" . $h2Font['font'] . "'," . $h2Font['category'] . ';';
	$styles .= 'font-weight:' . ( $h2Font['fontweight'] == 'regular' ? 'normal' : $h2Font['fontweight'] ) . ';';
	$styles .= $h2Font['textalign'] ? 'text-align:' . ( $h2Font['textalign'] ) . ';' : '';
	$styles .= $h2Font['texttransform'] ? 'text-transform:' . ( $h2Font['texttransform'] ) . ';' : '';
	$styles .= $h2Font['textsize'] ? 'font-size:' . ( $h2Font['textsize'] ) . ( $h2Font['textsizeunit'] ) . ';' : '';
	$styles .= $h2Font['textlineheight'] ? 'line-height:' . ( $h2Font['textlineheight'] ) . ( $h2Font['lineheightunit'] ) . ' ;' : '';
	$styles .= $h2Font['textletterspacing'] ? 'letter-spacing:' . ( $h2Font['textletterspacing'] ) . ( $h2Font['letterspacingunit'] ) . ';' : '';
	$styles .= $h2Font['textmargintop'] ? 'margin-top:' . ( $h2Font['textmargintop'] ) . ( $h2Font['textmargintopunit'] ) . ';' : '';
	$styles .= $h2Font['textmarginright'] ? 'margin-right:' . ( $h2Font['textmarginright'] ) . ( $h2Font['textmarginrightunit'] ) . ';' : '';
	$styles .= $h2Font['textmarginbottom'] ? 'margin-bottom:' . ( $h2Font['textmarginbottom'] ) . ( $h2Font['textmarginbottomunit'] ) . ';' : '';
	$styles .= $h2Font['textmarginleft'] ? 'margin-left:' . ( $h2Font['textmarginleft'] ) . ( $h2Font['textmarginleftunit'] ) . ';' : '';
	$styles .= $h2_color ? 'color:' . ( $h2_color ) . ';' : '';
	$styles .= '}';
	// Header Three Styles
	$styles .= 'h3 {';
	$styles .= "font-family:'" . $h3Font['font'] . "'," . $h3Font['category'] . ';';
	$styles .= 'font-weight:' . ( $h3Font['fontweight'] == 'regular' ? 'normal' : $h3Font['fontweight'] ) . ';';
	$styles .= $h3Font['textalign'] ? 'text-align:' . ( $h3Font['textalign'] ) . ';' : '';
	$styles .= $h3Font['texttransform'] ? 'text-transform:' . ( $h3Font['texttransform'] ) . ';' : '';
	$styles .= $h3Font['textsize'] ? 'font-size:' . ( $h3Font['textsize'] ) . ( $h3Font['textsizeunit'] ) . ';' : '';
	$styles .= $h3Font['textlineheight'] ? 'line-height:' . ( $h3Font['textlineheight'] ) . ( $h3Font['lineheightunit'] ) . ' ;' : '';
	$styles .= $h3Font['textletterspacing'] ? 'letter-spacing:' . ( $h3Font['textletterspacing'] ) . ( $h3Font['letterspacingunit'] ) . ' ;' : '';
	$styles .= $h3Font['textmargintop'] ? 'margin-top:' . ( $h3Font['textmargintop'] ) . ( $h3Font['textmargintopunit'] ) . ';' : '';
	$styles .= $h3Font['textmarginright'] ? 'margin-right:' . ( $h3Font['textmarginright'] ) . ( $h3Font['textmarginrightunit'] ) . ';' : '';
	$styles .= $h3Font['textmarginbottom'] ? 'margin-bottom:' . ( $h3Font['textmarginbottom'] ) . ( $h3Font['textmarginbottomunit'] ) . ';' : '';
	$styles .= $h3Font['textmarginleft'] ? 'margin-left:' . ( $h3Font['textmarginleft'] ) . ( $h3Font['textmarginleftunit'] ) . ';' : '';
	$styles .= $h3_color ? 'color:' . ( $h3_color ) . ';' : '';
	$styles .= '}';
	// Header Four Styles
	$styles .= 'h4 {';
	$styles .= "font-family:'" . $h4Font['font'] . "'," . $h4Font['category'] . ';';
	$styles .= 'font-weight:' . ( $h4Font['fontweight'] == 'regular' ? 'normal' : $h4Font['fontweight'] ) . ';';
	$styles .= $h4Font['textalign'] ? 'text-align:' . ( $h4Font['textalign'] ) . ';' : '';
	$styles .= $h4Font['texttransform'] ? 'text-transform:' . ( $h4Font['texttransform'] ) . ';' : '';
	$styles .= $h4Font['textsize'] ? 'font-size:' . ( $h4Font['textsize'] ) . ( $h4Font['textsizeunit'] ) . ';' : '';
	$styles .= $h4Font['textlineheight'] ? 'line-height:' . ( $h4Font['textlineheight'] ) . ( $h4Font['lineheightunit'] ) . ' ;' : '';
	$styles .= $h4Font['textletterspacing'] ? 'letter-spacing:' . ( $h4Font['textletterspacing'] ) . ( $h4Font['letterspacingunit'] ) . ';' : '';
	$styles .= $h4Font['textmargintop'] ? 'margin-top:' . ( $h4Font['textmargintop'] ) . ( $h4Font['textmargintopunit'] ) . ';' : '';
	$styles .= $h4Font['textmarginright'] ? 'margin-right:' . ( $h4Font['textmarginright'] ) . ( $h4Font['textmarginrightunit'] ) . ';' : '';
	$styles .= $h4Font['textmarginbottom'] ? 'margin-bottom:' . ( $h4Font['textmarginbottom'] ) . ( $h4Font['textmarginbottomunit'] ) . ';' : '';
	$styles .= $h4Font['textmarginleft'] ? 'margin-left:' . ( $h4Font['textmarginleft'] ) . ( $h4Font['textmarginleftunit'] ) . ';' : '';
	$styles .= $h4_color ? 'color:' . ( $h4_color ) . ';' : '';
	$styles .= '}';
	// Header Five Styles
	$styles .= 'h5 {';
	$styles .= "font-family:'" . $h5Font['font'] . "'," . $h5Font['category'] . ';';
	$styles .= 'font-weight:' . ( $h5Font['fontweight'] == 'regular' ? 'normal' : $h5Font['fontweight'] ) . ';';
	$styles .= $h5Font['textalign'] ? 'text-align:' . ( $h5Font['textalign'] ) . ';' : '';
	$styles .= $h5Font['texttransform'] ? 'text-transform:' . ( $h5Font['texttransform'] ) . ';' : '';
	$styles .= $h5Font['textsize'] ? 'font-size:' . ( $h5Font['textsize'] ) . ( $h5Font['textsizeunit'] ) . ';' : '';
	$styles .= $h5Font['textlineheight'] ? 'line-height:' . ( $h5Font['textlineheight'] ) . ( $h5Font['lineheightunit'] ) . ' ;' : '';
	$styles .= $h5Font['textletterspacing'] ? 'letter-spacing:' . ( $h5Font['textletterspacing'] ) . ( $h5Font['letterspacingunit'] ) . ' ;' : '';
	$styles .= $h5Font['textmargintop'] ? 'margin-top:' . ( $h5Font['textmargintop'] ) . ( $h5Font['textmargintopunit'] ) . ';' : '';
	$styles .= $h5Font['textmarginright'] ? 'margin-right:' . ( $h5Font['textmarginright'] ) . ( $h5Font['textmarginrightunit'] ) . ';' : '';
	$styles .= $h5Font['textmarginbottom'] ? 'margin-bottom:' . ( $h5Font['textmarginbottom'] ) . ( $h5Font['textmarginbottomunit'] ) . ';' : '';
	$styles .= $h5Font['textmarginleft'] ? 'margin-left:' . ( $h5Font['textmarginleft'] ) . ( $h5Font['textmarginleftunit'] ) . ';' : '';
	$styles .= $h5_color ? 'color:' . ( $h5_color ) . ';' : '';
	$styles .= '}';
	// Header Six Styles
	$styles .= 'h6 {';
	$styles .= "font-family:'" . $h6Font['font'] . "'," . $h6Font['category'] . ';';
	$styles .= 'font-weight:' . ( $h6Font['fontweight'] == 'regular' ? 'normal' : $h6Font['fontweight'] ) . ';';
	$styles .= $h6Font['textalign'] ? 'text-align:' . ( $h6Font['textalign'] ) . ';' : '';
	$styles .= $h6Font['texttransform'] ? 'text-transform:' . ( $h6Font['texttransform'] ) . ';' : '';
	$styles .= $h6Font['textsize'] ? 'font-size:' . ( $h6Font['textsize'] ) . ( $h6Font['textsizeunit'] ) . ';' : '';
	$styles .= $h6Font['textlineheight'] ? 'line-height:' . ( $h6Font['textlineheight'] ) . ( $h6Font['lineheightunit'] ) . ' ;' : '';
	$styles .= $h6Font['textletterspacing'] ? 'letter-spacing:' . ( $h6Font['textletterspacing'] ) . ( $h6Font['letterspacingunit'] ) . ';' : '';
	$styles .= $h6Font['textmargintop'] ? 'margin-top:' . ( $h6Font['textmargintop'] ) . ( $h6Font['textmargintopunit'] ) . ';' : '';
	$styles .= $h6Font['textmarginright'] ? 'margin-right:' . ( $h6Font['textmarginright'] ) . ( $h6Font['textmarginrightunit'] ) . ';' : '';
	$styles .= $h6Font['textmarginbottom'] ? 'margin-bottom:' . ( $h6Font['textmarginbottom'] ) . ( $h6Font['textmarginbottomunit'] ) . ';' : '';
	$styles .= $h6Font['textmarginleft'] ? 'margin-left:' . ( $h6Font['textmarginleft'] ) . ( $h6Font['textmarginleftunit'] ) . ';' : '';
	$styles .= $h6_color ? 'color:' . ( $h6_color ) . ';' : '';
	$styles .= '}';
	// Body Typography Styles
	$styles .= 'body, p {';
	$styles .= "font-family:'" . $bodyFont['font'] . "'," . $bodyFont['category'] . ';';
	$styles .= 'font-weight:' . ( $bodyFont['fontweight'] == 'regular' ? 'normal' : $bodyFont['fontweight'] ) . ';';
	$styles .= $bodyFont['textalign'] ? 'text-align:' . ( $bodyFont['textalign'] ) . ';' : '';
	$styles .= $bodyFont['texttransform'] ? 'text-transform:' . ( $bodyFont['texttransform'] ) . ';' : '';
	$styles .= $bodyFont['textsize'] ? 'font-size:' . ( $bodyFont['textsize'] ) . ( $bodyFont['textsizeunit'] ) . ';' : '';
	$styles .= $bodyFont['textlineheight'] ? 'line-height:' . ( $bodyFont['textlineheight'] ) . ( $bodyFont['lineheightunit'] ) . ' ;' : '';
	$styles .= $bodyFont['textletterspacing'] ? 'letter-spacing:' . ( $bodyFont['textletterspacing'] ) . ( $bodyFont['letterspacingunit'] ) . ';' : '';
	$styles .= $bodyFont['textmargintop'] ? 'margin-top:' . ( $bodyFont['textmargintop'] ) . ( $bodyFont['textmargintopunit'] ) . ';' : '';
	$styles .= $bodyFont['textmarginright'] ? 'margin-right:' . ( $bodyFont['textmarginright'] ) . ( $bodyFont['textmarginrightunit'] ) . ';' : '';
	$styles .= $bodyFont['textmarginbottom'] ? 'margin-bottom:' . ( $bodyFont['textmarginbottom'] ) . ( $bodyFont['textmarginbottomunit'] ) . ';' : '';
	$styles .= $bodyFont['textmarginleft'] ? 'margin-left:' . ( $bodyFont['textmarginleft'] ) . ( $bodyFont['textmarginleftunit'] ) . ';' : '';
	$styles .= $body_color ? 'color:' . ( $body_color ) . ';' : '';
	$styles .= '}';
	// Button Typography Styles
	$styles .= '.radiantthemes-button > .radiantthemes-button-main, .radiantthemes-custom-button > .radiantthemes-custom-button-main, .gdpr-notice .btn, .widget-area > .widget.widget_price_filter .button, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn, .comments-area .comment-form > p button[type=submit], .comments-area .comment-form > p button[type=reset], .wraper_error_main.style-one .error_main .btn, .wraper_error_main.style-two .error_main .btn, .wraper_error_main.style-three .error_main_item .btn, .wraper_error_main.style-four .error_main .btn {';
	$styles .= "font-family:'" . $button_typography['font'] . "'," . $button_typography['category'] . ';';
	$styles .= 'font-weight:' . ( $button_typography['fontweight'] == 'regular' ? 'normal' : $button_typography['fontweight'] ) . ';';
	$styles .= $button_typography['textalign'] ? 'text-align:' . ( $button_typography['textalign'] ) . ';' : '';
	$styles .= $button_typography['texttransform'] ? 'text-transform:' . ( $button_typography['texttransform'] ) . ';' : '';
	$styles .= $button_typography['textsize'] ? 'font-size:' . ( $button_typography['textsize'] ) . ( $button_typography['textsizeunit'] ) . ';' : '';
	$styles .= $button_typography['textlineheight'] ? 'line-height:' . ( $button_typography['textlineheight'] ) . ( $button_typography['lineheightunit'] ) . ' !important;' : '';
	$styles .= $button_typography['textletterspacing'] ? 'letter-spacing:' . ( $button_typography['textletterspacing'] ) . ( $button_typography['letterspacingunit'] ) . ';' : '';
	$styles .= $button_background_color ? 'background-color:' . ( $button_background_color ) . ';' : '';
	$styles .= $button_typography_color ? 'color:' . ( $button_typography_color ) . ';' : '';
	$styles .= $button_padding_top ? 'padding-top:' . ( $button_padding_top ) . ( $button_padding_unit ) . ';' : '';
	$styles .= $button_padding_right ? 'padding-right:' . ( $button_padding_right ) . ( $button_padding_unit ) . ';' : '';
	$styles .= $button_padding_bottom ? 'padding-bottom:' . ( $button_padding_bottom ) . ( $button_padding_unit ) . ';' : '';
	$styles .= $button_padding_left ? 'padding-left:' . ( $button_padding_left ) . ( $button_padding_unit ) . ';' : '';
	$styles .= '}';
	$styles .= '.radiantthemes-button > .radiantthemes-button-main:hover, .radiantthemes-custom-button > .radiantthemes-custom-button-main:hover, .gdpr-notice .btn:hover,  .widget-area > .widget.widget_price_filter .button:hover, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .page.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .tribe_events.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .testimonial.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .team.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .portfolio.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .case-studies.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .client.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .product.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:before, .comments-area .comment-form > p button[type=reset]:hover, .wraper_error_main.style-one .error_main .btn:hover, .wraper_error_main.style-two .error_main .btn:hover, .wraper_error_main.style-three .error_main_item .btn:hover, .wraper_error_main.style-four .error_main .btn:hover, .post.style-default .entry-main .entry-extra .entry-extra-item .post-read-more .btn:hover span,.widget-area > .widget.widget_search .search-form input[type="submit"]:hover {';
	$styles .= $button_background_color_hover ? 'background-color:' . ( $button_background_color_hover ) . ';' : '';
	$styles .= $button_typography_hover ? 'color:' . ( $button_typography_hover ) . ';' : '';
	$styles .= '}';
	$styles .= '.wraper_inner_banner {';
	$styles .= $short_header_bg_color ? 'background-color: ' . ( $short_header_bg_color ) . ';' : '';
	$styles .= $short_header_bg_media ? "background-image:url( '" . ( wp_get_attachment_image_url( $short_header_bg_media, 'full' ) ) . " ');" : '';
	$styles .= $short_header_bg_repeat ? 'background-repeat: ' . ( $short_header_bg_repeat ) . ';' : '';
	$styles .= $short_header_bg_size ? 'background-size: ' . ( $short_header_bg_size ) . ';' : '';
	$styles .= $short_header_bg_attachment ? 'background-attachment: ' . ( $short_header_bg_attachment ) . ';' : '';
	$styles .= $short_header_bg_pos ? 'background-position: ' . ( $short_header_bg_pos ) . ';' : '';
	$styles .= '}';
	$styles .= '.wraper_inner_banner_main {';
	$styles .= $short_header_border_bottom_color ? 'border-bottom-color: ' . ( $short_header_border_bottom_color ) . ';' : '';
	$styles .= '}';
	$styles .= '.wraper_inner_banner_main > .container {';
	$styles .= $short_header_padding_top ? 'padding-top: ' . ( $short_header_padding_top ) . ( $short_header_padding_unit ) . ';' : '';
	$styles .= $short_header_padding_bottom ? 'padding-bottom: ' . ( $short_header_padding_bottom ) . ( $short_header_padding_unit ) . ';' : '';
	$styles .= '}';
	$styles .= '.inner_banner_main .title {';
	$styles .= "font-family:'" . $inner_page_banner_title_font['font'] . "'," . $inner_page_banner_title_font['category'] . ';';
	$styles .= 'font-weight:' . ( $inner_page_banner_title_font['fontweight'] == 'regular' ? 'normal' : $inner_page_banner_title_font['fontweight'] ) . ';';
	$styles .= $inner_page_banner_title_font['textalign'] ? 'text-align:' . ( $inner_page_banner_title_font['textalign'] ) . ';' : '';
	$styles .= $inner_page_banner_title_font['texttransform'] ? 'text-transform:' . ( $inner_page_banner_title_font['texttransform'] ) . ';' : '';
	$styles .= $inner_page_banner_title_font['textsize'] ? 'font-size:' . ( $inner_page_banner_title_font['textsize'] ) . ( $inner_page_banner_title_font['textsizeunit'] ) . ';' : '';
	$styles .= $inner_page_banner_title_font['textlineheight'] ? 'line-height:' . ( $inner_page_banner_title_font['textlineheight'] ) . ( $inner_page_banner_title_font['lineheightunit'] ) . ';' : '';
	$styles .= $inner_page_banner_title_font['textletterspacing'] ? 'letter-spacing:' . ( $inner_page_banner_title_font['textletterspacing'] ) . ( $inner_page_banner_title_font['letterspacingunit'] ) . ';' : '';
	$styles .= $inner_page_banner_title_font['textmargintop'] ? 'margin-top:' . ( $inner_page_banner_title_font['textmargintop'] ) . ( $inner_page_banner_title_font['textmargintopunit'] ) . ';' : '';
	$styles .= $inner_page_banner_title_font['textmarginright'] ? 'margin-right:' . ( $inner_page_banner_title_font['textmarginright'] ) . ( $inner_page_banner_title_font['textmarginrightunit'] ) . ';' : '';
	$styles .= $inner_page_banner_title_font['textmarginbottom'] ? 'margin-bottom:' . ( $inner_page_banner_title_font['textmarginbottom'] ) . ( $inner_page_banner_title_font['textmarginbottomunit'] ) . ';' : '';
	$styles .= $inner_page_banner_title_font['textmarginleft'] ? 'margin-left:' . ( $inner_page_banner_title_font['textmarginleft'] ) . ( $inner_page_banner_title_font['textmarginleftunit'] ) . ';' : '';
	$styles .= '}';
	$styles .= '.inner_banner_main .subtitle {';
	$styles .= "font-family:'" . $inner_page_banner_subtitle_font['font'] . "'," . $inner_page_banner_subtitle_font['category'] . ';';
	$styles .= 'font-weight:' . ( $inner_page_banner_subtitle_font['fontweight'] == 'regular' ? 'normal' : $inner_page_banner_subtitle_font['fontweight'] ) . ';';
	$styles .= $inner_page_banner_subtitle_font['textalign'] ? 'text-align:' . ( $inner_page_banner_subtitle_font['textalign'] ) . ';' : '';
	$styles .= $inner_page_banner_subtitle_font['texttransform'] ? 'text-transform:' . ( $inner_page_banner_subtitle_font['texttransform'] ) . ';' : '';
	$styles .= $inner_page_banner_subtitle_font['textsize'] ? 'font-size:' . ( $inner_page_banner_subtitle_font['textsize'] ) . ( $inner_page_banner_subtitle_font['textsizeunit'] ) . ';' : '';
	$styles .= $inner_page_banner_subtitle_font['textlineheight'] ? 'line-height:' . ( $inner_page_banner_subtitle_font['textlineheight'] ) . ( $inner_page_banner_subtitle_font['lineheightunit'] ) . ';' : '';
	$styles .= $inner_page_banner_subtitle_font['textletterspacing'] ? 'letter-spacing:' . ( $inner_page_banner_subtitle_font['textletterspacing'] ) . ( $inner_page_banner_subtitle_font['letterspacingunit'] ) . ';' : '';
	$styles .= $inner_page_banner_subtitle_font['textmargintop'] ? 'margin-top:' . ( $inner_page_banner_subtitle_font['textmargintop'] ) . ( $inner_page_banner_subtitle_font['textmargintopunit'] ) . ';' : '';
	$styles .= $inner_page_banner_subtitle_font['textmarginright'] ? 'margin-right:' . ( $inner_page_banner_subtitle_font['textmarginright'] ) . ( $inner_page_banner_subtitle_font['textmarginrightunit'] ) . ';' : '';
	$styles .= $inner_page_banner_subtitle_font['textmarginbottom'] ? 'margin-bottom:' . ( $inner_page_banner_subtitle_font['textmarginbottom'] ) . ( $inner_page_banner_subtitle_font['textmarginbottomunit'] ) . ';' : '';
	$styles .= $inner_page_banner_subtitle_font['textmarginleft'] ? 'margin-left:' . ( $inner_page_banner_subtitle_font['textmarginleft'] ) . ( $inner_page_banner_subtitle_font['textmarginleftunit'] ) . ';' : '';
	$styles .= '}';
	$styles .= '.inner_banner_breadcrumb #crumbs {';
	$styles .= "font-family:'" . $breadcrumb_font['font'] . "'," . $breadcrumb_font['category'] . ';';
	$styles .= 'font-weight:' . ( $breadcrumb_font['fontweight'] == 'regular' ? 'normal' : $breadcrumb_font['fontweight'] ) . ';';
	$styles .= $breadcrumb_font['textalign'] ? 'text-align:' . ( $breadcrumb_font['textalign'] ) . ';' : '';
	$styles .= $breadcrumb_font['texttransform'] ? 'text-transform:' . ( $breadcrumb_font['texttransform'] ) . ';' : '';
	$styles .= $breadcrumb_font['textsize'] ? 'font-size:' . ( $breadcrumb_font['textsize'] ) . ( $breadcrumb_font['textsizeunit'] ) . ';' : '';
	$styles .= $breadcrumb_font['textlineheight'] ? 'line-height:' . ( $breadcrumb_font['textlineheight'] ) . ( $breadcrumb_font['lineheightunit'] ) . ';' : '';
	$styles .= $breadcrumb_font['textletterspacing'] ? 'letter-spacing:' . ( $breadcrumb_font['textletterspacing'] ) . ( $breadcrumb_font['letterspacingunit'] ) . ';' : '';
	$styles .= $breadcrumb_font['textmargintop'] ? 'margin-top:' . ( $breadcrumb_font['textmargintop'] ) . ( $breadcrumb_font['textmargintopunit'] ) . ';' : '';
	$styles .= $breadcrumb_font['textmarginright'] ? 'margin-right:' . ( $breadcrumb_font['textmarginright'] ) . ( $breadcrumb_font['textmarginrightunit'] ) . ';' : '';
	$styles .= $breadcrumb_font['textmarginbottom'] ? 'margin-bottom:' . ( $breadcrumb_font['textmarginbottom'] ) . ( $breadcrumb_font['textmarginbottomunit'] ) . ';' : '';
	$styles .= $breadcrumb_font['textmarginleft'] ? 'margin-left:' . ( $breadcrumb_font['textmarginleft'] ) . ( $breadcrumb_font['textmarginleftunit'] ) . ';' : '';
	$styles .= '}';
	$styles .= '.wraper_inner_banner_main > .container {';
	$styles .= $breadcrumb_padding_top ? 'padding-top: ' . ( $breadcrumb_padding_top ) . ( $breadcrumb_padding_unit ) . ';' : '';
	$styles .= $breadcrumb_padding_bottom ? 'padding-bottom: ' . ( $breadcrumb_padding_bottom ) . ( $breadcrumb_padding_unit ) . ';' : '';
	$styles .= '}';
	$styles .= 'body > .scrollup {';
	$styles .= $scroll_to_top_background_color ? 'background-color: ' . ( $scroll_to_top_background_color ) . ';' : '';
	$styles .= '}';
	$styles .= 'body > .scrollup svg {';
	$styles .= $scroll_to_top_icon_color ? 'color: ' . ( $scroll_to_top_icon_color ) . ';' : '';
	$styles .= '}';
	wp_register_style( 'radiantthemes-customizer-css', false );
	wp_enqueue_style( 'radiantthemes-customizer-css' );
	wp_add_inline_style( 'radiantthemes-customizer-css', $styles );
}
add_action( 'wp_head', 'busia_customizer_css_styles' );
/**
* Set our Customizer default options
*/
if ( ! function_exists( 'busia_generate_defaults' ) ) {
	function busia_generate_defaults() {
		$customizer_defaults = array(
			'social_newtab'                   => 0,
			'social_urls'                     => '',
			'social_alignment'                => 'alignright',
			'social_rss'                      => 0,
			'social_url_icons'                => '',
			'contact_phone'                   => '',
			'search_menu_icon'                => 0,
			'button_typography'               => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '700',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'uppercase',
					'textsize'             => '14',
					'textsizeunit'         => 'px',
					'textlineheight'       => '24',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '4',
					'letterspacingunit'    => 'px',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'body_font_select'                => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '400',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => '',
					'textsize'             => '17',
					'textsizeunit'         => 'px',
					'textlineheight'       => '28',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '0',
					'letterspacingunit'    => 'px',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'h1_font_select'                  => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '700',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'uppercase',
					'textsize'             => '95',
					'textsizeunit'         => 'px',
					'textlineheight'       => '105',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '0.05',
					'letterspacingunit'    => 'em',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'h2_font_select'                  => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '700',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'uppercase',
					'textsize'             => '50',
					'textsizeunit'         => 'px',
					'textlineheight'       => '60',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '0.05',
					'letterspacingunit'    => 'em',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'h3_font_select'                  => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '700',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'uppercase',
					'textsize'             => '30',
					'textsizeunit'         => 'px',
					'textlineheight'       => '40',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '0.05',
					'letterspacingunit'    => 'em',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'h4_font_select'                  => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '700',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'uppercase',
					'textsize'             => '24',
					'textsizeunit'         => 'px',
					'textlineheight'       => '34',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '0.05',
					'letterspacingunit'    => 'em',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'h5_font_select'                  => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '700',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'uppercase',
					'textsize'             => '20',
					'textsizeunit'         => 'px',
					'textlineheight'       => '30',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '0.05',
					'letterspacingunit'    => 'em',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'h6_font_select'                  => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '700',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'uppercase',
					'textsize'             => '18',
					'textsizeunit'         => 'px',
					'textlineheight'       => '28',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '0.05',
					'letterspacingunit'    => 'em',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'body_color_select'               => '#676766',
			'h1_color_select'                 => '#262626',
			'h2_color_select'                 => '#262626',
			'h3_color_select'                 => '#262626',
			'h4_color_select'                 => '#262626',
			'h5_color_select'                 => '#262626',
			'h6_color_select'                 => '#262626',
			'inner_page_banner_title_font'    => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '600',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'capitalize',
					'textsize'             => '40',
					'textsizeunit'         => 'px',
					'textlineheight'       => '50',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '0',
					'letterspacingunit'    => 'px',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'inner_page_banner_subtitle_font' => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '400',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'capitalize',
					'textsize'             => '16',
					'textsizeunit'         => 'px',
					'textlineheight'       => '26',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '1',
					'letterspacingunit'    => 'px',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
			'breadcrumb_font'                 => json_encode(
				array(
					'font'                 => 'Roboto',
					'fontweight'           => '500',
					'category'             => 'sans-serif',
					'textalign'            => '',
					'texttransform'        => 'capitalize',
					'textsize'             => '30',
					'textsizeunit'         => 'px',
					'textlineheight'       => '25',
					'lineheightunit'       => 'px',
					'textletterspacing'    => '1',
					'letterspacingunit'    => 'px',
					'textmargintop'        => '0',
					'textmargintopunit'    => 'px',
					'textmarginright'      => '0',
					'textmarginrightunit'  => 'px',
					'textmarginbottom'     => '0',
					'textmarginbottomunit' => 'px',
					'textmarginleft'       => '0',
					'textmarginleftunit'   => 'px',
				)
			),
		);
		return apply_filters( 'busia_customizer_defaults', $customizer_defaults );
	}
}
/**
* Load all our Customizer options
*/
require get_parent_theme_file_path( '/inc/customizer.php' );
if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Fire the wp_body_open action.
	 *
	 * @return mixed
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

$purchase_validation = 1;
if ( 1 == $purchase_validation ) {
	require get_parent_theme_file_path( '/inc/tgmpa/tgmpa.php' );
}
// Admin pages.
if ( is_admin() ) {
	include_once get_template_directory() . '/inc/radiantthemes-dashboard/rt-admin.php';
}
if ( ! function_exists( 'busia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function busia_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on busia, use a find and replace
		 * to change 'busia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'busia', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link //developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * Enable support for woocommerce lightbox gallery.
		*/
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top' => esc_html__( 'Primary', 'busia' ),
			)
		);
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
		// Set up the WordPress core custom background feature.
		$busia_args = array(
			'default-color' => 'ffffff',
			'default-image' => '',
		);
		add_theme_support( 'custom-background', $busia_args );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Add post formats support.
		add_theme_support(
			'post-formats',
			array(
				'image',
				'quote',
				'status',
				'video',
				'audio',
			)
		);
		add_post_type_support( 'post', 'post-formats' );
		// Registers an editor stylesheet for the theme.
		add_editor_style( 'assets/css/radiantthemes-editor-styles.css' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link //codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		// Start.
		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
	
		add_action( 'enqueue_block_editor_assets', 'busia_block_editor_style' );
		/**
		 * Undocumented function
		 *
		 * @return void
		 */
		function busia_block_editor_style() {
			wp_register_style(
				'busia-editor',
				get_parent_theme_file_uri( '/assets/css/busia-editor.css' ),
				array(),
				time(),
				'all'
			);
			wp_enqueue_style( 'radiantthemes-editor' );
		}
		/**
		 * Typekit script
		 *
		 * @return void
		 */
		function busia_custom_typekit() {
			if ( ! empty( get_theme_mod( 'typekit-id' ) ) ) {
				wp_enqueue_script(
					'radiantthemes-typekit',
					'//use.typekit.net/' . esc_js( get_theme_mod( 'typekit-id' ) ) . '.js',
					array(),
					'1.0',
					true
				);
				wp_add_inline_script( 'radiantthemes-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'busia_custom_typekit' );
	}
endif;
add_action( 'after_setup_theme', 'busia_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function busia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'busia_content_width', 2000 );
}
add_action( 'after_setup_theme', 'busia_content_width', 0 );
/**
 * Register widget area.
 *
 * @link //developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function busia_widgets_init() {
	// ADD MAIN SIDEBAR.
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'busia' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'busia' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
			// ADD PRODUCT SIDEBAR.
	if ( class_exists( 'woocommerce' ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Product | Sidebar', 'busia' ),
				'id'            => 'radiantthemes-product-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'busia' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}
	
}
add_action( 'widgets_init', 'busia_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function busia_scripts() {
	// DEREGISTER STYLESHEETS.
	wp_deregister_style( 'font-awesome' );
	wp_deregister_style( 'font-awesome-css' );
	wp_deregister_style( 'yith-wcwl-font-awesome' );
	wp_deregister_style( 'elementor-icons-shared-0' );
	wp_deregister_style( 'elementor-icons-fa-solid' );
	// ENQUEUE RADIANTTHEMES ALL STYLES.	
	wp_enqueue_style(
		'busia-all',
		get_parent_theme_file_uri( '/assets/css/busia-all.min.css' ),
		array(),
		time()
	);
	wp_enqueue_style(
		'swiper',
		get_parent_theme_file_uri( '/assets/css/swiper.min.css' ),
		array(),
		time()
	);
	// ENQUEUE RADIANTTHEMES Menu CSS.	
	wp_enqueue_style(
		'busia-menu',
		get_parent_theme_file_uri( '/assets/css/busia-menu.css' ),
		array(),
		time()
	);
	// ENQUEUE RADIANTTHEMES CUSTOM CSS.
	wp_enqueue_style(
		'busia-custom',
		get_parent_theme_file_uri( '/assets/css/busia-custom.css' ),
		array(),
		time()
	);
	
	$font_url = busia_get_font_url();
	if ( ! empty( $font_url ) ) {
		wp_enqueue_style( 'busia-fonts', esc_url_raw( $font_url ), array(), null );
	}
	// ENQUEUE STYLE.CSS.
	wp_enqueue_style(
		'radiantthemes-style',
		get_stylesheet_uri(),
		array(),
		time()
	);
	// ENQUEUE RADIANTTHEMES DYNAMIC.
	if ( in_array( array( 'advanced-custom-fields/acf.php', 'acf-typography-field/acf-typography.php' ), apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		$acf_style = '';
		if ( is_page() ) {
			$target_id = '.page-id-';
		} elseif ( is_single() ) {
			$target_id = '.postid-';
		} else {
			$target_id = '';
		}
		if ( is_page() || is_single() ) {
			if ( get_field( 'background_color' ) && ! get_field( 'show_background_banner' ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner{background-color: ' . get_field( 'background_color' ) . ';background-image: none !important;}';
			}
			if ( get_field( 'banner_padding_top' ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_main > .container{padding-top: ' . get_field( 'banner_padding_top' ) . 'px;}';
			}
			if ( get_field( 'banner_padding_bottom' ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_main > .container{padding-bottom: ' . get_field( 'banner_padding_bottom' ) . 'px;}';
			}
			if ( get_field( 'banner_alignment' ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_main .inner_banner_main,';
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title,';
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle';
				$acf_style .= '{text-align: ' . get_field( 'banner_alignment' ) . ';}';
			}
			if ( get_typography_field( 'banner_title_typography', 'font_family', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-family: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'font_family', get_the_ID() );
				$acf_style .= ';';
				$acf_style .= 'font-weight: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'font_weight', get_the_ID() );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_title_typography', 'text_color', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{color: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'text_color', get_the_ID() );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_title_typography', 'font_size', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-size: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'font_size', get_the_ID() );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'banner_title_typography', 'line_height', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{line-height: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'line_height', get_the_ID() );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'banner_title_typography', 'text_transform', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{text-transform: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'text_transform', get_the_ID() );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'font_family', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-family: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_family', get_the_ID() );
				$acf_style .= ';';
				$acf_style .= 'font-weight: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_weight', get_the_ID() );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'text_color', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{color: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_color', get_the_ID() );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'font_size', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-size: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_size', get_the_ID() );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'line_height', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{line-height: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'line_height', get_the_ID() );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'text_transform', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{text-transform: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_transform', get_the_ID() );
				$acf_style .= ';}';
			}
			if ( get_field( 'breadcrumb_padding_top' ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_breadcrumb > .container{padding-top: ' . get_field( 'breadcrumb_padding_top' ) . 'px;}';
			}
			if ( get_field( 'breadcrumb_padding_bottom' ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_breadcrumb > .container{padding-bottom: ' . get_field( 'breadcrumb_padding_bottom' ) . 'px;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'font_family', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{font-family: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_family', get_the_ID() );
				$acf_style .= ';';
				$acf_style .= 'font-weight: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_weight', get_the_ID() );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'text_color', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{color: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_color', get_the_ID() );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'font_size', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{font-size: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_size', get_the_ID() );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'line_height', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{line-height: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'line_height', get_the_ID() );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'text_transform', get_the_ID() ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .inner_banner_breadcrumb #crumbs{text-transform: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_transform', get_the_ID() );
				$acf_style .= ';}';
			}
			if ( get_field( 'breadcrumb_alignment' ) ) {
				$acf_style .= $target_id . get_the_ID() . ' .wraper_inner_banner_breadcrumb .inner_banner_breadcrumb{text-align: ';
				$acf_style .= get_field( 'breadcrumb_alignment' ) . ';}';
			}
		} elseif ( is_home() ) {
			$blog_page_id = get_option( 'page_for_posts' );
			if ( get_field( 'background_color', $blog_page_id ) && ! get_field( 'show_background_banner' ) ) {
				$acf_style .= '.blog .wraper_inner_banner{background-color: ' . get_field( 'background_color', $blog_page_id ) . ';background-image: none !important;}';
			}
			if ( get_field( 'banner_padding_top', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner_main > .container{padding-top: ' . get_field( 'banner_padding_top', $blog_page_id ) . 'px;}';
			}
			if ( get_field( 'banner_padding_bottom', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner_main > .container{padding-bottom: ' . get_field( 'banner_padding_bottom', $blog_page_id ) . 'px;}';
			}
			if ( get_field( 'banner_alignment', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner_main .inner_banner_main,';
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title,';
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle';
				$acf_style .= '{text-align: ' . get_field( 'banner_alignment', $blog_page_id ) . ';}';
			}
			if ( get_typography_field( 'banner_title_typography', 'font_family', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-family: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'font_family', $blog_page_id );
				$acf_style .= ';';
				$acf_style .= 'font-weight: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'font_weight', $blog_page_id );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_title_typography', 'text_color', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{color: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'text_color', $blog_page_id );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_title_typography', 'font_size', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-size: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'font_size', $blog_page_id );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'banner_title_typography', 'line_height', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{line-height: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'line_height', $blog_page_id );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'banner_title_typography', 'text_transform', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{text-transform: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'text_transform', $blog_page_id );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'font_family', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-family: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_family', $blog_page_id );
				$acf_style .= ';';
				$acf_style .= 'font-weight: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_weight', $blog_page_id );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'text_color', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{color: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_color', $blog_page_id );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'font_size', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-size: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_size', $blog_page_id );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'line_height', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{line-height: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'line_height', $blog_page_id );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'text_transform', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{text-transform: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_transform', $blog_page_id );
				$acf_style .= ';}';
			}
			if ( get_field( 'breadcrumb_padding_top', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner_breadcrumb > .container{padding-top: ' . get_field( 'breadcrumb_padding_top', $blog_page_id ) . 'px;}';
			}
			if ( get_field( 'breadcrumb_padding_bottom', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner_breadcrumb > .container{padding-bottom: ' . get_field( 'breadcrumb_padding_bottom', $blog_page_id ) . 'px;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'font_family', $blog_page_id ) ) {
				$acf_style .= '.blog .inner_banner_breadcrumb #crumbs{font-family: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_family', $blog_page_id );
				$acf_style .= ';';
				$acf_style .= 'font-weight: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_weight', $blog_page_id );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'text_color', $blog_page_id ) ) {
				$acf_style .= '.blog .inner_banner_breadcrumb #crumbs{color: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_color', $blog_page_id );
				$acf_style .= ';}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'font_size', $blog_page_id ) ) {
				$acf_style .= '.blog .inner_banner_breadcrumb #crumbs{font-size: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_size', $blog_page_id );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'line_height', $blog_page_id ) ) {
				$acf_style .= '.blog .inner_banner_breadcrumb #crumbs{line-height: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'line_height', $blog_page_id );
				$acf_style .= 'px;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'text_transform', $blog_page_id ) ) {
				$acf_style .= '.blog .inner_banner_breadcrumb #crumbs{text-transform: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_transform', $blog_page_id );
				$acf_style .= ';}';
			}
			if ( get_field( 'breadcrumb_alignment', $blog_page_id ) ) {
				$acf_style .= '.blog .wraper_inner_banner_breadcrumb .inner_banner_breadcrumb{text-align: ';
				$acf_style .= get_field( 'breadcrumb_alignment', $blog_page_id ) . ';}';
			}
		} elseif ( is_category() || is_archive() || is_tag() || is_author() || is_attachment() || is_404() || is_search() ) {
			$blog_page_id = get_option( 'page_for_posts' );
			if ( get_field( 'background_color', $blog_page_id ) && ! get_field( 'show_background_banner' ) ) {
				$acf_style .= '.wraper_inner_banner{background-color: ' . get_field( 'background_color', $blog_page_id ) . ';background-image: none !important;}';
			}
			if ( get_field( 'banner_padding_top', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner_main > .container{padding-top: ' . get_field( 'banner_padding_top', $blog_page_id ) . 'px !important;}';
			}
			if ( get_field( 'banner_padding_bottom', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner_main > .container{padding-bottom: ' . get_field( 'banner_padding_bottom', $blog_page_id ) . 'px !important;}';
			}
			if ( get_field( 'banner_alignment', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner_main .inner_banner_main,';
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title,';
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle';
				$acf_style .= '{text-align: ' . get_field( 'banner_alignment', $blog_page_id ) . ' !important;}';
			}
			if ( get_typography_field( 'banner_title_typography', 'font_family', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-family: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'font_family', $blog_page_id );
				$acf_style .= ' !important;';
				$acf_style .= 'font-weight: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'font_weight', $blog_page_id );
				$acf_style .= ' !important;}';
			}
			if ( get_typography_field( 'banner_title_typography', 'text_color', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{color: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'text_color', $blog_page_id );
				$acf_style .= ' !important;}';
			}
			if ( get_typography_field( 'banner_title_typography', 'font_size', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{font-size: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'font_size', $blog_page_id );
				$acf_style .= 'px !important;}';
			}
			if ( get_typography_field( 'banner_title_typography', 'line_height', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{line-height: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'line_height', $blog_page_id );
				$acf_style .= 'px !important;}';
			}
			if ( get_typography_field( 'banner_title_typography', 'text_transform', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .title{text-transform: ';
				$acf_style .= get_typography_field( 'banner_title_typography', 'text_transform', $blog_page_id );
				$acf_style .= ' !important;}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'font_family', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-family: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_family', $blog_page_id );
				$acf_style .= ' !important; ';
				$acf_style .= 'font-weight: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_weight', $blog_page_id );
				$acf_style .= ' !important;}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'text_color', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{color: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_color', $blog_page_id );
				$acf_style .= ' !important; }';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'font_size', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{font-size: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'font_size', $blog_page_id );
				$acf_style .= 'px !important;}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'line_height', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{line-height: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'line_height', $blog_page_id );
				$acf_style .= 'px !important;}';
			}
			if ( get_typography_field( 'banner_subtitle_typography', 'text_transform', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner .wraper_inner_banner_main .inner_banner_main .subtitle{text-transform: ';
				$acf_style .= get_typography_field( 'banner_subtitle_typography', 'text_transform', $blog_page_id );
				$acf_style .= ' !important;}';
			}
			if ( get_field( 'breadcrumb_padding_top', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner_breadcrumb > .container{padding-top: ' . get_field( 'breadcrumb_padding_top', $blog_page_id ) . 'px !important;}';
			}
			if ( get_field( 'breadcrumb_padding_bottom', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner_breadcrumb > .container{padding-bottom: ' . get_field( 'breadcrumb_padding_bottom', $blog_page_id ) . 'px !important;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'font_family', $blog_page_id ) ) {
				$acf_style .= '.inner_banner_breadcrumb #crumbs{font-family: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_family', $blog_page_id );
				$acf_style .= ' !important;';
				$acf_style .= 'font-weight: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_weight', $blog_page_id );
				$acf_style .= ' !important;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'text_color', $blog_page_id ) ) {
				$acf_style .= '.inner_banner_breadcrumb #crumbs{color: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_color', $blog_page_id );
				$acf_style .= ' !important;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'font_size', $blog_page_id ) ) {
				$acf_style .= '.inner_banner_breadcrumb #crumbs{font-size: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'font_size', $blog_page_id );
				$acf_style .= 'px !important;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'line_height', $blog_page_id ) ) {
				$acf_style .= '.inner_banner_breadcrumb #crumbs{line-height: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'line_height', $blog_page_id );
				$acf_style .= 'px !important;}';
			}
			if ( get_typography_field( 'breadcrumb_typography', 'text_transform', $blog_page_id ) ) {
				$acf_style .= '.inner_banner_breadcrumb #crumbs{text-transform: ';
				$acf_style .= get_typography_field( 'breadcrumb_typography', 'text_transform', $blog_page_id );
				$acf_style .= ' !important;}';
			}
			if ( get_field( 'breadcrumb_alignment', $blog_page_id ) ) {
				$acf_style .= '.wraper_inner_banner_breadcrumb .inner_banner_breadcrumb{text-align: ';
				$acf_style .= get_field( 'breadcrumb_alignment', $blog_page_id ) . ' !important;}';
			}
		} else {
			$acf_style = '';
		}
		wp_add_inline_style(
			'radiantthemes-dynamic',
			$acf_style
		);
	}
	/**
	 * ENQUEUE SCRIPTS
	 */
	// ENQUEUE RADIANTTHEMES CUSTOM JQUERY.
	wp_enqueue_script(
		'busia-custom',
		get_parent_theme_file_uri( '/assets/js/busia-custom.js' ),
		array( 'jquery' ),
		time(),
		true
	);
	
	// ENQUEUE SWIPER JQUERY.
	wp_enqueue_script(
		'swiper',
		get_parent_theme_file_uri( '/assets/js/swiper.min.js' ),
		array(),
		time(),
		true
	);
	// ENQUEUE BOOTSTRAP JQUERY.
	wp_enqueue_script(
		'popper',
		get_parent_theme_file_uri( '/assets/js/popper.min.js' ),
		array(),
		time(),
		true
	);
	wp_enqueue_script(
		'bootstrap',
		get_parent_theme_file_uri( '/assets/js/bootstrap.min.js' ),
		array( 'popper' ),
		time(),
		true
	);
	wp_enqueue_script(
		'vendor-menu',
		get_parent_theme_file_uri( '/assets/js/menu-vendor.js' ),
		array( 'jquery' ),
		time(),
		true
	);
	wp_enqueue_script(
		'busia-app',
		get_parent_theme_file_uri( '/assets/js/busia-app.js' ),
		array( 'jquery', 'wp-util' ),
		time(),
		true
	);
	wp_enqueue_script(
		'busia-vertical-menu',
		get_parent_theme_file_uri( '/assets/js/busia-vertical-menu.js' ),
		array(),
		time(),
		true
	);
	// ENQUEUE MATCHHEIGHT JQUERY.
	wp_enqueue_script(
		'jquery-matchheight',
		get_parent_theme_file_uri( '/assets/js/jquery.matchHeight-min.js' ),
		array(),
		time(),
		true
	);
	// ENQUEUE POPUPVIDEO JQUERY.
	wp_enqueue_script(
		'popup-video',
		get_parent_theme_file_uri( '/assets/js/popup-video.js' ),
		array( 'jquery' ),
		time(),
		true
	);
	// ENQUEUE FANCYBOX JQUERY.
	wp_enqueue_script(
		'fancy-box',
		get_parent_theme_file_uri( '/assets/js/fancy-box.js' ),
		array(),
		time(),
		true
	);
	// Load comment-reply.js into footer.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		// enqueue the javascript that performs in-link comment reply fanciness.
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'busia_scripts' );
add_filter(
	'wp_prepare_attachment_for_js',
	function( $response, $attachment, $meta ) {
		if (
			'image/x-icon' === $response['mime'] &&
			isset( $response['url'] ) &&
			! isset( $response['sizes']['full'] )
		) {
			$response['sizes'] = array(
				'full' => array(
					'url' => $response['url'],
				),
			);
		}
		return $response;
	},
	10,
	3
);
/**
 * Woocommerce Support
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
/**
 * [busia_wrapper_start description]
 */
function busia_wrapper_start() {
	echo '<section id="main">';
}
add_action( 'woocommerce_before_main_content', 'busia_wrapper_start', 10 );
/**
 * [busia_wrapper_end description]
 */
function busia_wrapper_end() {
	echo '</section>';
}
add_action( 'woocommerce_after_main_content', 'busia_wrapper_end', 10 );
/**
 * [woocommerce_support description]
 */
function busia_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'busia_woocommerce_support' );
// Remove the product rating display on product loops.
//remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
// Ajax cart basket.
add_filter( 'woocommerce_add_to_cart_fragments', 'busia_iconic_cart_count_fragments', 10, 1 );
// Woocommerce product per page.
add_filter( 'loop_shop_per_page', 'busia_shop_per_page', 20 );
/**
 * Undocumented function
 *
 * @param [type] $cols Column.
 */
function busia_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = esc_html( get_theme_mod( 'shop-products-per-page', '', false ) );
	return $cols;
}
/**
 * [busia_iconic_cart_count_fragments description]
 *
 * @param  [type] $fragments description.
 * @return [type]            [description]
 */
function busia_iconic_cart_count_fragments( $fragments ) {
	$fragments['span.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
	return $fragments;
}
// Edit HTML tags before and after add to cart button.
add_filter( 'woocommerce_loop_add_to_cart_link', 'busia_before_after_btn', 10, 3 );
/**
 * Undocumented function
 *
 * @param mixed $add_to_cart_html Add to cart html.
 * @param mixed $product Product.
 * @param mixed $args Arguments.
 * @return string
 */
function busia_before_after_btn( $add_to_cart_html, $product, $args ) {
	$before = '<div class="radiantthemes-cart-border">'; // Some text or HTML here.
	$after  = '</div>'; // Add some text or HTML here as well.
	return $before . $add_to_cart_html . $after;
}
if ( ! function_exists( 'busia_pagination' ) ) {
	/**
	 * Displays pagination on archive pages
	 */
	function busia_pagination() {
		global $wp_query;
		$big = 999999999; // need an unlikely integer.
		$paginate_links = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'next_text' => '<span class="lnr lnr-arrow-right"></span>',
				'prev_text' => '<span class="lnr lnr-arrow-left"> </span>',
				'end_size'  => 5,
				'mid_size'  => 5,
				'add_args'  => false,
			)
		);
		// Display the pagination if more than one page is found.
		if ( $paginate_links ) :
			?>
			<div class="pagination clearfix">
				<?php
				$kses_defaults = wp_kses_allowed_html( 'rt-content' );
				$svg_args = array(
					'svg'   => array(
						'class'           => true,
						'aria-hidden'     => true,
						'aria-labelledby' => true,
						'role'            => true,
						'xmlns'           => true,
						'width'           => true,
						'height'          => true,
						'viewbox'         => true, // <= Must be lower case!
					),
					'g'     => array( 'fill' => true ),
					'title' => array( 'title' => true ),
					'path'  => array(
						'd'    => true,
						'fill' => true,
					),
				);
				$allowed_tags = array_merge( $kses_defaults, $svg_args );
				echo wp_kses( $paginate_links, $allowed_tags );
				?>
			</div>
			<?php
		endif;
	}
}
// index.
/**
 * GET AUTHOR ROLE.
 *
 * @return array
 */
function busia_get_author_role() {
	global $authordata;
	$author_roles = $authordata->roles;
	$author_role  = array_shift( $author_roles );
	return $author_role;
}
/**
 * Display the breadcrumbs.
 */
function busia_breadcrumbs() {
	$show_on_home = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter    = '<span class="gap"><i class="ti ti-angle-right"></i></span>';
	$home         = esc_html__( 'Home', 'busia' ); // text for the 'Home' link.
	$show_current = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before       = '<span class="current">'; // tag before the current crumb.
	$after        = '</span>'; // tag after the current crumb.
	global $post;
	$home_link = get_home_url( 'url' );
	if ( is_home() && is_front_page() ) {
		if ( 1 === $show_on_home ) {
			echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'busia' ) . '</a></div>';
		}
	} else {
		echo '<div id="crumbs"><a href="' . esc_url( $home_link ) . '">' . esc_html__( 'Home', 'busia' ) . '</a> ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
		if ( is_home() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_title( get_option( 'page_for_posts', true ) ) ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_category() ) {
			$this_cat = get_category( get_query_var( 'cat' ), false );
			if ( 0 != $this_cat->parent ) {
				echo get_category_parents( $this_cat->parent, true, ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' );
			}
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Archive by category "', 'busia' ) . single_cat_title( '', false ) . '"' . wp_kses( $after, 'rt-content' );
		} elseif ( is_search() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Search results for "', 'busia' ) . get_search_query() . '"' . wp_kses( $after, 'rt-content' );
		} elseif ( is_day() ) {
			echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
			echo '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . esc_html( get_the_time( 'F' ) ) . '</a> ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
			echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_time( 'd' ) ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_month() ) {
			echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . '</a> ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
			echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_time( 'F' ) ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_year() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_time( 'Y' ) ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_single() && ! is_attachment() ) {
			if ( 'post' != get_post_type() ) {
				$post_type = get_post_type_object( get_post_type() );
				$slug      = $post_type->rewrite;
				$cpost_label = $slug['slug'];
				$cpost_label = implode( '-', array_map( 'ucfirst', explode( '-', $cpost_label ) ) );
				$cpost_label = str_replace( '-', ' ', $cpost_label );
				if ( 'team' == get_post_type() || 'portfolio' == get_post_type() || 'case-studies' == get_post_type() ) {
				} else {
					echo '<a href="' . esc_url( $home_link ) . '/' . esc_attr( $slug['slug'] ) . '/">' . esc_html( $post_type->labels->singular_name ) . '</a>';
				}
				if ( 1 == $show_current ) {
					echo ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' . wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
				}
			} else {
				$cat  = get_the_category();
				$cat  = $cat[0];
				$cats = get_category_parents( $cat, true, ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' );
				if ( 0 == $show_current ) {
					$cats = preg_replace( "#^(.+)\s$delimiter\s$#", '$1', $cats );
				}
				echo wp_kses( $cats, 'rt-content' );
				if ( 1 == $show_current ) {
					echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
				}
			}
		} elseif ( ! is_single() && ! is_page() && 'post' != get_post_type() && ! is_404() ) {
			$post_type = get_post_type_object( get_post_type() );
			echo wp_kses( $before, 'rt-content' ) . esc_html( $post_type->labels->singular_name ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_attachment() ) {
			$parent = get_post( $post->post_parent );
			$cat    = get_the_category( $parent->ID );
			$cat    = $cat[0];
			echo get_category_parents( $cat, true, ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' );
			echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>';
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' . wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
			}
		} elseif ( is_page() && ! $post->post_parent ) {
			if ( 1 == $show_current ) {
				echo wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
			}
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id   = $post->post_parent;
			$breadcrumbs = array();
			while ( $parent_id ) {
				$page          = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id     = $page->post_parent;
			}
			$breadcrumbs       = array_reverse( $breadcrumbs );
			$count_breadcrumbs = count( $breadcrumbs );
			for ( $i = 0; $i < $count_breadcrumbs; $i++ ) {
				echo wp_kses( $breadcrumbs[ $i ], 'rt-content' );
				if ( ( count( $breadcrumbs ) - 1 ) != $i ) {
					echo ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ';
				}
			}
			if ( 1 == $show_current ) {
				echo ' ' . wp_kses( $delimiter, 'rt-content' ) . ' ' . wp_kses( $before, 'rt-content' ) . esc_html( get_the_title() ) . wp_kses( $after, 'rt-content' );
			}
		} elseif ( is_tag() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Posts tagged "', 'busia' ) . single_tag_title( '', false ) . '"' . wp_kses( $after, 'rt-content' );
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Articles posted by ', 'busia' ) . esc_html( $userdata->display_name ) . wp_kses( $after, 'rt-content' );
		} elseif ( is_404() ) {
			echo wp_kses( $before, 'rt-content' ) . esc_html__( 'Error 404', 'busia' ) . wp_kses( $after, 'rt-content' );
		}
		if ( get_query_var( 'paged' ) ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ' (';
			}
			echo esc_html_e( 'Page', 'busia' ) . ' ' . get_query_var( 'paged' );
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
				echo ')';
			}
		}
		echo '</div>';
	}
}
/**
 * Undocumented function
 *
 * @return void
 */
function busia_enqueue_scripts() {
	$validate_old_theme = get_option( 'radiant_purchase' ) && ! get_option( 'radiant_purchase_validation' ) ? true : false;
	wp_enqueue_style(
		'busia-admin-styles',
		get_template_directory_uri() . '/inc/radiantthemes-dashboard/css/admin-pages.css',
		array(),
		time()
	);
	wp_enqueue_script(
		'busia-admin-script',
		get_parent_theme_file_uri( '/inc/radiantthemes-dashboard/js/admin-pages.js' ),
		array( 'jquery' ),
		time(),
		true
	);
	wp_localize_script(
		'busia-admin-script',
		'ajaxObject',
		array(
			'ajaxUrl'            => admin_url( 'admin-ajax.php' ),
			'colornonce'         => wp_create_nonce( 'colorCategoriesNonce' ),
			'validate_old_theme' => $validate_old_theme,
		)
	);
}
add_action( 'admin_enqueue_scripts', 'busia_enqueue_scripts' );
/**
 * Undocumented function
 *
 * @return void
 */
function busia_dashboard_submenu_page() {
	add_submenu_page(
		'themes.php',
		esc_html__( 'RadiantThemes Dashboard', 'busia' ),
		esc_html__( 'RadiantThemes Dashboard', 'busia' ),
		'manage_options',
		'radiantthemes-dashboard',
		'busia_screen_welcome'
	);
}
add_action( 'admin_menu', 'busia_dashboard_submenu_page' );
/**
 * Undocumented function
 *
 * @return void
 */
function busia_screen_welcome() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
	require_once get_parent_theme_file_path( '/inc/radiantthemes-dashboard/welcome.php' );
}
if ( 1 == $purchase_validation ) {
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function busia_plugins_submenu_page() {
		add_submenu_page(
			'themes.php',
			esc_html__( 'Radiantthemes Install Plugins', 'busia' ),
			esc_html__( 'Radiantthemes Install Plugins', 'busia' ),
			'manage_options',
			'radiantthemes-admin-plugins',
			'busia_screen_plugin'
		);
	}
	add_action( 'admin_menu', 'busia_plugins_submenu_page' );
	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	function busia_screen_plugin() {
		echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
		require_once get_parent_theme_file_path( '/inc/radiantthemes-dashboard/install-plugins.php' );
	}
}
/**
 * Redirect to welcome page
 *
 * @return void
 */
function busia_after_switch_theme() {
	if ( current_user_can( 'manage_options' ) ) {
		wp_safe_redirect( admin_url( 'themes.php?page=radiantthemes-dashboard' ) );
	}
	$ele_disable_color = get_option( 'elementor_disable_color_schemes' );
	$ele_disable_fonts = get_option( 'elementor_disable_typography_schemes' );
	$ele_update_fa4    = get_option( 'elementor_load_fa4_shim' );
	if ( ! $ele_disable_color ) {
		update_option( 'elementor_disable_color_schemes', 'yes' );
	}
	if ( ! $ele_disable_color ) {
		update_option( 'elementor_disable_typography_schemes', 'yes' );
	}
	if ( ! $ele_update_fa4 ) {
		update_option( 'elementor_load_fa4_shim', 'yes' );
	}
}
add_action( 'after_switch_theme', 'busia_after_switch_theme' );
/**
 * Function to add Elementor support to various post types.
 *
 * @return void
 */
/**
 * Function to disable default colors and fonts in Elementor
 *
 * @return void
 */
function busia_disable_color_fonts_ele() {
	$ele_disable_color = get_option( 'elementor_disable_color_schemes' );
	$ele_disable_fonts = get_option( 'elementor_disable_typography_schemes' );
	$ele_update_fa4    = get_option( 'elementor_load_fa4_shim' );
	if ( ! $ele_disable_color ) {
		update_option( 'elementor_disable_color_schemes', 'yes' );
	}
	if ( ! $ele_disable_fonts ) {
		update_option( 'elementor_disable_typography_schemes', 'yes' );
	}
	if ( ! $ele_update_fa4 ) {
		update_option( 'elementor_load_fa4_shim', 'yes' );
	}
}
add_action( 'after_switch_theme', 'busia_disable_color_fonts_ele' );
/**
 * Undocumented function
 *
 * @return array
 */
function busia_navmenu_navbar_menu_choices() {
	$menus = wp_get_nav_menus();
	$items = array();
	$i     = 0;
	foreach ( $menus as $menu ) {
		if ( 0 == $i ) {
			$default = $menu->slug;
			$i ++;
		}
		$items[ $menu->slug ] = $menu->name;
	}
	return $items;
}
// Remove issues with prefetching adding extra views.
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
/**
 * Custom query string
 *
 * @param array $vars Query Strings.
 * @return array
 */
function busia_add_query_vars_filter( $vars ) {
	$vars[] = 'sidebar';
	return $vars;
}
add_filter( 'query_vars', 'busia_add_query_vars_filter' );
/**
 * Radiantthemes Website Layout
 *
 * @return void
 */
function busia_website_layout() {
	global $post;
	echo '<div class="radiantthemes-website-layout full-width body-inner">';
	echo '<div id="header" class="rt-dark rt-submenu-light">';
	if ( class_exists( 'WooCommerce' ) && ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) )  {
		$shopdefaultthemeoptions_id = get_theme_mod( 'header_list_text_shop');
		if ( $shopdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $shopdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	}
	elseif ( is_home() || is_category() || is_archive() || is_tag() || is_author() || is_attachment() ) {
		$blogdefaultthemeoptions_id = get_theme_mod( 'header_list_text_blog' );
		if ( $blogdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $blogdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} elseif ( class_exists( 'WooCommerce' ) && is_singular( 'product' ) ) {
		$productdetailpagewsdefaultthemeoptions_id = get_theme_mod( 'header_list_text_product_detail_pages');
		if ( $productdetailpagewsdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $productdetailpagewsdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	}
	
	elseif ( is_singular( 'post' ) ) {
		$blogdetailpagesdefaultthemeoptions_id = get_theme_mod( 'header_list_text_blog_detail_pages' );
		if ( $blogdetailpagesdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $blogdetailpagesdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} elseif ( is_singular( 'team' ) ) {
		$teamdetailpagesdefaultthemeoptions_id = get_theme_mod( 'header_list_text_team_detail_pages' );
		if ( $teamdetailpagesdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $teamdetailpagesdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} elseif ( is_singular( 'job' ) ) {
		$jobdetailpagesdefaultthemeoptions_id = get_theme_mod( 'header_list_text_job_detail_pages' );
		if ( $jobdetailpagesdefaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $jobdetailpagesdefaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} elseif ( is_404() || is_search() ) {
		$defaultthemeoptions_id = get_theme_mod( 'header_list_text' );
		if ( $defaultthemeoptions_id ) {
			echo '<div class="rt-header-inner">';
			echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $defaultthemeoptions_id );
			echo '</div>';
		} else {
			echo '<div class="rt-header-inner">';
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
			echo '</div>';
		}
	} else {
		wp_reset_postdata();
		$headerBuilder_id = get_post_meta( $post->ID, 'new_custom_header', true );
		if ( $headerBuilder_id ) {
			echo '<div class="rt-header-inner">';
						$template = get_page_by_path( $headerBuilder_id, OBJECT, 'elementor_library' );
						echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template->ID );
			echo '</div>';
		} else {
			$headerbuilderthemeoptions_id = get_theme_mod( 'header_list_text' );
			if ( $headerbuilderthemeoptions_id ) {
				echo '<div class="rt-header-inner working">';
						echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $headerbuilderthemeoptions_id );
						echo '</div>';
			} else {
				echo '<div class="rt-header-inner">';
				include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
				echo '</div>';
			}
		}
	}
	echo '</div>';
}
/**
 * Radiantthemes Bannner Selection
 *
 * @return void
 */
function busia_short_banner_selection() {
	global $post;
	$team_page_info                      = '';
	$busia_team_bannercheck      = '';
	$portfolio_page_info                 = '';
	$busia_portfolio_bannercheck = '';
	$case_studies_page_info              = '';
	$busia_case_studies_banner   = '';
	$busia_job_banner            = '';
	$posts_page_id                       = '';
	$busia_posts_page_bann       = '';
	if ( is_singular( 'portfolio' ) || is_tax( 'portfolio-category' ) ) {
		$portfolio_page_info = get_page_by_path( 'portfolio', OBJECT, 'page' );
		if ( $portfolio_page_info ) {
			$portfolio_page_id                   = $portfolio_page_info->ID;
			$busia_portfolio_bannercheck = get_post_meta( $portfolio_page_id, 'bannercheck', true );
		}
	} elseif ( is_singular( 'case-studies' ) || is_tax( 'case-study-category' ) ) {
		$case_studies_page_info = get_page_by_path( 'case-studies', OBJECT, 'page' );
		if ( $case_studies_page_info ) {
			$case_studies_page_id              = $case_studies_page_info->ID;
			$busia_case_studies_banner = get_post_meta( $case_studies_page_id, 'bannercheck', true );
		}
	} elseif ( is_singular( 'job' ) || is_tax( 'job-category' ) ) {
		$job_page_info = get_page_by_path( 'job', OBJECT, 'page' );
		if ( $job_page_info ) {
			$job_page_id              = $job_page_info->ID;
			$busia_job_banner = get_post_meta( $job_page_id, 'bannercheck', true );
		}
	} elseif ( is_home() || is_search() || is_category() || is_archive() || is_tag() || is_author() || is_singular( 'post' ) || is_attachment() ) {
		$posts_page_id                 = get_option( 'page_for_posts' );
		$busia_posts_page_bann = get_post_meta( $posts_page_id, 'bannercheck', true );
	}
	$busia_bannercheck = get_post_meta( get_the_id(), 'bannercheck', true );
	// CALL BANNER FILES.
	if ( get_theme_mod( 'short-header' ) ) {
		if ( $busia_bannercheck !== 'defaultbannercheck' ) {
				require get_parent_theme_file_path( '/inc/header/banner.php' );
		} elseif ( get_post_type( get_the_ID() ) == 'elementor_library' ) {
		} else {
			require get_parent_theme_file_path( '/inc/header/theme-banner.php' );
		}
	} elseif ( is_404() ) {
	} else {
		require get_parent_theme_file_path( '/inc/header/banner-default.php' );
	}
}	
// ================================================
// START OF WOOCOMMERCE ADD TO CART THROUGH AJAX.
// ================================================
// ENQUEUE CUSTOM JQUERY FILE.
function busia_woocommerce_ajax_add_to_cart_js() {
	wp_enqueue_script(
		'sweetalert',
		get_stylesheet_directory_uri() . '/assets/js/sweetalert.min.js',
		array( 'jquery' ),
		time(),
		true
	);
	wp_enqueue_script(
		'ajax_add_to_cart',
		get_stylesheet_directory_uri() . '/assets/js/ajax_add_to_cart.js',
		array(),
		time(),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'busia_woocommerce_ajax_add_to_cart_js' );
// FUNCTION TO HANDLE AJAX REQUEST.
add_action( 'wp_ajax_ql_woocommerce_ajax_add_to_cart', 'busia_woocommerce_ajax_add_to_cart' );
add_action( 'wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'busia_woocommerce_ajax_add_to_cart' );
function busia_woocommerce_ajax_add_to_cart() {
	$product_id        = apply_filters( 'ql_woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
	$quantity          = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( $_POST['quantity'] );
	$variation_id      = absint( $_POST['variation_id'] );
	$passed_validation = apply_filters( 'ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity );
	$product_status    = get_post_status( $product_id );
	if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id ) && 'publish' === $product_status ) {
		do_action( 'ql_woocommerce_ajax_added_to_cart', $product_id );
		if ( 'yes' === get_option( 'ql_woocommerce_cart_redirect_after_add' ) ) {
			wc_add_to_cart_message( array( $product_id => $quantity ), true );
		}
		ob_get_clean();
			WC_AJAX::get_refreshed_fragments();
	} else {
		$data = array(
			'error'       => true,
			'product_url' => apply_filters( 'ql_woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ),
		);
		echo wp_send_json( $data );
	}
	wp_die();
}
add_action( 'wp_ajax_radiant_woocommerce_ajax_add_to_cart', 'busia_woo_woocommerce_ajax_add_to_cart' );
add_action( 'wp_ajax_nopriv_radiant_woocommerce_ajax_add_to_cart', 'busia_woo_woocommerce_ajax_add_to_cart' );
function busia_woo_woocommerce_ajax_add_to_cart() {
	// Set item key as the hash found in input.qty's name
	$cart_item_key = $_POST['cart_item_key'];
	// Get the array of values owned by the product we're updating
	$threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );
	// Get the quantity of the item in the cart
	$threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( '/[^0-9\.]/', '', filter_var( $_POST['quantity_two'], FILTER_SANITIZE_NUMBER_INT ) ) ), $cart_item_key );
	// Update cart validation
	$passed_validation = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );
	// Update the quantity of the item in the cart
	if ( $passed_validation ) {
		WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
		ob_get_clean();
		WC_AJAX::get_refreshed_fragments();
	}
	// Refresh the page
	echo do_shortcode( '[woocommerce_cart]' );
	die();
}
add_action(
	'after_setup_theme',
	function() {
		add_theme_support( 'html5', array( 'script', 'style' ) );
	}
);
add_action( 'busia_simple_add_to_cart', 'busia_simple_add_to_cart' );
if ( ! function_exists( 'busia_simple_add_to_cart' ) ) {
	/**
	 * Output the simple product add to cart area.
	 */
	function busia_simple_add_to_cart() {
		global $product;
		if ( ! $product->is_purchasable() ) {
			return;
		}
		echo wc_get_stock_html( $product ); // WPCS: XSS ok.
		if ( $product->is_in_stock() ) :
			?>
			<form class="cart radiantthemes-cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
				<?php
				woocommerce_quantity_input(
					array(
						'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
						'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
						'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
					)
				);
				?>
				<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><span><?php echo esc_html__( 'Add to Bag', 'busia' ); ?></span></button>
			</form>
			<?php
			endif;
	}
}
// Change add to cart text on archives depending on product type
add_filter( 'woocommerce_product_add_to_cart_text', 'busia_product_add_to_cart_text' );
function busia_product_add_to_cart_text() {
	global $product;
	$product_type = $product->get_type();
	switch ( $product_type ) {
		case 'external':
			return __( 'Take me to their site!', 'busia' );
		break;
		case 'grouped':
			return __( 'VIEW THE GOOD STUFF', 'busia' );
		break;
		case 'simple':
			return __( 'Add to Bag', 'busia' );
		break;
		case 'variable':
			return __( 'Select Options', 'busia' );
		break;
		default:
			return __( 'Add to Bag', 'busia' );
	}
}
add_filter( 'woocommerce_variable_price_html', 'busia_variable_product_minmax_price_html', 8, 2 );
function busia_variable_product_minmax_price_html( $price, $product ) {
	$variation_min_price         = $product->get_variation_price( 'min', true );
	$variation_max_price         = $product->get_variation_price( 'max', true );
	$variation_min_regular_price = $product->get_variation_regular_price( 'min', true );
	$variation_max_regular_price = $product->get_variation_regular_price( 'max', true );
	if ( ( $variation_min_price == $variation_min_regular_price ) && ( $variation_max_price == $variation_max_regular_price ) ) {
		$html_min_max_price = $price;
	} else {
		//$html_price         = '<p class="product-price">';
		$html_price        = '<ins>' . wc_price( $variation_min_price ) . '</ins>';
		$html_price        .= '<del>' . wc_price( $variation_min_regular_price ) . '</del>';
		$html_min_max_price = $html_price;
		$prices             = $product->get_variation_prices();
		foreach ( $prices['price'] as $key => $price ) {
			// Only on sale variations
			if ( $prices['regular_price'][ $key ] !== $price ) {
				// Calculate and set in the array the percentage for each variation on sale
				$percentages[] = round( 100 - ( $prices['sale_price'][ $key ] / $prices['regular_price'][ $key ] * 100 ) );
			}
		}
		$percentage = max( $percentages ) . '%';
	}
	if ( $product->is_on_sale() ) {
		return $html_min_max_price . '<span class="percent-off"> (' . $percentage . '' . esc_html__( ' OFF', 'busia' ) . ')</span>';
		// . $percentage . sprintf( __(' OFF %s', 'busia' ), $saved );
	} else {
		return $html_min_max_price;
	}
}
function busia_override_address_checkout_fields( $address_fields ) {
    $address_fields['first_name']['placeholder'] = 'First Name';
    $address_fields['last_name']['placeholder'] = 'Last Name';
	$address_fields['company']['placeholder'] = 'Company Name';
    $address_fields['address_1']['placeholder'] = 'Address';
    $address_fields['state']['placeholder'] = 'State';
    $address_fields['postcode']['placeholder'] = 'Postcode/Zip';
    $address_fields['city']['placeholder'] = 'City';
    return $address_fields;
}
add_filter('woocommerce_default_address_fields', 'busia_override_address_checkout_fields', 20, 1);
function busia_override_billing_checkout_fields( $fields ) {
    $fields['billing']['billing_phone']['placeholder'] = 'Phone';
    $fields['billing']['billing_email']['placeholder'] = 'Email Address';
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'busia_override_billing_checkout_fields', 20, 1 );
add_action( 'woocommerce_widget_shopping_cart_buttons', function(){
    // Removing Buttons
    remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
    remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );
    // Adding customized Buttons
    add_action( 'woocommerce_widget_shopping_cart_buttons', 'busia_custom_widget_shopping_cart_button_view_cart', 10 );
    add_action( 'woocommerce_widget_shopping_cart_buttons', 'busia_custom_widget_shopping_cart_proceed_to_checkout', 20 );
}, 1 );
// Custom cart button
function busia_custom_widget_shopping_cart_button_view_cart() {
    $original_link = wc_get_cart_url();
    $custom_link = home_url( '/cart/?id=1' ); // HERE replacing cart link
    echo '<a href="' . esc_url( $custom_link ) . '" class="button wc-forward"><span>' . esc_html__( 'View cart', 'busia' ) . '</span></a>';
}
// Custom Checkout button
function busia_custom_widget_shopping_cart_proceed_to_checkout() {
    $original_link = wc_get_checkout_url();
    $custom_link = home_url( '/checkout/?id=1' ); // HERE replacing checkout link
    echo '<a href="' . esc_url( $custom_link ) . '" class="button checkout wc-forward"><span>' . esc_html__( 'Checkout', 'busia' ) . '</span></a>';
}
if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	/**
	 * Show the product title in the H5.
	 *
	 * @return void
	 */
	function woocommerce_template_loop_product_title() {
		echo '<h5 class="woocommerce-loop-product__title">' . get_the_title() . '</h5>';
	}
}
if ( 1 == $purchase_validation ) {
//Unyson
/**
 * @param FW_Ext_Backups_Demo[] $demos
 * @return FW_Ext_Backups_Demo[]
 */
function busia_fw_ext_backups_demos( $demos ) {
	$demos_array = array(
		'applounge' => array(
			'title'        => __( 'Busia', 'busia' ),
			'screenshot'   => 'https://busia.radiantthemes.com/wp-content/themes/busia/screenshot.png',
			'preview_link' => 'https://busia.radiantthemes.com/',
		),
	);
	$download_url = 'https://busia.radiantthemes.com/demo-data';
	foreach ( $demos_array as $id => $data ) {
		$demo = new FW_Ext_Backups_Demo(
			$id,
			'piecemeal',
			array(
				'url'     => $download_url,
				'file_id' => $id,
			)
		);
		$demo->set_title( $data['title'] );
		$demo->set_screenshot( $data['screenshot'] );
		$demo->set_preview_link( $data['preview_link'] );
		$demos[ $demo->get_id() ] = $demo;
		unset( $demo );
	}
	return $demos;
}
add_filter( 'fw:ext:backups-demo:demos', 'busia_fw_ext_backups_demos' );
}
/**
 * Disable redirection to Getting Started Page after activating Elementor.
 */
add_action(
	'admin_init',
	function() {
		if ( did_action( 'elementor/loaded' ) ) {
			remove_action( 'admin_init', array( \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ) );
		}
	},
	1
);
/**
 * Disable redirection after plugin activation in Woocommerce.
 *
 * @param boolean $boolean Redirect true/false.
 * @return boolean
 */
function busia_woo_auto_redirect( $boolean ) {
	return true;
}
add_filter( 'woocommerce_prevent_automatic_wizard_redirect', 'busia_woo_auto_redirect', 20, 1 );