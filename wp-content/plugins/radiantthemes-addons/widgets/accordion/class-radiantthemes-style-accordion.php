<?php
/**
 * Accordion Style Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor accordion widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * accordion style, showing only one item at a time.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Accordion extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve accordion widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'radiant-accordion';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve accordion widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Accordion', 'radiantthemes-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve accordion widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-accordion';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return [
			'rt-accordion',
		];
	}



	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'accordion', 'tabs', 'toggle' ];
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
	 * Register accordion widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Accordion', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'radiant_accordion_style',
			[
				'label'       => esc_html__( 'Select Accordion Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => [
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),				
					'three'   => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'   => esc_html__( 'Style Four', 'radiantthemes-addons' ),	
				],
				'default'     => 'one',
			]
		);

		$repeater = new Repeater();
        $repeater->add_control(
			'add-img',
			[
				'label' => __( 'Add SVG Code', 'plugin-domain' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'your-plugin' ),
				'label_off' => __( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$repeater->add_control(
			'svg',
			[
				'label'     => __( 'Accordian Icon', 'radiantthemes-addons' ),
				'description'=> __( 'Put svg image code', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::TEXTAREA,
				
				'condition' => [
					'add-img' => 'yes',
				],				
            ]				
		);
		/*$repeater->add_control(
			'img1',
			[
				'label'     => __( 'Accordion Item Image', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,	
				'condition' => [
					'add-img!' => 'yes',
				],				
            ]				
		);*/
		$repeater->add_control(
			'tab_title',
			[
				'label'       => esc_html__( 'Title & Description', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Accordion Title', 'radiantthemes-addons' ),
				'dynamic'     => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label'      => esc_html__( 'Content', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::WYSIWYG,
				'default'    => esc_html__( 'Accordion Content', 'radiantthemes-addons' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label'       => esc_html__( 'Accordion Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'svg'   	 => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 20 20">
<path fill="" d="M18.763 1.075c-0.147-0.091-0.331-0.099-0.486-0.022l-5.776 2.888-5.776-2.888c-0.141-0.070-0.306-0.070-0.447 0l-6 3c-0.169 0.085-0.276 0.258-0.276 0.447v15c0 0.173 0.090 0.334 0.237 0.425 0.080 0.050 0.171 0.075 0.263 0.075 0.076 0 0.153-0.018 0.224-0.053l5.776-2.888 5.776 2.888c0.141 0.070 0.307 0.070 0.447 0l6-3c0.169-0.085 0.276-0.258 0.276-0.447v-15c-0-0.173-0.090-0.334-0.237-0.425zM6 16.191l-5 2.5v-13.882l5-2.5v13.882zM7 2.309l5 2.5v13.882l-5-2.5v-13.882zM18 16.191l-5 2.5v-13.882l5-2.5v13.882z"></path>
</svg>',
						'tab_title'   => esc_html__( 'Accordion #1', 'radiantthemes-addons' ),
						'tab_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'radiantthemes-addons' ),
					],
					[
						'tab_title'   => esc_html__( 'Accordion #2', 'radiantthemes-addons' ),
						'tab_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'radiantthemes-addons' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->add_control(
			'view',
			[
				'label'   => esc_html__( 'View', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->add_control(
			'title_html_tag',
			[
				'label'     => esc_html__( 'Title HTML Tag', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1'  => 'H1',
					'h2'  => 'H2',
					'h3'  => 'H3',
					'h4'  => 'H4',
					'h5'  => 'H5',
					'h6'  => 'H6',
					'p' => 'P',
					'span' => 'SPAN',
				],
				'default'   => 'span',
				'separator' => 'before',
			]
		);

		
		$this->end_controls_section();
		$this->start_controls_section(
			'section_bro',
			[
				'label' => esc_html__( 'Border', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'border',
				'label'    => esc_html__( 'Border', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .btn.btn-link[aria-expanded="false"], {{WRAPPER}} .radiantthemes-accordion.element-three button.btn.btn-link,{{WRAPPER}} .radiantthemes-accordion.element-one button.btn.btn-link, {{WRAPPER}} .radiantthemes-accordion.element-two button.btn.btn-link',
			)
		);
		$this->add_control(
			'radiant_a_border_radius',
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
					'{{WRAPPER}} .radiantthemes-accordion.element-two button.btn.btn-link, {{WRAPPER}} .radiantthemes-accordion.element-one button.btn.btn-link, {{WRAPPER}} .btn.btn-link[aria-expanded="false"],{{WRAPPER}} .radiantthemes-accordion.element-three button.btn.btn-link' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'section_toggle_style_icon',
			[
				'label' => esc_html__( 'Icon', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'tab_svg_iccolor',
			[
				'label'     => esc_html__( ' Svg Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion .card button.btn.btn-link[aria-expanded="false"] .img-upload' => 
					'fill: {{VALUE}};',
				],				
			]
		);
		$this->add_control(
			'tab_active_iccolor',
			[
				'label'     => esc_html__( 'Active Svg Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion .card button.btn.btn-link[aria-expanded="true"] .img-upload' => 
					'fill: {{VALUE}};',
				],				
			]
		);
		$this->add_control(
			'tab_svgp_iccolor',
			[
				'label'     => esc_html__( ' Toggle Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion button.btn.btn-link.collapsed .card-header:before' => 
					'color: {{VALUE}};',
				],				
			]
		);
		$this->add_control(
			'tab_active_piccolor',
			[
				'label'     => esc_html__( 'Active Toggle Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion button.btn.btn-link[aria-expanded="true"] .card-header:after' => 
					'color: {{VALUE}};',
				],				
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_toggle_style_title',
			[
				'label' => esc_html__( 'Title', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_background',
			[
				'label'     => esc_html__( 'Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
				'{{WRAPPER}} .collapsed' => 'background: {{VALUE}} !important;',
			  ],
			]
		);
		$this->add_control(
			'radiant_gradient_bg_add',
			array(
				'label'        => esc_html__( 'Add Gradient Background?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
				'label_off'    => esc_html__( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'Please Note: If selected, please do not use any background image or direct backgrund color.', 'radiantthemes-addons' ),
				/*'condition'    => array(
					//'radiant_accordion_style' =>  array('one','three'),
				),*/
			)
		);
		$this->add_control(
			'radiant_gradient_bg_type',
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
					'radiant_gradient_bg_add' => 'yes',
					//'radiant_accordion_style' => array('one','three'),
				),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'radiant_gradient_bg_color_one',
			array(
				'label'     => esc_html__( 'Background Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'radiant_gradient_bg_add' => 'yes',
					//'radiant_accordion_style'           => array('one','three'),
				),
			)
		);
		$this->add_control(
			'radiant_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Background Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .btn.btn-link' => 'background: linear-gradient({{radiant_gradient_bg_type.VALUE}}, {{radiant_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				),
				'condition' => array(
					'radiant_gradient_bg_add' => 'yes',
					//'radiant_accordion_style'           => array('one','three'),
				),
			)
		);
        $this->add_control(
			'tab_active_bcolor',
			[
				'label'     => esc_html__( 'Active Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => array(
					'radiant_gradient_bg_add!' => 'yes',					
				),
				'selectors' => [
					'{{WRAPPER}} .btn.btn-link' => 'background: {{VALUE}} ;',
				],
				'scheme'    => [
					'type'  => Color::get_type(),
					'value' => Color::COLOR_4,
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Font Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion .card button.btn.btn-link.collapsed[aria-expanded="false"] .mb-0' => 'color: {{VALUE}} !important;',
				],			
			]
		);

		$this->add_control(
			'tab_active_color',
			[  
				'label'     => esc_html__( 'Font Color When Clicked', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .radiantthemes-accordion .card button.btn.btn-link.collapsed[aria-expanded="true"] .mb-0,{{WRAPPER}} .radiantthemes-accordion .card button.btn.btn-link[aria-expanded="true"] .mb-0' => 'color: {{VALUE}};',
				],	
			]
		);
		
		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => 
				    '{{WRAPPER}} .btn.btn-link > .card-header , {{WRAPPER}} .btn.btn-link > .card-header .mb-0',
				    
				
				'scheme'   => Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__( 'Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .btn.btn-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .radiantthemes-accordion.element-four button.btn.btn-link,{{WRAPPER}}  .radiantthemes-accordion.element-two button.btn.btn-link',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_toggle_style_content',
			[
				'label' => esc_html__( 'Content', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_background_color',
			[
				'label'     => esc_html__( 'Background', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_color',
			[
				'label'     => esc_html__( 'Font Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .card-body' => 'color: {{VALUE}};',
					
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'selector' => 
				'{{WRAPPER}} .card-body',
				
				
				'scheme'   => Typography::TYPOGRAPHY_3,
			]
		);
		


		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => esc_html__( 'Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .card-body ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render accordion widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
        $rtrand="a".rand();
        $c=1;
		?>
		
      
		<div id="<?php echo $rtrand; ?>" class="radiantthemes-accordion element-<?php echo esc_attr( $settings['radiant_accordion_style'] ); ?>">
		    
		    
                      
			<?php
			foreach ( $settings['tabs'] as $index => $item ) :
				require 'template/template-accordion-element-' . $settings['radiant_accordion_style'] . '.php';
			endforeach;
			echo $output;
			?>
			
			
		</div>
		<?php
	}
}
