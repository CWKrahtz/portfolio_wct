<?php
/**
 * Case Studies Slider Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Schemes\Typography;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Blog widget.
 *
 * Elementor widget that displays posts in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_style_Case_Studies_Slider extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'radiant-case_studies_slider';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Case Studies Slider', 'radiantthemes-addons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-list';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return [
			'rt-case',
		];
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return [
			'radiantthemes-case-studies-slider',
		];
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'radiant-widgets-category' ];
	}


	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'style_variation',
			[
				'label'       => esc_html__( 'Case Studies Slider Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'one'    => esc_html__( 'Style One', 'radiantthemes-addons' ),
						'two'    => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					
					
				],
				'default'     => 'one',
			]
		);
		
        $this->add_control(
			'case_studies_category',
			[
				'label'     => __( 'Case Studies Category', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::TEXT,
                'description' => esc_html__( 'Display posts from a specific category (enter case studies category slug name). Use "all" to dislay all posts. ', 'radiantthemes-addons' ),
				'default'   => 'all',
				
			]
		);
		
		$this->add_control(
			'btn-text',
			[
				'label'       => __( 'Button Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Discover More',
					
				
			]
		);
		$this->add_control(
			'max_posts',
			[
				'label'       => __( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
				'default'     => '-1',
				
			]
		);
		$this->add_control(
			'space_between_posts',
			[
				'label'       => esc_html__( 'Space beteen posts', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Space between Two Posts', 'radiantthemes-addons' ),
				'default'     => 30,
			]
		);
		$this->add_control(
			'posts_in_desktop',
			[
				'label'       => __( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Posts on Desktop (in single row)', 'radiantthemes-addons' ),
				'default'     => '5',
				
			]
		);
		$this->add_control(
			'posts_in_tab',
			[
				'label'       => __( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Posts on Tab (in single row)', 'radiantthemes-addons' ),
				'default'     => '5',
				
			]
		);
		$this->add_control(
			'posts_in_mobile',
			[
				'label'       => __( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Posts on Mobile (in single row)', 'radiantthemes-addons' ),
				'default'     => '1',
				
			]
		);
		$this->add_control(
			'case_studies_slider_looping_order',
			[
				'label'       => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'date'    => esc_html__( 'Date', 'radiantthemes-addons' ),
					'ID'    => esc_html__( 'ID', 'radiantthemes-addons' ),
					'title'    => esc_html__( 'Title', 'radiantthemes-addons' ),
					'modified'    => esc_html__( 'Modified', 'radiantthemes-addons' ),
					'random'    => esc_html__( 'Random', 'radiantthemes-addons' ),
					'menu_order'    => esc_html__( 'Menu order', 'radiantthemes-addons' ),
					
				],
				'default'     => 'ID',
			]
		);
		$this->add_control(
			'case_studies_slider_looping_sort',
			[
				'label'       => esc_html__( 'Sort Order', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'ASC'    => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC'    => esc_html__( 'Descending', 'radiantthemes-addons' ),					
					
				],
				'default'     => 'DESC',
			]
		);
         $this->add_control(
			'allow_dots',
			[
				'label'       => esc_html__( 'Allow Dots for Navigation?', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default'     => 'true',				
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Title', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'radiantthemes-addons' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' =>
					'{{WRAPPER}} .rt-case-study-box1.element-one .case-study-box h5',

			]
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
				    '{{WRAPPER}} .rt-case-study-box1.element-one .case-study-box h5 a' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .rt-case-study-box1.element-one .case-study-box h5 a:hover' => 'color: {{VALUE}} !important;',
				),
				'default'   => '#000',
				
			)
		);

		
		
		$this->end_controls_section();
		$this->start_controls_section(
			'style_con',
			[
				'label' => __( 'Content', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'radiantthemes-addons' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' =>
					'{{WRAPPER}} .excerpt',

			]
		);
		$this->add_control(
			'content_color',
			array(
				'label'     => esc_html__( 'Content Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .excerpt' => 'color: {{VALUE}};',
				),
				'default'   => '#fff',
				
			)
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'style_cat',
			[
				'label' => __( 'Category', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'cat_typography',
				'label'    => __( 'Typography', 'radiantthemes-addons' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' =>
					'{{WRAPPER}} .case-catagory',

			]
		);
		$this->add_control(
			'cat_color',
			array(
				'label'     => esc_html__( 'Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
				    '{{WRAPPER}} .case-catagory' => 'color: {{VALUE}} !important;',
					
				),
				'default'   => '#000',
				
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'style_bu',
			[
				'label' => __( 'Button', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'bu_typography',
				'label'    => __( 'Typography', 'radiantthemes-addons' ),
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' =>
					'{{WRAPPER}} .case-bot',

			]
		);
		$this->add_control(
			'bu_color',
			array(
				'label'     => esc_html__( 'Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
				    '{{WRAPPER}} .case-bot' => 'color: {{VALUE}} !important;',
					
				),
				'default'   => '#000',
				
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'style_h',
			[
				'label' => __( 'Hover', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'h_color',
			array(
				'label'     => esc_html__( 'Hover background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-case-study-box1.element-one .case-study-box .mask' => 'background: {{VALUE}};',
				),
				'default'   => '#000',
				
			)
		);
		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		    //$random_class = 'rt' . rand();
			//$custom_css   = '';

			//$custom_css .= $settings['case_studies_slider_color'] ? '.radiantthemes-case-studies-slider.element-' . $settings['style_variation'] . '.' . $random_class . ' .radiantthemes-case-studies-slider-item > .holder > .action-button > .btn{
             //   background-color: ' . $settings['case_studies_slider_color'] . ';
           //  }' : '';
			//wp_add_inline_style( 'radiantthemes-addons-custom', $custom_css );

			//$enable_zoom = ( 'yes' === $settings['case_studies_slider_enable_zoom'] ) ? ' has-fancybox' : '';
		
			$output = '<div class="rt-case-study-box1 element-' . esc_attr( $settings['style_variation'] ) . '   swiper-container"';
             $output .= ' data-mobile-items="';
			$output .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output .= $settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
			$output .= '<div class="swiper-wrapper">';
		

if ( 'all' == $settings['case_studies_category'] || '' == $settings['case_studies_category'] ) {
	$case_studies_category = '';
} else {
	$case_studies_category = array(
		array(
			'taxonomy' => 'case-study-category',
			'field'    => 'slug',
			'terms'    => esc_attr( $settings['case_studies_category'] ),
		),
	);
}
/*$output = '<div class="radiantthemes-case-studies-slider element-' . $settings['style_variation'] . ' owl-carousel ' . esc_attr( $random_class ) . esc_attr( $enable_zoom ) . '" data-case-studies-loop="' . esc_attr( $settings['case_studies_slider_allow_loop'] ) . '" data-case-studies-autoplay="' . esc_attr( $settings['case_studies_slider_allow_autoplay'] ) . '" data-case-studies-autoplaytimeout="' . esc_attr( $settings['case_studies_slider_autoplay_timeout'] ) . '" data-case-studies-desktopitem="' . esc_attr( $settings['case_studies_slider_items_in_desktop'] ) . '" data-case-studies-tabitem="' . esc_attr( $settings['case_studies_slider_items_in_tab'] ) . '" data-case-studies-mobileitem="' . esc_attr( $settings['case_studies_slider_items_in_mobile'] ) . '">';*/

if ( empty( $settings['max_posts'] ) ) {
			$settings['max_posts'] = -1;
		}
			

$args     = array(
	'post_type'      => 'case-studies',
	'posts_per_page' => $settings['max_posts'],
	'orderby'        => esc_attr( $settings['case_studies_slider_looping_order'] ),
	'order'          => esc_attr( $settings['case_studies_slider_looping_sort'] ),
	'tax_query'      => $case_studies_category,
);
$query = null;
$query = new \WP_Query( $args );

			$data = 0;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				require 'template/template-case-studies-slider-style-' . $settings['style_variation'] . '.php';
			}
			wp_reset_postdata();
		} else {
			$output .= '<p>No items found</p>';
		}
			$output .= '</div>';
			//if( "one"==$settings['style_variation'] && 'yes' === $settings['allow_dots']) {
			//$output .= '<div class="swiper-pagination"></div>';
			//}
			$output .= '<div class="swiper-pre-nex">';
			$output .= '<div class="swiper-button-next">';
			$output .= '<svg width="18" height="32" viewBox="0 0 18 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.3005 14.9711L2.75502 0.426024C2.18712 -0.142024 1.26602 -0.142024 0.698015 0.426121C0.130015 0.99417 0.130014 1.91509 0.698114 2.48314L14.215 15.9997L0.698015 29.517C0.130015 30.0851 0.130014 31.006 0.698114 31.574C0.982014 31.8581 1.35431 32 1.72651 32C2.09881 32 2.47112 31.8581 2.75512 31.5739L17.3005 17.0281C17.5734 16.7553 17.7266 16.3854 17.7266 15.9996C17.7266 15.6139 17.5734 15.2439 17.3005 14.9711Z" fill="#ffffff"/></svg>';
			$output .= '</div>';
			$output .= '<div class="swiper-button-prev">';
			$output .= '<svg width="18" height="32" viewBox="0 0 18 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.698138 14.9711L15.2436 0.426024C15.8115 -0.142024 16.7326 -0.142024 17.3006 0.426121C17.8686 0.99417 17.8686 1.91509 17.3005 2.48314L3.78362 15.9997L17.3006 29.517C17.8686 30.0851 17.8686 31.006 17.3005 31.574C17.0166 31.8581 16.6443 32 16.2721 32C15.8998 32 15.5275 31.8581 15.2435 31.5739L0.698138 17.0281C0.425265 16.7553 0.272053 16.3854 0.272053 15.9996C0.272053 15.6139 0.425265 15.2439 0.698138 14.9711Z" fill="#ffffff"/></svg>';
			$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>' . "\r";
			echo $output;
	}

	
}
