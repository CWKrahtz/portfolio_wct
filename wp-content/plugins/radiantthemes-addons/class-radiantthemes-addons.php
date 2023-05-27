<?php
/**
 * Includes Radiant Theme Addons elements like Blog,Team and Testimonials.
 *
 * @package RadiantThemes
 *
 * Plugin Name: Radiantthemes Addons
 * Description: Addon elements for Elementor Page Builder.
 * Plugin URI:  https://radiantthemes.com/
 * Version:     2.0.0
 * Author:      RadiantThemes
 * Author URI:  https://radiantthemes.com/
 * Text Domain: radiantthemes-addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Radiantthemes Addons Class
 *
 * The init class that runs the Hello World plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match your plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 *
 * @since 1.0.0
 */
final class Radiantthemes_Addons {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.6';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Radiantthemes_Addons The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Radiantthemes_Addons An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		// Load translation.
		add_action( 'init', [ $this, 'i18n' ] );		
		// Init Plugin.
		add_action( 'plugins_loaded', [ $this, 'init' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );
		add_action( 'radiantthemes_before_nav_menu', [ $this, 'radiantthemes_before_nav_menu_callback' ] );
		add_action( 'wp_enqueue_scripts', array( $this, 'radiantthemes_change_elementor_frontend_css' ) );
	}

	public function radiantthemes_change_elementor_frontend_css() {
		// Bail if Elementor is not available.
		if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
			return;
		}
		global $wp_styles;
		$path = $_SERVER['DOCUMENT_ROOT'] . parse_url( $wp_styles->registered['elementor-frontend']->src )['path'];
		$css  = file_get_contents( $path );
		$css  = str_replace( '.elementor-heading-title{padding:0;margin:0;line-height:1}', '.elementor-heading-title{padding:0;}', $css, $count );
		if ( $count ) {
			file_put_contents( $path, $css );
		}
		$elementor =  \Elementor\Plugin::instance();
		$elementor->frontend->enqueue_styles();
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function radiantthemes_before_nav_menu_callback() {
		$minicart_items = '';
		echo '<div class="hamburger-group">';
		ob_start();
		$minicart       = ob_get_clean();
		$minicart_items = '<div class="hamburger-minicart"><div class="minicart"><div class="widget_shopping_cart_content">' . $minicart . '</div></div></div>';
		//echo wp_kses( $minicart_items, 'rt-content' );
		echo $minicart_items;
		echo '</div>';
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'radiantthemes-addons' );
	}	

	/**
	 * Initialize the plugin
	 *
	 * Validates that Elementor is already loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed include the plugin class.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated.
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version.
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version.
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin.
		require_once 'class-plugin.php';
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'radiantthemes-addons' ),
			'<strong>' . esc_html__( 'Radiantthemes Addons', 'radiantthemes-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'radiantthemes-addons' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'radiantthemes-addons' ),
			'<strong>' . esc_html__( 'Radiantthemes Addons', 'radiantthemes-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'radiantthemes-addons' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'radiantthemes-addons' ),
			'<strong>' . esc_html__( 'Radiantthemes Addons', 'radiantthemes-addons' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'radiantthemes-addons' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Add Custom Elementor Categories
	 *
	 * @param [type] $elements_manager Category Names Array.
	 * @since 1.0.0
	 * @access public
	 */
	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'radiant-widgets-category',
			[
				'title' => __( 'Radiant Addons', 'plugin-name' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

// Instantiate Radiantthemes_Addons.
Radiantthemes_Addons::instance();

/**
 * Undocumented function
 *
 * @param array $attr Array.
 * @return void
 */
function rt_parameter( $attr ) {
	?>

	<div class="social-media">
                                        <ul>
                                            <li><a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' ); ?><?php the_permalink(); ?>"><svg enable-background="new 0 0 24 24" height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z" />
                                                    </svg></a></li>
                                            <li><a href="<?php echo esc_url( 'http://twitter.com/share?text=' ); ?><?php echo rawurlencode( get_the_title() ); ?>&amp;url=<?php the_permalink(); ?>"><svg version="1.1"  x="0px" y="0px" viewBox="0 0 512 512" height="16" width="16" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
            c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
            c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
            c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
            c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
            c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
            C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
            C480.224,136.96,497.728,118.496,512,97.248z" />
                                                            </g>
                                                        </g>

                                                    </svg></a></li>
                                            <li><a href="<?php echo esc_url( 'https://www.linkedin.com/shareArticle?mini=true&amp;url=' ); ?><?php the_permalink(); ?>&amp;title=<?php echo rawurlencode( get_the_title() ); ?>&amp;summary=&amp;source="><svg enable-background="new 0 0 24 24" height="16" width="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z" />
                                                        <path d="m.396 7.977h4.976v16.023h-4.976z" />
                                                        <path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z" />
                                                    </svg></a></li>
                                            <li><a href="<?php echo esc_url( 'https://www.instagram.com/share?url=' ); ?><?php the_permalink(); ?>"><svg enable-background="new 0 0 24 24" height="16" width="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m12.326 0c-6.579.001-10.076 4.216-10.076 8.812 0 2.131 1.191 4.79 3.098 5.633.544.245.472-.054.94-1.844.037-.149.018-.278-.102-.417-2.726-3.153-.532-9.635 5.751-9.635 9.093 0 7.394 12.582 1.582 12.582-1.498 0-2.614-1.176-2.261-2.631.428-1.733 1.266-3.596 1.266-4.845 0-3.148-4.69-2.681-4.69 1.49 0 1.289.456 2.159.456 2.159s-1.509 6.096-1.789 7.235c-.474 1.928.064 5.049.111 5.318.029.148.195.195.288.073.149-.195 1.973-2.797 2.484-4.678.186-.685.949-3.465.949-3.465.503.908 1.953 1.668 3.498 1.668 4.596 0 7.918-4.04 7.918-9.053-.016-4.806-4.129-8.402-9.423-8.402z" />
                                                    </svg></a></li>
                                        </ul>
                                    </div>
	<?php
}
add_shortcode( 'rt_social_links', 'rt_parameter' );
/**
 * Change slug of custom post types
 *
 * @param  [type] $args      description.
 * @param  [type] $post_type description.
 * @return [string]
 */
function busia_register_post_type_args( $args, $post_type ) {

	if ( 'portfolio' === $post_type ) {
		$args['rewrite']['slug'] = get_theme_mod( 'change_slug_portfolio', 'portfolio' );
	}

	if ( 'team' === $post_type ) {
		$args['rewrite']['slug'] = get_theme_mod( 'change_slug_team', 'team' );
	}

	if ( 'case-studies' === $post_type ) {
		$args['rewrite']['slug'] = get_theme_mod( 'change_slug_casestudies', 'case-studies' );
	}

	return $args;
}
add_filter( 'register_post_type_args', 'busia_register_post_type_args', 10, 2 );

/**
 * Add new mimes for custom font upload
 */
if ( ! function_exists( 'busia_upload_mimes' ) ) {
	/**
	 * [busia_upload_mimes description]
	 *
	 * @param array $existing_mimes description.
	 */
	function busia_upload_mimes( $existing_mimes = array() ) {
		$existing_mimes['woff']  = 'application/x-font-woff';
		$existing_mimes['woff2'] = 'application/x-font-woff2';
		$existing_mimes['ttf']   = 'application/x-font-ttf';
		$existing_mimes['svg']   = 'image/svg+xml';
		$existing_mimes['eot']   = 'application/vnd.ms-fontobject';
		return $existing_mimes;
	}
}
add_filter( 'upload_mimes', 'busia_upload_mimes' );
function busia_add_cpt_support() {

	// if exists, assign to $cpt_support var.
	$cpt_support = get_option( 'elementor_cpt_support' );

	// check if option DOESN'T exist in db.
	if ( ! $cpt_support ) {
		$cpt_support = array(
			'page',
			'post',
			'testimonial',
			'team',
			'portfolio',
			'client',
			'case-studies',
			'mega_menu',
		); // create array of our default supported post types.
		update_option( 'elementor_cpt_support', $cpt_support ); // write it to the database.
	} elseif ( ! in_array( 'testimonial', $cpt_support, true ) ) {
		$cpt_support[] = 'testimonial'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'team', $cpt_support, true ) ) {
		$cpt_support[] = 'team';
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'portfolio', $cpt_support, true ) ) {
		$cpt_support[] = 'portfolio'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'client', $cpt_support, true ) ) {
		$cpt_support[] = 'client'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'case-studies', $cpt_support, true ) ) {
		$cpt_support[] = 'case-studies'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	} elseif ( ! in_array( 'mega_menu', $cpt_support, true ) ) {
		$cpt_support[] = 'mega_menu'; // append to array.
		update_option( 'elementor_cpt_support', $cpt_support ); // update database.
	}
	// otherwise do nothing, portfolio already exists in elementor_cpt_support option.
}
add_action( 'after_switch_theme', 'busia_add_cpt_support' );
// ---- Get like or dislike count
function busia_get_like_count( $type = 'likes' ) {
	$current_count = get_post_meta( get_the_id(), $type, true );
	return ( $current_count ? $current_count : 0 );
}

	// ---- Process like or dislike
function busia_process_like() {
	$processed_like = false;
	$redirect       = false;

	// Check if like or dislike
	if ( is_singular( 'post' ) ) {
		if ( isset( $_GET['post_action'] ) ) {
			if ( $_GET['post_action'] == 'like' ) {
				// Like
				$like_count = get_post_meta( get_the_id(), 'likes', true );

				if ( $like_count ) {
					$like_count = $like_count + 1;
				} else {
					$like_count = 1;
				}

				$processed_like = update_post_meta( get_the_id(), 'likes', $like_count );
			} elseif ( $_GET['post_action'] == 'dislike' ) {
				// Dislike
				$dislike_count = get_post_meta( get_the_id(), 'dislikes', true );

				if ( $dislike_count ) {
					$dislike_count = $dislike_count + 1;
				} else {
					$dislike_count = 1;
				}

				$processed_like = update_post_meta( get_the_id(), 'dislikes', $dislike_count );
			}

			if ( $processed_like ) {
				$redirect = get_the_permalink();
			}
		}
	}

	// Redirect
	if ( $redirect ) {
		wp_redirect( $redirect );
		die;
	}
}

	add_action( 'template_redirect', 'busia_process_like' );
		// ---- Add buttons to top of post content
function busia_post_likes( $content ) {
	// Check if single post
	if ( is_singular( 'post' ) ) {
		ob_start();

		?>
				<ul class="likes">
					<li class="likes__item likes__item--like">
						<a href="<?php echo add_query_arg( 'post_action', 'like' ); ?>">
							Like (<?php echo busia_get_like_count( 'likes' ); ?>)
						</a>
					</li>
			<?php if ( get_theme_mod( 'display_social_sharing' ) ) : ?>
						<div class="rt-social"><span class="ti-sharethis"></span><?php echo do_shortcode( '[rt_social_links]' ); ?></div>
					<?php endif; ?>

				</ul>

			<?php

			$output = ob_get_clean();

			return $content . $output;
	} else {
		return $content;
	}
}

