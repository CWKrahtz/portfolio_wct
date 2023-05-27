<?php
/**
 * Customizer Setup and Custom Controls
 */
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class busia_initialise_customizer_settings {
	// Get our default values
	private $defaults;
	public function __construct() {
		// Get our Customizer defaults
		$this->defaults = busia_generate_defaults();
		// Remove Default Colors and Background Image Sections and Default Logo Control.
		add_action( 'customize_register', array( $this, 'busia_remove_option' ) );
		// Register our Panels.
		add_action( 'customize_register', array( $this, 'busia_add_customizer_panels' ) );
		// Register Our Sections.
		add_action( 'customize_register', array( $this, 'busia_add_customizer_sections' ) );
		// Register our social media controls
		add_action( 'customize_register', array( $this, 'busia_register_social_controls' ) );
		// Register Pages Controls.
		add_action( 'customize_register', array( $this, 'busia_register_pages_controls' ) );
		// Register Colors and Typography Controls.
		add_action( 'customize_register', array( $this, 'busia_register_color_typography_controls' ) );
		// Register Custom Fonts Uploads Controls.
		add_action( 'customize_register', array( $this, 'busia_register_custom_fonts_controls' ) );
		// Register Custom Fonts Select Controls.
		add_action( 'customize_register', array( $this, 'busia_register_select_custom_fonts_controls' ) );
		// Register Custom Slug Controls.
		add_action( 'customize_register', array( $this, 'busia_register_custom_slug_controls' ) );
		// Register Preloader Controls.
		add_action( 'customize_register', array( $this, 'busia_register_preloader_controls' ) );
		// Register Scroll to Top Controls.
		add_action( 'customize_register', array( $this, 'busia_register_scroll_to_top_controls' ) );
		// Register Typekit Controls.
		add_action( 'customize_register', array( $this, 'busia_register_typekit_controls' ) );
		// Register Header Controls.
		add_action( 'customize_register', array( $this, 'busia_register_header_controls' ) );
		// Register Footer Controls.
		add_action( 'customize_register', array( $this, 'busia_register_footer_controls' ) );
		// Register Elements Controls.
		add_action( 'customize_register', array( $this, 'busia_register_elements_controls' ) );
		// Register Blog Layout Controls.
		add_action( 'customize_register', array( $this, 'busia_register_blog_layout_controls' ) );
		// Register Blog Single Layout Controls.
		add_action( 'customize_register', array( $this, 'busia_register_single_blog_layout_controls' ) );
		// Register Blog Options Controls.
		add_action( 'customize_register', array( $this, 'busia_register_blog_options_controls' ) );			
		
		// Register Shop Controls.
		add_action( 'customize_register', array( $this, 'busia_register_shop_controls' ) );
	}
	// Remove Default Colors and Background Image Sections and Default Logo Control.
	public function busia_remove_option( $wp_customize ) {
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'background_image' );
		$wp_customize->remove_control( 'custom_logo' );
	}
	public function busia_add_customizer_panels( $wp_customize ) {
		$wp_customize->add_panel(
			'general_panel',
			array(
				'title' => esc_html__( 'General', 'busia' ),
			)
		);
		$wp_customize->add_panel(
			'header_panel',
			array(
				'title' => esc_html__( 'Header', 'busia' ),
			)
		);
		$wp_customize->add_panel(
			'elements_panel',
			array(
				'title' => esc_html__( 'Elements', 'busia' ),
			)
		);
		$wp_customize->add_panel(
			'pages_panel',
			array(
				'title' => esc_html__( 'Pages', 'busia' ),
			)
		);
		$wp_customize->add_panel(
			'blog_panel',
			array(
				'title' => esc_html__( 'Blog', 'busia' ),
			)
		);
	}
	public function busia_add_customizer_sections( $wp_customize ) {
		$wp_customize->add_section(
			'busia_typography_section',
			array(
				'title' => esc_html__( 'Typography', 'busia' ),
				'panel' => 'general_panel',
			)
		);
		$wp_customize->add_section(
			'busia_custom_fonts_section',
			array(
				'title' => esc_html__( 'Upload Custom Fonts', 'busia' ),
				'panel' => 'general_panel',
			)
		);
		$wp_customize->add_section(
			'busia_select_custom_fonts_section',
			array(
				'title' => esc_html__( 'Select Custom Fonts', 'busia' ),
				'panel' => 'general_panel',
			)
		);
		$wp_customize->add_section(
			'busia_color_section',
			array(
				'title' => esc_html__( 'Font Color', 'busia' ),
				'panel' => 'general_panel',
			)
		);
		$wp_customize->add_section(
			'busia_custom_slug',
			array(
				'title' => esc_html__( 'Custom Slug', 'busia' ),
				'panel' => 'general_panel',
			)
		);
		
		$wp_customize->add_section(
			'busia_scroll_top',
			array(
				'title' => esc_html__( 'Scroll to Top', 'busia' ),
				'panel' => 'general_panel',
			)
		);
		$wp_customize->add_section(
			'busia_typekit',
			array(
				'title' => esc_html__( 'Typekit Fonts', 'busia' ),
				'panel' => 'general_panel',
			)
		);
		$wp_customize->add_section(
			'busia_header_general_section',
			array(
				'title' => esc_html__( 'General', 'busia' ),
				'panel' => 'header_panel',
			)
		);
		$wp_customize->add_section(
			'busia_short_header_section',
			array(
				'title' => esc_html__( 'Short Header', 'busia' ),
				'panel' => 'header_panel',
			)
		);
		$wp_customize->add_section(
			'busia_footer_section',
			array(
				'title' => esc_html__( 'Footer', 'busia' ),
			)
		);
		$wp_customize->add_section(
			'busia_elements_button_section',
			array(
				'title' => esc_html__( 'Button', 'busia' ),
				'panel' => 'elements_panel',
			)
		);
		$wp_customize->add_section(
			'busia_page_not_found_section',
			array(
				'title' => esc_html__( 'Error 404', 'busia' ),
				'panel' => 'pages_panel',
			)
		);
		$wp_customize->add_section(
			'busia_search_section',
			array(
				'title' => esc_html__( 'Search', 'busia' ),
				'panel' => 'pages_panel',
			)
		);
		$wp_customize->add_section(
			'busia_blog_layout_section',
			array(
				'title' => esc_html__( 'Blog Layout', 'busia' ),
				'panel' => 'blog_panel',
			)
		);
		$wp_customize->add_section(
			'busia_blog_single_layout_section',
			array(
				'title' => esc_html__( 'Blog Single Layout', 'busia' ),
				'panel' => 'blog_panel',
			)
		);
		$wp_customize->add_section(
			'busia_blog_options_section',
			array(
				'title' => esc_html__( 'Blog Options', 'busia' ),
				'panel' => 'blog_panel',
			)
		);	
		$wp_customize->add_section(
			'social_icons_section',
			array(
				'title' => esc_html__( 'Social Icons', 'busia' ),
			)
		);
		$wp_customize->add_section(
			'busia_shop_section',
			array(
				'title'       => esc_html__( 'Shop', 'busia' ),
				'description' => esc_html__( 'Product Listing', 'busia' ),
			)
		);
	}
	public function busia_register_social_controls( $wp_customize ) {
		// Add our Checkbox switch setting and control for opening URLs in a new tab
		$wp_customize->add_setting(
			'social_newtab',
			array(
				'default'           => $this->defaults['social_newtab'],
				'transport'         => 'postMessage',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'social_newtab',
				array(
					'label'   => esc_html__( 'Open in new browser tab', 'busia' ),
					'section' => 'social_icons_section',
				)
			)
		);
		$wp_customize->add_setting(
			'social-icon-facebook',
			array(
				'default'           => '#',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_url_sanitization',
			)
		);
		$wp_customize->add_control(
			'social-icon-facebook',
			array(
				'label'   => esc_html__( 'Facebook', 'busia' ),
				'section' => 'social_icons_section',
				'type'    => 'url',
			)
		);
		$wp_customize->add_setting(
			'social-icon-twitter',
			array(
				'default'           => '#',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_url_sanitization',
			)
		);
		$wp_customize->add_control(
			'social-icon-twitter',
			array(
				'label'   => esc_html__( 'Twitter', 'busia' ),
				'section' => 'social_icons_section',
				'type'    => 'url',
			)
		);
		$wp_customize->add_setting(
			'social-icon-linkedin',
			array(
				'default'           => '#',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_url_sanitization',
			)
		);
		$wp_customize->add_control(
			'social-icon-linkedin',
			array(
				'label'   => esc_html__( 'LinkedIn', 'busia' ),
				'section' => 'social_icons_section',
				'type'    => 'url',
			)
		);
		$wp_customize->add_setting(
			'social-icon-instagram',
			array(
				'default'           => '#',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_url_sanitization',
			)
		);
		$wp_customize->add_control(
			'social-icon-instagram',
			array(
				'label'   => esc_html__( 'Instagram', 'busia' ),
				'section' => 'social_icons_section',
				'type'    => 'url',
			)
		);
		$wp_customize->add_setting(
			'social-icon-dribbble',
			array(
				'default'           => '#',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_url_sanitization',
			)
		);
		$wp_customize->add_control(
			'social-icon-dribbble',
			array(
				'label'   => esc_html__( 'Dribbble', 'busia' ),
				'section' => 'social_icons_section',
				'type'    => 'url',
			)
		);
	}
	public function busia_register_color_typography_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'body_font_select',
			array(
				'default'           => $this->defaults['body_font_select'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'body_font_select',
				array(
					'label'       => __( 'Body Font', 'busia' ),
					'section'     => 'busia_typography_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h1_font_select',
			array(
				'default'           => $this->defaults['h1_font_select'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'h1_font_select',
				array(
					'label'       => __( 'Heading 1', 'busia' ),
					'description' => esc_html__( '', 'busia' ),
					'section'     => 'busia_typography_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h2_font_select',
			array(
				'default'           => $this->defaults['h2_font_select'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'h2_font_select',
				array(
					'label'       => __( 'Heading 2', 'busia' ),
					'description' => esc_html__( '', 'busia' ),
					'section'     => 'busia_typography_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h3_font_select',
			array(
				'default'           => $this->defaults['h3_font_select'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'h3_font_select',
				array(
					'label'       => __( 'Heading 3', 'busia' ),
					'description' => esc_html__( '', 'busia' ),
					'section'     => 'busia_typography_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h4_font_select',
			array(
				'default'           => $this->defaults['h4_font_select'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'h4_font_select',
				array(
					'label'       => __( 'Heading 4', 'busia' ),
					'description' => esc_html__( '', 'busia' ),
					'section'     => 'busia_typography_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h5_font_select',
			array(
				'default'           => $this->defaults['h5_font_select'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'h5_font_select',
				array(
					'label'       => __( 'Heading 5', 'busia' ),
					'description' => esc_html__( '', 'busia' ),
					'section'     => 'busia_typography_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'h6_font_select',
			array(
				'default'           => $this->defaults['h6_font_select'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'h6_font_select',
				array(
					'label'       => __( 'Heading 6', 'busia' ),
					'section'     => 'busia_typography_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'body_color_select',
			array(
				'default'           => 'rgba(97, 102, 112, 1)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'body_color_select',
				array(
					'label'   => __( 'Text Color', 'busia' ),
					'section' => 'busia_color_section',
				)
			)
		);
		$wp_customize->add_setting(
			'h1_color_select',
			array(
				'default'           => 'rgba(29, 26, 78, 1)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'h1_color_select',
				array(
					'label'   => __( 'H1 Color', 'busia' ),
					'section' => 'busia_color_section',
				)
			)
		);
		$wp_customize->add_setting(
			'h2_color_select',
			array(
				'default'           => 'rgba(29, 26, 78, 1)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'h2_color_select',
				array(
					'label'   => __( 'H2 Color', 'busia' ),
					'section' => 'busia_color_section',
				)
			)
		);
		$wp_customize->add_setting(
			'h3_color_select',
			array(
				'default'           => 'rgba(29, 26, 78, 1)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'h3_color_select',
				array(
					'label'   => __( 'H3 Color', 'busia' ),
					'section' => 'busia_color_section',
				)
			)
		);
		$wp_customize->add_setting(
			'h4_color_select',
			array(
				'default'           => 'rgba(29, 26, 78, 1)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'h4_color_select',
				array(
					'label'   => __( 'H4 Color', 'busia' ),
					'section' => 'busia_color_section',
				)
			)
		);
		$wp_customize->add_setting(
			'h5_color_select',
			array(
				'default'           => 'rgba(29, 26, 78, 1)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'h5_color_select',
				array(
					'label'   => __( 'H5 Color', 'busia' ),
					'section' => 'busia_color_section',
				)
			)
		);
		$wp_customize->add_setting(
			'h6_color_select',
			array(
				'default'           => 'rgba(29, 26, 78, 1)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'h6_color_select',
				array(
					'label'   => __( 'H6 Color', 'busia' ),
					'section' => 'busia_color_section',
				)
			)
		);
	}
	public function busia_register_custom_fonts_controls( $wp_customize ) {
		for ( $i = 1; $i <= 10; $i++ ) {
			$wp_customize->add_setting(
				'webfontName' . $i,
				array(
					'default'           => '',
					'transport'         => 'refresh',
					'sanitize_callback' => 'busia_text_sanitization',
				)
			);
			$wp_customize->add_control(
				'webfontName' . $i,
				array(
					'label'       => esc_html__( 'Font Name', 'busia' ) . ' ' . $i,
					'description' => esc_html__( 'Give this any custom Name', 'busia' ),
					'section'     => 'busia_custom_fonts_section',
					'type'        => 'text',
				)
			);
			$wp_customize->add_setting(
				'webfontFile' . $i,
				array(
					'default'           => '',
					'transport'         => 'refresh',
					'sanitize_callback' => 'absint',
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Media_Control(
					$wp_customize,
					'webfontFile' . $i,
					array(
						'label'         => esc_html__( 'Upload Font File', 'busia' ),
						'section'       => 'busia_custom_fonts_section',
						'mime_type'     => 'application',
						'button_labels' => array(
							'select'       => esc_html__( 'Select Font File', 'busia' ),
							'change'       => esc_html__( 'Change Font File', 'busia' ),
							'default'      => esc_html__( 'Default', 'busia' ),
							'remove'       => esc_html__( 'Remove', 'busia' ),
							'placeholder'  => esc_html__( 'No Font file selected', 'busia' ),
							'frame_title'  => esc_html__( 'Select Font File', 'busia' ),
							'frame_button' => esc_html__( 'Choose Font File', 'busia' ),
						),
					)
				)
			);
		}
	}
	public function busia_register_select_custom_fonts_controls( $wp_customize ) {
		$fonts_array[''] = '';
		for ( $i = 1; $i <= 10; $i++ ) {
			if ( get_theme_mod( 'webfontName' . $i ) ) {
				$fonts_array[ get_theme_mod( 'webfontName' . $i ) ] = get_theme_mod( 'webfontName' . $i );
			}
		}
		$wp_customize->add_setting(
			'custom_body_font_select',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'custom_body_font_select',
			array(
				'label'       => esc_html__( 'Custom Body Font', 'busia' ),
				'description' => esc_html__( 'If Custom Font is selected then Google Font will be deactivated.', 'busia' ),
				'section'     => 'busia_select_custom_fonts_section',
				'type'        => 'select',
				'choices'     => $fonts_array,
			)
		);
		$wp_customize->add_setting(
			'custom_h1_font_select',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'custom_h1_font_select',
			array(
				'label'       => esc_html__( 'Custom H1 Font', 'busia' ),
				'description' => esc_html__( 'If Custom Font is selected then Google Font will be deactivated.', 'busia' ),
				'section'     => 'busia_select_custom_fonts_section',
				'type'        => 'select',
				'choices'     => $fonts_array,
			)
		);
		$wp_customize->add_setting(
			'custom_h2_font_select',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'custom_h2_font_select',
			array(
				'label'       => esc_html__( 'Custom H2 Font', 'busia' ),
				'description' => esc_html__( 'If Custom Font is selected then Google Font will be deactivated.', 'busia' ),
				'section'     => 'busia_select_custom_fonts_section',
				'type'        => 'select',
				'choices'     => $fonts_array,
			)
		);
		$wp_customize->add_setting(
			'custom_h3_font_select',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'custom_h3_font_select',
			array(
				'label'       => esc_html__( 'Custom H3 Font', 'busia' ),
				'description' => esc_html__( 'If Custom Font is selected then Google Font will be deactivated.', 'busia' ),
				'section'     => 'busia_select_custom_fonts_section',
				'type'        => 'select',
				'choices'     => $fonts_array,
			)
		);
		$wp_customize->add_setting(
			'custom_h4_font_select',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'custom_h4_font_select',
			array(
				'label'       => esc_html__( 'Custom H4 Font', 'busia' ),
				'description' => esc_html__( 'If Custom Font is selected then Google Font will be deactivated.', 'busia' ),
				'section'     => 'busia_select_custom_fonts_section',
				'type'        => 'select',
				'choices'     => $fonts_array,
			)
		);
		$wp_customize->add_setting(
			'custom_h5_font_select',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'custom_h5_font_select',
			array(
				'label'       => esc_html__( 'Custom H5 Font', 'busia' ),
				'description' => esc_html__( 'If Custom Font is selected then Google Font will be deactivated.', 'busia' ),
				'section'     => 'busia_select_custom_fonts_section',
				'type'        => 'select',
				'choices'     => $fonts_array,
			)
		);
		$wp_customize->add_setting(
			'custom_h6_font_select',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'custom_h6_font_select',
			array(
				'label'       => esc_html__( 'Custom H6 Font', 'busia' ),
				'description' => esc_html__( 'If Custom Font is selected then Google Font will be deactivated.', 'busia' ),
				'section'     => 'busia_select_custom_fonts_section',
				'type'        => 'select',
				'choices'     => $fonts_array,
			)
		);
	}
	public function busia_register_custom_slug_controls( $wp_customize ) {			
		$wp_customize->add_setting(
			'change_slug_casestudies',
			array(
				'default'           => 'case-studies',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'change_slug_casestudies',
			array(
				'label'       => esc_html__( 'Case Studies', 'busia' ),
				'description' => esc_html__( 'The slug name cannot be the same as a page name. Make sure to regenerate permalinks, after making changes.', 'busia' ),
				'section'     => 'busia_custom_slug',
				'type'        => 'text',
				'capability'  => 'edit_theme_options',
			)
		);
	}
	public function busia_register_preloader_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'preloader_switch',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'preloader_switch',
				array(
					'label'   => esc_html__( 'Activate Preloader', 'busia' ),
					'section' => 'busia_preloader',
				)
			)
		);
		$wp_customize->add_setting(
			'preloader_style',
			array(
				'default'           => 'roller',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'preloader_style',
			array(
				'label'           => esc_html__( 'Preloader Style', 'busia' ),
				'description'     => esc_html__( 'Select Style of the Preloader. (Powered By: "Loading.io")', 'busia' ),
				'section'         => 'busia_preloader',
				'type'            => 'select',
				'capability'      => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
				'choices'         => array( // Optional.
					'circle'    => 'Circle',
					'default'   => 'Default',
					'dual-ring' => 'Dual Ring',
					'ellipsis'  => 'Ellipsis',
					'facebook'  => 'Facebook',
					'grid'      => 'Grid',
					'heart'     => 'Heart',
					'hourglass' => 'Hourglass',
					'ring'      => 'Ring',
					'ripple'    => 'Ripple',
					'roller'    => 'Roller',
					'spinner'   => 'Spinner',
					'percent'   => 'Percentage RightSlide',
				),
				'active_callback' => function() {
					return 1 === get_theme_mod( 'preloader_switch', false );
				},
			)
		);
		$wp_customize->add_setting(
			'preloader_background_color',
			array(
				'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'preloader_background_color',
				array(
					'label'           => esc_html__( 'Preloader Background Color', 'busia' ),
					'description'     => esc_html__( 'Pick a background color for the Preloader.', 'busia' ),
					'section'         => 'busia_preloader',
					'show_opacity'    => true,
					'active_callback' => function() {
						return 1 === get_theme_mod( 'preloader_switch', false );
					},
				)
			)
		);
		$wp_customize->add_setting(
			'preloader_color',
			array(
				//'default'           => '#212127',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'preloader_color',
				array(
					'label'           => esc_html__( 'Preloader Color', 'busia' ),
					'description'     => esc_html__( 'Pick a color for the Preloader.', 'busia' ),
					'section'         => 'busia_preloader',
					'show_opacity'    => true,
					'active_callback' => function() {
						return 1 === get_theme_mod( 'preloader_switch', false );
					},
				)
			)
		);
		$wp_customize->add_setting(
			'preloader_timeout',
			array(
				'default'           => 500,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Slider_Custom_Control(
				$wp_customize,
				'preloader_timeout',
				array(
					'label'           => esc_html__( 'Preloader Timeout', 'busia' ),
					'description'     => esc_html__( 'Select preloader timeout after successful page load. Min is 100ms, Max is 5000ms and Default is 500ms.', 'busia' ),
					'section'         => 'busia_preloader',
					'input_attrs'     => array(
						'min'  => 100,
						'max'  => 5000,
						'step' => 100,
					),
					'active_callback' => function() {
						return 1 === get_theme_mod( 'preloader_switch', false );
					},
				)
			)
		);
	}
	public function busia_register_scroll_to_top_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'scroll_to_top_switch',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'scroll_to_top_switch',
				array(
					'label'   => esc_html__( 'Activate Scroll To Top', 'busia' ),
					'section' => 'busia_scroll_top',
				)
			)
		);
		$wp_customize->add_setting(
			'scroll_to_top_direction',
			array(
				'default'           => 'right',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'scroll_to_top_direction',
			array(
				'label'           => esc_html__( 'Direction', 'busia' ),
				'description'     => esc_html__( 'Select Direction of the Scroll To Top.', 'busia' ),
				'section'         => 'busia_scroll_top',
				'type'            => 'select',
				'capability'      => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
				'choices'         => array( // Optional.
					'left'  => esc_html__( 'Left', 'busia' ),
					'right' => esc_html__( 'Right', 'busia' ),
				),
				'active_callback' => function() {
					return 1 === get_theme_mod( 'scroll_to_top_switch', false );
				},
			)
		);
		$wp_customize->add_setting(
			'scroll_to_top_background_color',
			array(
				'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'scroll_to_top_background_color',
				array(
					'label'           => esc_html__( 'Background Color', 'busia' ),
					'description'     => esc_html__( 'Pick a background color for the Scroll To Top.', 'busia' ),
					'section'         => 'busia_scroll_top',
					'show_opacity'    => true,
					'active_callback' => function() {
						return 1 === get_theme_mod( 'scroll_to_top_switch', false );
					},
				)
			)
		);
		$wp_customize->add_setting(
			'scroll_to_top_icon_color',
			array(
				'default'           => '#1E4EC4',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'scroll_to_top_icon_color',
				array(
					'label'           => esc_html__( 'Icon Color', 'busia' ),
					'description'     => esc_html__( 'Pick a icon color for the Scroll To Top.', 'busia' ),
					'section'         => 'busia_scroll_top',
					'show_opacity'    => true,
					'active_callback' => function() {
						return 1 === get_theme_mod( 'scroll_to_top_switch', false );
					},
				)
			)
		);
	}
	public function busia_register_typekit_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'active_typekit',
			array(
				'default'           => 0,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'active_typekit',
				array(
					'label'       => esc_html__( 'Activate Typekit', 'busia' ),
					'description' => esc_html__( 'Choose if want to activate typekit or not.', 'busia' ),
					'section'     => 'busia_typekit',
				)
			)
		);
		$wp_customize->add_setting(
			'typekit-id',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'typekit-id',
			array(
				'label'           => esc_html__( 'Enter Typekit ID Here', 'busia' ),
				'section'         => 'busia_typekit',
				'type'            => 'text',
				'capability'      => 'edit_theme_options',
				'active_callback' => function() {
					return 1 === get_theme_mod( 'active_typekit', false );
				},
			)
		);
		$wp_customize->add_setting(
			'body-typekit',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'body-typekit',
			array(
				'label'           => esc_html__( 'Enter Body typography', 'busia' ),
				'description'     => esc_html__( 'Add the Typekit font family name Here.', 'busia' ),
				'section'         => 'busia_typekit',
				'type'            => 'text',
				'capability'      => 'edit_theme_options',
				'active_callback' => function() {
					return 1 === get_theme_mod( 'active_typekit', false );
				},
			)
		);
		$wp_customize->add_setting(
			'heading-typekit',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'heading-typekit',
			array(
				'label'           => esc_html__( 'Enter Headings typography', 'busia' ),
				'description'     => esc_html__( 'Add the Typekit font family name Here.', 'busia' ),
				'section'         => 'busia_typekit',
				'type'            => 'text',
				'capability'      => 'edit_theme_options',
				'active_callback' => function() {
					return 1 === get_theme_mod( 'active_typekit', false );
				},
			)
		);
	}
	public function busia_register_header_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'header_list_text',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Posts_Custom_Control(
				$wp_customize,
				'header_list_text',
				array(
					'label'       => esc_html__( 'Select Header Style', 'busia' ),
					'description' => esc_html__( 'To disable header, create a "Blank Header" and choose that.', 'busia' ),
					'section'     => 'busia_header_general_section',
					'input_attrs' => array(
						'post_type'      => 'elementor_library',
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'elementor_library_category',
								'field'    => 'slug',
								'terms'    => 'custom-header',
							),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'header_list_text_blog',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Posts_Custom_Control(
				$wp_customize,
				'header_list_text_blog',
				array(
					'label'       => esc_html__( 'Select Header Style for Blog Page', 'busia' ),
					'description' => esc_html__( 'To disable header, create a "Blank Header" and choose that.', 'busia' ),
					'section'     => 'busia_header_general_section',
					'input_attrs' => array(
						'post_type'      => 'elementor_library',
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'elementor_library_category',
								'field'    => 'slug',
								'terms'    => 'custom-header',
							),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'header_list_text_blog_detail_pages',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Posts_Custom_Control(
				$wp_customize,
				'header_list_text_blog_detail_pages',
				array(
					'label'       => esc_html__( 'Select Header Style for Blog Details Pages', 'busia' ),
					'description' => esc_html__( 'To disable header, create a "Blank Header" and choose that.', 'busia' ),
					'section'     => 'busia_header_general_section',
					'input_attrs' => array(
						'post_type'      => 'elementor_library',
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'elementor_library_category',
								'field'    => 'slug',
								'terms'    => 'custom-header',
							),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'header_list_text_shop',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Posts_Custom_Control(
				$wp_customize,
				'header_list_text_shop',
				array(
					'label'       => esc_html__( 'Select Header Style for Shop Page', 'busia' ),
					'description' => esc_html__( 'To disable header, create a "Blank Header" and choose that.', 'busia' ),
					'section'     => 'busia_header_general_section',
					'input_attrs' => array(
						'post_type'      => 'elementor_library',
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'elementor_library_category',
								'field'    => 'slug',
								'terms'    => 'custom-header',
							),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'header_list_text_product_detail_pages',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Posts_Custom_Control(
				$wp_customize,
				'header_list_text_product_detail_pages',
				array(
					'label'       => esc_html__( 'Select Header Style for Product Detail Pages', 'busia' ),
					'description' => esc_html__( 'To disable header, create a "Blank Header" and choose that.', 'busia' ),
					'section'     => 'busia_header_general_section',
					'input_attrs' => array(
						'post_type'      => 'elementor_library',
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'elementor_library_category',
								'field'    => 'slug',
								'terms'    => 'custom-header',
							),
						),
					),
				)
			)
		);		
		$wp_customize->add_setting(
			'short-header',
			array(
				'default'           => 'Banner-With-Breadcrumb',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'short-header',
				array(
					'label'       => esc_html__( 'Select Short Header', 'busia' ),
					'description' => esc_html__( 'Choose what kind of short header you want to set.', 'busia' ),
					'section'     => 'busia_short_header_section',
					'choices'     => array(
						'Banner-With-Breadcrumb' => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Banner-With-Breadcrumb.png',
							'name'  => esc_html__( 'Banner-With-Breadcrumb', 'busia' ),
						),
						'Banner-only'            => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Banner-Only.png',
							'name'  => esc_html__( 'Banner Only', 'busia' ),
						),
						'breadcrumb-only'        => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Breadcrumb-Only.png',
							'name'  => esc_html__( 'Breadcrumb Only', 'busia' ),
						),
						'banner-none'            => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Banner-None.png',
							'name'  => esc_html__( 'Banner None', 'busia' ),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'short_header_bg_color',
			array(
				'default'           => 'rgba(239,240,242,1)',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'short_header_bg_color',
				array(
					'label'       => esc_html__( 'Inner Page Banner Background Color', 'busia' ),
					'description' => esc_html__( 'Set Background Color for Inner Page Banner. (Please Note: This is the default color of Inner Page Banner section. You can change background color on respective pages.)', 'busia' ),
					'section'     => 'busia_short_header_section',
				)
			)
		);
		$wp_customize->add_setting(
			'short_header_bg_media',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'short_header_bg_media',
				array(
					'label'         => esc_html__( 'Inner Page Banner Background Image', 'busia' ),
					'description'   => esc_html__( 'Set Background Image for Inner Page Banner. (Please Note: This is the default image of Inner Page Banner section. You can change background image on respective pages.)', 'busia' ),
					'section'       => 'busia_short_header_section',
					'mime_type'     => 'image',  // Required. Can be image, audio, video, application, text
					'button_labels' => array( // Optional
						'select'       => esc_html__( 'Select File', 'busia' ),
						'change'       => esc_html__( 'Change File', 'busia' ),
						'default'      => esc_html__( 'Default', 'busia' ),
						'remove'       => esc_html__( 'Remove', 'busia' ),
						'placeholder'  => esc_html__( 'No file selected', 'busia' ),
						'frame_title'  => esc_html__( 'Select File', 'busia' ),
						'frame_button' => esc_html__( 'Choose File', 'busia' ),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'short_header_bg_repeat',
			array(
				'default'           => 'inherit',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'short_header_bg_repeat',
			array(
				'label'      => esc_html__( 'Background Repeat', 'busia' ),
				'section'    => 'busia_short_header_section',
				'type'       => 'select',
				'capability' => 'edit_theme_options',
				'choices'    => array(
					'no-repeat' => esc_html__( 'No Repeat', 'busia' ),
					'repeat'    => esc_html__( 'Repeat All', 'busia' ),
					'repeat-x'  => esc_html__( 'Repeat Horizontally', 'busia' ),
					'repeat-y'  => esc_html__( 'Repeat Vertically', 'busia' ),
					'inherit'   => esc_html__( 'Inherit', 'busia' ),
				),
			)
		);
		$wp_customize->add_setting(
			'short_header_bg_size',
			array(
				'default'           => 'inherit',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'short_header_bg_size',
			array(
				'label'      => esc_html__( 'Background Size', 'busia' ),
				'section'    => 'busia_short_header_section',
				'type'       => 'select',
				'capability' => 'edit_theme_options',
				'choices'    => array(
					'cover'   => esc_html__( 'Cover', 'busia' ),
					'contain' => esc_html__( 'Contain', 'busia' ),
					'inherit' => esc_html__( 'Inherit', 'busia' ),
				),
			)
		);
		$wp_customize->add_setting(
			'short_header_bg_attachment',
			array(
				'default'           => 'inherit',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'short_header_bg_attachment',
			array(
				'label'      => esc_html__( 'Background Attachment', 'busia' ),
				'section'    => 'busia_short_header_section',
				'type'       => 'select',
				'capability' => 'edit_theme_options',
				'choices'    => array(
					'fixed'   => esc_html__( 'Fixed', 'busia' ),
					'scroll'  => esc_html__( 'Scroll', 'busia' ),
					'inherit' => esc_html__( 'Inherit', 'busia' ),
				),
			)
		);
		$wp_customize->add_setting(
			'short_header_bg_pos',
			array(
				'default'           => 'inherit',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'short_header_bg_pos',
			array(
				'label'      => esc_html__( 'Background Position', 'busia' ),
				'section'    => 'busia_short_header_section',
				'type'       => 'select',
				'capability' => 'edit_theme_options',
				'choices'    => array(
					'left top'      => esc_html__( 'Left Top', 'busia' ),
					'left center'   => esc_html__( 'Left Center', 'busia' ),
					'left bottom'   => esc_html__( 'Left Bottom', 'busia' ),
					'center top'    => esc_html__( 'Center Top', 'busia' ),
					'center center' => esc_html__( 'Center Center', 'busia' ),
					'center bottom' => esc_html__( 'Center Bottom', 'busia' ),
					'right top'     => esc_html__( 'Right Top', 'busia' ),
					'right center'  => esc_html__( 'Right Center', 'busia' ),
					'right bottom'  => esc_html__( 'Right Bottom', 'busia' ),
					'inherit'       => esc_html__( 'Inherit', 'busia' ),
				),
			)
		);
		$wp_customize->add_setting(
			'radiant_alpha_color_picker',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'radiant_alpha_color_picker',
				array(
					'label'        => esc_html__( 'Inner Page Banner Border Bottom Color', 'busia' ),
					'description'  => esc_html__( 'Set Border Bottom Color for Inner Page Banner.', 'busia' ),
					'section'      => 'busia_short_header_section',
					'show_opacity' => true,
				)
			)
		);
		// INNER PAGE BANNER PADDING.
		$wp_customize->add_setting(
			'inner_page_banner_padding',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Simple_Notice_Custom_control(
				$wp_customize,
				'inner_page_banner_padding',
				array(
					'label'       => esc_html__( 'Inner Page Banner Padding', 'busia' ),
					'description' => esc_html__( 'Set padding for inner page banner area.', 'busia' ),
					'section'     => 'busia_short_header_section',
				)
			)
		);
		$wp_customize->add_setting(
			'inner_page_padding_top',
			array(
				'default'           => '10',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'inner_page_padding_top',
			array(
				'section'     => 'busia_short_header_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'inner_page_padding_bottom',
			array(
				'default'           => '10',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'inner_page_padding_bottom',
			array(
				'section'     => 'busia_short_header_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'inner_page_padding_unit',
			array(
				'default'           => 'px',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'inner_page_padding_unit',
			array(
				'section' => 'busia_short_header_section',
				'type'    => 'select',
				'choices' => array(
					'em'  => 'em',
					'%'   => '%',
					'px'  => 'px',
					'rem' => 'rem',
				),
			)
		);
		$wp_customize->add_setting(
			'inner_page_banner_title_font',
			array(
				'default'           => $this->defaults['inner_page_banner_title_font'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'inner_page_banner_title_font',
				array(
					'label'       => esc_html__( 'Inner Page Banner Title Font', 'busia' ),
					'description' => esc_html__( 'This will be the default font of your inner page banner title.', 'busia' ),
					'section'     => 'busia_short_header_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'inner_page_banner_subtitle_font',
			array(
				'default'           => $this->defaults['h6_font_select'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'inner_page_banner_subtitle_font',
				array(
					'label'       => esc_html__( 'Inner Page Banner Subtitle Font', 'busia' ),
					'description' => esc_html__( 'This will be the default font of your inner page banner subtitle.', 'busia' ),
					'section'     => 'busia_short_header_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'breadcrumb_font',
			array(
				'default'           => $this->defaults['breadcrumb_font'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'breadcrumb_font',
				array(
					'label'       => esc_html__( 'Inner Page Banner Breadcrumb Font', 'busia' ),
					'description' => esc_html__( 'This will be the default font of your Inner Page Banner Breadcrumb.', 'busia' ),
					'section'     => 'busia_short_header_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		// BREADCRUMB PADDING.
		$wp_customize->add_setting(
			'breadcrumb_padding',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Simple_Notice_Custom_control(
				$wp_customize,
				'breadcrumb_padding',
				array(
					'label'       => esc_html__( 'Breadcrumb Padding', 'busia' ),
					'description' => esc_html__( 'Set padding for breadcrumb area.', 'busia' ),
					'section'     => 'busia_short_header_section',
				)
			)
		);
		$wp_customize->add_setting(
			'breadcrumb_padding_top',
			array(
				'default'           => '10',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'breadcrumb_padding_top',
			array(
				'section'     => 'busia_short_header_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'breadcrumb_padding_bottom',
			array(
				'default'           => '10',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'breadcrumb_padding_bottom',
			array(
				'section'     => 'busia_short_header_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'breadcrumb_padding_unit',
			array(
				'default'           => 'px',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'breadcrumb_padding_unit',
			array(
				'section' => 'busia_short_header_section',
				'type'    => 'select',
				'choices' => array(
					'em'  => 'em',
					'%'   => '%',
					'px'  => 'px',
					'rem' => 'rem',
				),
			)
		);
	}
	public function busia_register_footer_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'footer-style',
			array(
				'default'           => 'footer-default',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'footer-style',
				array(
					'label'       => esc_html__( 'Select Footer Style', 'busia' ),
					'description' => esc_html__( 'Select footer style. (N.B.: Please set style for individual footer on their respective settings below.)', 'busia' ),
					'section'     => 'busia_footer_section',
					'choices'     => array(
						'footer-default' => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Footer-Default.png',
							'name'  => esc_html__( 'Default Footer', 'busia' ),
						),
						'footer-custom'  => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Footer-Custom.png',
							'name'  => esc_html__( 'Custom Footer', 'busia' ),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'hide-footer-widget',
			array(
				'default'           => 0,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'hide-footer-widget',
				array(
					'label'           => esc_html__( 'Hide footer widget area', 'busia' ),
					'section'         => 'busia_footer_section',
					'active_callback' => function() {
						return 'footer-default' === get_theme_mod( 'footer-style', false );
					},
				)
			)
		);
		$wp_customize->add_setting(
			'footer_def_bg_color',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'footer_def_bg_color',
				array(
					'label'           => esc_html__( 'Footer Background Color', 'busia' ),
					'description'     => esc_html__( 'Set Background Color for Footer.', 'busia' ),
					'section'         => 'busia_footer_section',
					'active_callback' => function() {
						return 'footer-default' === get_theme_mod( 'footer-style', false );
					},
				)
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'footer_def_bg_color',
			array(
				'selector'        => '.wraper_footer.style-default',
				'settings'        => 'footer_def_bg_color',
				'render_callback' => function() {
					echo self::css( '.wraper_footer.style-default', 'background-color', 'footer_def_bg_color' );
				},
			)
		);
		$wp_customize->add_setting(
			'footer_list_text',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Posts_Custom_Control(
				$wp_customize,
				'footer_list_text',
				array(
					'label'       => esc_html__( 'Elementor Section Template', 'busia' ),
					'section'     => 'busia_footer_section',
					'input_attrs' => array(
						'post_type'      => 'elementor_library',
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'elementor_library_category',
								'field'    => 'slug',
								'terms'    => 'custom-footer',
							),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'shop_footer_text',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Posts_Custom_Control(
				$wp_customize,
				'shop_footer_text',
				array(
					'label'       => esc_html__( 'Shop Footer Template', 'busia' ),
					'description'     => esc_html__( 'This footer template applicable for /shop , /my-account , /cart , /checkout pages', 'busia' ),
					'section'     => 'busia_footer_section',
					'input_attrs' => array(
						'post_type'      => 'elementor_library',
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'elementor_library_category',
								'field'    => 'slug',
								'terms'    => 'custom-footer',
							),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'shop_details_footer_text',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Posts_Custom_Control(
				$wp_customize,
				'shop_details_footer_text',
				array(
					'label'       => esc_html__( 'Product Details Footer Template', 'busia' ),
					
					'section'     => 'busia_footer_section',
					'input_attrs' => array(
						'post_type'      => 'elementor_library',
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'elementor_library_category',
								'field'    => 'slug',
								'terms'    => 'custom-footer',
							),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'footer_custom_stucking',
			array(
				'default'           => 0,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'footer_custom_stucking',
				array(
					'label'   => esc_html__( 'Sticky Footer', 'busia' ),
					'section' => 'busia_footer_section',
				)
			)
		);
	}
	public function busia_register_elements_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'button_typography',
			array(
				'default'           => $this->defaults['button_typography'],
				'sanitize_callback' => 'busia_google_font_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Google_Font_Select_Custom_Control(
				$wp_customize,
				'button_typography',
				array(
					'label'       => esc_html__( 'Button Typography', 'busia' ),
					'description' => esc_html__( 'Typography options for buttons. Remember, this will effect all buttons of this theme. (Please Note: This change will effect all theme buttons, including Radiants Buttons, Radiant Contact Form Button, Radiant Fancy Text Box Button.)', 'busia' ),
					'section'     => 'busia_elements_button_section',
					'input_attrs' => array(
						'font_count' => 'all',
						'orderby'    => 'alpha',
					),
				)
			)
		);
		$wp_customize->add_setting(
			'button_background_color',
			array(
				'default'           => '#1e4ec4',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'button_background_color',
				array(
					'label'       => esc_html__( 'Background Color', 'busia' ),
					'description' => esc_html__( 'Pick a background color for buttons.', 'busia' ),
					'section'     => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_background_color_hover',
			array(
				'default'           => '#1e4ec4',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'button_background_color_hover',
				array(
					'label'       => esc_html__( 'Hover Background Color', 'busia' ),
					'description' => esc_html__( 'Pick a background color for buttons hover.', 'busia' ),
					'section'     => 'busia_elements_button_section',
				)
			)
		);		
		$wp_customize->add_setting(
			'button_typography_color',
			array(
				'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'button_typography_color',
				array(
					'label'       => esc_html__( 'Font Color', 'busia' ),
					'description' => esc_html__( 'Select button font color.', 'busia' ),
					'section'         => 'busia_elements_button_section',
					'show_opacity'    => true,
					
				)
			)
		);		
		$wp_customize->add_setting(
			'button_typography_hover',
			array(
				'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'button_typography_hover',
				array(
					'label'       => esc_html__( 'Hover Font Color', 'busia' ),
					'description' => esc_html__( 'Select button hover font color.', 'busia' ),
					'section'     => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_typography_icon',
			array(
				'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'button_typography_icon',
				array(
					'label'       => esc_html__( 'Icon Color', 'busia' ),
					'description' => esc_html__( 'Applies only if Icon is present. (Please Note: This option will work only for "Theme Button" element.)', 'busia' ),
					'section'     => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_typography_icon_hover',
			array(
				'default'           => '#ffffff',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'button_typography_icon_hover',
				array(
					'label'       => esc_html__( 'Hover Icon Color', 'busia' ),
					'description' => esc_html__( 'Applies only if Icon is present. (Please Note: This option will work only for "Theme Button" element.)', 'busia' ),
					'section'     => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_hover_style',
			array(
				'default'           => 'five',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Select2_Custom_Control(
				$wp_customize,
				'button_hover_style',
				array(
					'label'       => esc_html__( 'Select Hover Style', 'busia' ),
					'description' => esc_html__( 'Select Hover Style of the "Button". (Please Note: This option will work only for "Theme Button" element.)', 'busia' ),
					'section'     => 'busia_elements_button_section',
					'input_attrs' => array(
						'placeholder' => esc_html__( 'Please Select a Hover Style...', 'busia' ),
						'multiselect' => false,
					),
					'choices'     => array(
						'one'   => esc_html__( 'Style One (Fade)', 'busia' ),
						'two'   => esc_html__( 'Style Two (Sweep Right)', 'busia' ),
						'three' => esc_html__( 'Style Three (Zoom Out)', 'busia' ),
						'four'  => esc_html__( 'Style Four (Fade with Icon Right)', 'busia' ),
						'five'  => esc_html__( 'Style Five (3D Shadow With SlideUp)', 'busia' ),
						'six'   => esc_html__( 'Style Six (Horizontal Shake)', 'busia' ),
						'seven' => esc_html__( 'Style Seven (Zoom Out)', 'busia' ),
					),
				)
			)
		);
		// BUTTON PADDING.
		$wp_customize->add_setting(
			'button_padding_notice',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Simple_Notice_Custom_control(
				$wp_customize,
				'button_padding_notice',
				array(
					'label'   => esc_html__( 'Button Padding', 'busia' ),
					'section' => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_padding_top',
			array(
				'default'           => '13',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_padding_top',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_padding_right',
			array(
				'default'           => '22',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_padding_right',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_padding_bottom',
			array(
				'default'           => '13',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_padding_bottom',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_padding_left',
			array(
				'default'           => '22',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_padding_left',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_padding_unit',
			array(
				'default'           => 'px',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'button_padding_unit',
			array(
				'section' => 'busia_elements_button_section',
				'type'    => 'select',
				'choices' => array(
					'em'  => 'em',
					'%'   => '%',
					'px'  => 'px',
					'rem' => 'rem',
				),
			)
		);
		// BUTTON BORDER.
		$wp_customize->add_setting(
			'button_border_notice',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Simple_Notice_Custom_control(
				$wp_customize,
				'button_border_notice',
				array(
					'label'   => esc_html__( 'Border', 'busia' ),
					'section' => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_border_top',
			array(
				'default'           => '1',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_border_top',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_right',
			array(
				'default'           => '1',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_border_right',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_bottom',
			array(
				'default'           => '1',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_border_bottom',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_left',
			array(
				'default'           => '1',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_border_left',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_type',
			array(
				'default'           => 'solid',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'button_border_type',
			array(
				'section' => 'busia_elements_button_section',
				'type'    => 'select',
				'choices' => array(
					'solid'  => esc_html__( 'Solid', 'busia' ),
					'dashed' => esc_html__( 'Dashed', 'busia' ),
					'dotted' => esc_html__( 'Dotted', 'busia' ),
					'double' => esc_html__( 'Double', 'busia' ),
					'none'   => esc_html__( 'None', 'busia' ),
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_color',
			array(
				'default'           => '#1e4ec4',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'button_border_color',
				array(
					'section' => 'busia_elements_button_section',
				)
			)
		);
		// BUTTON BORDER HOVER.
		$wp_customize->add_setting(
			'button_border_hover_notice',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Simple_Notice_Custom_control(
				$wp_customize,
				'button_border_hover_notice',
				array(
					'label'   => esc_html__( 'Hover Border', 'busia' ),
					'section' => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_border_hover_top',
			array(
				'default'           => '0',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_border_hover_top',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_hover_right',
			array(
				'default'           => '0',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_border_hover_right',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_hover_bottom',
			array(
				'default'           => '0',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_border_hover_bottom',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_hover_left',
			array(
				'default'           => '0',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_border_hover_left',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_hover_type',
			array(
				'default'           => 'solid',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'button_border_hover_type',
			array(
				'section' => 'busia_elements_button_section',
				'type'    => 'select',
				'choices' => array(
					'solid'  => esc_html__( 'Solid', 'busia' ),
					'dashed' => esc_html__( 'Dashed', 'busia' ),
					'dotted' => esc_html__( 'Dotted', 'busia' ),
					'double' => esc_html__( 'Double', 'busia' ),
					'none'   => esc_html__( 'None', 'busia' ),
				),
			)
		);
		$wp_customize->add_setting(
			'button_border_hover_color',
			array(
				'default'           => '#1e4ec4',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'button_border_hover_color',
				array(
					'section' => 'busia_elements_button_section',
				)
			)
		);
		// BUTTON BORDER RADIUS.
		$wp_customize->add_setting(
			'button_br_notice',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Simple_Notice_Custom_control(
				$wp_customize,
				'button_br_notice',
				array(
					'label'   => esc_html__( 'Border Radius', 'busia' ),
					'section' => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_br_top',
			array(
				'default'           => '0',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_br_top',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_br_right',
			array(
				'default'           => '0',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_br_right',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_br_bottom',
			array(
				'default'           => '0',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_br_bottom',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_br_left',
			array(
				'default'           => '0',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			'button_br_left',
			array(
				'section'     => 'busia_elements_button_section',
				'type'        => 'number',
				'input_attrs' => array( // Optional.
					'min' => '0',
					'max' => '100',
				),
			)
		);
		$wp_customize->add_setting(
			'button_br_unit',
			array(
				'default'           => 'px',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_radio_sanitization',
			)
		);
		$wp_customize->add_control(
			'button_br_unit',
			array(
				'section' => 'busia_elements_button_section',
				'type'    => 'select',
				'choices' => array(
					'em'  => 'em',
					'%'   => '%',
					'px'  => 'px',
					'rem' => 'rem',
				),
			)
		);
		// BOX SHADOW
		$wp_customize->add_setting(
			'button_box_shadow_notice',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Simple_Notice_Custom_control(
				$wp_customize,
				'button_box_shadow_notice',
				array(
					'label'   => esc_html__( 'Box Shadow', 'busia' ),
					'section' => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_box_shadow_inset',
			array(
				'default'           => 0,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'button_box_shadow_inset',
				array(
					'label'   => esc_html__( 'Inset Shadow', 'busia' ),
					'section' => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_box_shadow_color',
			array(
				'default'           => '#000000',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Customize_Alpha_Color_Control(
				$wp_customize,
				'button_box_shadow_color',
				array(
					'section' => 'busia_elements_button_section',
				)
			)
		);
		$wp_customize->add_setting(
			'button_box_shadow_hl',
			array(
				'default'           => 5,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Slider_Custom_Control(
				$wp_customize,
				'button_box_shadow_hl',
				array(
					'label'       => esc_html__( 'Horizontal Length (px)', 'busia' ),
					'section'     => 'busia_elements_button_section',
					'input_attrs' => array(
						'min'  => -50,
						'max'  => 50,
						'step' => 1,
					),
				)
			)
		);
		$wp_customize->add_setting(
			'button_box_shadow_vl',
			array(
				'default'           => 5,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Slider_Custom_Control(
				$wp_customize,
				'button_box_shadow_vl',
				array(
					'label'       => esc_html__( 'Vertical Length (px)', 'busia' ),
					'section'     => 'busia_elements_button_section',
					'input_attrs' => array(
						'min'  => -50,
						'max'  => 50,
						'step' => 1,
					),
				)
			)
		);
		$wp_customize->add_setting(
			'button_box_shadow_br',
			array(
				'default'           => 5,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Slider_Custom_Control(
				$wp_customize,
				'button_box_shadow_br',
				array(
					'label'       => esc_html__( 'Blur Radius (px)', 'busia' ),
					'section'     => 'busia_elements_button_section',
					'input_attrs' => array(
						'min'  => -50,
						'max'  => 0,
						'step' => 100,
					),
				)
			)
		);
		$wp_customize->add_setting(
			'button_box_shadow_sp',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_sanitize_integer',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Slider_Custom_Control(
				$wp_customize,
				'button_box_shadow_sp',
				array(
					'label'       => esc_html__( 'Spread (px)', 'busia' ),
					'section'     => 'busia_elements_button_section',
					'input_attrs' => array(
						'min'  => -50,
						'max'  => 50,
						'step' => 1,
					),
				)
			)
		);
	}
	public function busia_register_pages_controls( $wp_customize ) {
		// Error 404 Start.
		$wp_customize->add_setting(
			'page_not_found_editor',
			array(
				'default'           => "<h1>Oops! Page is not available</h1><h2>We're not being able to find the page you're looking for</h2>",
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_TinyMCE_Custom_control(
				$wp_customize,
				'page_not_found_editor',
				array(
					'label'       => esc_html__( '404 Error Content', 'busia' ),
					'description' => esc_html__( 'Enter content to show on 404 page body.', 'busia' ),
					'section'     => 'busia_page_not_found_section',
					'input_attrs' => array(
						'toolbar1'     => 'formatselect bold italic bullist numlist alignleft aligncenter alignright link',
						'mediaButtons' => true,
					),
				)
			)
		);
		$wp_customize->add_setting(
			'page_not_found_button_text',
			array(
				'default'           => esc_html__( 'Back To Home', 'busia' ),
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'page_not_found_button_text',
			array(
				'label'       => esc_html__( 'Button Text', 'busia' ),
				'section'     => 'busia_page_not_found_section',
				'type'        => 'text',
				'input_attrs' => array(
					'class'       => 'my-custom-class',
					'style'       => 'border: 1px solid rebeccapurple',
					'placeholder' => __( 'Enter name...', 'busia' ),
				),
			)
		);		
		// Error 404 End.
		// Search Start.
		$wp_customize->add_setting(
			'search_page_bg',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'search_page_bg',
				array(
					'label'         => esc_html__( 'Background Image', 'busia' ),
					'description'   => esc_html__( 'Set Background Image for Search Page.', 'busia' ),
					'section'       => 'busia_search_section',
					'mime_type'     => 'image',  // Required. Can be image, audio, video, application, text
					'button_labels' => array( // Optional
						'select'       => esc_html__( 'Select File', 'busia' ),
						'change'       => esc_html__( 'Change File', 'busia' ),
						'default'      => esc_html__( 'Default', 'busia' ),
						'remove'       => esc_html__( 'Remove', 'busia' ),
						'placeholder'  => esc_html__( 'No file selected', 'busia' ),
						'frame_title'  => esc_html__( 'Select File', 'busia' ),
						'frame_button' => esc_html__( 'Choose File', 'busia' ),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'search_page_title',
			array(
				'default'           => esc_html__( 'Search', 'busia' ),
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'search_page_title',
			array(
				'label'       => esc_html__( 'Search Page Title', 'busia' ),
				'description' => esc_html__( 'Enter Search Page Banner Title', 'busia' ),
				'section'     => 'busia_search_section',
				'type'        => 'text',
				'input_attrs' => array(
					'class' => 'my-custom-class',
					'style' => 'border: 1px solid rebeccapurple',
				),
			)
		);
		$wp_customize->add_setting(
			'search_page_subtitle',
			array(
				'default'           => '',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'search_page_subtitle',
			array(
				'label'       => esc_html__( 'Search Page Subtitle', 'busia' ),
				'description' => esc_html__( 'Enter Search Page Banner Subtitle', 'busia' ),
				'section'     => 'busia_search_section',
				'type'        => 'text',
				'input_attrs' => array(
					'class' => 'my-custom-class',
					'style' => 'border: 1px solid rebeccapurple',
				),
			)
		);
		// Search End.
	}
	public function busia_register_blog_layout_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'blog-style',
			array(
				'default'           => 'default',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'blog-style',
				array(
					'label'       => esc_html__( 'Blog Style', 'busia' ),
					'description' => esc_html__( 'Select Blog Style', 'busia' ),
					'section'     => 'busia_blog_layout_section',
					'choices'     => array(
						'default' => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Style-Default.webp',
							'name'  => esc_html__( 'Default', 'busia' ),
						),
						'one'     => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Style-Classic.webp',
							'name'  => esc_html__( 'Grid', 'busia' ),
						),
						'two'     => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Style-Masonry.webp',
							'name'  => esc_html__( 'Metro', 'busia' ),
						),
						'three'   => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Style-List.webp',
							'name'  => esc_html__( 'Featured List', 'busia' ),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'blog-layout',
			array(
				'default'           => 'nosidebar',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'blog-layout',
				array(
					'label'       => esc_html__( 'Blog Layout', 'busia' ),
					'description' => esc_html__( 'Available for all except Blog Style "Default" option above.', 'busia' ),
					'section'     => 'busia_blog_layout_section',
					'choices'     => array(
						'leftsidebar'  => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Layout-Left-Sidebar.png',
							'name'  => esc_html__( 'Left Sidebar', 'busia' ),
						),
						'nosidebar'    => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Layout-No-Sidebar.png',
							'name'  => esc_html__( 'No Sidebar', 'busia' ),
						),
						'rightsidebar' => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Layout-Right-Sidebar.png',
							'name'  => esc_html__( 'Right Sidebar', 'busia' ),
						),
					),
				)
			)
		);
		$wp_customize->add_setting(
			'blog-layout-sidebar-width',
			array(
				'default'           => 'three-grid',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Dropdown_Select2_Custom_Control(
				$wp_customize,
				'blog-layout-sidebar-width',
				array(
					'label'       => esc_html__( 'Sidebar Width', 'busia' ),
					'description' => esc_html__( 'Select sidebar width for blog pages.', 'busia' ),
					'section'     => 'busia_blog_layout_section',
					'input_attrs' => array(
						'placeholder' => esc_html__( 'Please Select the Width', 'busia' ),
						'multiselect' => false,
					),
					'choices'     => array(
						'three-grid' => esc_html__( '3 Grids', 'busia' ),
						'four-grid'  => esc_html__( '4 Grids', 'busia' ),
						'five-grid'  => esc_html__( '5 Grids', 'busia' ),
					),
				)
			)
		);
	}
	public function busia_register_single_blog_layout_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'blog_single_layout_style',
			array(
				'default'           => 'one',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'blog_single_layout_style',
				array(
					'label'       => esc_html__( 'Blog Single Page Style', 'busia' ),
					'description' => esc_html__( 'Select Blog Single Page Style', 'busia' ),
					'section'     => 'busia_blog_single_layout_section',
					'choices'     => array(
						'default' => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Single-Style-Default.webp',
							'name'  => esc_html__( 'Default', 'busia' ),
						),
						'one'     => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Single-Style-One.webp',
							'name'  => esc_html__( 'Style One', 'busia' ),
						),
						'two'     => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Blog-Single-Style-Two.webp',
							'name'  => esc_html__( 'Style Two', 'busia' ),
						),
					),
				)
			)
		);
	}
	public function busia_register_blog_options_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'display_social_sharing',
			array(
				'default'           => 0,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'display_social_sharing',
				array(
					'label'       => esc_html__( 'Social Sharing Box', 'busia' ),
					'description' => esc_html__( 'Toggle the switch to show/hide Social Sharing icons on Blog details page.', 'busia' ),
					'section'     => 'busia_blog_options_section',
				)
			)
		);
		$wp_customize->add_setting(
			'display_author_information',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'display_author_information',
				array(
					'label'       => esc_html__( 'Author Name', 'busia' ),
					'description' => esc_html__( 'Toggle the switch to show/hide author name on Blog Details Page.', 'busia' ),
					'section'     => 'busia_blog_options_section',
				)
			)
		);
		$wp_customize->add_setting(
			'display_categries',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'display_categries',
				array(
					'label'       => esc_html__( 'Categories Name', 'busia' ),
					'description' => esc_html__( 'Toggle the switch to show/hide the categories on both Blog Page and Blog Details Page.', 'busia' ),
					'section'     => 'busia_blog_options_section',
				)
			)
		);
		$wp_customize->add_setting(
			'display_tags',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'display_tags',
				array(
					'label'       => esc_html__( 'Tags', 'busia' ),
					'description' => esc_html__( 'Toggle the switch to show/hide the tags on both Blog Page and Blog Details Page.', 'busia' ),
					'section'     => 'busia_blog_options_section',
				)
			)
		);
		$wp_customize->add_setting(
			'display_navigation',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'display_navigation',
				array(
					'label'       => esc_html__( 'Next/Previous', 'busia' ),
					'description' => esc_html__( 'Toggle the switch to show/hide pagination on Blog Details Page.', 'busia' ),
					'section'     => 'busia_blog_options_section',
				)
			)
		);
		$wp_customize->add_setting(
			'blog_comment_display',
			array(
				'default'           => 1,
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_switch_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Toggle_Switch_Custom_control(
				$wp_customize,
				'blog_comment_display',
				array(
					'label'       => esc_html__( 'Comments', 'busia' ),
					'description' => esc_html__( 'Toggle the switch to show/hide comments on Blog Details Page.', 'busia' ),
					'section'     => 'busia_blog_options_section',
				)
			)
		);
	}	
	public function busia_register_shop_controls( $wp_customize ) {
		$wp_customize->add_setting(
			'shop-style',
			array(
				'default'           => 'shop-style-four-column',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);		
		$wp_customize->add_setting(
			'shop-products-per-page',
			array(
				'default'           => '12',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			'shop-products-per-page',
			array(
				'label'   => esc_html__( 'Products Per Page', 'busia' ),
				'section' => 'busia_shop_section',
				'type'    => 'text',
			)
		);
		$wp_customize->add_setting(
			'shop-sidebar',
			array(
				'default'           => 'shop-nosidebar',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'shop-sidebar',
				array(
					'label'       => esc_html__( 'Sidebar', 'busia' ),
					'description' => esc_html__( 'Select Sidebar', 'busia' ),
					'section'     => 'busia_shop_section',
					'choices'     => array(
						'shop-leftsidebar' => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Product-Listing-Left-Sidebar.jpg',
							'name'  => esc_html__( 'Left Sidebar', 'busia' ),
						),
						'shop-nosidebar'     => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Product-Listing-No-Sidebar.jpg',
							'name'  => esc_html__( 'No Sidebar', 'busia' ),
						),
						'shop-rightsidebar'     => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Product-Listing-Right-Sidebar.jpg',
							'name'  => esc_html__( 'Right Sidebar', 'busia' ),
						),
						
						
					),
				)
			)
		);
		
	
	$wp_customize->add_setting(
			'shop_box_style',
			array(
				'default'           => 'style-eight',
				'transport'         => 'refresh',
				'sanitize_callback' => 'busia_text_sanitization',
			)
		);
		$wp_customize->add_control(
			new Radiantthemes_Image_Radio_Button_Custom_Control(
				$wp_customize,
				'shop_box_style',
				array(
					'label'       => esc_html__( 'Shop Box Style', 'busia' ),
					'description' => esc_html__( 'Select Shop Box', 'busia' ),
					'section'     => 'busia_shop_section',
					'choices'     => array(
						'style-eight' => array(
							'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/customizer/Shop-Box-Style-Seven.jpg',
							'name'  => esc_html__( 'Default Shop Box', 'busia' ),
						),
						
						
						
					),
				)
			)
		);
		
	}
	public static function css( $selector, $property, $theme_mod ) {
		$return    = '';
		$theme_mod = get_theme_mod( $theme_mod );
		if ( ! empty( $theme_mod ) ) {
			$return = sprintf(
				'%s { %s:%s; }',
				$selector,
				$property,
				$theme_mod
			);
			return $return;
		}
	}
}
/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( dirname( __FILE__ ) ) . 'custom-controls.php';
/**
 * Initialise our Customizer settings
 */
$busia_settings = new busia_initialise_customizer_settings();