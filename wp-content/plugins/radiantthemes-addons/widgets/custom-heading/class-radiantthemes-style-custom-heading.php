<?php
namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Schemes\Typography;
use Elementor\Widget_Base;
//use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * @since 1.1.0
 */
class Radiantthemes_Style_Custom_Heading extends Widget_Base {

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
		return 'radiant-custom-heading';
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
		return esc_html__( 'Custom Heading', 'radiantthemes-addons' );
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
		return 'eicon-heading';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return [
			'rt-heading',
		];
	}
    
	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array(
			'radiantthemes-text-anim',
			'radiantthemes-text-animation2'
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
			'general_section',
			[
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'style_variation',
			[
				'label'       => esc_html__( 'Heading Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two ', 'radiantthemes-addons' ),
					'three'   => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'   => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'   => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'   => esc_html__( 'Style Six', 'radiantthemes-addons' ),
					'seven'   => esc_html__( 'Style Seven', 'radiantthemes-addons' ),
					//'eight'   => esc_html__( 'Style Eight', 'radiantthemes-addons' ),
					
				],
				'default'     => 'one',
			]
		);
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'radiantthemes-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'radiantthemes-addons' ),
				'default' => __( 'Add Your Heading Text Here', 'radiantthemes-addons' ),
			]
		);
         $this->add_control(
			'rt_gradient',
			array(
				'label'        => esc_html__( 'Animated Text Gradient color?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
				'label_off'    => esc_html__( 'No', 'your-plugin' ),
				'return_value' => 'rt_gradient',
				'default'      => '',
				
			)
		);
		$this->add_control(
			'Before-Text',
			[
				'label' => __( 'Animated Text', 'radiantthemes-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'condition'    => array(
					'style_variation' => array('one','two','eight'),
				),
				'default' => __( 'Engaging New', 'radiantthemes-addons' ),
			]
		);
		$this->add_control(
			'section_svg',
			[
				'label' => __( 'Add svg code', 'radiantthemes-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'condition'    => array(
					'style_variation' => array('one'),
				),
				//'default' => __( 'Engaging New', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'after-Text',
			[
				'label' => __( 'After Animated Text', 'radiantthemes-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'condition'    => array(
					'style_variation' => array('one','two'),
				),
				//'default' => __( ' qwerty', 'radiantthemes-addons' ),
			]
		);

		/*
		$repeater = new Repeater();

		$repeater->add_control(
			'tabs_title',
			array(
				'label'       => esc_html__( 'Enter your title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				
				'default'     => esc_html__( 'Technology', 'radiantthemes-addons' ),
				'dynamic'     => array(
					'active' => true,
				),
				'label_block' => true,
			)
		);
        
		$repeater->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}}'
				],
			]
		);
        $repeater->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				
				'label'    => esc_html__( 'Title Typography ', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
			)
		);
		

		$this->add_control(
			'rt-tabs',
			array(
				'label'       => esc_html__( 'Animation Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'condition'    => array(
					'style_variation' => array('one','two','eight'),
				),
				'default'     => array(
					array(
						'tabs_title'   => esc_html__( 'Technology', 'radiantthemes-addons' ),
						
					),
					array(
						'tabs_title'   => esc_html__( 'Software', 'radiantthemes-addons' ),
						
					),
				),
				'title_field' => '{{{ tabs_title }}}',
			)
		);
*/
		
		

		$this->add_control(
			'header_size',
			[
				'label' => __( 'HTML Tag', 'radiantthemes-addons' ),
				'type' => Controls_Manager::SELECT,
				'condition' => array(
					'style_variation!' => array('one','eight'),				
				),
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h1',
			]
		);
		$this->add_responsive_control(
			'align_nav',
			array(
				'label'     => esc_html__( 'Heading Alignment', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'condition' => array(
					'style_variation!' => array('eight'),				
				),
				'options'   => array(
					'left'    => array(
						'title' => esc_html__( 'Left', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center'  => array(
						'title' => esc_html__( 'Center', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'   => array(
						'title' => esc_html__( 'Right', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => esc_html__( 'Justified', 'radiantthemes-addons' ),
						'icon'  => 'eicon-text-align-justify',
					),
				),
				'selectors' => array(
			'{{WRAPPER}} .rt-text-appear' => 'text-align: {{VALUE}};',
			'{{WRAPPER}} .rt-heading-two' => 'text-align: {{VALUE}};',
			'{{WRAPPER}} .rt-hover-heading,{{WRAPPER}} .ml1' => 'text-align: {{VALUE}};',
			
				),
			)
		);

		

		
		
		$this->add_control(
			'item',
			array(
				'label'       => esc_html__( 'Order', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				//'description' => esc_html__( 'Number of posts to show', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 1,
			)
		);

		$this->end_controls_section();

		

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'radiantthemes-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .rt-heading-two' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-hover-heading' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rtheading,{{WRAPPER}} .rt-textappear-line' => 'color: {{VALUE}};',

					
					
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography1',
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .rt-textappear-line, {{WRAPPER}} .rt-heading-two,{{WRAPPER}} .rt-hover-heading, {{WRAPPER}} .rtheading ',
				
			]
		);
		
		$this->end_controls_section();

		

		$this->start_controls_section(
			'section_title_style2',
			[
				'label' => __( 'Animated Text', 'radiantthemes-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'style_variation' => array('one','two'),				
				),
			]
		);
		/* $this->add_control(
			'radiant_text_gradient_bg_add',
			array(
				'label'        => esc_html__( 'Add Text Gradient ?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
				'label_off'    => esc_html__( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'Please Note: If selected, please do not use any background image or direct backgrund color.', 'radiantthemes-addons' ),
				
			)
		);*/
        $this->add_control(
			'radiant_gradient_bg_type',
			array(
				'label'       => esc_html__( 'Text Gradient Type', 'radiantthemes-addons' ),
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
					'rt_gradient' => 'rt_gradient',
				),
				
			)
		);

		$this->add_control(
			'radiant_gradient_bg_color_one',
			array(
				'label'     => esc_html__( 'Text Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition'   => array(
					'rt_gradient' => 'rt_gradient',
				),
			)
		);

		$this->add_control(
			'radiant_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Text Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt_gradient .letters,{{WRAPPER}} .rt-highlight-txt,{{WRAPPER}} .rt-magic-underline,{{WRAPPER}} .rt-heading-div ' => 'background: linear-gradient({{radiant_gradient_bg_type.VALUE}}, {{radiant_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
					
				),
				'condition'   => array(
					'rt_gradient' => 'rt_gradient',
				),
			)
		);

		$this->add_control(
			'title_color2',
			[
				'label' => __( 'Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => array(
					'style_variation' => array('one','two'),				
				),
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'condition'   => array(
					'rt_gradient!' => 'rt_gradient',
				),
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .rt-highlight-txt' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-magic-underline,{{WRAPPER}} .rt-heading-div' => 'color: {{VALUE}};',
					
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography12',
				'condition' => array(
					'style_variation' => array('one','two'),				
				),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .letters, {{WRAPPER}} .rt-magic-underline, {{WRAPPER}} .rt-highlight-txt,{{WRAPPER}} .highlight-after-text, {{WRAPPER}} .rt-heading-div, {{WRAPPER}} .after-text',
				
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'section_svg1',
			[
				'label' => __( 'Underline Text color', 'radiantthemes-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'style_variation' => array('one','two'),				
				),
			]
		);

		$this->add_control(
			'svg_color',
			[
				'label' => __( 'Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => array(
					'style_variation' => 'one',					
				),
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					
					'{{WRAPPER}} .rt-subheading svg' => 'fill: {{VALUE}};',
					
					
				],
			]
		);
		$this->add_control(
			'radiant_portfolio_gradient_bg_add',
			array(
				'label'        => esc_html__( 'Add Underline Gradient Background?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
				'label_off'    => esc_html__( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'Please Note: If selected, please do not use any background image or direct backgrund color.', 'radiantthemes-addons' ),
				'condition'    => array(
					'style_variation' => 'two',
				),
			)
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
					'radiant_portfolio_gradient_bg_add' => 'yes',
					'style_variation' => 'two',
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
					'radiant_portfolio_gradient_bg_add' => 'yes',
					'style_variation' => 'two',
				),
			)
		);

		$this->add_control(
			'radiant_portfolio_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Background Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ml1 .line' => 'background-image: linear-gradient({{radiant_portfolio_gradient_bg_type.VALUE}}, {{radiant_portfolio_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				),
				'condition' => array(
					'radiant_portfolio_gradient_bg_add' => 'yes',
					'style_variation' => 'two',
				),
			)
		);

	
		
		$this->end_controls_section();

		$this->start_controls_section(
			'after_style2',
			[
				'label' => __( 'After Animated Text', 'radiantthemes-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'style_variation' => array('one','two'),				
				),
			]
		);
		

		$this->add_control(
			'after_color2',
			[
				'label' => __( 'Color', 'radiantthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'condition' => array(
					'style_variation' => array('one','two'),				
				),
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .highlight-after-text, {{WRAPPER}} .after-text' => 'color: {{VALUE}};',
					
					
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography133',
				'condition' => array(
					'style_variation' => array('one','two'),				
				),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .highlight-after-text, {{WRAPPER}} .after-text',
				
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

		$settings         = $this->get_settings_for_display();

	//	$id = $settings['extra_id'] ? 'id="' . esc_attr( $settings['extra_id'] ) . '"' : '';
		$header_tag_size = $settings['header_size'];
	//	$link = $settings['link'];
		
		$output ="";
		
		if('one' === $settings['style_variation'])
		{
			/*$output .='<div class="rt-text-animation-style-one">';
			$output .='<'.$header_tag_size.' class="rt-text-1">'.$settings['title'].'</'.$header_tag_size.'>';
		   $output .='</div>';*/

		   $output .='<div class="rt-hover-heading '.$settings['rt_gradient'].'">'.$settings['title'].'
                <div class="rt-subheading">
                    <div class="heading-highlights">
                        <span class="rt-highlight-txt">'.$settings['Before-Text'].'</span>
                        <span  class="rt-underline-txt underlinetxtone">'.$settings['section_svg'].'</span>
                    </div>
                </div>
               '.$settings['after-Text'].'
                </div>';
			
			
		}
		elseif ('two' === $settings['style_variation'])
		{
			$r=rand(0,100);
			
		$output .='<'.$header_tag_size.' class="rt-textappear-line'.$r.' rt-textappear-line ml1 '.$settings['rt_gradient'].'">
		'.$settings['title'].'
        <div class="rt-heading-div">
            <div class="text-wrapper">
                <span class="letters">'.$settings['Before-Text'].'</span>
                <span class="line line2"></span>
            </div>
        </div>
        <div class="after-text">'.$settings['after-Text'].'</div>
    
    </'.$header_tag_size.'>';
			
		} elseif ('three'==$settings['style_variation']) {
			//<!--TEXT APPEAR STYLE 1-->
			$r=rand(0,100);
    $output .='<div class="rt-text-appear '.$settings['rt_gradient'].'">
        <'.$header_tag_size.' class="rt-textappear-one'.$r.' rt-textappear-one rtheading">
            <span class="text-wrapper">
                <span class="letters">'.$settings['title'].'</span>
            </span>
        </'.$header_tag_size.'>
    </div>';
    } elseif ('four'==$settings['style_variation']) {
    //<!--TEXT APPEAR STYLE 2-->
    	$r=rand(0,100);
    	$r=$settings['item'];

    $output .='<div class="rt-text-appear '.$settings['rt_gradient'].'">
        <'.$header_tag_size.' class="rt-textappear-two'.$r.' rt-textappear-two rtheading">
            <span class="text-wrapper">
                <span class="letters">'.$settings['title'].'</span>
            </span>
        </'.$header_tag_size.'>
    </div>';
    
    } elseif ('five'==$settings['style_variation']) {
    //<!--TEXT APPEAR STYLE 3-->
    		$r=rand(0,100);
    $output .='<div class="rt-text-appear '.$settings['rt_gradient'].'">
        <'.$header_tag_size.' class="rt-textappear-three'.$r.' rt-textappear-three rtheading">'.$settings['title'].'</'.$header_tag_size.'>
    </div>';
      } elseif ('six'==$settings['style_variation']) {
    //<!--TEXT APPEAR STYLE 4-->
      	$r=rand(0,100);
    $output .='<div class="rt-text-appear '.$settings['rt_gradient'].'">
        <'.$header_tag_size.' class="rt-textappear-four'.$r.' rt-textappear-four rtheading">'.$settings['title'].'</'.$header_tag_size.'>
    </div>';
    /*$output .='<div class="rt-text-appear">
        <'.$header_tag_size.' class="rt-textappear-four1 rt-textappear-four rtheading">'.$settings['title'].'</'.$header_tag_size.'>
    </div>';*/
    } elseif ('seven'==$settings['style_variation']) {
    //<!--TEXT APPEAR STYLE 5-->
    	$r=rand(0,100);
    	$r=$settings['item'];
    $output .='<div class="rt-text-appear '.$settings['rt_gradient'].'">
        <'.$header_tag_size.' class="rt-textappear-five'.$r.' rt-textappear-five rtheading">
            <span class="text-wrapper">
                <span class="letters">'.$settings['title'].'</span>
                <span class="line"></span>
            </span>
        </'.$header_tag_size.'>
    </div>';

	} 
	
		
		echo $output;

		

		

	}	
}
