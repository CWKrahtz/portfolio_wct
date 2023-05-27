<?php
namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

/**
 * @since 1.1.0
 */
class Radiantthemes_Style_Team extends Widget_Base {

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
		return 'radiant-team';
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
		return __( 'Team', 'radiantthemes-addons' );
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
		return 'eicon-person';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return [
			'rt-team',
		];
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return [
			'radiantthemes-team',
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
	 * Get all team Custom Post Type Categories.
	 *
	 * @return array team categories.
	 */
	public function get_team_categories() {
		$team_terms = get_terms(
			array(
				'taxonomy'   => 'profession',
				'hide_empty' => false,
			)
		);

		$team_category_array = array();
		$team_category_array = array( 'all' => 'Show all Professions' );
		if ( ! empty( $team_terms ) ) {
			foreach ( $team_terms as $team_term ) {
				$team_category_array[ $team_term->slug ] = $team_term->name;
			}
		}

		return $team_category_array;
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
				'label' => __( 'Content', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'style_variation',
			[
				'label'       => esc_html__( 'Team Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One ', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two ', 'radiantthemes-addons' ),
					'three'   => esc_html__( 'Style Three ', 'radiantthemes-addons' ),
					'four'   => esc_html__( 'Style Four ', 'radiantthemes-addons' ),
					'five'   => esc_html__( 'Style Five ', 'radiantthemes-addons' ),
					'six'   => esc_html__( 'Style Six ', 'radiantthemes-addons' ),
					'seven' => esc_html__( 'Style Seven ', 'radiantthemes-addons' ),
					'eight' => esc_html__( 'Style Eight ', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
			]
		);

		$this->add_control(
			'team_category',
			[
				'label'       => esc_html__( 'Select Professions', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_team_categories(),
				'default'     => 'all','multiple'    => true,
			]
		);

		$this->add_control(
			'team_allow_carousel',
			[
				'label'   => esc_html__( 'Carousel', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default' => 'true',
			]
		);
/*
		$this->add_control(
			'allow_nav',
			[
				'label'     => esc_html__( 'Allow Navigation?', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default'   => 'true',
				'condition' => [
					'team_allow_carousel' => 'true',
				],
			]
		);

		$this->add_control(
			'navigation_style',
			[
				'label'       => esc_html__( 'Navigation Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One (Arrow - Light)', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two (Circle)', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three (Arrow - Dark)', 'radiantthemes-addons' ),
				],
				'default'     => 'one',
				'condition'   => [
					'allow_nav'                   => 'true',
					'team_allow_carousel!' => 'false',
				],
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
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
			]
		);

		$this->add_control(
			'navigation_dot_style',
			[
				'label'       => esc_html__( 'Navigation Dot Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one' => esc_html__( 'Center Dot (Dark)', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Right Dot (Light)', 'radiantthemes-addons' ),
				],
				'default'     => 'two',
				'condition'   => [
					'allow_dots'                  => 'true',
					'team_allow_carousel!' => 'false',
				],
			]
		);
		*/



		$this->add_control(
			'order',
			[
				'label'       => esc_html__( 'Order', 'radiantthemes-addons' ),
				'label_block' => false,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				],
				'default'     => 'DESC',
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'       => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'date'     => esc_html__( 'Date', 'radiantthemes-addons' ),
					'title'    => esc_html__( 'Title', 'radiantthemes-addons' ),
					'ID'       => esc_html__( 'ID', 'radiantthemes-addons' ),
					'rand'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'modified' => esc_html__( 'Last Modified', 'radiantthemes-addons' ),
				],
				'default'     => 'date',
			]
		);

		$this->add_control(
			'max_posts',
			[
				'label'       => esc_html__( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => -1,
				'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
				'default'     => 4,
			]
		);

		$this->add_control(
			'posts_in_desktop',
			[
				'label'       => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Desktop', 'radiantthemes-addons' ),
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
				'default'     => 3,
			]
		);

		$this->add_control(
			'posts_in_tab',
			[
				'label'       => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Tab', 'radiantthemes-addons' ),
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
				'default'     => 2,
			]
		);

		$this->add_control(
			'posts_in_mobile',
			[
				'label'       => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Mobile', 'radiantthemes-addons' ),
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
				'default'     => 1,
			]
		);
		$this->add_control(
			'space_between_posts',
			[
				'label'       => esc_html__( 'Space beteen posts', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Space between Two Posts', 'radiantthemes-addons' ),
				'condition'   => [
					'team_allow_carousel' => 'true',
				],
				'default'     => 30,
			]
		);



		$this->end_controls_section();



        $this->start_controls_section(
			'section_team_social',
			[
				'label' => __( 'Social Icon', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style_variation!' => 'four',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'border',
				'label'    => esc_html__( 'Border', 'radiantthemes-addons' ),
				'condition'   => [
					'style_variation!' => 'seven',
				],
				'selector' => '{{WRAPPER}} .team.element-two .rt-team_box .team_share_icons .icon,
				{{WRAPPER}} .team.element-three .team_share_icons .icon,
				{{WRAPPER}} .team.element-five .rt-team_box .team_share_icons .icon,
				{{WRAPPER}} .team.element-six .rt-team_box .team_share_icons,
				{{WRAPPER}} .team.element-one .team_box .team_share_icons .icon,
				{{WRAPPER}} .team.element-eight .team-hoverfx .team-figure ul li',

			)
		);

		$this->add_control(
			'radiant_a_border_radius',
			array(
				'label'      => esc_html__( 'Border Radius', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px','%' ),
				'condition'   => [
					'style_variation!' => 'seven',
				],
				'selectors'  => array(
					'{{WRAPPER}} .team_share_icons .icon ' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
					'{{WRAPPER}} .team.element-eight .team-hoverfx .team-figure ul li' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
				),
			)
		);
        $this->add_control(
			'team_sicolor',
			[
				'label'     => esc_html__( 'Social icon color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .team_share_icons .icon svg' => 'fill: {{VALUE}} !important;',
					'{{WRAPPER}} .team.element-eight .team-hoverfx .team-figure ul li a svg' => 'fill: {{VALUE}} !important;',
					'{{WRAPPER}} .team.element-seven .rt-professionals .team-member-social-icon ul li a svg' => 'fill: {{VALUE}} ;',
				],
			]
		);
		$this->add_control(
			'team_shicolor',
			[
				'label'     => esc_html__( 'Hover Social icon color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => [
					'style_variation' => 'seven',
				],
				'selectors' => [

					'{{WRAPPER}} .team.element-seven .rt-professionals .team-member-social-icon ul li a svg:hover' => 'fill: {{VALUE}} ;',
				],
			]
		);
		$this->add_control(
			'team_sicolor_bg',
			[
				'label'     => esc_html__( 'Hover Social icon background color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => [
					'style_variation!' => array('seven','eight'),
				],
				'selectors' => [
					'{{WRAPPER}}  .team_share_icons .icon:hover' => 'background: {{VALUE}} !important;',
				],
			]
		);


		$this->add_control(
			'radiant_portfolio_gradient_bg_type',
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

					'style_variation' => array('seven'),
				),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_portfolio_gradient_bg_color_one',
			array(
				'label'     => esc_html__( 'Background Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(

					'style_variation'           => array('seven'),
				),
			)
		);

		$this->add_control(
			'radiant_portfolio_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Background Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .team.element-seven .rt-professionals .team-member-social-icon' => 'background: linear-gradient({{radiant_portfolio_gradient_bg_type.VALUE}}, {{radiant_portfolio_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				),
				'condition' => array(

					'style_variation'           => array('seven'),
				),
			)
		);

		$this->add_control(
			'radiant_hover_gradient_bg_type',
			array(
				'label'       => esc_html__( 'Hover Gradient Background Type', 'radiantthemes-addons' ),
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

					'style_variation' => array('seven'),
				),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_hover_gradient_bg_color_one',
			array(
				'label'     => esc_html__( 'Hover Background Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(

					'style_variation'           => array('seven'),
				),
			)
		);

		$this->add_control(
			'radiant_hover_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Hover Background Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .team.element-seven .rt-professionals .team-member-social-icon:hover' => 'background: linear-gradient({{radiant_hover_gradient_bg_type.VALUE}}, {{radiant_hover_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				),
				'condition' => array(

					'style_variation'           => array('seven'),
				),
			)
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'section_team_hover',
			[
				'label' => __( 'Hover', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style_variation' => 'six',
				],

			]
		);
        $this->add_control(
			'team_bgcolor',
			[
				'label'     => esc_html__( 'Hover background color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => [
					'style_variation' => 'six',
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-six .rt-team_box .team_share_icons' => 'background: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_icon',
			[
				'label' => __( 'Icon', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style_variation' => 'three',
				],
			]
		);


		$this->add_control(
			'team_icon_color',
			[
				'label'     => esc_html__( 'Phone & Email icon color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => [
					'style_variation' => 'three',
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-three .contact-details svg' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_content',
			[
				'label' => __( 'Content', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style_variation!' => array('five','six','seven','eight'),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Content Typography', 'radiantthemes-addons' ),
				'name'     => 'content_typography',
				'condition'   => [
					'style_variation!' => array('five','six'),
				],
				'selector' => '{{WRAPPER}} .team.element-two .rt-team_box .content-box,{{WRAPPER}} .team.element-three p',
			]
		);
		$this->add_control(
			'team_content_color',
			[
				'label'     => esc_html__( 'Content color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => [
					'style_variation!' => array('five','six'),
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-two .rt-team_box .content-box' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-three p' => 'color: {{VALUE}}',




				],

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_title',
			[
				'label' => esc_html__( 'Title', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Title Typography', 'radiantthemes-addons' ),
				'name'     => 'title_typography',
				'selector' =>
				'{{WRAPPER}} .team.element-six .rt-team_box .team_share_icons .team-data-area .team-member a h4, {{WRAPPER}} .team.element-five .rt-team_box .rt-team_box-info a h4,{{WRAPPER}} .team.element-four .team-item .holder .team-content .team-title,{{WRAPPER}} .team.element-one .team_box .team_box-info h4, {{WRAPPER}} .team.element-two .rt-team_box .rt-team_box-info h4,{{WRAPPER}} .team.element-three h6, {{WRAPPER}} .team.element-seven .rt-professionals .rt-professionals-info h6,{{WRAPPER}} .team.element-eight .team-hoverfx .team-data a h3',




			]
		);
		$this->add_control(
			'team_time_color',
			[
				'label'     => esc_html__( 'Title color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team.element-one .team_box .team_box-info h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-two .rt-team_box .rt-team_box-info h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-three h6' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-four .team-item .holder .team-content .team-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-five .rt-team_box .rt-team_box-info a h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-six .rt-team_box .team_share_icons .team-data-area .team-member a h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-seven .rt-professionals .rt-professionals-info h6' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-eight .team-hoverfx .team-data a h3' => 'color: {{VALUE}}',
				],

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_team_designation',
			[
				'label' => esc_html__( 'Designation', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Designation Typography', 'radiantthemes-addons' ),
				'name'     => 'designation_typography',
				'selector' =>
				    '{{WRAPPER}} .team.element-six .rt-team_box .team_share_icons .team-data-area .team-designation h6,{{WRAPPER}} .team.element-five .rt-team_box .rt-team_box-info h6,{{WRAPPER}} .team.element-four .team-item .holder .team-content .team-role, {{WRAPPER}} .team.element-one .team_box .title,{{WRAPPER}} .team.element-two .rt-team_box .rt-team_box-info p ,{{WRAPPER}} .team.element-three .rt-designation, {{WRAPPER}} .team.element-seven .rt-professionals .rt-professionals-info p,{{WRAPPER}} .team.element-eight .team-hoverfx .team-data p',

			]
		);
		$this->add_control(
			'team_designation_color',
			[
				'label'     => esc_html__( 'Designation color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team.element-six .rt-team_box .team_share_icons .team-data-area .team-designation h6' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-one .team_box .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-two .rt-team_box .rt-team_box-info p' => 'color: {{VALUE}}',
					'{{WRAPPER}}  .team.element-three .rt-designation' => 'color: {{VALUE}}',
                    '{{WRAPPER}}  .team.element-five .rt-team_box .rt-team_box-info h6' => 'color: {{VALUE}}',
					'{{WRAPPER}}  .team.element-four .team-item .holder .team-content .team-role' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-seven .rt-professionals .rt-professionals-info p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .team.element-eight .team-hoverfx .team-data p' => 'color: {{VALUE}}',

				],

			]
		);
		$this->add_control(
			'team_designation_colorbg',
			[
				'label'     => esc_html__( 'Background Color (Right Panel)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => [
					'style_variation' => array('eight'),
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-eight .team-hoverfx .team_detail_bx' => 'background: {{VALUE}}',

				],

			]
		);
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Designation Typography (Right Panel)', 'radiantthemes-addons' ),
				'name'     => 'designation_typography2',
				'condition'   => [
					'style_variation' => array('eight'),
				],
				'selector' =>
				    '{{WRAPPER}} .team.element-eight .team_detail_bx p',

			]
		);
		$this->add_control(
			'team_designation_color2',
			[
				'label'     => esc_html__( 'Designation color (Right Panel)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => [
					'style_variation' => array('eight'),
				],
				'selectors' => [
					'{{WRAPPER}} .team.element-eight .team_detail_bx p' => 'color: {{VALUE}}',
				],

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

		$output = "\r" . '<!-- team -->' . "\r";



$output .= '<div class="container-fluid">
        <div class="row">';
if ("four" == $settings['style_variation'] ) { $output = '<div class="row">';}

		if ( 'false' == $settings['team_allow_carousel'] && 'three' != $settings['style_variation']) {
				$output .= '<div class="team element-' . $settings['style_variation'] . ' ';				
				$output .= '"';				
				$output .= '>';
			} elseif ( 'true' == $settings['team_allow_carousel'] && 'three' == $settings['style_variation']) {
				//$output .= '<div class="team swiper-container element-' . $settings['style_variation'] . '  ';
				$output .= '<div class="team swiper-container" data-mobile-items="'.$settings['posts_in_mobile'] . '" data-tab-items="'.$settings['posts_in_tab'] . '" data-desktop-items="'.$settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
				$output .= ' <div class="swiper-wrapper">';

			} elseif ( 'true' == $settings['team_allow_carousel'] ) {
				//$output .= '<div class="team swiper-container element-' . $settings['style_variation'] . '  ';
				$output .= '<div class="team swiper-container element-' . $settings['style_variation'] . '" data-mobile-items="'.$settings['posts_in_mobile'] . '" data-tab-items="'.$settings['posts_in_tab'] . '" data-desktop-items="'.$settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
				$output .= ' <div class="swiper-wrapper">';
			} else {
				$output .= '';
			}
			$count=0;
            if($settings['team_category'] && 'all' != $settings['team_category']){
	    	$count=count($settings['team_category']);}
			for($i=0;$i<$count;$i++)
            {
                $c[] =  $settings['team_category'][$i] ;
            }

			if ( 'all' == $settings['team_category'] || '' == $settings['team_category'] ) {
			    $team_category = '';
			} else {
			    $team_category = array(
			        array(
			            'taxonomy' => 'profession',
			            'field'    => 'slug',
			            'terms'    => $c,
			        ),
			    );
			    $hidden_filter      = 'hidden';
			}
			$query = new \WP_Query(
				array(
					'post_type'      => 'team',
					'posts_per_page' => $settings['max_posts'],
					'order'          => $settings['order'],
					'orderby'        => $settings['order_by'],
					'tax_query'      => $team_category,
				)
			);




		if ( empty( $settings['max_posts'] ) ) {
			$settings['max_posts'] = -1;
		}

		$data  = 0;
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					require 'template/template-team-item-' . $settings['style_variation'] . '.php';
				}
				wp_reset_postdata();
			} else {
				$output .= wp_kses_post('<p>No items found</p>', 'radiantthemes-addons' );
			}
			if ( 'true' == $settings['team_allow_carousel'] ) {
        		$output .= '</div>';
			}
		if ( 'true' === $settings['allow_dots'] ) {
		$output .= '<div class="swiper-pagination"></div>';
        }
        if (  $settings['style_variation'] ) {
			$output .= '</div>';
            $output .= '</div>';
        }


			$output .= '<!-- team -->' . "\r";
			echo $output;
		?>
		<?php
	}

}