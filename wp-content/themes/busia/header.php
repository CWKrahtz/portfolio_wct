<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package radiantthemes
	 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<!-- overlay -->
	<div class="overlay"></div>
	<!-- overlay -->
	<!-- scrollup -->
	<?php if ( get_theme_mod( 'scroll_to_top_switch' ) ) { ?>
		<?php if ( ! empty( get_theme_mod( 'scroll_to_top_direction' ) ) ) : ?>
			<div class="scrollup <?php echo esc_attr( get_theme_mod( 'scroll_to_top_direction', 'right' ) ); ?>">
		<?php else : ?>
			<div class="scrollup left">
		<?php endif; ?>
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20" fill="currentColor" stroke="none"><path d="M0 15c0 0.128 0.049 0.256 0.146 0.354 0.195 0.195 0.512 0.195 0.707 0l8.646-8.646 8.646 8.646c0.195 0.195 0.512 0.195 0.707 0s0.195-0.512 0-0.707l-9-9c-0.195-0.195-0.512-0.195-0.707 0l-9 9c-0.098 0.098-0.146 0.226-0.146 0.354z"></path></svg>
			</div>
		<?php } ?>
		<!-- scrollup -->
		<?php if ( is_singular('elementor_library') || is_singular('mega_menu') ) { ?>
		<?php } else { ?>
		<?php busia_website_layout(); ?>
		<?php busia_short_banner_selection(); ?>
		<?php } ?>
		<!-- #page -->
		<div class="site">
			<!-- #content -->
			<div id="content" class="site-content">
