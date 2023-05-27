<?php
/**
 * Include files for Elementor widgets
 *
 * @package RadiantThemes
 */
namespace RadiantthemesAddons;
/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.2.0
 */
class Plugin {
	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;
	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/**
	 * Function widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script(
			'radiantthemes-addons-core',
			plugins_url( '/assets/js/radiantthemes-addons-core.js', __FILE__ ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-addons-custom',
			plugins_url( '/assets/js/radiantthemes-addons-custom.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);
		wp_register_script(
			'radiant-accordion',
			plugins_url( '/assets/js/accordion.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);			
		wp_register_script(
			'radiantthemes-testimonial',
			plugins_url( '/assets/js/testimonial.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);	
		wp_register_script(
			'radiantthemes-client',
			plugins_url( '/assets/js/client.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-blog',
			plugins_url( '/assets/js/blog.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-team',
			plugins_url( '/assets/js/team.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-popup-video',
			plugins_url( '/assets/js/popup-video.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);		
		wp_register_script(
			'radiantthemes-appear-progressbar',
			plugins_url( '/assets/js/jquery.appear.min.js', __FILE__ ),
			[],
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-progressbar',
			plugins_url( '/assets/js/progressbar.js', __FILE__ ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-slider',
			plugins_url( '/assets/js/slider.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);		
		wp_register_script(
			'radiantthemes-tabs',
			plugins_url( '/assets/js/tab.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);		
		wp_register_script(
			'rt-velocity',
			plugins_url( '/assets/js/velocity.min.js', __FILE__ ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_register_script(
			'rt-velocity-ui',
			plugins_url( '/assets/js/rt-velocity.ui.js', __FILE__ ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_register_script(
			'rt-vertical-menu',
			plugins_url( '/assets/js/rt-vertical-menu.js', __FILE__ ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-search',
			plugins_url( '/assets/js/rt-custom-search.js', __FILE__ ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-moving-image',
			plugins_url( '/assets/js/moving-image.js', __FILE__ ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-text-anim',
			plugins_url( '/assets/js/anime.2.0.2.min.js', __FILE__ ),
			array( 'jquery' ),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-text-animation',
			plugins_url( '/assets/js/animation.js', __FILE__ ),
			array( 'jquery' ),
			time(),
			true
		);		
		wp_register_script(
			'modernizr-custom',
			plugins_url( '/assets/js/modernizr.custom.js', __FILE__ ),
			array(),
			time(),
			true
		);
		wp_register_script(
			'rt-search',
			plugins_url( '/assets/js/rt-search.js', __FILE__ ),
			array( 'modernizr-custom' ),
			time(),
			true
		);		
		wp_register_script(
			'radiantthemes-case-studies-slider',
			plugins_url( '/assets/js/case-studies-slider.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);		
		wp_register_script(
			'rt-animated-main',
			plugins_url( '/assets/js/rt-animated-main.js', __FILE__ ),
			array(),
			time(),
			true
		);
		wp_register_script(
			'rt-case-tilt',
			plugins_url( '/assets/js/tilt.jquery.min.js', __FILE__ ),
			array(),
			time(),
			true
		);
		wp_register_script(
			'rt-case',
			plugins_url( '/assets/js/rt-case.js', __FILE__ ),
			array(),
			time(),
			true
		);
		wp_register_script(
			'radiantthemes-product',
			plugins_url( '/assets/js/product.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);
		wp_register_script(
			'rt-product-cat',
			plugins_url( '/assets/js/product-cat.js', __FILE__ ),
			array( 'jquery', 'radiantthemes-addons-core' ),
			time(),
			true
		);
	}
	/**
	 * Function widget_styles
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_styles() {
		wp_register_style(
			'rt-case',
			plugins_url( '/assets/css/rt-case.css', __FILE__ ),
			array(),
			time(),
			'all'
		);		
		wp_register_style(
			'rt-blog',
			plugins_url( '/assets/css/rt-blog.css', __FILE__ ),
			array(),
			time(),
			'all'
		);
		wp_register_style(
			'rt-price',
			plugins_url( '/assets/css/rt-price.css', __FILE__ ),
			array(),
			time(),
			'all'
		); 
		wp_register_style(
			'rt-accordion',
			plugins_url( '/assets/css/rt-accordion.css', __FILE__ ),
			array(),
			time(),
			'all'
		);
		wp_register_style(
			'rt-testimonial',
			plugins_url( '/assets/css/rt-testimonial.css', __FILE__ ),
			array(),
			time(),
			'all'
		);
		wp_register_style(
			'rt-price',
			plugins_url( '/assets/css/rt-price.css', __FILE__ ),
			array(),
			time(),
			'all'
		);
		wp_register_style(
			'rt-team',
			plugins_url( '/assets/css/rt-team.css', __FILE__ ),
			array(),
			time(),
			'all'
		);
		wp_register_style(
			'rt-animated-heading',
			plugins_url( '/assets/css/rt-animated-heading.css', __FILE__ ),
			array(),
			time(),
			'all'
		);
		wp_register_style(
			'radiantthemes-addons-custom',
			plugins_url( '/assets/css/radiantthemes-addons-custom.css', __FILE__ ),
			array(),
			time(),
			'all'
		);
		wp_register_style(
			'rt-custom-popup',
			plugins_url( '/assets/css/rt-custom-popup.css', __FILE__ ),
			array(),
			time(),
			'all'
		);
		wp_register_style(
			'rt-heading',
			plugins_url( '/assets/css/rt-heading.css', __FILE__ ),
			array(),
			time(),
			'all'
		);
		wp_enqueue_style( 'radiantthemes-addons-custom' );

	}
	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once __DIR__ . '/widgets/animated-heading/class-radiantthemes-style-animated-heading.php';
		require_once __DIR__ . '/widgets/custom-heading/class-radiantthemes-style-custom-heading.php';		
		require_once __DIR__ . '/widgets/case-studies-slider/class-radiantthemes-case-studies-slider.php';
	    require_once __DIR__ . '/widgets/case-studies/class-radiantthemes-case-studies.php';		
		require_once __DIR__ . '/widgets/accordion/class-radiantthemes-style-accordion.php';
		require_once __DIR__ . '/widgets/blog/class-radiantthemes-style-blog.php';		
		require_once __DIR__ . '/widgets/client/class-radiantthemes-style-client.php';
		require_once __DIR__ . '/widgets/custom-popup/class-radiantthemes-style-custom-popup.php';
		require_once __DIR__ . '/widgets/custom-image/class-radiantthemes-custom-image.php';
		require_once __DIR__ . '/widgets/custom-button/class-radiantthemes-style-custom-button.php';		
		require_once __DIR__ . '/widgets/progressbar/class-radiantthemes-style-progressbar.php';
		require_once __DIR__ . '/widgets/portfolio/class-radiantthemes-style-portfolio.php';
        require_once __DIR__ . '/widgets/product_box/class-radiantthemes-product-box.php';
		require_once __DIR__ . '/widgets/product_cat/class-radiantthemes-product-cat.php';
		require_once __DIR__ . '/widgets/team/class-radiantthemes-style-team.php';
		require_once __DIR__ . '/widgets/testimonial/class-radiantthemes-style-testimonial.php';
		require_once __DIR__ . '/widgets/popup-video/class-radiantthemes-style-popup-video.php';
		require_once __DIR__ . '/widgets/tabs/class-radiantthemes-style-tabs.php';		
		require_once __DIR__ . '/widgets/header-nav-menu/class-radiantthemes-header-custom-menu.php';		
		require_once __DIR__ . '/widgets/price-table/class-elementor-price-table.php';		
	}
	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files.
		$this->include_widgets_files();
		// Animated Heading.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Animated_Heading() );		
		// Accordion.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Accordion() );
		// Blog.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Blog() );
		// Custom Button.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Custom_Button() );
		// Custom Heading.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Custom_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Custom_Image() );
		// Custom Popup.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Custom_Popup() );
		// Case Studies Slider.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_style_Case_Studies_Slider() );
		// Testimonial.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Testimonial() );
		// Popup Video.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Popup_Video() );
		// Header.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Header_Custom_Menu() );
		// Client.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Client() );
		// Progressbar.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Progressbar() );
		// Productbox.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_style_Product() );
		// Product Category.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_style_Product_Cat() );
		// Case Studies.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_style_Case_Studies() );
		// Team.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Team() );
		// Tabs.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Tabs() );
		
		// Portfolio.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Portfolio() );
		// Pricing Table.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Radiantthemes_Style_Pricing_Table() );
	}
	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts.
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'widget_scripts' ) );
		// Register widget styles.
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'widget_styles' ) );
		// Register widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
		// Enqueue styles and scripts in Elementor Editor.
		add_action(
			'elementor/preview/enqueue_styles',
			function() {

				// ADD RADIANTTHEMES CORE CSS.
				wp_enqueue_style(
					'elementor-preview-style',
					plugins_url( '/assets/css/radiantthemes-addons-custom.css', __FILE__ ),
					array(),
					time(),
					'all'
				);

			}
		);
	}
}
// Instantiate Plugin Class.
Plugin::instance();