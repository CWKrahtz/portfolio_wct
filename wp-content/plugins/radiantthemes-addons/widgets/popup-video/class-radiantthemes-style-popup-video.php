<?php
/**
 * Popup Video Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Popup Video widget.
 *
 * Elementor widget that displays a video in a popup window.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Popup_Video extends Widget_Base {

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
		return 'radiant-popup-video';
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
		return esc_html__( 'Popup Video', 'radiantthemes-addons' );
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
		return 'eicon-slider-video';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return [
			'radiantthemes-addons-custom',
		];
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return [
			'radiantthemes-popup-video',
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
			'radiant_attach_image',
			[
				'label' => esc_html__( 'Choose Overlay Image', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'p-svg',
			[
				'label' => __( 'Add Play Button SVG Code', 'radiantthemes-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				
				'default' => __( '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60" height="60" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
                <path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M45.563,30.826l-22,15
	C23.394,45.941,23.197,46,23,46c-0.16,0-0.321-0.038-0.467-0.116C22.205,45.711,22,45.371,22,45V15c0-0.371,0.205-0.711,0.533-0.884
	c0.328-0.174,0.724-0.15,1.031,0.058l22,15C45.836,29.36,46,29.669,46,30S45.836,30.64,45.563,30.826z" />
            </svg>', 'radiantthemes-addons' ),
			]
		);

	    $this->add_control(
			'v_type',
			[
				'label' => __( 'Select Video Type', 'radiantthemes-addons' ),
				'type' => Controls_Manager::SELECT,
				
				'options' => [
					'Youtube' => 'Youtube',
					'Vimeo' => 'Vimeo',
					
				],
				'default' => 'Youtube',
			]
		);
		$this->add_control(
			'vid',
			[
				'label' => __( 'Enter Youtube/Vimeo Video ID', 'radiantthemes-addons' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( '6xcG6ttMDVY', 'radiantthemes-addons' ),
			]
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



		$target   = $settings['radiant_popup_video_link']['is_external'] ? 'target = "_blank"' : '';
		$nofollow = $settings['radiant_popup_video_link']['nofollow'] ? 'rel = "nofollow"' : '';

		$output = '';

		require 'template/template-popup-video-style-one.php';

		echo $output;
	}

	
}
