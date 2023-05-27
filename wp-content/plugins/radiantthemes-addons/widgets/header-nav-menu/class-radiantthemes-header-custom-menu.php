<?php
/**
 * Header Nav Menu
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Radiantthemes_Menu_Walker;
use Elementor\Group_Control_Box_Shadow;

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
class Radiantthemes_Header_Custom_Menu extends Widget_Base {

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
		return 'radiant-header_custom_menu';
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
		return esc_html__( 'All Header Element', 'radiantthemes-addons' );
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
		return 'eicon-nav-menu';
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array(
			'radiantthemes-addons-custom',
			'rt-vertical-menu',
		);
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
		return array( 'radiant-widgets-category' );
	}


	/**
	 * Get all case Custom Post Type Categories.
	 *
	 * @return array case categories.
	 */
	public function busia_navmenu_navbar_menu_choices() {
		$menus = wp_get_nav_menus();
		$items = array();
		$i     = 0;
		foreach ( $menus as $menu ) {
			if ( 0 == $i ) {
				$default = $menu->term_id;
				$i++;
			}
			$items[ $menu->term_id ] = $menu->name;
		}
		return $items;
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
			'section_content_Header',
			array(
				'label' => esc_html__( 'Custom Header', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'header_cus_nav_style',
			array(
				'label'       => esc_html__( 'Select Header Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two(Transparent)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Four', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);
		$this->add_control(
			'display_menu_hover_style',
			array(
				'label'     => esc_html__( 'Display Menu Hover Style ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
			)
		);
		$this->add_control(
			'hover-style',
			array(
				'label'       => esc_html__( 'Select Menu Hover Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					''            => esc_html__( 'Select Hover style', 'radiantthemes-addons' ),
					'style1hover' => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'style2hover' => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'style3hover' => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'style4hover' => esc_html__( 'Style Four', 'radiantthemes-addons' ),
				),
				'default'     => '',
				'condition'   => array(
					'display_menu_hover_style' => 'yes',
				),
			)
		);
		$this->add_control(
			'display_sticky_header',
			array(
				'label'     => esc_html__( 'Display Sticky Header ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
			)
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_desktop_hamburger',
			array(
				'label' => esc_html__( 'Desktop Hamburger', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'show_ham_menu',
			array(
				'label'        => esc_html__( 'Display Desktop Hamburger Menu', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'select_ham_menu',
			array(
				'label'        => esc_html__( 'Display Menu on Desktop Hamburger', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'header_cus_ham_nav_menu',
			array(
				'label'       => esc_html__( 'Select Menu', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     =>
				busia_navmenu_navbar_menu_choices(),
				'default'     => '',
				'condition'   => array(
					'select_ham_menu' => 'yes',
					'show_ham_menu'   => 'yes',
				),
			)
		);
		$this->add_control(
			'header_cus_menu_logo',
			array(
				'label'       => esc_html__( 'Upload Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
				'condition'   => array(
					'show_ham_menu' => 'yes',
				),
			)
		);
		$this->add_control(
			'logo_dimension',
			array(
				'label'       => esc_html__( 'Image Dimension', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'radiantthemes-addons' ),
				'default'     => array(
					'width'  => '106',
					'height' => '45',
				),
				'condition'   => array(
					'show_ham_menu' => 'yes',
				),
			)
		);

		$this->add_control(
			'header_cus_menu_title',
			array(
				'label'       => esc_html__( 'Text', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::WYSIWYG,
				'condition'   => array(
					'show_ham_menu' => 'yes',
				),
				'default'     => esc_html__( 'Responsive Multi-Purpose Theme', 'radiantthemes-addons' ),
			)
		);
		
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_logo',
			array(
				'label' => esc_html__( 'Custom Logo', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'header_cus_logo_style',
			array(
				'label'       => esc_html__( 'Select Logo Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'logo-left'   => esc_html__( 'Logo left', 'radiantthemes-addons' ),
					'logo-center' => esc_html__( 'Logo Center', 'radiantthemes-addons' ),
					'logo-right'  => esc_html__( 'Logo Right', 'radiantthemes-addons' ),
				),
				'default'     => 'logo-left',
			)
		);
		$this->add_control(
			'logo_image',
			array(
				'label'       => esc_html__( 'Default Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
			)
		);
		$this->add_control(
			'logo_image_retina',
			array(
				'label'       => esc_html__( 'Default Retina Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'For retina logo to work the name of the retina logo must be the normal logo name@2x.For eg. if the normal logo is my_image.png then the retina logo name should be my_image@2x.png. Also both images must be in the same location.', 'radiantthemes-addons' ),

			)
		);
		$this->add_control(
			'logo_dimension',
			array(
				'label'       => esc_html__( 'Image Dimension', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'radiantthemes-addons' ),
				'default'     => array(
					'width'  => '200',
					'height' => '200',
				),
			)
		);
		$this->add_control(
			'logo_image_sticky',
			array(
				'label'       => esc_html__( 'Sticky Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
			)
		);
		$this->add_control(
			'logo_image_retina_sticky',
			array(
				'label'       => esc_html__( 'Sticky Retina Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
				'description' => esc_html__( 'For retina logo to work the name of the retina logo must be the normal logo name@2x.For eg. if the normal logo is my_image.png then the retina logo name should be my_image@2x.png. Also both images must be in the same location.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'logo_dimension_sticky',
			array(
				'label'       => esc_html__( 'Sticky Image Dimension', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'radiantthemes-addons' ),
				'default'     => array(
					'width'  => '200',
					'height' => '200',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content',
			array(
				'label' => esc_html__( 'Navigation', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'header_cus_nav_menu',
			array(
				'label'       => esc_html__( 'Select Menu', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     =>
				busia_navmenu_navbar_menu_choices(),
				'default'     => '',
			)
		);
		$this->add_control(
			'header_cus_menu_location',
			array(
				'label'       => esc_html__( 'Menu Location', 'radiantthemes-addons' ),
				'description' => esc_html__( 'Select a location for your menu. This option facilitate the ability to create up to 2 mobile enabled menu locations', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'primary'   => esc_html__( 'Primary', 'radiantthemes-addons' ),
					'secondary' => esc_html__( 'Secondary', 'radiantthemes-addons' ),
				),
				'default'     => 'primary',
				'condition'   => array(
					'header_cus_nav_style!' => 'three',
				),
			)
		);
		// $this->add_control(
			// 'header_cus_menu_align',
			// array(
				// 'label'       => esc_html__( 'Select Menu Alignment', 'radiantthemes-addons' ),
				// 'label_block' => true,
				// 'type'        => Controls_Manager::SELECT,
				// 'options'     => array(
					// 'menu-left'   => esc_html__( 'Menu Left', 'radiantthemes-addons' ),
					// 'menu-center' => esc_html__( 'Menu Center', 'radiantthemes-addons' ),
					// 'menu-right'  => esc_html__( 'Menu Right', 'radiantthemes-addons' ),
				// ),
				// 'default'     => 'menu-left',
			// )
		// );
		// $this->add_control(
			// 'header_cus_menu_align_sticky',
			// array(
				// 'label'       => esc_html__( 'Sticky Menu Alignment', 'radiantthemes-addons' ),
				// 'label_block' => true,
				// 'type'        => Controls_Manager::SELECT,
				// 'options'     => array(
					// 'menu-left-sticky'   => esc_html__( 'Menu Left', 'radiantthemes-addons' ),
					// 'menu-center-sticky' => esc_html__( 'Menu Center', 'radiantthemes-addons' ),
					// 'menu-right-sticky'  => esc_html__( 'Menu Right', 'radiantthemes-addons' ),

				// ),
				// 'default'     => 'menu-left-sticky',
			// )
		// );
		$this->add_control(
			'header_cus_parent_menu_color',
			array(
				'label'     => esc_html__( 'Parent Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main .mega-menu > li > a' => 'color: {{VALUE}};',
				),
				'default'   => '#000000',
			)
		);
		$this->add_control(
			'header_cus_parent_menu_color_mobile',
			array(
				'label'     => esc_html__( 'Parent Menu Link Color(Mobile)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-mobile-menu > li > a' => 'color: {{VALUE}};',
				),
				'default'   => '#000000',
			)
		);
		$this->add_responsive_control(
			'header_cus_parent_sticky_menu_color',
			array(
				'label'     => esc_html__( 'Parent Sticky Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'.rt-header.fixed .apr-nav-menu--main .mega-menu > li > a' => 'color: {{VALUE}} !important;',
				),
				'default'   => '#f00000',
			)
		);
		$this->add_control(
			'header_cus_second_child_menu_color',
			array(
				'label'     => esc_html__( 'Second Level Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main > .mega-menu .sub-menu li a' => 'color: {{VALUE}};',
				),
				'default'   => '#000000',
			)
		);
		$this->add_control(
			'header_cus_second_child_menu_color_mobile',
			array(
				'label'     => esc_html__( 'Second Level Menu Link Color(Mobile)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-mobile-menu .sub-menu a' => 'color: {{VALUE}};',
				),
				'default'   => '#000000',
			)
		);
		$this->add_responsive_control(
			'header_cus_second_child_sticky_menu_color',
			array(
				'label'     => esc_html__( 'Second Level Sticky Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-header.fixed .apr-nav-menu--main > .mega-menu .sub-menu li a' => 'color: {{VALUE}};',
				),
				'default'   => '#ff0000',
			)
		);
		$this->add_control(
			'header_cus_third_child_menu_color',
			array(
				'label'     => esc_html__( 'Third Level Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main > .mega-menu .sub-menu.menu-depth-2 li a' => 'color: {{VALUE}};',
				),
				'default'   => '#FFFFFF',
			)
		);
		$this->add_responsive_control(
			'header_cus_third_child_sticky_menu_color',
			array(
				'label'     => esc_html__( 'Third Level Sticky Menu Link Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-header.fixed .apr-nav-menu--main > .mega-menu .sub-menu.menu-depth-2 li a' => 'color: {{VALUE}};',
				),
				'default'   => '#231cf9',

			)
		);
		$this->add_responsive_control(
			'header_cus_hover_dropdown_bg_color',
			array(
				'label'     => esc_html__( 'Hover Dropdown background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main > .mega-menu .sub-menu li a' => 'background-color: {{VALUE}} !important;',

				),
				'default'   => '#000000',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'megamenu_title_typography',
				'label'    => esc_html__( 'Mega Menu Title Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .apr-nav-menu--main .menu-item-mega-parent .mega-menu-content h5',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'megamenu_sticky_title_typography',
				'label'    => esc_html__( 'Sticky Mega Menu Title Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-header.fixed .apr-nav-menu--main .menu-item-mega-parent .mega-menu-content h5',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'megamenu_subtitle_typography',
				'label'    => esc_html__( 'Mega Menu Link Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-mega-sub-text .apr-nav-menu--main > .mega-menu .sub-menu .mega-menu-content a',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'megamenu_substicky_title_typography',
				'label'    => esc_html__( 'Sticky Mega Menu Link Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-header.fixed .rt-mega-sub-text .apr-nav-menu--main > .mega-menu .mega-menu-content a',
			)
		);
		$this->add_responsive_control(
			'megamenu_title_color',
			array(
				'label'     => esc_html__( 'Mega Menu Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main .menu-item-mega-parent .mega-menu-content h5' => 'color: {{VALUE}};',
				),
				'default'   => '#ffffff',
			)
		);
		$this->add_responsive_control(
			'megamenu_sticky_title_color',
			array(
				'label'     => esc_html__( 'Sticky Mega Menu Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-header.fixed .apr-nav-menu--main .menu-item-mega-parent .mega-menu-content h5' => 'color: {{VALUE}} !important;',
				),
				'default'   => '#ffffff',
			)
		);
		$this->add_responsive_control(
			'menu_link_bg',
			array(
				'label'     => esc_html__( 'Main Menu Link Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#00215e',
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main .mega-menu > li > a' => 'background-color: {{VALUE}};',
				),

			)
		);
		$this->add_responsive_control(
			'menu_link_hover_color',
			array(
				'label'     => esc_html__( 'Main Menu Link Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main .mega-menu > li > a:hover' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_responsive_control(
			'menu_sticky_link_hover_color',
			array(
				'label'     => esc_html__( 'Sticky Main Menu Link Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-header.fixed .apr-nav-menu--main .mega-menu > li > a:hover' => 'color: {{VALUE}} !important;',
				),
			)
		);
		$this->add_control(
			'text_padding',
			array(
				'label'      => esc_html__( 'Text Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .apr-nav-menu--main .mega-menu>li>a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'text_margin',
			array(
				'label'      => esc_html__( 'Text margin', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .apr-nav-menu--main .mega-menu>li>a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'h_color3',
			array(
				'label'     => esc_html__( 'Choose Background color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .style3hover .apr-nav-menu--main .mega-menu > li > a::before '  => ' background-color: {{VALUE}}',
					'{{WRAPPER}} .style4hover .apr-nav-menu--main .mega-menu > li > a:before'  => ' background-color: {{VALUE}}',
				),
				'condition' => array(
					'hover-style' => array( 'style3hover', 'style4hover' ),
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
			)
		);
		$this->add_responsive_control(
			'h_color',
			array(
				'label'     => esc_html__( 'Choose hover line color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .style2hover .apr-nav-menu--main .mega-menu > li > a::before,{{WRAPPER}} .style2hover .apr-nav-menu--main > .mega-menu .sub-menu li a::before'  => 'background: {{VALUE}}',
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
			)
		);
		$this->add_responsive_control(
			'h_color2',
			array(
				'label'     => esc_html__( 'Choose border  line color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .style3hover .apr-nav-menu--main .mega-menu > li > a::before '  => 'border-right:2px solid {{VALUE}}',
					'{{WRAPPER}} .style4hover .apr-nav-menu--main .mega-menu > li > a::before '  => 'border-bottom:2px solid {{VALUE}}',
				),
				'condition' => array(
					'hover-style' => array( 'style3hover', 'style4hover' ),
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
			)
		);
		$this->add_control(
			'header_cus_menu_logo1',
			array(
				'label'       => esc_html__( 'Upload Logo', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
				'condition'   => array(
					'header_cus_nav_style' => 'four',
				),
			)
		);
		$this->add_control(
			'logo_dimension1',
			array(
				'label'       => esc_html__( 'Image Dimension', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'radiantthemes-addons' ),
				'default'     => array(
					'width'  => '106',
					'height' => '45',
				),
				'condition'   => array(
					'header_cus_nav_style' => 'four',
				),
			)
		);
		$this->add_control(
			'header_cus_menu_title1',
			array(
				'label'       => esc_html__( 'Text', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::WYSIWYG,
				'condition'   => array(
					'header_cus_nav_style' => 'four',
				),
				'default'     => esc_html__( 'Responsive Multi-Purpose Theme', 'radiantthemes-addons' ),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'submenu_content',
			array(
				'label' => esc_html__( 'Submenu', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'sub_padding',
			array(
				'label'      => esc_html__( 'Item Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .apr-nav-menu--main>.mega-menu .sub-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_search',
			array(
				'label' => esc_html__( 'Custom Search', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'display_search',
			array(
				'label'     => esc_html__( 'Display Search ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
			)
		);
		$this->add_control(
			'search_style',
			array(
				'label'       => esc_html__( 'Select Search Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Style Two', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
				'condition'   => array(
					'display_search' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'search_icon_color',
			array(
				'label'     => esc_html__( 'Choose Search Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-icon-search'     => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-search-input'    => 'border-bottom: 1px solid {{VALUE}}',
					'{{WRAPPER}} .rt-search-box2 svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-right-menu-holder .rt-search-box2 .search-btn2 svg' => 'color: {{VALUE}}',
					'.header-one .rt-search-cart-holder .expanded-searchbar input[type="search"]' => 'color: {{VALUE}}',
					'.header-one .rt-search-cart-holder .expanded-searchbar button' => 'color: {{VALUE}}',
					'.header-one .rt-search-cart-holder .expanded-searchbar ::placeholder' => 'color: {{VALUE}}',
					'.header-one .rt-search-cart-holder .expanded-searchbar input[type="search"]' => 'border-left: 1px solid {{VALUE}}',
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
				'condition' => array(
					'display_search' => 'yes',
				),
			)
		);
		$this->add_responsive_control(
			'search_icon_color_sticky',
			array(
				'label'     => esc_html__( 'Sticky Search Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-header.fixed  .rt-search-box2 svg'     => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-header.fixed #search-button2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-header.fixed .rt-right-menu-holder .rt-search-box2 .search-btn2 svg' => 'color: {{VALUE}}',
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
				'condition' => array(
					'display_search' => 'yes',
				),
			)
		);
		$this->add_control(
			'search_icon_background_color',
			array(
				'label'     => esc_html__( 'Search Button Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'#search-button2'             => 'background: {{VALUE}} !important;',
					'{{WRAPPER}} .search-button2' => 'background: {{VALUE}} !important;',
					'{{WRAPPER}} .rt-right-menu-holder .rt-search-box2' => 'background: {{VALUE}} ;',
				),
				'condition' => array(
					'display_search' => 'yes',
				),
			)
		);
		$this->add_control(
			'search_sticky_icon_background_color',
			array(
				'label'     => esc_html__( 'Sticky Search Button Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'.rt-header.fixed #search-button2' => 'background: {{VALUE}} !important;',
					'.rt-header.fixed .rt-right-menu-holder .rt-search-box2' => 'background: {{VALUE}} !important;',
				),
				'condition' => array(
					'display_search' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_wishlist',
			array(
				'label' => esc_html__( 'Wishlist', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'display_wishlist',
			array(
				'label'     => esc_html__( 'Display  Wishlist ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
			)
		);
		$this->add_control(
			'wishlist_color',
			array(
				'label'       => esc_html__( 'Wishlist Icon Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .counting.wishlist_countings svg' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'display_wishlist' => 'yes',
				),
			)
		);
		$this->add_control(
			'wishlist_counter_background_color',
			array(
				'label'       => esc_html__( 'Wishlist Counter Background Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .rt-wishlist-box .wish_list_count' => 'background: {{VALUE}}',
				),
				'condition'   => array(
					'display_wishlist' => 'yes',
				),
			)
		);
		$this->add_control(
			'wishlist_counter_color',
			array(
				'label'       => esc_html__( 'Wishlist Counter  Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .rt-wishlist-box .wish_list_count' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'display_wishlist' => 'yes',
				),
			)
		);
		$this->add_control(
			'wishlist_color_sticky',
			array(
				'label'       => esc_html__( 'Sticky Wishlist Icon Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .rt-search-cart-holder .counting.wishlist_countings svg' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'display_wishlist' => 'yes',
				),
			)
		);
		$this->add_control(
			'wishlist_counter_sticky_background_color',
			array(
				'label'       => esc_html__( 'Sticky Wishlist Counter Background Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .rt-search-cart-holder .rt-wishlist-box .wish_list_count' => 'background: {{VALUE}}',
				),
				'condition'   => array(
					'display_wishlist' => 'yes',
				),
			)
		);
		$this->add_control(
			'wishlist_sticky_counter_color',
			array(
				'label'       => esc_html__( 'Sticky Wishlist Counter  Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .rt-search-cart-holder .rt-wishlist-box .wish_list_count' => 'color: {{VALUE}} !important;',
				),
				'condition'   => array(
					'display_wishlist' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_login',
			array(
				'label' => esc_html__( 'Login', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'display_login',
			array(
				'label'     => esc_html__( 'Display Login ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
			)
		);
		$this->add_control(
			'login_color',
			array(
				'label'       => esc_html__( 'Login Icon Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .rt_user_login svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-search-cart-holder .rt-user-box .rt_user_login a' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'display_login' => 'yes',
				),
			)
		);
		$this->add_control(
			'sticky_login_color',
			array(
				'label'       => esc_html__( 'Sticky Login Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .rt-search-cart-holder .rt_user_login svg' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-header.fixed .rt-search-cart-holder .rt-user-box .rt_user_login a' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'display_login' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_social',
			array(
				'label' => esc_html__( 'Social', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'display_social',
			array(
				'label'     => esc_html__( 'Display Social ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
			)
		);
		$this->add_control(
			'display_social_left',
			array(
				'label'     => esc_html__( 'Display Left Social ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',

			)
		);
		$this->add_control(
			'display_social_text',
			array(
				'label'     => esc_html__( 'Display Social Text', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
				'condition' => array(
					'display_social' => 'yes',
				),
			)
		);
		$this->add_control(
			'display_social_text_title',
			array(
				'label'       => esc_html__( 'Social Text', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Follow Us On', 'radiantthemes-addons' ),
				'condition'   => array(
					'display_social_text' => 'yes',
				),
			)
		);
		$this->add_control(
			'social_text_color',
			array(
				'label'       => esc_html__( 'Social Text Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}}  .rt-social-section .rt-social-text ' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'display_social_text' => 'yes',
				),
			)
		);
		$this->add_control(
			'social_text_color_sticky',
			array(
				'label'       => esc_html__( 'Sticky Social Text Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}}  .rt-header.mobile-header-style2.fixed .rt-search-cart-holder .rt-social-section ul li a svg' => 'fill: {{VALUE}}',
				),
				'condition'   => array(
					'display_social' => 'yes',
				),
			)
		);
		$this->add_control(
			'social_color_one',
			array(
				'label'       => esc_html__( 'Social Icon Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .rt-social-section ul li a svg ' => 'fill: {{VALUE}}',
				),
				'condition'   => array(
					'display_social' => 'yes',
				),
			)
		);
		$this->add_control(
			'social_color_two',
			array(
				'label'       => esc_html__( 'Social Icon Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}}  .rt-social-section-left ul li a svg ' => 'fill: {{VALUE}}',
				),
				'condition'   => array(
					'display_social_left' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_button',
			array(
				'label' => esc_html__( 'Button', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'display_button',
			array(
				'label'     => esc_html__( 'Display Button ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
			)
		);
		$this->add_control(
			'radiant_custom_btn_title',
			array(
				'label'       => esc_html__( 'Title', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Text on the button', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_link',
			array(
				'label'         => esc_html__( 'URL (Link)', 'radiantthemes-addons' ),
				'type'          => Controls_Manager::URL,
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
				'description'   => esc_html__( 'Add link to button.', 'radiantthemes-addons' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => esc_html__( 'Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-menu-custom-button .radiantthemes-menu-custom-button-main ',
			)
		);
		$this->add_control(
			'radiant_custom_btn_color',
			array(
				'label'       => esc_html__( 'Button Title Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .radiantthemes-menu-custom-button .radiantthemes-menu-custom-button-main ' => 'color: {{VALUE}}',
				),
				'description' => esc_html__( 'Select Button Text color.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_color_sticky',
			array(
				'label'       => esc_html__( 'Sticky Button Title Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .radiantthemes-menu-custom-button .radiantthemes-menu-custom-button-main ' => 'color: {{VALUE}}',
				),
				'description' => esc_html__( 'Select Button Text color for Sticky.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_add',
			array(
				'label'        => esc_html__( 'Add Gradient Background?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'Please Note: If selected, please do not use any background image or direct backgrund color.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_back_color',
			array(
				'label'       => esc_html__( 'Button Background Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .radiantthemes-menu-custom-button a.radiantthemes-menu-custom-button-main ' => 'background: {{VALUE}}',
				),
				'condition'   => array(
					'radiant_custom_btn_gradient_bg_add!' => 'yes',
				),
				'description' => esc_html__( 'Select Button Back color.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_back_color_sticky',
			array(
				'label'       => esc_html__( 'Sticky Button Background Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .rt-search-cart-holder .radiantthemes-menu-custom-button a.radiantthemes-menu-custom-button-main ' => 'background: {{VALUE}}',
				),
				'condition'   => array(
					'radiant_custom_btn_gradient_bg_add!' => 'yes',
				),
				'description' => esc_html__( 'Select Button Back color for Sticky.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_type',
			array(
				'label'       => esc_html__( 'Gradient Background Type', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'to bottom'       => esc_html__( 'To Bottom', 'radiantthemes-addons' ),
					'to top'          => esc_html__( 'To Top', 'radiantthemes-addons' ),
					'to right'        => esc_html__( 'To Right', 'radiantthemes-addons' ),
					'to left'         => esc_html__( 'To Left', 'radiantthemes-addons' ),
					'to top left'     => esc_html__( 'To Top Left', 'radiantthemes-addons' ),
					'to bottom left'  => esc_html__( 'To Bottom Left', 'radiantthemes-addons' ),
					'to top right'    => esc_html__( 'To Top Right', 'radiantthemes-addons' ),
					'to bottom right' => esc_html__( 'To Bottom Right', 'radiantthemes-addons' ),
				),
				'condition'   => array(
					'radiant_custom_btn_gradient_bg_add' => 'yes',
				),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_one',
			array(
				'label'     => esc_html__( 'Background Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'radiant_custom_btn_gradient_bg_add' => 'yes',
				),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Background Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-menu-custom-button .radiantthemes-menu-custom-button-main' => 'background: linear-gradient({{radiant_custom_btn_gradient_bg_type.VALUE}}, {{radiant_custom_btn_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				),
				'condition' => array(
					'radiant_custom_btn_gradient_bg_add' => 'yes',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'rt_button_border',
				'label'    => esc_html__( 'Border', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-menu-custom-button .radiantthemes-menu-custom-button-main',
			)
		);
		$this->add_control(
			'radiant_custom_btn_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px' => array(
						'min' => 0,
						'max' => 35,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .radiantthemes-menu-custom-button .radiantthemes-menu-custom-button-main' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'radiant_custom_btn_bg_color',
			array(
				'label'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-menu-custom-button .radiantthemes-menu-custom-button-main' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'radiant_custom_btn_gradient_bg_add' => 'no',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'radiant_custom_btn_box_shadow',
				'label'    => esc_html__( 'Box Shadow', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-menu-custom-button .radiantthemes-menu-custom-button-main ',
			)
		);
		$this->add_control(
			'radiant_custom_btn_margin',
			array(
				'label'      => esc_html__( 'Margin', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .rt-search-cart-holder .radiantthemes-menu-custom-button a.radiantthemes-menu-custom-button-main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'radiant_custom_btn_padding',
			array(
				'label'      => esc_html__( 'Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .rt-search-cart-holder .radiantthemes-menu-custom-button a.radiantthemes-menu-custom-button-main' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();
        $this->start_controls_section(
			'section_content_button2',
			array(
				'label' => esc_html__( 'Button 2', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'display_button2',
			array(
				'label'     => esc_html__( 'Display Button ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
			)
		);
		$this->add_control(
			'radiant_custom_btn_title2',
			array(
				'label'       => esc_html__( 'Title', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Text on the button', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_link2',
			array(
				'label'         => esc_html__( 'URL (Link)', 'radiantthemes-addons' ),
				'type'          => Controls_Manager::URL,
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),
				'description'   => esc_html__( 'Add link to button.', 'radiantthemes-addons' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography2',
				'label'    => esc_html__( 'Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-menu-button .radiantthemes-menu-button-main  ',
			)
		);
		$this->add_control(
			'radiant_custom_btn_color2',
			array(
				'label'       => esc_html__( 'Button Title Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .radiantthemes-menu-button .radiantthemes-menu-button-main ' => 'color: {{VALUE}}',
				),
				'description' => esc_html__( 'Select Button Text color.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_color2_sticky',
			array(
				'label'       => esc_html__( 'Sticky Button Title Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .radiantthemes-menu-button .radiantthemes-menu-button-main ' => 'color: {{VALUE}}',
				),
				'description' => esc_html__( 'Select Button Text color for sticky.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_add2',
			array(
				'label'        => esc_html__( 'Add Gradient Background?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'Please Note: If selected, please do not use any background image or direct backgrund color.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_back_color2',
			array(
				'label'       => esc_html__( 'Button Background Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .radiantthemes-menu-button .radiantthemes-menu-button-main  ' => 'background: {{VALUE}}',
				),
				'condition'   => array(
					'radiant_custom_btn_gradient_bg_add2!' => 'yes',
				),
				'description' => esc_html__( 'Select Button Back color.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_back_color2_sticky',
			array(
				'label'       => esc_html__( 'Sticky Button Background Color', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .rt-search-cart-holder .radiantthemes-menu-button .radiantthemes-menu-button-main  ' => 'background: {{VALUE}}',
				),
				'condition'   => array(
					'radiant_custom_btn_gradient_bg_add2!' => 'yes',
				),
				'description' => esc_html__( 'Select Button Back color for sticky.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_type2',
			array(
				'label'       => esc_html__( 'Gradient Background Type', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'to bottom'       => esc_html__( 'To Bottom', 'radiantthemes-addons' ),
					'to top'          => esc_html__( 'To Top', 'radiantthemes-addons' ),
					'to right'        => esc_html__( 'To Right', 'radiantthemes-addons' ),
					'to left'         => esc_html__( 'To Left', 'radiantthemes-addons' ),
					'to top left'     => esc_html__( 'To Top Left', 'radiantthemes-addons' ),
					'to bottom left'  => esc_html__( 'To Bottom Left', 'radiantthemes-addons' ),
					'to top right'    => esc_html__( 'To Top Right', 'radiantthemes-addons' ),
					'to bottom right' => esc_html__( 'To Bottom Right', 'radiantthemes-addons' ),
				),
				'condition'   => array(
					'radiant_custom_btn_gradient_bg_add2' => 'yes',
				),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_one2',
			array(
				'label'     => esc_html__( 'Background Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'radiant_custom_btn_gradient_bg_add2' => 'yes',
				),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_two2',
			array(
				'label'     => esc_html__( 'Background Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-menu-button .radiantthemes-menu-button-main' => 'background: linear-gradient({{radiant_custom_btn_gradient_bg_type2.VALUE}}, {{radiant_custom_btn_gradient_bg_color_one2.VALUE}} 0%, {{VALUE}} 100%)',
				),
				'condition' => array(
					'radiant_custom_btn_gradient_bg_add2' => 'yes',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'rt_button_border2',
				'label'    => esc_html__( 'Border', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-menu-button.radiantthemes-menu-custom-button-main',
			)
		);
		$this->add_control(
			'radiant_custom_btn_border_radius2',
			array(
				'label'      => esc_html__( 'Border Radius', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px' ),
				'range'      => array(
					'px' => array(
						'min' => 0,
						'max' => 35,
					),
				),
				'selectors'  => array(
					'{{WRAPPER}} .radiantthemes-menu-button .radiantthemes-menu-button-main' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'radiant_custom_btn_bg_color2',
			array(
				'label'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .radiantthemes-menu-button .radiantthemes-menu-button-main' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'radiant_custom_btn_gradient_bg_add2' => 'no',
				),
			)
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'radiant_custom_btn_box_shadow2',
				'label'    => esc_html__( 'Box Shadow', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-menu-button .radiantthemes-menu-button-main ',
			)
		);
		$this->add_control(
			'radiant_custom_btn_margin2',
			array(
				'label'      => esc_html__( 'Margin', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .rt-search-cart-holder .radiantthemes-menu-button a.radiantthemes-menu-button-main' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_control(
			'radiant_custom_btn_padding2',
			array(
				'label'      => esc_html__( 'Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .rt-search-cart-holder .radiantthemes-menu-button a.radiantthemes-menu-button-main' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_content_contact',
			array(
				'label' => esc_html__( 'Contact', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'display_contact',
			array(
				'label'     => esc_html__( 'Display Contact ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
			)
		);
		$this->add_control(
			'display_contact_icon',
			array(
				'label'     => esc_html__( 'Display Contact Icon ', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
				'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
				'default'   => 'yes',
				'condition' => array(
					'display_contact' => 'yes',

				),
			)
		);
		$this->add_control(
			'contact_icon_svg',
			array(
				'label'       => esc_html__( 'Contact Icon', 'radiantthemes-addons' ),
				'description' => __( 'Put SVG code here', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" viewBox="0 0 20 20"><path fill="" d="M16 20c-1.771 0-3.655-0.502-5.6-1.492-1.793-0.913-3.564-2.22-5.122-3.78s-2.863-3.333-3.775-5.127c-0.988-1.946-1.49-3.83-1.49-5.601 0-1.148 1.070-2.257 1.529-2.68 0.661-0.609 1.701-1.32 2.457-1.32 0.376 0 0.816 0.246 1.387 0.774 0.425 0.394 0.904 0.928 1.383 1.544 0.289 0.372 1.73 2.271 1.73 3.182 0 0.747-0.845 1.267-1.739 1.816-0.346 0.212-0.703 0.432-0.961 0.639-0.276 0.221-0.325 0.338-0.333 0.364 0.949 2.366 3.85 5.267 6.215 6.215 0.021-0.007 0.138-0.053 0.363-0.333 0.207-0.258 0.427-0.616 0.639-0.961 0.55-0.894 1.069-1.739 1.816-1.739 0.911 0 2.81 1.441 3.182 1.73 0.616 0.479 1.15 0.958 1.544 1.383 0.528 0.57 0.774 1.011 0.774 1.387 0 0.756-0.711 1.799-1.319 2.463-0.424 0.462-1.533 1.537-2.681 1.537zM3.994 1c-0.268 0.005-0.989 0.333-1.773 1.055-0.744 0.686-1.207 1.431-1.207 1.945 0 6.729 8.264 15 14.986 15 0.513 0 1.258-0.465 1.944-1.213 0.723-0.788 1.051-1.512 1.056-1.781-0.032-0.19-0.558-0.929-1.997-2.037-1.237-0.952-2.24-1.463-2.498-1.469-0.018 0.005-0.13 0.048-0.357 0.336-0.197 0.251-0.408 0.594-0.613 0.926-0.56 0.911-1.089 1.772-1.858 1.772-0.124 0-0.246-0.024-0.363-0.071-2.625-1.050-5.729-4.154-6.779-6.779-0.126-0.315-0.146-0.809 0.474-1.371 0.33-0.299 0.786-0.579 1.228-0.851 0.332-0.204 0.676-0.415 0.926-0.613 0.288-0.227 0.331-0.339 0.336-0.357-0.007-0.258-0.517-1.261-1.469-2.498-1.108-1.439-1.847-1.964-2.037-1.997z"></path></svg>', 
				'condition'   => array(
					'display_contact_icon' => 'yes',
				),
			)
		);

		$this->add_control(
			'contact_icon_color',
			array(
				'label'       => esc_html__( 'Contact Icon Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .contact_holder .contact_icon svg ' => 'fill: {{VALUE}}',
				),
				'condition'   => array(
					'display_contact' => 'yes',
				),
			)
		);
		$this->add_control(
			'contact_icon_color_sticky',
			array(
				'label'       => esc_html__( 'Sticky Contact Icon Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .contact_holder .contact_icon svg ' => 'fill: {{VALUE}}',
				),
				'condition'   => array(
					'display_contact' => 'yes',
				),
			)
		);
		$this->add_control(
			'contact_text_color',
			array(
				'label'       => esc_html__( 'Contact Text Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .contact_holder .contact_text' => 'color: {{VALUE}}',

				),
				'condition'   => array(
					'display_contact' => 'yes',

				),

			)
		);
		$this->add_control(
			'contact_text_color_sticky',
			array(
				'label'       => esc_html__( 'Sticky Contact Text Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .rt-search-cart-holder .contact_holder .contact_text' => 'color: {{VALUE}}',

				),
				'condition'   => array(
					'display_contact' => 'yes',

				),

			)
		);
		$this->add_control(
			'contact_text_no_color',
			array(
				'label'       => esc_html__( 'Contact No Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .contact_holder .contact_text p' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'display_contact' => 'yes',
				),
			)
		);
		$this->add_control(
			'contact_text_no_color_sticky',
			array(
				'label'       => esc_html__( 'Sticky Contact No Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-header.fixed .rt-search-cart-holder .contact_holder .contact_text p' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'display_contact' => 'yes',
				),
			)
		);
		$this->add_control(
			'contact_text_devider_color',
			array(
				'label'       => esc_html__( 'Contact Devider Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'{{WRAPPER}} .rt-search-cart-holder .contact_holder' => 'border-left: 1px solid {{VALUE}}',
				),
				'condition'   => array(
					'display_contact' => 'yes',
				),
			)
		);
		$this->add_control(
			'radiant_contact_text',
			array(
				'label'       => esc_html__( 'Contact Text', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Have a Question?', 'radiantthemes-addons' ),
				'condition'   => array(
					'display_contact' => 'yes',

				),
			)
		);
		$this->add_control(
			'radiant_contact_no',
			array(
				'label'       => esc_html__( 'Contact No', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( '+1 23654236', 'radiantthemes-addons' ),
				'condition'   => array(
					'display_contact' => 'yes',
				),
			)
		);
		$this->end_controls_section();

		if ( ( class_exists( 'WooCommerce' ) ) ) {
			// Custom Cart.
			$this->start_controls_section(
				'section_content_cart',
				array(
					'label' => esc_html__( 'Custom Cart', 'radiantthemes-addons' ),
				)
			);
			$this->add_control(
				'display_cart',
				array(
					'label'     => esc_html__( 'Display  Cart ', 'radiantthemes-addons' ),
					'type'      => Controls_Manager::SWITCHER,
					'label_on'  => esc_html__( 'Show', 'radiantthemes-addons' ),
					'label_off' => esc_html__( 'Hide', 'radiantthemes-addons' ),
					'default'   => 'yes',
				)
			);
			$this->add_responsive_control(
				'cart_icon_color',
				array(
					'label'       => esc_html__( 'Choose Cart Icon Color', 'radiantthemes-addons' ),
					'label_block' => true,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} .header-cart-bar .header-cart-bar-icon .rt-cart svg' => 'fill: {{VALUE}}',
					),
					'devices'     => array( 'desktop', 'tablet', 'mobile' ),
					'condition'   => array(
						'display_cart' => 'yes',
					),
				)
			);
			$this->add_responsive_control(
				'cart_counter_color',
				array(
					'label'       => esc_html__( 'Choose Cart Counter Color', 'radiantthemes-addons' ),
					'label_block' => true,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} .header-cart-bar .cart-count' => 'color: {{VALUE}}',
					),
					'devices'     => array( 'desktop', 'tablet', 'mobile' ),
					'condition'   => array(
						'display_cart' => 'yes',
					),
				)
			);
			$this->add_responsive_control(
				'cart_counter_background_color',
				array(
					'label'       => esc_html__( 'Cart Counter Background Color', 'radiantthemes-addons' ),
					'label_block' => true,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} .header-cart-bar .cart-count' => 'background: {{VALUE}}',
					),
					'devices'     => array( 'desktop', 'tablet', 'mobile' ),
					'condition'   => array(
						'display_cart' => 'yes',
					),
				)
			);
			$this->add_control(
				'cart_icon_sticky_color',
				array(
					'label'       => esc_html__( 'Choose Cart Icon Color Sticky', 'radiantthemes-addons' ),
					'label_block' => true,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} .rt-header.fixed .header-cart-bar .header-cart-bar-icon .rt-cart svg' => 'fill: {{VALUE}} !important;',
					),
					'condition'   => array(
						'display_cart' => 'yes',
					),
				)
			);
			$this->add_control(
				'cart_counter_sticky_color',
				array(
					'label'       => esc_html__( 'Choose Cart Counter Color Sticky', 'radiantthemes-addons' ),
					'label_block' => true,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} .rt-header.fixed .header-cart-bar .cart-count ' => 'color: {{VALUE}} !important;',
					),
					'condition'   => array(
						'display_cart' => 'yes',
					),
				)
			);
			$this->add_control(
				'cart_counter_sticky_background_color',
				array(
					'label'       => esc_html__( 'Cart Counter Background Color Sticky', 'radiantthemes-addons' ),
					'label_block' => true,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} .rt-header.fixed .header-cart-bar .cart-count' => 'background-color: {{VALUE}} !important;',
					),
					'condition'   => array(
						'display_cart' => 'yes',
					),
				)
			);
			$this->end_controls_section();
		}

		$this->start_controls_section(
			'section_content_contact_text',
			array(
				'label' => esc_html__( 'Desktop Contact Text', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'header_cus_contact_text',
			array(
				'label'       => esc_html__( 'Contact Text', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::WYSIWYG,

				'default'     => esc_html__( 'Order Online: 1234567891', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'header_cus_contact_no_color',
			array(
				'label'       => esc_html__( 'Contact Color', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::COLOR,
				'selectors'   => array(
					'.rt-header .ph' => 'color: {{VALUE}} !important;',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_menu_style',
			array(
				'label' => esc_html__( 'Navbar', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'normal_header_title',
			array(
				'label'     => __( 'Normal Header Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'normal_header_background',
				'label'    => esc_html__( 'Normal Header Background', 'radiantthemes-addons' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => 'header.rt-dark.rt-submenu-light',
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'sticky_header_background',
				'label'    => esc_html__( 'Sticky Header Background', 'radiantthemes-addons' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '.rt-header.fixed',
			)
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'desktop_hamburger',
			array(
				'label' => esc_html__( 'Desktop Hamburger', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,

			)
		);

		$this->add_control(
			'desktop_hamburger_toggle_bg_color',
			array(
				'label'     => esc_html__( 'Toggle Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} .rt-desktop-hamburger' => 'background: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'desktop_hamburger_toggle_bg_color_sticky',
			array(
				'label'     => esc_html__( 'Toggle Background Color Sticky', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => array(
					'.rt-header.fixed .rt-desktop-hamburger' => 'background: {{VALUE}} !important;',
				),
			)
		);

		$this->add_control(
			'desktop_hamburger_toggle_open_color',
			array(
				'label'     => esc_html__( 'Toggle Open Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ff0',
				'selectors' => array(
					'{{WRAPPER}} .rt-m-line' => 'background: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'desktop_hamburger_toggle_open_color_sticky',
			array(
				'label'     => esc_html__( 'Toggle Open Color Sticky', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ff0',
				'selectors' => array(
					'.rt-header.fixed .rt-m-line' => 'background: {{VALUE}} !important;',
				),
			)
		);

		// $this->add_control(
			// 'desktop_hamburger_toggle_close_color',
			// array(
				// 'label'     => esc_html__( 'Toggle Close Color', 'radiantthemes-addons' ),
				// 'type'      => Controls_Manager::COLOR,
				// 'default'   => '#ffffff',
				// 'selectors' => array(
					// '{{WRAPPER}} .rt-main-toggle-menu-open .rt-main-toggle-menu-trigger span:before, .rt-main-toggle-menu-open .rt-main-toggle-menu-trigger span:after' => 'background: {{VALUE}};',
				// ),
			// )
		// );

		// $this->add_control(
			// 'desktop_hamburger_toggle_close_color_sticky',
			// array(
				// 'label'     => esc_html__( 'Toggle Close Color Sticky', 'radiantthemes-addons' ),
				// 'type'      => Controls_Manager::COLOR,
				// 'default'   => '#ffffff',
				// 'selectors' => array(
					// '.header-sticky.sticky-active .rt-main-toggle-menu-open .rt-main-toggle-menu-trigger span:before, .header-sticky.sticky-active .rt-main-toggle-menu-open .rt-main-toggle-menu-trigger span:after' => 'background: {{VALUE}} !important;',
				// ),
			// )
		// );

		$this->add_control(
			'desktop_hamburger_body_bg',
			array(
				'label'     => esc_html__( 'Body Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'label'    => esc_html__( 'Background', 'radiantthemes-addons' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .minimal-menu-overlay, .minimal-logo-overlay, .rt-menu-overlay',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'active_color',
			array(
				'label' => esc_html__( 'Current/Active', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::SECTION,
				'tab'   => Controls_Manager::TAB_STYLE,

			)
		);
		$this->add_control(
			'menu_link_active_color',
			array(
				'label'     => esc_html__( 'Active Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main > .mega-menu > li.current-menu-parent > a' => 'color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'link_active_bg_color',
			array(
				'label'     => esc_html__( 'Active Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main > .mega-menu > li.current-menu-parent > a' => 'background-color: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'submenu_color',
			array(
				'label' => esc_html__( 'Submenu', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::SECTION,
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'submenu_link_hover',
			array(
				'label'     => esc_html__( 'Submenu Link Hover', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .apr-nav-menu--main > .mega-menu .sub-menu li a:hover' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .apr-nav-menu--main > .mega-menu .sub-menu li a::before' => 'background: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'menu_toggle',
			array(
				'label' => esc_html__( 'Mobile Menu Style', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::SECTION,
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'toggle_back_color',
			array(
				'label'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000',
				'selectors' => array(
					'{{WRAPPER}} .rt-mobile-toggle-holder .rt-mobile-toggle span' => 'background: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'toggle_back_color_sticky',
			array(
				'label'     => esc_html__( 'Background Color Sticky', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000',
				'selectors' => array(
					'{{WRAPPER}} .rt-header.fixed .rt-mobile-toggle-holder .rt-mobile-toggle span' => 'background: {{VALUE}};',
				),

			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'menu_typography',
			array(
				'label' => esc_html__( 'Typography', 'radiantthemes-addons' ),
				'type'  => Controls_Manager::SECTION,
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'menu_typography',
				'label'    => esc_html__( 'Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .apr-nav-menu--main .mega-menu > li > a',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'menu_typography_mobile',
				'label'    => esc_html__( 'Typography(Mobile)', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-mobile-menu > li > a',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'sub_menu_typography',
				'label'    => esc_html__( 'Submenu Typography', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .apr-nav-menu--main  .sub-menu li a',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'sub_menu_typography_mobile',
				'label'    => esc_html__( 'Submenu Typography(Mobile)', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-mobile-menu .sub-menu a',
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
		$settings      = $this->get_settings_for_display();
		$menu_location = $settings['header_cus_menu_location'];
		// Get menu.
		$nav_menu = ! empty( $settings['header_cus_nav_menu'] ) ? wp_get_nav_menu_object( $settings['header_cus_nav_menu'] ) : false;

		if ( ! $nav_menu ) {
			return;
		}

		$nav_menu_args = array(
			'fallback_cb'    => false,
			'container'      => false,
			'menu_class'     => 'mega-menu',
			'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
			'menu'           => $nav_menu,
			'echo'           => true,
			'depth'          => 0,
			'walker'         => new Radiantthemes_Menu_Walker(),

		);

		if ( $settings['logo_dimension']['width'] != '' && $settings['logo_dimension']['height'] != '' ) {
			$width_height = 'width="' . $settings['logo_dimension']['width'] . '" height="' . $settings['logo_dimension']['height'] . '"';
		} elseif ( $settings['logo_dimension']['width'] != '' ) {
			$width_height = 'width="' . $settings['logo_dimension']['width'] . '"';
		} elseif ( $settings['logo_dimension']['height'] != '' ) {
			$width_height = 'height="' . $settings['logo_dimension']['height'] . '"';
		} else {
			$width_height = 'width="130" height="36"';
		}

		if ( $settings['logo_dimension_sticky']['width'] != '' && $settings['logo_dimension_sticky']['height'] != '' ) {
			$width_height_sticky = 'width="' . $settings['logo_dimension_sticky']['width'] . '" height="' . $settings['logo_dimension_sticky']['height'] . '"';
		} elseif ( $settings['logo_dimension_sticky']['width'] != '' ) {
			$width_height_sticky = 'width="' . $settings['logo_dimension_sticky']['width'] . '"';
		} elseif ( $settings['logo_dimension_sticky']['height'] != '' ) {
			$width_height_sticky = 'height="' . $settings['logo_dimension_sticky']['height'] . '"';
		} else {
			$width_height_sticky = 'width="130" height="36"';
		}
		?>
		<?php
		if ( get_theme_mod( 'social_newtab' ) ) {
			$rt_target = 'target="_blank"';
		} else {
			$rt_target = '';
		}
		?>
		<div class="cd-user-modal">
			<div class="cd-user-modal-container">
				<ul class="cd-switcher">
					<li><a href="#0">Sign in</a></li>
					<li><a href="#0">Register</a></li>
				</ul>
				<div id="cd-login"> <!-- log in form -->
				<?php echo do_shortcode( '[wc_login_form_rk]' ); ?>
				</div>
				<div id="cd-signup"> <!-- sign up form -->
				<?php echo do_shortcode( '[wc_reg_form_rk]' ); ?>
				</div> <!-- cd-signup -->
				<a href="#0" class="cd-close-form">Close</a>
			</div>
		</div>
		<?php if ( 'yes' === $settings['display_sticky_header'] ) { ?>
		<?php if ( 'one' === $settings['header_cus_nav_style'] || 'four' === $settings['header_cus_nav_style'] || 'five' === $settings['header_cus_nav_style']) { ?>
			<header class="rt-header  mobile-header-style1 fixed">
				<div class="rt-header-holder mobile-logo-column">
					<div class="menu-icon rt-mobile-hamburger rt-column hidden-lg">
						<div class="rt-mobile-toggle-holder">
							<div class="rt-mobile-toggle">
								<span></span><span></span><span></span>
							</div>
						</div>
					</div>
					<div class="logo-holder">
						<?php
						echo '<div class="logo radiantthemes-retina">';
						echo '<a href="' . esc_url( home_url() ) . '">';
						echo '<span class="logo-default logo-sticky-retina-one">';
						if ( $settings['logo_image_retina_sticky']['url'] != '' && $settings['logo_image_sticky']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" srcset="' . esc_url( $settings['logo_image_sticky']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina_sticky']['url'] ) . ' 2x" ' . $width_height_sticky . '>';
						} elseif ( $settings['logo_image_sticky']['url'] != '' && $settings['logo_image_retina_sticky']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" ' . $width_height_sticky . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						echo '</span>';
						echo '</a>';
						echo '</div>';
						?>
					</div>
					<div class="rt-navbar-menu <?php echo $settings['header_cus_menu_align_sticky']; ?>">
						<nav class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
							<?php
								wp_nav_menu(
									apply_filters(
										'widget_nav_menu_args',
										$nav_menu_args,
										$nav_menu,
										$settings
									)
								);
							?>
						</nav>
					</div>
					<div class="rt-search-cart-holder">
						<?php if ( 'yes' === $settings['display_login'] ) { ?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<div class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li><a class="cd-signin"  href="#0"><?php echo esc_html__( 'Login / Register', 'dello' ); ?></a></li>
											</ul>
										</nav>
									</div>
								<?php } else { ?>
									<span class="rt_user_login"><a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" ><?php echo esc_html__( 'My Account', 'dello' ); ?></a> </span>
								<?php } ?>
							</div>
						<?php } ?>
						<?php
						if ( ( class_exists( 'WooCommerce' ) ) ) {
							 ?>
							<?php
							if ( 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box ">
									<div class="header-cart-bar">
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div></div>';
							}
						}
						?>
						<?php if ( 'yes' === $settings['display_search'] ) { ?>
							<div class="rt-search-box2">
								 <a href="#search" class="search-btn2 " style="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </a>
		
							</div>
						<?php } ?>
					</div>
				</div>
			</header>
			<?php
		}
		else if ( 'two' === $settings['header_cus_nav_style'] ) { ?>
		<header class="rt-header mobile-header-style2 fixed <?php echo $settings['hover-style']; ?>">

				<div class="rt-header-holder mobile-logo-column">
					<div class="menu-icon rt-mobile-hamburger rt-column hidden-lg">
						<div class="rt-mobile-toggle-holder">
							<div class="rt-mobile-toggle">
								<span></span><span></span><span></span>
							</div>
						</div>
					</div>
					<div class="logo-holder">
						<?php
						echo '<div class="logo radiantthemes-retina">';
						echo '<a href="' . esc_url( home_url() ) . '">';
						echo '<span class="logo-default test-retina-two">';
						if ( $settings['logo_image_retina_sticky']['url'] != '' && $settings['logo_image_sticky']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" srcset="' . esc_url( $settings['logo_image_sticky']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina_sticky']['url'] ) . ' 2x" ' . $width_height . '>';
						} elseif ( $settings['logo_image_sticky']['url'] != '' && $settings['logo_image_retina_sticky']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" ' . $width_height . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						echo '</span>';
						echo '</a>';
						echo '</div>';
						?>
					</div>
					<div class="rt-navbar-menu <?php echo $settings['header_cus_menu_align']; ?>">
						<nav class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
							<?php
							wp_nav_menu(
								apply_filters(
									'widget_nav_menu_args',
									$nav_menu_args,
									$nav_menu,
									$settings
								)
							);
							?>
						</nav>
					</div>
					<div class="rt-search-cart-holder">
						<?php if ( 'yes' === $settings['display_login'] ) { ?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<div class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li><a class="cd-signin"  href="#0"><?php echo esc_html__( 'Login / Register', 'dello' ); ?></a></li>
											</ul>
										</nav>
									</div>
								<?php } else { ?>
									<span class="rt_user_login"><a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" ><?php echo esc_html__( 'My Account', 'dello' ); ?></a> </span>
								<?php } ?>
							</div>
						<?php } ?>
						
						<div class="rt-search-cart-inner-holder">
							
							
						</div>
						<?php if ( 'yes' === $settings['display_social'] ) { ?>
							<div class="rt-social-section one">
								<?php if ( 'yes' === $settings['display_social_text'] ) { ?>
									<span class="rt-social-text"><?php echo $settings['display_social_text_title']; ?></span>
								<?php } ?>
								<ul>
									<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
										<li class="facebook"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
										<li class="twitter"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M15.253 5.038c0.011 0.151 0.011 0.302 0.011 0.454 0 4.605-3.506 9.912-9.913 9.912-1.974 0-3.808-0.572-5.351-1.564 0.281 0.032 0.551 0.042 0.842 0.042 1.629 0 3.127-0.55 4.325-1.488-1.532-0.032-2.815-1.036-3.257-2.417 0.215 0.032 0.431 0.054 0.656 0.054 0.314 0 0.627-0.043 0.918-0.118-1.596-0.324-2.794-1.726-2.794-3.419 0-0.011 0-0.033 0-0.043 0.464 0.258 1.003 0.42 1.575 0.442-0.938-0.626-1.553-1.694-1.553-2.901 0-0.647 0.173-1.241 0.475-1.759 1.715 2.115 4.293 3.496 7.184 3.646-0.055-0.259-0.087-0.529-0.087-0.799 0-1.919 1.554-3.483 3.484-3.483 1.003 0 1.909 0.42 2.546 1.1 0.787-0.151 1.541-0.442 2.211-0.841-0.259 0.809-0.809 1.489-1.532 1.919 0.702-0.075 1.381-0.269 2.007-0.539-0.475 0.69-1.068 1.306-1.747 1.802z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
										<li class="linkedin"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M0.698 5.823h3.438v10.323h-3.438v-10.323zM2.438 0.854c-1.167 0-1.938 0.771-1.938 1.782 0 0.989 0.74 1.781 1.896 1.781h0.021c1.198 0 1.948-0.792 1.938-1.781-0.011-1.011-0.74-1.782-1.917-1.782zM12.552 5.583c-1.829 0-2.643 1.002-3.094 1.709v-1.469h-3.427c0 0 0.042 0.969 0 10.323h3.427v-5.761c0-0.312 0.032-0.615 0.114-0.843 0.251-0.615 0.812-1.25 1.762-1.25 1.238 0 1.738 0.948 1.738 2.333v5.521h3.428v-5.917c0-3.167-1.688-4.646-3.948-4.646z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
										<li class="instagram"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17" height="17" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve"><g><path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752c17.455,0,31.656,14.201,31.656,31.655V122.407z" /><path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z" /><path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78C135.661,29.421,132.821,28.251,129.921,28.251z" /></g></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-dribbble' ) ) ) : ?>
										<li class="dribbble"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-dribbble' ) ); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="17" height="17"><g><path d="M175.872,197.8c24.598-4.801,48.6-11.4,71.398-18.6c-30.298-55.501-67.798-105.601-111.899-147.9   C70.572,66.099,21.27,128.2,5.371,202.299C53.072,211.899,111.972,210.7,175.872,197.8z" /><path d="M418.571,60.099l-4.2,16.5c-6.599,26.4-62.399,64.2-135.599,91.501l-3.301,1.199c-29.7-56.1-67.2-107.1-110.999-151.199   C192.672,7,223.571,0,255.671,0c57.299,0,110.7,20.2,153.3,52.299C412.27,54.699,415.572,57.1,418.571,60.099z" /><path d="M287.171,268.299c-7.8-21.299-16.5-41.999-26.1-62.1c-25.199,8.401-51.899,15.601-79.2,21   c-29.7,6-68.399,11.4-109.199,11.4c-23.401,0-48.401-1.8-72.1-6.301c-0.601,7.8,0.099,15.601,0.099,23.701   c0,78.9,36,149.399,92.1,196.199c0.3-1.8,0.601-3.6,0.899-5.4C105.071,377.8,184.872,304.9,287.171,268.299z" /><path d="M297.071,296.499c20.4,64.2,31.8,133.9,32.999,204.401c-23.399,7.2-48.6,11.1-74.399,11.1   c-48.3,0-93.6-14.5-132.001-37.901c-1.5-7.2-1.5-14.7-0.298-22.5C132.672,394.9,207.071,329.2,297.071,296.499z" /><path d="M508.97,292.299c-12.599,87.902-70.899,161.4-149.499,196.501c-2.1-69.6-14.101-137.401-34.2-201.301   C392.471,268.9,456.172,271,508.97,292.299z" /><path d="M511.671,256v5.4c-57.299-21.301-125.2-22.2-196-2.1c-7.8-21.599-16.8-42.599-26.4-62.999   c49.311-18.515,141.337-61.127,154.2-112.5C485.172,129.099,511.671,189.699,511.671,256z" /></g></svg></a></li>
									<?php endif; ?>
								</ul>
							</div>
						<?php } ?>
						<?php
						if ( 'yes' === $settings['display_contact'] ) {
							?>
							<div class="contact_holder">
								<div class="contact_text">
									<div class="contact_no">
										<?php if ( 'yes' === $settings['display_contact_icon'] ) { ?>
											<div class="contact_icon">
												<?php echo $settings['contact_icon_svg']; ?>
											</div>
										<?php } ?>
										<p><?php echo $settings['radiant_contact_no']; ?>
										<?php if ( strlen( $settings['radiant_contact_text'] ) > 0 ) { ?>
										<span><?php echo $settings['radiant_contact_text']; ?></span>
									<?php } ?>
									</p>
									</div>
								</div>
							</div>
							<?php
						}
						?>
						<?php
						if ( 'yes' === $settings['display_button'] ) {
							$target   = $settings['radiant_custom_btn_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $settings['radiant_custom_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
							$output   = '<div class="radiantthemes-menu-custom-button ">';
							if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
								$output .= '<a class="radiantthemes-menu-custom-button-main" href="' . esc_url( $settings['radiant_custom_btn_link']['url'] ) . '" ' . $target . $nofollow . ' ><span>';
							}
							$output .= $settings['radiant_custom_btn_title'];
							if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
								$output .= '</span></a>';
							}
							$output .= '</div>';
							echo $output;
						}
						?>
						<?php
						if ( 'yes' === $settings['display_button2'] ) {
							$target   = $settings['radiant_custom_btn_link2']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $settings['radiant_custom_btn_link2']['nofollow'] ? ' rel="nofollow"' : '';
							$output   = '<div class="radiantthemes-menu-button">';
							if ( strlen( $settings['radiant_custom_btn_link2']['url'] ) > 0 ) {
								$output .= '<a class="radiantthemes-menu-button-main" href="' . esc_url( $settings['radiant_custom_btn_link2']['url'] ) . '" ' . $target . $nofollow . ' >';
							}
							$output .= $settings['radiant_custom_btn_title2'];
							if ( strlen( $settings['radiant_custom_btn_link2']['url'] ) > 0 ) {
								$output .= '</a>';
							}
							$output .= '</div>';
							echo $output;
						}
						?>
					</div>
					<div class="rt-right-menu-holder">
					<?php if ( 'yes' === $settings['display_search'] ) { ?>
					<div class="rt-search-box2">
								 <a href="#search" class="search-btn2 " style="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </a>
		
</div>
							<?php } ?>
							<?php
							if ( class_exists( 'WooCommerce' ) && 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box ">
									<div class="header-cart-bar">
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div>
								</div>';
							}
							?>
					<?php
						if ( 'yes' === $settings['show_ham_menu'] ) {
							
							?>
							<div class="rt-desktop-hamburger header-elem-desk-hamburger <?php echo esc_html( $hidden_mob_menu ); ?> <?php echo esc_html( $hidden_tab_menu ); ?>">
								<div class="filter"></div>
								<div class="mobile-slider">
									<div class="mobile-slider-top">
										<a class="close-menu"><span></span></a>
									</div>
									<?php if ( 'yes' === $settings['select_ham_menu'] ) { ?>
										<nav>
											<?php
											wp_nav_menu(
												apply_filters(
													'widget_nav_menu_args',
													$ham_nav_menu_args,
													$ham_nav_menu,
													$settings
												)
											);
											?>
										</nav>
									<?php } ?>
									<div class="rt-hamburge-sec"><div class="rt-hamburge-holder">

									<?php if ( $settings['header_cus_menu_logo']['id'] ) : ?>
										<div class="rt-hamburger-menu-logo radiantthemes-retina">
											<img src="<?php echo esc_url( wp_get_attachment_image_url( $settings['header_cus_menu_logo']['id'], 'full' ) ); ?>" width="<?php echo esc_attr( $settings['logo_dimension']['width'] ); ?>" alt="logo" height="<?php echo esc_attr( $settings['logo_dimension']['height'] ); ?>">
										</div>
									<?php endif; ?>
									<?php if ( $settings['header_cus_menu_title'] ) : ?>
										<div class="rt-hamburger-about-text">
											<?php echo wp_kses_post( $settings['header_cus_menu_title'] ); ?>
										</div>
									<?php endif; ?>

									</div></div>
									
									<div class="cleafix"></div>
								</div>
								
								<div class="menu-mobile-icon">
									<span class="rt-m-line burger-top"></span>
									<span class="rt-m-line burger-mid"></span>
									<span class="rt-m-line burger-bot"></span>
								</div>
							</div>
							<?php
						}
						?>
						</div>
					
				</div>
			</header>
			
		<?php } else if ( 'three' === $settings['header_cus_nav_style'] ) { ?>	
		<header class="rt-header  mobile-header-style3 style3hover fixed">
				<div class="rt-header-holder mobile-logo-column">
					<div class="menu-icon rt-mobile-hamburger rt-column hidden-lg">
						<div class="rt-mobile-toggle-holder">
							<div class="rt-mobile-toggle">
								<span></span><span></span><span></span>
							</div>
						</div>
					</div>

					<div class="logo-holder">
						<?php
						echo '<div class="logo radiantthemes-retina">';
						echo '<a href="' . esc_url( home_url() ) . '">';
						echo '<span class="logo-default test-retina-three">';
						if ( $settings['logo_image_retina']['url'] != '' && $settings['logo_image']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" srcset="' . esc_url( $settings['logo_image']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina']['url'] ) . ' 2x" ' . $width_height . '>';
						} elseif ( $settings['logo_image']['url'] != '' && $settings['logo_image_retina']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" ' . $width_height . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						echo '</span>';
						echo '</a>';
						echo '</div>';
						?>
					</div>

					<?php if ( 'yes' === $settings['display_social_left'] ) { ?>
						<div class="rt-social-section-left">
							<ul>
								<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
									<li class="facebook"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z" fill="" /></svg></a></li>
								<?php endif; ?>

								<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
									<li class="twitter"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M15.253 5.038c0.011 0.151 0.011 0.302 0.011 0.454 0 4.605-3.506 9.912-9.913 9.912-1.974 0-3.808-0.572-5.351-1.564 0.281 0.032 0.551 0.042 0.842 0.042 1.629 0 3.127-0.55 4.325-1.488-1.532-0.032-2.815-1.036-3.257-2.417 0.215 0.032 0.431 0.054 0.656 0.054 0.314 0 0.627-0.043 0.918-0.118-1.596-0.324-2.794-1.726-2.794-3.419 0-0.011 0-0.033 0-0.043 0.464 0.258 1.003 0.42 1.575 0.442-0.938-0.626-1.553-1.694-1.553-2.901 0-0.647 0.173-1.241 0.475-1.759 1.715 2.115 4.293 3.496 7.184 3.646-0.055-0.259-0.087-0.529-0.087-0.799 0-1.919 1.554-3.483 3.484-3.483 1.003 0 1.909 0.42 2.546 1.1 0.787-0.151 1.541-0.442 2.211-0.841-0.259 0.809-0.809 1.489-1.532 1.919 0.702-0.075 1.381-0.269 2.007-0.539-0.475 0.69-1.068 1.306-1.747 1.802z" fill="" /></svg></a></li>
								<?php endif; ?>

								<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
									<li class="linkedin"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M0.698 5.823h3.438v10.323h-3.438v-10.323zM2.438 0.854c-1.167 0-1.938 0.771-1.938 1.782 0 0.989 0.74 1.781 1.896 1.781h0.021c1.198 0 1.948-0.792 1.938-1.781-0.011-1.011-0.74-1.782-1.917-1.782zM12.552 5.583c-1.829 0-2.643 1.002-3.094 1.709v-1.469h-3.427c0 0 0.042 0.969 0 10.323h3.427v-5.761c0-0.312 0.032-0.615 0.114-0.843 0.251-0.615 0.812-1.25 1.762-1.25 1.238 0 1.738 0.948 1.738 2.333v5.521h3.428v-5.917c0-3.167-1.688-4.646-3.948-4.646z" fill="" /></svg></a></li>
								<?php endif; ?>

								<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
									<li class="instagram"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17" height="17" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve"><g><path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752c17.455,0,31.656,14.201,31.656,31.655V122.407z" /><path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z" /><path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78C135.661,29.421,132.821,28.251,129.921,28.251z" /></g></svg></a></li>
								<?php endif; ?>
							</ul>
						</div>
					<?php } ?>

					<div class="rt-navbar-menu <?php echo $settings['header_cus_menu_align']; ?>">
						<nav class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
							<?php
							wp_nav_menu(
								apply_filters(
									'widget_nav_menu_args',
									$nav_menu_args,
									$nav_menu,
									$settings
								)
							);
							?>
						</nav>
					</div>

					<div class="rt-search-cart-holder">
						<?php if ( 'yes' === $settings['display_login'] ) { ?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<div class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li><a class="cd-signin"  href="#0"><?php echo esc_html__( 'Login / Register', 'dello' ); ?></a></li>
											</ul>
										</nav>
									</div>
								<?php } else { ?>
									<span class="rt_user_login"><a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" ><?php echo esc_html__( 'My Account', 'dello' ); ?></a> </span>
								<?php } ?>
							</div>
							<?php
						}

						
						?>

						<div class="rt-search-cart-inner-holder">
							

							
						</div>

						<?php
						if ( 'yes' === $settings['display_contact'] ) {
							?>
							<div class="contact_holder">
								<div class="contact_text">
									<?php if ( strlen( $settings['radiant_contact_text'] ) > 0 ) { ?>
										<span><?php echo $settings['radiant_contact_text']; ?></span>
									<?php } ?>

									<div class="contact_no">
										<?php if ( 'yes' === $settings['display_contact_icon'] ) { ?>
											<div class="contact_icon">
												<?php echo $settings['contact_icon_svg']; ?>
												
											</div>
										<?php } ?>
										<p><?php echo $settings['radiant_contact_no']; ?></p>
									</div>
								</div>
							</div>
							<?php
						}
						?>

						<?php
						if ( 'yes' === $settings['display_button'] ) {
							$target   = $settings['radiant_custom_btn_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $settings['radiant_custom_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
							$output   = '<div class="radiantthemes-menu-custom-button ">';

							if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
								$output .= '<a class="radiantthemes-menu-custom-button-main" href="' . esc_url( $settings['radiant_custom_btn_link']['url'] ) . '" ' . $target . $nofollow . ' ><span>';
							}
							$output .= $settings['radiant_custom_btn_title'];
							if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
								$output .= '</span></a>';
							}
							$output .= '</div>';
							echo $output;
						}
						?>

						<?php if ( 'yes' === $settings['display_social'] ) { ?>
							<div class="rt-social-section three">
								<?php if ( 'yes' === $settings['display_social_text'] ) { ?>
									<span class="rt-social-text"><?php echo $settings['display_social_text_title']; ?></span>
								<?php } ?>

								<ul>
									<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
										<li class="facebook"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
										<li class="twitter"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M15.253 5.038c0.011 0.151 0.011 0.302 0.011 0.454 0 4.605-3.506 9.912-9.913 9.912-1.974 0-3.808-0.572-5.351-1.564 0.281 0.032 0.551 0.042 0.842 0.042 1.629 0 3.127-0.55 4.325-1.488-1.532-0.032-2.815-1.036-3.257-2.417 0.215 0.032 0.431 0.054 0.656 0.054 0.314 0 0.627-0.043 0.918-0.118-1.596-0.324-2.794-1.726-2.794-3.419 0-0.011 0-0.033 0-0.043 0.464 0.258 1.003 0.42 1.575 0.442-0.938-0.626-1.553-1.694-1.553-2.901 0-0.647 0.173-1.241 0.475-1.759 1.715 2.115 4.293 3.496 7.184 3.646-0.055-0.259-0.087-0.529-0.087-0.799 0-1.919 1.554-3.483 3.484-3.483 1.003 0 1.909 0.42 2.546 1.1 0.787-0.151 1.541-0.442 2.211-0.841-0.259 0.809-0.809 1.489-1.532 1.919 0.702-0.075 1.381-0.269 2.007-0.539-0.475 0.69-1.068 1.306-1.747 1.802z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
										<li class="linkedin"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M0.698 5.823h3.438v10.323h-3.438v-10.323zM2.438 0.854c-1.167 0-1.938 0.771-1.938 1.782 0 0.989 0.74 1.781 1.896 1.781h0.021c1.198 0 1.948-0.792 1.938-1.781-0.011-1.011-0.74-1.782-1.917-1.782zM12.552 5.583c-1.829 0-2.643 1.002-3.094 1.709v-1.469h-3.427c0 0 0.042 0.969 0 10.323h3.427v-5.761c0-0.312 0.032-0.615 0.114-0.843 0.251-0.615 0.812-1.25 1.762-1.25 1.238 0 1.738 0.948 1.738 2.333v5.521h3.428v-5.917c0-3.167-1.688-4.646-3.948-4.646z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
										<li class="instagram"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17" height="17" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve"><g><path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752c17.455,0,31.656,14.201,31.656,31.655V122.407z" /><path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z" /><path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78C135.661,29.421,132.821,28.251,129.921,28.251z" /></g></svg></a></li>
									<?php endif; ?>
								</ul>
							</div>
							<?php
						}
						?>
					</div>
					<div class="rt-right-menu-holder">
					<?php if ( 'yes' === $settings['display_search'] ) { ?>
					<div class="rt-search-box2">
								 <a href="#search" class="search-btn2 " style="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </a>
		
</div>
							<?php } ?>
							<?php
							if ( class_exists( 'WooCommerce' ) && 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box ">
									<div class="header-cart-bar">
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div>
								</div>';
							}
							?>
					<?php
						if ( 'yes' === $settings['show_ham_menu'] ) {
							
							?>
							<div class="rt-desktop-hamburger header-elem-desk-hamburger <?php echo esc_html( $hidden_mob_menu ); ?> <?php echo esc_html( $hidden_tab_menu ); ?>">
								<div class="filter"></div>
								<div class="mobile-slider">
									<div class="mobile-slider-top">
										<a class="close-menu"><span></span></a>
									</div>
									<?php if ( 'yes' === $settings['select_ham_menu'] ) { ?>
										<nav>
											<?php
											wp_nav_menu(
												apply_filters(
													'widget_nav_menu_args',
													$ham_nav_menu_args,
													$ham_nav_menu,
													$settings
												)
											);
											?>
										</nav>
									<?php } ?>
									<div class="rt-hamburge-sec"><div class="rt-hamburge-holder">

									<?php if ( $settings['header_cus_menu_logo']['id'] ) : ?>
										<div class="rt-hamburger-menu-logo radiantthemes-retina">
											<img src="<?php echo esc_url( wp_get_attachment_image_url( $settings['header_cus_menu_logo']['id'], 'full' ) ); ?>" width="<?php echo esc_attr( $settings['logo_dimension']['width'] ); ?>" alt="logo" height="<?php echo esc_attr( $settings['logo_dimension']['height'] ); ?>">
										</div>
									<?php endif; ?>
									<?php if ( $settings['header_cus_menu_title'] ) : ?>
										<div class="rt-hamburger-about-text">
											<?php echo wp_kses_post( $settings['header_cus_menu_title'] ); ?>
										</div>
									<?php endif; ?>

									</div></div>
									
									<div class="cleafix"></div>
								</div>
								
								<div class="menu-mobile-icon">
									<span class="rt-m-line burger-top"></span>
									<span class="rt-m-line burger-mid"></span>
									<span class="rt-m-line burger-bot"></span>
								</div>
							</div>
							<?php
						}
						?>
						</div>
				</div>
			</header>

			
		
		<?php }?>
		
		<?php }

		if ( 'one' === $settings['header_cus_nav_style'] ) {
			?>
			<header class="rt-header style1 mobile-header-style1">
				<div class="rt-header-holder mobile-logo-column">
					<div class="menu-icon rt-mobile-hamburger rt-column hidden-lg">
						<div class="rt-mobile-toggle-holder">
							<div class="rt-mobile-toggle">
								<span></span><span></span><span></span>
							</div>
						</div>
					</div>
					<div class="logo-holder">
						<?php
						echo '<div class="logo radiantthemes-retina">';
						echo '<a href="' . esc_url( home_url() ) . '">';
						echo '<span class="logo-default test-retina-one">';
						if ( $settings['logo_image_retina']['url'] != '' && $settings['logo_image']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" srcset="' . esc_url( $settings['logo_image']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina']['url'] ) . ' 2x" ' . $width_height . '>';
						} elseif ( $settings['logo_image']['url'] != '' && $settings['logo_image_retina']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" ' . $width_height . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						echo '</span>';
						echo '</a>';
						echo '</div>';
						?>
					</div>
					<?php if ( 'yes' === $settings['display_search'] ) { ?>
						<div class="rt-search-box2 cat-search-box">
							 <a href="#search-header" class="search-btn2 " style="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </a>
		<div id="search-header">
  			<div class="search-btn2">
            	<a class="close"><span></span></a>
          	</div>
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" target="_top">
      <input name="s" class="search-text" placeholder="Type your search" type="search">
     
    </form>
</div>
						</div>
					<?php } ?>
					<div class="rt-search-cart-holder">
						<?php if ( 'yes' === $settings['display_login'] ) { ?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<div class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li>
													<a class="cd-signin" href="#0">
														<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
													</a>
												</li>
											</ul>
										</nav>
									</div>
								<?php } else { ?>
									<span class="rt_user_login">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" >
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
										</a>
									</span>
								<?php } ?>
							</div>
						<?php } ?>
						<?php
						if ( ( class_exists( 'WooCommerce' ) ) ) {
							 ?>
							<?php
							if ( 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box">
									<div class="header-cart-bar">
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div>
								</div>';
							}
						}
						?>
						<?php
						if ( 'yes' === $settings['show_ham_menu'] ) {
							$ham_nav_menu    = ! empty( $settings['header_cus_ham_nav_menu'] ) ? wp_get_nav_menu_object( $settings['header_cus_ham_nav_menu'] ) : false;
							$hidden_mob_menu = '';
							$hidden_tab_menu = '';
							if ( 'no' === $settings['show_ham_menu_mobile'] ) {
								$hidden_mob_menu = 'elementor-hidden-phone';
							}
							if ( 'no' === $settings['show_ham_menu_tab'] ) {
								$hidden_tab_menu = 'elementor-hidden-tablet';
							}
							$ham_nav_menu_args = array(
								'fallback_cb'    => false,
								'container'      => false,
								'menu_class'     => 'rt-tree',
								'menu_id'        => 'main-menu',
								'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
								'menu'           => $ham_nav_menu,
								'echo'           => true,
								'depth'          => 0,
							);
							?>
							<div class="header-elem-desk-hamburger <?php echo esc_html( $hidden_mob_menu ); ?> <?php echo esc_html( $hidden_tab_menu ); ?>">
								<div class="filter"></div>
								<div class="mobile-slider">
									<div class="mobile-slider-top">
										<span class="ti-close ti close-menu"></span>
									</div>
									<?php if ( 'yes' === $settings['select_ham_menu'] ) { ?>
										<nav>
											<?php
											wp_nav_menu(
												apply_filters(
													'widget_nav_menu_args',
													$ham_nav_menu_args,
													$ham_nav_menu,
													$settings
												)
											);
											?>
										</nav>
									<?php } ?>
									<?php if ( $settings['header_cus_menu_logo']['id'] ) : ?>
										<div class="rt-hamburger-menu-logo radiantthemes-retina">
											<img src="<?php echo esc_url( wp_get_attachment_image_url( $settings['header_cus_menu_logo']['id'], 'full' ) ); ?>" width="<?php echo esc_attr( $settings['logo_dimension']['width'] ); ?>" alt="logo" height="<?php echo esc_attr( $settings['logo_dimension']['height'] ); ?>">
										
									<?php endif; ?>
									<?php if ( $settings['header_cus_menu_title'] ) : ?>
										<div class="rt-hamburger-about-text">
											<?php echo wp_kses_post( $settings['header_cus_menu_title'] ); ?>
										</div>
									<?php endif; ?>
									<?php if ( $settings['header_cus_menu_logo']['id'] ) : ?></div><?php endif; ?>
									<div class="rt-hamburger-social-link">
										<h6><?php echo esc_html( $settings['header_cus_menu_social_heading'] ); ?></h6>
										<ul>
											<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
												<li class="facebook"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>"><i class="ti ti-facebook"></i></a></li>
											<?php endif; ?>
											<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
												<li class="twitter"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>"><i class="ti ti-twitter"></i></a></li>
											<?php endif; ?>
											<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
												<li class="linkedin"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>"><i class="ti ti-linkedin"></i></a></li>
											<?php endif; ?>
											<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
												<li class="instagram"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>"><i class="ti ti-instagram"></i></a></li>
											<?php endif; ?>
											<?php if ( ! empty( get_theme_mod( 'social-icon-dribbble' ) ) ) : ?>
												<li class="dribble"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-dribbble' ) ); ?>"><i class="ti ti-dribbble"></i></a></li>
											<?php endif; ?>
										</ul>
									</div>
									<div class="cleafix"></div>
								</div>
								<div class="menu-mobile-icon">
									<span class="burger-top"></span>
									<span class="burger-mid"></span>
									<span class="burger-bot"></span>
								</div>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<nav class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
					<?php
						wp_nav_menu(
							apply_filters(
								'widget_nav_menu_args',
								$nav_menu_args,
								$nav_menu,
								$settings
							)
						);
					?>
				</nav>
				<div class="ph">
					<?php echo wp_kses_post( $settings['header_cus_contact_text'] ); ?>
				</div>
			</header>
			<nav id="mobile-menu" class="side-panel" >
				<header	der class="side-panel-header">
					<span>
						<?php
						if ( $settings['logo_image_retina_sticky']['url'] != '' && $settings['logo_image_sticky']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" srcset="' . esc_url( $settings['logo_image_sticky']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina_sticky']['url'] ) . ' 2x" ' . $width_height_sticky . '>';
						} elseif ( $settings['logo_image_sticky']['url'] != '' && $settings['logo_image_retina_sticky']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" ' . $width_height_sticky . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						?>
					</span>
					<div class="rt-toggle-close rt-close-btn" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="12" height="12" viewBox="1.1 1.1 12 12" enable-background="new 1.1 1.1 12 12" xml:space="preserve"><path d="M8.3 7.1l4.6-4.6c0.3-0.3 0.3-0.8 0-1.2 -0.3-0.3-0.8-0.3-1.2 0L7.1 5.9 2.5 1.3c-0.3-0.3-0.8-0.3-1.2 0 -0.3 0.3-0.3 0.8 0 1.2L5.9 7.1l-4.6 4.6c-0.3 0.3-0.3 0.8 0 1.2s0.8 0.3 1.2 0L7.1 8.3l4.6 4.6c0.3 0.3 0.8 0.3 1.2 0 0.3-0.3 0.3-0.8 0-1.2L8.3 7.1z"></path></svg></div>
				</header>
				<div class="side-panel-inner mobile-side-panel-inner">
					<div class="mobile-menu-top">
						<?php if ( 'yes' === $settings['display_search'] ) { ?>
							<form role="search"  class="woocommerce-product-search rt-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
								<label class="search-lebel" >Search for:</label>
								<input type="search" class="search-field" placeholder="Search …" name="s">
								<button type="submit" value="Search" aria-label="Search">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
								</button>
							</form>
						<?php } ?>
						<?php
						$nav_menu_mobile_args = array(
							'fallback_cb'    => false,
							'container'      => false,
							'menu_class'     => 'rt-mobile-menu',
							'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
							'menu'           => $nav_menu,
							'echo'           => true,
							'depth'          => 0,
							'link_after'     => '<span></span>',
							'walker'         => new Radiantthemes_Menu_Walker(),
						);
						?>
						<?php
						wp_nav_menu(
							apply_filters(
								'widget_nav_menu_args',
								$nav_menu_mobile_args,
								$nav_menu,
								$settings
							)
						);
						?>
						<?php echo '<div class="rt-search-cart-holder">'; ?>
							<?php if ( 'yes' === $settings['display_login'] ) { ?>
								<div class="rt-user-box ">
									<?php if ( ! is_user_logged_in() ) { ?>
										<div class="rt_user_login">
											<p><?php echo esc_html__( 'Login', 'dello' ); ?></p>
											<nav class="main-nav">
												<ul>
													<li><a class="cd-signin"  href="#0"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a></li>
												</ul>
											</nav>
										</div>
									<?php } else { ?>
										<span class="rt_user_login">
											<p><?php echo esc_html__( 'My Account', 'dello' ); ?></p>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
										</span>
									<?php } ?>
								</div>
							<?php } ?>						
							
							<?php
							if ( ( class_exists( 'WooCommerce' ) ) ) {
								if ( 'yes' === $settings['display_cart'] ) {
									echo '<div class="rt-cart-box ">
											<div class="header-cart-bar">
												<p>' . esc_html__( 'Cart', 'dello' ) . '</p>
												<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
													<span class="rt-cart">
														<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
													</span>
													<span class="cart-count"></span>
												</a>
											</div>
											<div class="cart-overlay cart-block">';
												do_action( 'radiantthemes_before_nav_menu' );
											echo '</div>
										</div>';
								}
							}
							echo '</div>';
							?>
					</div>
				</div>
			</nav>
			<?php
		} elseif ( 'two' === $settings['header_cus_nav_style'] ) {
			?>
			<header class="rt-header <?php echo $settings['header_cus_logo_style']; ?> <?php echo $settings['hover-style']; ?> style2 mobile-header-style1">
				<div class="rt-header-holder mobile-logo-column">
					<div class="menu-icon rt-mobile-hamburger rt-column hidden-lg visible-md visible-sm visible-xs">
						<div class="rt-mobile-toggle-holder">
							<div class="rt-mobile-toggle">
								<span></span><span></span><span></span>
							</div>
						</div>
					</div>
					<div class="logo-holder">
						<?php
						echo '<div class="logo radiantthemes-retina">';
						echo '<a href="' . esc_url( home_url() ) . '">';
						echo '<span class="logo-default test-retina-two">';
						if ( $settings['logo_image_retina']['url'] != '' && $settings['logo_image']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" srcset="' . esc_url( $settings['logo_image']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina']['url'] ) . ' 2x" ' . $width_height . '>';
						} elseif ( $settings['logo_image']['url'] != '' && $settings['logo_image_retina']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" ' . $width_height . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						echo '</span>';
						echo '</a>';
						echo '</div>';
						?>
					</div>
					<div class="rt-navbar-menu <?php echo $settings['header_cus_menu_align']; ?>">
						<nav class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
							<?php
							wp_nav_menu(
								apply_filters(
									'widget_nav_menu_args',
									$nav_menu_args,
									$nav_menu,
									$settings
								)
							);
							?>
						</nav>
					</div>
					<div class="rt-search-cart-holder">
						<?php if ( 'yes' === $settings['display_login'] ) { ?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<div class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li><a class="cd-signin"  href="#0"><?php echo esc_html__( 'Login / Register', 'dello' ); ?></a></li>
											</ul>
										</nav>
									</div>
								<?php } else { ?>
									<span class="rt_user_login"><a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" ><?php echo esc_html__( 'My Account', 'dello' ); ?></a> </span>
								<?php } ?>
							</div>
						<?php } ?>
						
						<div class="rt-search-cart-inner-holder">
							
							
						</div>
						<?php if ( 'yes' === $settings['display_social'] ) { ?>
							<div class="rt-social-section one">
								<?php if ( 'yes' === $settings['display_social_text'] ) { ?>
									<span class="rt-social-text"><?php echo $settings['display_social_text_title']; ?></span>
								<?php } ?>
								<ul>
									<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
										<li class="facebook"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
										<li class="twitter"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M15.253 5.038c0.011 0.151 0.011 0.302 0.011 0.454 0 4.605-3.506 9.912-9.913 9.912-1.974 0-3.808-0.572-5.351-1.564 0.281 0.032 0.551 0.042 0.842 0.042 1.629 0 3.127-0.55 4.325-1.488-1.532-0.032-2.815-1.036-3.257-2.417 0.215 0.032 0.431 0.054 0.656 0.054 0.314 0 0.627-0.043 0.918-0.118-1.596-0.324-2.794-1.726-2.794-3.419 0-0.011 0-0.033 0-0.043 0.464 0.258 1.003 0.42 1.575 0.442-0.938-0.626-1.553-1.694-1.553-2.901 0-0.647 0.173-1.241 0.475-1.759 1.715 2.115 4.293 3.496 7.184 3.646-0.055-0.259-0.087-0.529-0.087-0.799 0-1.919 1.554-3.483 3.484-3.483 1.003 0 1.909 0.42 2.546 1.1 0.787-0.151 1.541-0.442 2.211-0.841-0.259 0.809-0.809 1.489-1.532 1.919 0.702-0.075 1.381-0.269 2.007-0.539-0.475 0.69-1.068 1.306-1.747 1.802z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
										<li class="linkedin"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M0.698 5.823h3.438v10.323h-3.438v-10.323zM2.438 0.854c-1.167 0-1.938 0.771-1.938 1.782 0 0.989 0.74 1.781 1.896 1.781h0.021c1.198 0 1.948-0.792 1.938-1.781-0.011-1.011-0.74-1.782-1.917-1.782zM12.552 5.583c-1.829 0-2.643 1.002-3.094 1.709v-1.469h-3.427c0 0 0.042 0.969 0 10.323h3.427v-5.761c0-0.312 0.032-0.615 0.114-0.843 0.251-0.615 0.812-1.25 1.762-1.25 1.238 0 1.738 0.948 1.738 2.333v5.521h3.428v-5.917c0-3.167-1.688-4.646-3.948-4.646z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
										<li class="instagram"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17" height="17" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve"><g><path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752c17.455,0,31.656,14.201,31.656,31.655V122.407z" /><path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z" /><path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78C135.661,29.421,132.821,28.251,129.921,28.251z" /></g></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-dribbble' ) ) ) : ?>
										<li class="dribbble"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-dribbble' ) ); ?>"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="17" height="17"><g><path d="M175.872,197.8c24.598-4.801,48.6-11.4,71.398-18.6c-30.298-55.501-67.798-105.601-111.899-147.9   C70.572,66.099,21.27,128.2,5.371,202.299C53.072,211.899,111.972,210.7,175.872,197.8z" /><path d="M418.571,60.099l-4.2,16.5c-6.599,26.4-62.399,64.2-135.599,91.501l-3.301,1.199c-29.7-56.1-67.2-107.1-110.999-151.199   C192.672,7,223.571,0,255.671,0c57.299,0,110.7,20.2,153.3,52.299C412.27,54.699,415.572,57.1,418.571,60.099z" /><path d="M287.171,268.299c-7.8-21.299-16.5-41.999-26.1-62.1c-25.199,8.401-51.899,15.601-79.2,21   c-29.7,6-68.399,11.4-109.199,11.4c-23.401,0-48.401-1.8-72.1-6.301c-0.601,7.8,0.099,15.601,0.099,23.701   c0,78.9,36,149.399,92.1,196.199c0.3-1.8,0.601-3.6,0.899-5.4C105.071,377.8,184.872,304.9,287.171,268.299z" /><path d="M297.071,296.499c20.4,64.2,31.8,133.9,32.999,204.401c-23.399,7.2-48.6,11.1-74.399,11.1   c-48.3,0-93.6-14.5-132.001-37.901c-1.5-7.2-1.5-14.7-0.298-22.5C132.672,394.9,207.071,329.2,297.071,296.499z" /><path d="M508.97,292.299c-12.599,87.902-70.899,161.4-149.499,196.501c-2.1-69.6-14.101-137.401-34.2-201.301   C392.471,268.9,456.172,271,508.97,292.299z" /><path d="M511.671,256v5.4c-57.299-21.301-125.2-22.2-196-2.1c-7.8-21.599-16.8-42.599-26.4-62.999   c49.311-18.515,141.337-61.127,154.2-112.5C485.172,129.099,511.671,189.699,511.671,256z" /></g></svg></a></li>
									<?php endif; ?>
								</ul>
							</div>
						<?php } ?>
						<?php
						if ( 'yes' === $settings['display_contact'] ) {
							?>
							<div class="contact_holder">
								<div class="contact_text">
									<div class="contact_no">
										<?php if ( 'yes' === $settings['display_contact_icon'] ) { ?>
											<div class="contact_icon">
												<?php echo $settings['contact_icon_svg']; ?>
											</div>
										<?php } ?>
										<p><?php echo $settings['radiant_contact_no']; ?>
										<?php if ( strlen( $settings['radiant_contact_text'] ) > 0 ) { ?>
										<span><?php echo $settings['radiant_contact_text']; ?></span>
									<?php } ?>
									</p>
									</div>
								</div>
							</div>
							<?php
						}
						?>
						<?php
						if ( 'yes' === $settings['display_button'] ) {
							$target   = $settings['radiant_custom_btn_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $settings['radiant_custom_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
							$output   = '<div class="radiantthemes-menu-custom-button ">';
							if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
								$output .= '<a class="radiantthemes-menu-custom-button-main" href="' . esc_url( $settings['radiant_custom_btn_link']['url'] ) . '" ' . $target . $nofollow . ' ><span>';
							}
							$output .= $settings['radiant_custom_btn_title'];
							if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
								$output .= '</span></a>';
							}
							$output .= '</div>';
							echo $output;
						}
						?>
						<?php
						if ( 'yes' === $settings['display_button2'] ) {
							$target   = $settings['radiant_custom_btn_link2']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $settings['radiant_custom_btn_link2']['nofollow'] ? ' rel="nofollow"' : '';
							$output   = '<div class="radiantthemes-menu-button">';
							if ( strlen( $settings['radiant_custom_btn_link2']['url'] ) > 0 ) {
								$output .= '<a class="radiantthemes-menu-button-main" href="' . esc_url( $settings['radiant_custom_btn_link2']['url'] ) . '" ' . $target . $nofollow . ' >';
							}
							$output .= $settings['radiant_custom_btn_title2'];
							if ( strlen( $settings['radiant_custom_btn_link2']['url'] ) > 0 ) {
								$output .= '</a>';
							}
							$output .= '</div>';
							echo $output;
						}
						?>
					</div>
					<div class="rt-right-menu-holder">
					<?php if ( 'yes' === $settings['display_search'] ) { ?>
								<div class="rt-search-box2">
									
										 <a href="#search-header" class="search-btn2 " style="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </a>
		<div id="search-header">
  			<div class="search-btn2">
            	<a class="close"><span></span></a>
          	</div>
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" target="_top">
      <input name="s" class="search-text" placeholder="Type your search" type="search">
     
    </form>
</div>
										
									
								</div>
							<?php } ?>
							<?php
							if ( class_exists( 'WooCommerce' ) && 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box ">
									<div class="header-cart-bar">
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div>
								</div>';
							}
							?>
					<?php
						if ( 'yes' === $settings['show_ham_menu'] ) {
							$ham_nav_menu    = ! empty( $settings['header_cus_ham_nav_menu'] ) ? wp_get_nav_menu_object( $settings['header_cus_ham_nav_menu'] ) : false;
							$hidden_mob_menu = '';
							$hidden_tab_menu = '';
							if ( 'no' === $settings['show_ham_menu_mobile'] ) {
								$hidden_mob_menu = 'elementor-hidden-phone';
							}
							if ( 'no' === $settings['show_ham_menu_tab'] ) {
								$hidden_tab_menu = 'elementor-hidden-tablet';
							}
							$ham_nav_menu_args = array(
								'fallback_cb'    => false,
								'container'      => false,
								'menu_class'     => 'rt-tree',
								'menu_id'        => 'main-menu',
								'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
								'menu'           => $ham_nav_menu,
								'echo'           => true,
								'depth'          => 0,
							);
							?>
							<div class="rt-desktop-hamburger header-elem-desk-hamburger <?php echo esc_html( $hidden_mob_menu ); ?> <?php echo esc_html( $hidden_tab_menu ); ?>">
								<div class="filter"></div>
								<div class="mobile-slider">
									<div class="mobile-slider-top">
										<a class="close-menu"><span></span></a>
									</div>
									<?php if ( 'yes' === $settings['select_ham_menu'] ) { ?>
										<nav>
											<?php
											wp_nav_menu(
												apply_filters(
													'widget_nav_menu_args',
													$ham_nav_menu_args,
													$ham_nav_menu,
													$settings
												)
											);
											?>
										</nav>
									<?php } ?>

									<div class="rt-hamburge-sec"><div class="rt-hamburge-holder">
									   <?php if ( $settings['header_cus_menu_logo']['id'] ) : ?>
										<div class="rt-hamburger-menu-logo radiantthemes-retina">
											<img src="<?php echo esc_url( wp_get_attachment_image_url( $settings['header_cus_menu_logo']['id'], 'full' ) ); ?>" width="<?php echo esc_attr( $settings['logo_dimension']['width'] ); ?>" alt="logo" height="<?php echo esc_attr( $settings['logo_dimension']['height'] ); ?>">
										</div>
									   <?php endif; ?>
									   <?php if ( $settings['header_cus_menu_title'] ) : ?>
										<div class="rt-hamburger-about-text">
											<?php echo wp_kses_post( $settings['header_cus_menu_title'] ); ?>
										</div>
									   <?php endif; ?>
									</div></div>

									<div class="cleafix"></div>
								</div>
								<div class="menu-mobile-icon">
									<span class="rt-m-line burger-top"></span>
									<span class="rt-m-line burger-mid"></span>
									<span class="rt-m-line burger-bot"></span>
								</div>
							</div>
							<?php
						}
						?>
				</div>
				</div>
			</header>
			<nav id="mobile-menu" class="side-panel" >
				<header class="side-panel-header">
					<span>
						<?php
						if ( $settings['logo_image_retina_sticky']['url'] != '' && $settings['logo_image_sticky']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" srcset="' . esc_url( $settings['logo_image_sticky']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina_sticky']['url'] ) . ' 2x" ' . $width_height_sticky . '>';
						} elseif ( $settings['logo_image_sticky']['url'] != '' && $settings['logo_image_retina_sticky']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" ' . $width_height_sticky . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						?>
					</span>
					<div class="rt-toggle-close rt-close-btn" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="12" height="12" viewBox="1.1 1.1 12 12" enable-background="new 1.1 1.1 12 12" xml:space="preserve"><path d="M8.3 7.1l4.6-4.6c0.3-0.3 0.3-0.8 0-1.2 -0.3-0.3-0.8-0.3-1.2 0L7.1 5.9 2.5 1.3c-0.3-0.3-0.8-0.3-1.2 0 -0.3 0.3-0.3 0.8 0 1.2L5.9 7.1l-4.6 4.6c-0.3 0.3-0.3 0.8 0 1.2s0.8 0.3 1.2 0L7.1 8.3l4.6 4.6c0.3 0.3 0.8 0.3 1.2 0 0.3-0.3 0.3-0.8 0-1.2L8.3 7.1z"></path></svg></div>
				</header>
				<div class="side-panel-inner mobile-side-panel-inner">
					<div class="mobile-menu-top">
						<?php if ( 'yes' === $settings['display_search'] ) { ?>
							<form role="search"  class="woocommerce-product-search rt-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
								<label class="search-lebel" >Search for:</label>
								<input type="search" class="search-field" placeholder="Search…" name="s">
								<button type="submit" value="Search" aria-label="Search">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
								</button>
							</form>
							<?php
						}
						$nav_menu_mobile_args = array(
							'fallback_cb'    => false,
							'container'      => false,
							'menu_class'     => 'rt-mobile-menu',
							'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
							'menu'           => $nav_menu,
							'echo'           => true,
							'depth'          => 0,
							'link_after'     => '<span></span>',
							'walker'         => new Radiantthemes_Menu_Walker(),

						);
						?>
						<?php
						wp_nav_menu(
							apply_filters(
								'widget_nav_menu_args',
								$nav_menu_mobile_args,
								$nav_menu,
								$settings
							)
						);
						?>
						<?php echo '<div class="rt-search-cart-holder">'; ?>
						<?php if ( 'yes' === $settings['display_login'] ) { ?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<div class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li><a class="cd-signin"  href="#0"><?php echo esc_html__( 'Login / Register', 'dello' ); ?></a></li>
											</ul>
										</nav>
									</div>
								<?php } else { ?>
									<span class="rt_user_login">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" ><?php echo esc_html__( 'My Account', 'dello' ); ?></a>
									</span>
								<?php } ?>
							</div>
						<?php } ?>
						
						
								<?php
						if ( ( class_exists( 'WooCommerce' ) ) ) {
							if ( 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box ">
									<div class="header-cart-bar">
										<p>' . esc_html__( 'Cart', 'dello' ) . '</p>
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div>
								</div>';
							}
						}
						if ( 'yes' === $settings['display_social'] ) {
							?>
							<div class="rt-social-section two">
								<?php if ( 'yes' === $settings['display_social_text'] ) { ?>
									<span class="rt-social-text"><?php echo $settings['display_social_text_title']; ?></span>
								<?php } ?>
								<ul>
									<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
										<li class="facebook"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
										<li class="twitter"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M15.253 5.038c0.011 0.151 0.011 0.302 0.011 0.454 0 4.605-3.506 9.912-9.913 9.912-1.974 0-3.808-0.572-5.351-1.564 0.281 0.032 0.551 0.042 0.842 0.042 1.629 0 3.127-0.55 4.325-1.488-1.532-0.032-2.815-1.036-3.257-2.417 0.215 0.032 0.431 0.054 0.656 0.054 0.314 0 0.627-0.043 0.918-0.118-1.596-0.324-2.794-1.726-2.794-3.419 0-0.011 0-0.033 0-0.043 0.464 0.258 1.003 0.42 1.575 0.442-0.938-0.626-1.553-1.694-1.553-2.901 0-0.647 0.173-1.241 0.475-1.759 1.715 2.115 4.293 3.496 7.184 3.646-0.055-0.259-0.087-0.529-0.087-0.799 0-1.919 1.554-3.483 3.484-3.483 1.003 0 1.909 0.42 2.546 1.1 0.787-0.151 1.541-0.442 2.211-0.841-0.259 0.809-0.809 1.489-1.532 1.919 0.702-0.075 1.381-0.269 2.007-0.539-0.475 0.69-1.068 1.306-1.747 1.802z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
										<li class="linkedin"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M0.698 5.823h3.438v10.323h-3.438v-10.323zM2.438 0.854c-1.167 0-1.938 0.771-1.938 1.782 0 0.989 0.74 1.781 1.896 1.781h0.021c1.198 0 1.948-0.792 1.938-1.781-0.011-1.011-0.74-1.782-1.917-1.782zM12.552 5.583c-1.829 0-2.643 1.002-3.094 1.709v-1.469h-3.427c0 0 0.042 0.969 0 10.323h3.427v-5.761c0-0.312 0.032-0.615 0.114-0.843 0.251-0.615 0.812-1.25 1.762-1.25 1.238 0 1.738 0.948 1.738 2.333v5.521h3.428v-5.917c0-3.167-1.688-4.646-3.948-4.646z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
										<li class="instagram"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17" height="17" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve"><g><path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752c17.455,0,31.656,14.201,31.656,31.655V122.407z" /><path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z" /><path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78C135.661,29.421,132.821,28.251,129.921,28.251z" /></g></svg></a></li>
									<?php endif; ?>
								</ul>
							</div>
								<?php
						}
						echo '</div>';
						?>
					</div>
				</div>
			</nav>
			<?php
		} elseif ( 'three' === $settings['header_cus_nav_style'] ) {
			?>
			<header class="rt-header <?php echo $settings['header_cus_logo_style']; ?> <?php echo $settings['hover-style']; ?> style3 mobile-header-style1">
				<div class="rt-header-holder mobile-logo-column">
					<div class="menu-icon rt-mobile-hamburger rt-column hidden-lg visible-md visible-sm visible-xs">
						<div class="rt-mobile-toggle-holder">
							<div class="rt-mobile-toggle">
								<span></span><span></span><span></span>
							</div>
						</div>
					</div>

					<div class="logo-holder">
						<?php
						echo '<div class="logo radiantthemes-retina">';
						echo '<a href="' . esc_url( home_url() ) . '">';
						echo '<span class="logo-default test-retina-three">';
						if ( $settings['logo_image_retina']['url'] != '' && $settings['logo_image']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" srcset="' . esc_url( $settings['logo_image']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina']['url'] ) . ' 2x" ' . $width_height . '>';
						} elseif ( $settings['logo_image']['url'] != '' && $settings['logo_image_retina']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" ' . $width_height . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						echo '</span>';
						echo '</a>';
						echo '</div>';
						?>
					</div>

					<?php if ( 'yes' === $settings['display_social_left'] ) { ?>
						<div class="rt-social-section-left">
							<ul>
								<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
									<li class="facebook"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z" fill="" /></svg></a></li>
								<?php endif; ?>

								<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
									<li class="twitter"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M15.253 5.038c0.011 0.151 0.011 0.302 0.011 0.454 0 4.605-3.506 9.912-9.913 9.912-1.974 0-3.808-0.572-5.351-1.564 0.281 0.032 0.551 0.042 0.842 0.042 1.629 0 3.127-0.55 4.325-1.488-1.532-0.032-2.815-1.036-3.257-2.417 0.215 0.032 0.431 0.054 0.656 0.054 0.314 0 0.627-0.043 0.918-0.118-1.596-0.324-2.794-1.726-2.794-3.419 0-0.011 0-0.033 0-0.043 0.464 0.258 1.003 0.42 1.575 0.442-0.938-0.626-1.553-1.694-1.553-2.901 0-0.647 0.173-1.241 0.475-1.759 1.715 2.115 4.293 3.496 7.184 3.646-0.055-0.259-0.087-0.529-0.087-0.799 0-1.919 1.554-3.483 3.484-3.483 1.003 0 1.909 0.42 2.546 1.1 0.787-0.151 1.541-0.442 2.211-0.841-0.259 0.809-0.809 1.489-1.532 1.919 0.702-0.075 1.381-0.269 2.007-0.539-0.475 0.69-1.068 1.306-1.747 1.802z" fill="" /></svg></a></li>
								<?php endif; ?>

								<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
									<li class="linkedin"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M0.698 5.823h3.438v10.323h-3.438v-10.323zM2.438 0.854c-1.167 0-1.938 0.771-1.938 1.782 0 0.989 0.74 1.781 1.896 1.781h0.021c1.198 0 1.948-0.792 1.938-1.781-0.011-1.011-0.74-1.782-1.917-1.782zM12.552 5.583c-1.829 0-2.643 1.002-3.094 1.709v-1.469h-3.427c0 0 0.042 0.969 0 10.323h3.427v-5.761c0-0.312 0.032-0.615 0.114-0.843 0.251-0.615 0.812-1.25 1.762-1.25 1.238 0 1.738 0.948 1.738 2.333v5.521h3.428v-5.917c0-3.167-1.688-4.646-3.948-4.646z" fill="" /></svg></a></li>
								<?php endif; ?>

								<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
									<li class="instagram"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17" height="17" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve"><g><path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752c17.455,0,31.656,14.201,31.656,31.655V122.407z" /><path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z" /><path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78C135.661,29.421,132.821,28.251,129.921,28.251z" /></g></svg></a></li>
								<?php endif; ?>
							</ul>
						</div>
					<?php } ?>

					<div class="rt-navbar-menu <?php echo $settings['header_cus_menu_align']; ?>">
						<nav class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
							<?php
							wp_nav_menu(
								apply_filters(
									'widget_nav_menu_args',
									$nav_menu_args,
									$nav_menu,
									$settings
								)
							);
							?>
						</nav>
					</div>

					<div class="rt-search-cart-holder">
						<?php if ( 'yes' === $settings['display_login'] ) { ?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<div class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li><a class="cd-signin"  href="#0"><?php echo esc_html__( 'Login / Register', 'dello' ); ?></a></li>
											</ul>
										</nav>
									</div>
								<?php } else { ?>
									<span class="rt_user_login"><a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" ><?php echo esc_html__( 'My Account', 'dello' ); ?></a> </span>
								<?php } ?>
							</div>
							<?php
						}

						
						?>

						

						<?php
						if ( 'yes' === $settings['display_contact'] ) {
							?>
							<div class="contact_holder">
								<div class="contact_text">
									<?php if ( strlen( $settings['radiant_contact_text'] ) > 0 ) { ?>
										<span><?php echo $settings['radiant_contact_text']; ?></span>
									<?php } ?>

									<div class="contact_no">
										<?php if ( 'yes' === $settings['display_contact_icon'] ) { ?>
											<div class="contact_icon">
												<?php echo $settings['contact_icon_svg']; ?>
												
											</div>
										<?php } ?>
										<p><?php echo $settings['radiant_contact_no']; ?></p>
									</div>
								</div>
							</div>
							<?php
						}
						?>

						<?php
						if ( 'yes' === $settings['display_button'] ) {
							$target   = $settings['radiant_custom_btn_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $settings['radiant_custom_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
							$output   = '<div class="radiantthemes-menu-custom-button ">';

							if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
								$output .= '<a class="radiantthemes-menu-custom-button-main" href="' . esc_url( $settings['radiant_custom_btn_link']['url'] ) . '" ' . $target . $nofollow . ' ><span>';
							}
							$output .= $settings['radiant_custom_btn_title'];
							if ( strlen( $settings['radiant_custom_btn_link']['url'] ) > 0 ) {
								$output .= '</span></a>';
							}
							$output .= '</div>';
							echo $output;
						}
						?>

						<?php if ( 'yes' === $settings['display_social'] ) { ?>
							<div class="rt-social-section three">
								<?php if ( 'yes' === $settings['display_social_text'] ) { ?>
									<span class="rt-social-text"><?php echo $settings['display_social_text_title']; ?></span>
								<?php } ?>

								<ul>
									<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
										<li class="facebook"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
										<li class="twitter"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M15.253 5.038c0.011 0.151 0.011 0.302 0.011 0.454 0 4.605-3.506 9.912-9.913 9.912-1.974 0-3.808-0.572-5.351-1.564 0.281 0.032 0.551 0.042 0.842 0.042 1.629 0 3.127-0.55 4.325-1.488-1.532-0.032-2.815-1.036-3.257-2.417 0.215 0.032 0.431 0.054 0.656 0.054 0.314 0 0.627-0.043 0.918-0.118-1.596-0.324-2.794-1.726-2.794-3.419 0-0.011 0-0.033 0-0.043 0.464 0.258 1.003 0.42 1.575 0.442-0.938-0.626-1.553-1.694-1.553-2.901 0-0.647 0.173-1.241 0.475-1.759 1.715 2.115 4.293 3.496 7.184 3.646-0.055-0.259-0.087-0.529-0.087-0.799 0-1.919 1.554-3.483 3.484-3.483 1.003 0 1.909 0.42 2.546 1.1 0.787-0.151 1.541-0.442 2.211-0.841-0.259 0.809-0.809 1.489-1.532 1.919 0.702-0.075 1.381-0.269 2.007-0.539-0.475 0.69-1.068 1.306-1.747 1.802z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
										<li class="linkedin"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17" viewBox="0 0 17 17"><path d="M0.698 5.823h3.438v10.323h-3.438v-10.323zM2.438 0.854c-1.167 0-1.938 0.771-1.938 1.782 0 0.989 0.74 1.781 1.896 1.781h0.021c1.198 0 1.948-0.792 1.938-1.781-0.011-1.011-0.74-1.782-1.917-1.782zM12.552 5.583c-1.829 0-2.643 1.002-3.094 1.709v-1.469h-3.427c0 0 0.042 0.969 0 10.323h3.427v-5.761c0-0.312 0.032-0.615 0.114-0.843 0.251-0.615 0.812-1.25 1.762-1.25 1.238 0 1.738 0.948 1.738 2.333v5.521h3.428v-5.917c0-3.167-1.688-4.646-3.948-4.646z" fill="" /></svg></a></li>
									<?php endif; ?>

									<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
										<li class="instagram"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17" height="17" viewBox="0 0 169.063 169.063" style="enable-background:new 0 0 169.063 169.063;" xml:space="preserve"><g><path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752c17.455,0,31.656,14.201,31.656,31.655V122.407z" /><path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z" /><path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78C135.661,29.421,132.821,28.251,129.921,28.251z" /></g></svg></a></li>
									<?php endif; ?>
								</ul>
							</div>
							<?php
						}
						?>
					</div>
					<div class="rt-right-menu-holder">
					<?php if ( 'yes' === $settings['display_search'] ) { ?>
								<div class="rt-search-box2">
									
										 <a href="#search-header" class="search-btn2 " style="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </a>
		<div id="search-header">
  			<div class="search-btn2">
            	<a class="close"><span></span></a>
          	</div>
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" target="_top">
      <input name="s" class="search-text" placeholder="Type your search" type="search">
     
    </form>
</div>
										
									
								</div>
							<?php } ?>
							<?php
							if ( class_exists( 'WooCommerce' ) && 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box ">
									<div class="header-cart-bar">
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div>
								</div>';
							}
							?>
					<?php
						if ( 'yes' === $settings['show_ham_menu'] ) {
							$ham_nav_menu    = ! empty( $settings['header_cus_ham_nav_menu'] ) ? wp_get_nav_menu_object( $settings['header_cus_ham_nav_menu'] ) : false;
							$hidden_mob_menu = '';
							$hidden_tab_menu = '';
							if ( 'no' === $settings['show_ham_menu_mobile'] ) {
								$hidden_mob_menu = 'elementor-hidden-phone';
							}
							if ( 'no' === $settings['show_ham_menu_tab'] ) {
								$hidden_tab_menu = 'elementor-hidden-tablet';
							}
							$ham_nav_menu_args = array(
								'fallback_cb'    => false,
								'container'      => false,
								'menu_class'     => 'rt-tree',
								'menu_id'        => 'main-menu',
								'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
								'menu'           => $ham_nav_menu,
								'echo'           => true,
								'depth'          => 0,
							);
							?>
							<div class="rt-desktop-hamburger header-elem-desk-hamburger <?php echo esc_html( $hidden_mob_menu ); ?> <?php echo esc_html( $hidden_tab_menu ); ?>">
								<div class="filter"></div>
								<div class="mobile-slider">
									<div class="mobile-slider-top">
										<a class="close-menu"><span></span></a>
									</div>
									<?php if ( 'yes' === $settings['select_ham_menu'] ) { ?>
										<nav>
											<?php
											wp_nav_menu(
												apply_filters(
													'widget_nav_menu_args',
													$ham_nav_menu_args,
													$ham_nav_menu,
													$settings
												)
											);
											?>
										</nav>
									<?php } ?>

									<div class="rt-hamburge-sec"><div class="rt-hamburge-holder">
									   <?php if ( $settings['header_cus_menu_logo']['id'] ) : ?>
										<div class="rt-hamburger-menu-logo radiantthemes-retina">
											<img src="<?php echo esc_url( wp_get_attachment_image_url( $settings['header_cus_menu_logo']['id'], 'full' ) ); ?>" width="<?php echo esc_attr( $settings['logo_dimension']['width'] ); ?>" alt="logo" height="<?php echo esc_attr( $settings['logo_dimension']['height'] ); ?>">
										</div>
									   <?php endif; ?>
									   <?php if ( $settings['header_cus_menu_title'] ) : ?>
										<div class="rt-hamburger-about-text">
											<?php echo wp_kses_post( $settings['header_cus_menu_title'] ); ?>
										</div>
									   <?php endif; ?>
									</div></div>

									<div class="cleafix"></div>
								</div>
								<div class="menu-mobile-icon">
									<span class="rt-m-line burger-top"></span>
									<span class="rt-m-line burger-mid"></span>
									<span class="rt-m-line burger-bot"></span>
								</div>
							</div>
							<?php
						}
						?>
				</div>
				</div>
			</header>

			<nav id="mobile-menu" class="side-panel" >
				<header class="side-panel-header">
					<span>
						<?php
						if ( $settings['logo_image_retina_sticky']['url'] != '' && $settings['logo_image_sticky']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" srcset="' . esc_url( $settings['logo_image_sticky']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina_sticky']['url'] ) . ' 2x" ' . $width_height_sticky . '>';
						} elseif ( $settings['logo_image_sticky']['url'] != '' && $settings['logo_image_retina_sticky']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" ' . $width_height_sticky . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						?>
					</span>
					<div class="rt-toggle-close rt-close-btn" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="12" height="12" viewBox="1.1 1.1 12 12" enable-background="new 1.1 1.1 12 12" xml:space="preserve"><path d="M8.3 7.1l4.6-4.6c0.3-0.3 0.3-0.8 0-1.2 -0.3-0.3-0.8-0.3-1.2 0L7.1 5.9 2.5 1.3c-0.3-0.3-0.8-0.3-1.2 0 -0.3 0.3-0.3 0.8 0 1.2L5.9 7.1l-4.6 4.6c-0.3 0.3-0.3 0.8 0 1.2s0.8 0.3 1.2 0L7.1 8.3l4.6 4.6c0.3 0.3 0.8 0.3 1.2 0 0.3-0.3 0.3-0.8 0-1.2L8.3 7.1z"></path></svg></div>
				</header>

				<div class="side-panel-inner mobile-side-panel-inner">
					<div class="mobile-menu-top">
						<?php if ( 'yes' === $settings['display_search'] ) { ?>
							<form role="search"  class="woocommerce-product-search rt-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
								<label class="search-lebel" >Search for:</label>
								<input type="search" class="search-field" placeholder="Search…" name="s">
								<button type="submit" value="Search" aria-label="Search">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
								</button>
							</form>
							<?php
						}

						$nav_menu_mobile_args = array(
							'fallback_cb'    => false,
							'container'      => false,
							'menu_class'     => 'rt-mobile-menu',
							'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
							'menu'           => $nav_menu,
							'echo'           => true,
							'depth'          => 0,
							'link_after'     => '<span></span>',
							'walker'         => new Radiantthemes_Menu_Walker(),

						);
						?>

						<?php
						wp_nav_menu(
							apply_filters(
								'widget_nav_menu_args',
								$nav_menu_mobile_args,
								$nav_menu,
								$settings
							)
						);
						?>

						<?php
						echo '<div class="rt-search-cart-holder">';
						if ( 'yes' === $settings['display_login'] ) {
							?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<div class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li><a class="cd-signin"  href="#0"><?php echo esc_html__( 'Login / Register', 'dello' ); ?></a></li>
											</ul>
										</nav>
									</div>
								<?php } else { ?>
									<span class="rt_user_login"><a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" ><?php echo esc_html__( 'My Account', 'dello' ); ?></a></span>
								<?php } ?>
							</div>
						<?php } ?>	
					   <?php

						if ( ( class_exists( 'WooCommerce' ) ) ) {
							if ( 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box">
									<div class="header-cart-bar">
										<p>' . esc_html__( 'Cart', 'dello' ) . '</p>
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div>
								</div>';
							}
						}
						echo '</div>';
						?>
					</div>
				</div>
			</nav>
			<?php
		} elseif ( 'four' === $settings['header_cus_nav_style'] ) {
			?>
			<div class="rt-nav-sidebar-menu">
				<?php if ( $settings['header_cus_menu_logo1']['id'] ) : ?>
					<div class="brand-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( wp_get_attachment_image_url( $settings['header_cus_menu_logo1']['id'], 'full' ) ); ?>" width="<?php echo esc_attr( $settings['logo_dimension1']['width'] ); ?>" alt="logo" height="<?php echo esc_attr( $settings['logo_dimension1']['height'] ); ?>"></a>
					</div>
				<?php endif; ?>

				<div id="rt-side-menu" class="rt-side-menu collapse out testing">
					<?php
					$nav_menu_args_two = array(
						'fallback_cb'    => false,
						'container'      => false,
						'menu_class'     => 'rt-tree',
						'menu_id'        => 'main-menu',
						'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
						'menu'           => $nav_menu,
						'echo'           => true,
						'depth'          => 0,
					);

					wp_nav_menu(
						apply_filters(
							'widget_nav_menu_args',
							$nav_menu_args_two,
							$nav_menu,
							$settings
						)
					);
					?>
				</div>

				<?php if ( $settings['header_cus_menu_title1'] ) : ?>
					<div class="rt-hamburger-about-text">
						<?php echo wp_kses( $settings['header_cus_menu_title1'], 'rt-content' ); ?>
					</div>
				<?php endif; ?>

				<div class="rt-hamburger-social-link">
					<h4><?php echo esc_html( $settings['header_cus_menu_social_heading'] ); ?></h4>
					<ul>
						<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
							<li class="facebook"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>"><i class="fa fa-facebook"></i></a></li>
						<?php endif; ?>
						<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
							<li class="twitter"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>"><i class="fa fa-twitter"></i></a></li>
						<?php endif; ?>
						<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
							<li class="linkedin"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>"><i class="fa fa-linkedin"></i></a></li>
						<?php endif; ?>
						<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
							<li class="instagram"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>"><i class="fa fa-instagram"></i></a></li>
						<?php endif; ?>
						<?php if ( ! empty( get_theme_mod( 'social-icon-dribbble' ) ) ) : ?>
							<li class="dribbble"><a <?php echo $rt_target; ?> href="<?php echo esc_url( get_theme_mod( 'social-icon-dribbble' ) ); ?>"><i class="fa fa-dribbble"></i></a></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
							<?php
		} elseif ( 'five' === $settings['header_cus_nav_style'] ) {
			?>
			<header class="rt-header <?php echo $settings['header_cus_logo_style']; ?> <?php echo $settings['hover-style']; ?> style5 mobile-header-style1">
				<div class="rt-header-holder mobile-logo-column">
					<div class="menu-icon rt-mobile-hamburger rt-column hidden-lg">
						<div class="rt-mobile-toggle-holder">
							<div class="rt-mobile-toggle">
								<span></span><span></span><span></span>
							</div>
						</div>
					</div>

					<div class="desktop-menu-icon rt-desktop-hamburger rt-column ">
						<div class="rt-desktop-toggle-holder">
							<div class="rt-desktop-toggle">
								<span></span><span></span><span></span>
							</div>
						</div>
					</div>

					<div class="logo-holder">
						<?php
						echo '<div class="logo radiantthemes-retina">';
						echo '<a href="' . esc_url( home_url() ) . '">';
						echo '<span class="logo-default test-retina-five">';
						if ( $settings['logo_image_retina']['url'] != '' && $settings['logo_image']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" srcset="' . esc_url( $settings['logo_image']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina']['url'] ) . ' 2x" ' . $width_height . '>';
						} elseif ( $settings['logo_image']['url'] != '' && $settings['logo_image_retina']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image']['url'] ) . '" ' . $width_height . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						echo '</span>';
						echo '</a>';
						echo '</div>';
						?>
					</div>

					<div class="rt-navbar-menu <?php echo $settings['header_cus_menu_align']; ?>">
						<nav class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
							<?php
							wp_nav_menu(
								apply_filters(
									'widget_nav_menu_args',
									$nav_menu_args,
									$nav_menu,
									$settings
								)
							);
							?>
						</nav>
					</div>

					<div class="rt-search-cart-holder">
						<?php if ( 'yes' === $settings['display_login'] ) { ?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<span class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li><a class="cd-signin"  href="#0"><?php echo esc_html__( 'Login / Register', 'dello' ); ?></a></li>
											</ul>
										</nav>
									</span>
								<?php } else { ?>
									<span class="rt_user_login"><a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account"><?php echo esc_html__( 'My Account', 'dello' ); ?></a></span>
								<?php } ?>
							</div>
							<?php
						}

						if ( ( class_exists( 'WooCommerce' ) ) ) {
							 ?>

							<?php
							if ( 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box">
									<div class="header-cart-bar">
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div>
								</div>';
							}
						}
						?>

						<?php if ( 'yes' === $settings['display_search'] ) { ?>
							<div class="rt-search-box2">
								 <a href="#search-header" class="search-btn2 " style="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </a>
		<div id="search-header">
  			<div class="search-btn2">
            	<a class="close"><span></span></a>
          	</div>
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" target="_top">
      <input name="s" class="search-text" placeholder="Type your search" type="search">
     
    </form>
</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</header>

			<nav id="desktop-menu" class="side-panel">
				<header class="side-panel-header">
					<span>
						<?php
						if ( $settings['logo_image_retina_sticky']['url'] != '' && $settings['logo_image_sticky']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" srcset="' . esc_url( $settings['logo_image_sticky']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina_sticky']['url'] ) . ' 2x" ' . $width_height_sticky . '>';
						} elseif ( $settings['logo_image_sticky']['url'] != '' && $settings['logo_image_retina_sticky']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" ' . $width_height_sticky . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						?>
					</span>
					<div class="rt-toggle-close rt-close-btn" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="12" height="12" viewBox="1.1 1.1 12 12" enable-background="new 1.1 1.1 12 12" xml:space="preserve"><path d="M8.3 7.1l4.6-4.6c0.3-0.3 0.3-0.8 0-1.2 -0.3-0.3-0.8-0.3-1.2 0L7.1 5.9 2.5 1.3c-0.3-0.3-0.8-0.3-1.2 0 -0.3 0.3-0.3 0.8 0 1.2L5.9 7.1l-4.6 4.6c-0.3 0.3-0.3 0.8 0 1.2s0.8 0.3 1.2 0L7.1 8.3l4.6 4.6c0.3 0.3 0.8 0.3 1.2 0 0.3-0.3 0.3-0.8 0-1.2L8.3 7.1z"></path></svg></div>
				</header>

				<div class="side-panel-inner mobile-side-panel-inner">
					<div class="mobile-menu-top">
						<?php if ( 'yes' === $settings['display_search'] ) { ?>
							<form role="search"  class="woocommerce-product-search rt-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
								<label class="search-lebel" >Search for:</label>
								<input type="search" class="search-field" placeholder="Search…" name="s">
								<button type="submit" value="Search" aria-label="Search">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
								</button>
							</form>
							<?php
						}

						$nav_menu_mobile_args = array(
							'fallback_cb'    => false,
							'container'      => false,
							'menu_class'     => 'rt-mobile-menu',
							'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
							'menu'           => $nav_menu,
							'echo'           => true,
							'depth'          => 0,
							'link_after'     => '<span></span>',
							'walker'         => new Radiantthemes_Menu_Walker(),
						);
						?>

						<?php
						wp_nav_menu(
							apply_filters(
								'widget_nav_menu_args',
								$nav_menu_mobile_args,
								$nav_menu,
								$settings
							)
						);
						?>
					</div>
				</div>
			</nav>

			<nav id="mobile-menu" class="side-panel">
				<header class="side-panel-header">
					<span>
						<?php
						if ( $settings['logo_image_retina_sticky']['url'] != '' && $settings['logo_image_sticky']['url'] != '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" srcset="' . esc_url( $settings['logo_image_sticky']['url'] ) . ' 1x, ' . esc_url( $settings['logo_image_retina_sticky']['url'] ) . ' 2x" ' . $width_height_sticky . '>';
						} elseif ( $settings['logo_image_sticky']['url'] != '' && $settings['logo_image_retina_sticky']['url'] == '' ) {
							echo '<img alt="logo" src="' . esc_url( $settings['logo_image_sticky']['url'] ) . '" ' . $width_height_sticky . '>';
						} else {
							echo '<p class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</p>';
						}
						?>
					</span>
					<div class="rt-toggle-close rt-close-btn" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="12" height="12" viewBox="1.1 1.1 12 12" enable-background="new 1.1 1.1 12 12" xml:space="preserve"><path d="M8.3 7.1l4.6-4.6c0.3-0.3 0.3-0.8 0-1.2 -0.3-0.3-0.8-0.3-1.2 0L7.1 5.9 2.5 1.3c-0.3-0.3-0.8-0.3-1.2 0 -0.3 0.3-0.3 0.8 0 1.2L5.9 7.1l-4.6 4.6c-0.3 0.3-0.3 0.8 0 1.2s0.8 0.3 1.2 0L7.1 8.3l4.6 4.6c0.3 0.3 0.8 0.3 1.2 0 0.3-0.3 0.3-0.8 0-1.2L8.3 7.1z"></path></svg></div>
				</header>

				<div class="side-panel-inner mobile-side-panel-inner">
					<div class="mobile-menu-top">
						<?php if ( 'yes' === $settings['display_search'] ) { ?>
							<form role="search"  class="woocommerce-product-search rt-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
								<label class="search-lebel" >Search for:</label>
								<input type="search" class="search-field" placeholder="Search…" name="s">
								<button type="submit" value="Search" aria-label="Search">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
								</button>
							</form>
							<?php
						}

						$nav_menu_mobile_args = array(
							'fallback_cb'    => false,
							'container'      => false,
							'menu_class'     => 'rt-mobile-menu',
							'theme_location' => 'default_navmenu', // creating a fake location for better functional control.
							'menu'           => $nav_menu,
							'echo'           => true,
							'depth'          => 0,
							'link_after'     => '<span></span>',
							'walker'         => new Radiantthemes_Menu_Walker(),

						);
						?>

						<?php
						wp_nav_menu(
							apply_filters(
								'widget_nav_menu_args',
								$nav_menu_mobile_args,
								$nav_menu,
								$settings
							)
						);
						?>

						<?php echo '<div class="rt-search-cart-holder">'; ?>

						<?php if ( 'yes' === $settings['display_login'] ) { ?>
							<div class="rt-user-box ">
								<?php if ( ! is_user_logged_in() ) { ?>
									<span class="rt_user_login">
										<nav class="main-nav">
											<ul>
												<li><a class="cd-signin"  href="#0"><?php echo esc_html__( 'Login / Register', 'dello' ); ?></a></li>
											</ul>
										</nav>
									</span>
								<?php } else { ?>
									<span class="rt_user_login">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>my-account" ><?php echo esc_html__( 'My Account', 'dello' ); ?></a>
									</span>
								<?php } ?>
							</div>
						<?php } ?>
						
						<?php

						if ( ( class_exists( 'WooCommerce' ) ) ) {
							if ( 'yes' === $settings['display_cart'] ) {
								echo '<div class="rt-cart-box ">
									<div class="header-cart-bar">
										<p>' . esc_html__( 'Cart', 'dello' ) . '</p>
										<a class="header-cart-bar-icon" href="' . esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ) . '">
											<span class="rt-cart">
												<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
											</span>
											<span class="cart-count"></span>
										</a>
									</div>
									<div class="cart-overlay cart-block">';
										do_action( 'radiantthemes_before_nav_menu' );
									echo '</div>
								</div>';
							}
						}

						echo '</div>';
						?>
					</div>
				</div>
			</nav>
			<?php
		}
	}
}