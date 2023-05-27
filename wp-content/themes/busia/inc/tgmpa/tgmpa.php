<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.1
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    //opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       //github.com/thomasgriffin/TGM-Plugin-Activation
 */
require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';
/**
 * Undocumented function
 */
function busia_register_required_plugins() {
	$plugins = array(
        array(
			'name'     => esc_html__( 'Anywhere Elementor', 'busia' ),
			'slug'     => 'anywhere-elementor',
			'required' => true,
		),
		// Elementor.
		array(
			'name'     => esc_html__( 'Elementor', 'busia' ),
			'slug'     => 'elementor',
			'required' => true,
		),
		// Contact Form 7.
		array(
			'name'     => esc_html__( 'Contact Form 7', 'busia' ),
			'slug'     => 'contact-form-7',
			'required' => true,
		),
		// RT Custom Post Type.
		array(
			'name'     => esc_html__( 'RadiantThemes Custom Post Type', 'busia' ),
			'slug'     => 'radiantthemes-custom-post-type',
			'source'   => 'https://busia.radiantthemes.com/plugins/radiantthemes-custom-post-type.zip',
			'required' => true,
		),
		// RadiantThemes Addons.
		array(
			'name'     => esc_html__( 'RadiantThemes Addons', 'busia' ),
			'slug'     => 'radiantthemes-addons',
			'source'   => 'https://busia.radiantthemes.com/plugins/radiantthemes-addons-new.zip',
			'required' => true,
        'version'  => '2.0.0',
		),
		// Unyson.
		
		array(
			'name'     => esc_html__( 'Demo Importer (Unyson)', 'busia' ),
			'source'   => 'https://api.radiantthemes.com/plugins/@3d!S58hndj-5d5&-fg8/unyson.zip',
			'slug'     => 'unyson',
			'required' => true,
		),
		// WooCommerce.
		array(
            'name'     => esc_html__( 'WooCommerce', 'busia' ),
            'slug'     => 'woocommerce', 
            'required' => true,
        ),
        // Variation Swatches for WooCommerce
		array(
			'name'     => esc_html__( 'Variation Swatches for WooCommerce', 'busia' ),
			'slug'     => 'woo-variation-swatches',
			
			'required' => true,
		),
        // Slider Revolution.
		array(
			'name'     => esc_html__( 'Slider Revolution', 'busia' ),
			'slug'     => 'revslider',
			'source'   => 'https://api.radiantthemes.com/plugins/@3d!S58hndj-5d5&-fg8/revslider--4cLsaCdwDzB4jxfMDiKyn8w6aaGoxSAuARhrNfm6.zip',
			
			'required' => true,
		),		
		// Advanced Custom Fields.
		array(
			'name'     => esc_html__( 'Advanced Custom Fields', 'busia' ),
			'slug'     => 'advanced-custom-fields',
			'required' => true,
		),
		
	);
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'busia_register_required_plugins' );