<?php
namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Pricing Table widget.
 *
 * Elementor widget that displays Pricing Tables in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Pricing_Table extends Widget_Base {

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
		return 'radiant-pricing-table';
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
		return esc_html__( 'Pricing Table', 'radiantthemes-addons' );
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
		return 'eicon-price-table';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return array(
			'rt-price',
		);
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array(
			'radiantthemes-testimonial',
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
			array(
				'label' => __( 'General', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'pricing_table_style_variation',
			array(
				'label'   => __( 'Pricing Table Style', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
				    
					'one'   => __( 'Style One', 'radiantthemes-addons' ),
					'five'  => __( 'Style Two', 'radiantthemes-addons' ),
					'three' => __( 'Style Three', 'radiantthemes-addons' ),
					
				),
			)
		);
       $this->add_responsive_control(
			'align_nav',
			array(
				'label'     => esc_html__( 'Alignment', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				
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
			'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .pricing,{{WRAPPER}} .rt-pricing-table.element-five > .holder > .plan-name,{{WRAPPER}} .rt-pricing-table.element-five > .holder > .pricing .price, {{WRAPPER}} .rt-pricing-table.element-five > .holder > .list' => 'text-align: {{VALUE}};',
			'{{WRAPPER}} .rt-pricing-table.element-one .holder,{{WRAPPER}} .rt-pricing-table.element-one .holder .butn_area' => 'text-align: {{VALUE}};',
			'{{WRAPPER}} .rt-pricing-table.element-three > .holder,{{WRAPPER}} .rt-pricing-table > .holder > .plan-name,{{WRAPPER}} .rt-pricing-table > .holder > .pricing .price, {{WRAPPER}} .rt-pricing-table > .holder > .list,{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more ' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'info_section',
			array(
				'label' => __( 'Price Table Info', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'pricing_table_image',
			array(
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => array(
					'pricing_table_style_variation' => 'three',
				),

			)
		);
		$this->add_control(
			'pricing_table_image_five',
			array(
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' =>
				array(
					'pricing_table_style_variation' => 'five',
				),
			)
		);
		$this->add_control(
			'pricing_table_image_six',
			array(
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,

				'condition' =>
				array(
					'pricing_table_style_variation' => 'six',
				),
			)
		);
		$this->add_control(
			'pricing_table_image_seven',
			array(
				'label'     => __( 'Add Image (Eg. 80x80)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,

				'condition' =>
				array(
					'pricing_table_style_variation' => 'seven',
				),
			)
		);
		$this->add_control(
			'pricing_table_spotlight_text',
			array(
				'label'   => __( 'Spotlight Text', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Popular Choice', 'radiantthemes-addons' ),
				'condition' => array(
					'pricing_table_style_variation!' => 'one',
				),

			)
		);
		$this->add_responsive_control(
			'Spotlightalign_nav',
			array(
				'label'     => esc_html__( 'Spotlight Alignment', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'condition' => array(
					'pricing_table_style_variation!' => 'one',
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
			'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .spotlight-tag' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'pricing_table_title',
			array(
				'label'       => __( 'Price Box Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Basic Pack', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'pricing_table_subtitle',
			array(
				'label'       => __( 'Price Subtitle', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			)
		);

		$this->add_control(
			'pricing_table_currency_symbol',
			array(
				'label'       => __( 'Currency Symbol', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '$', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'pricing_table_price',
			array(
				'label'       => __( 'Price (Without Currency Symbol)', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '199', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);
			$this->add_control(
			'pricing_table_period1',
			[
				'label'       => __( 'Per User', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Per User', 'radiantthemes-addons' ),
				'label_block' => true,
				'condition' =>
				array(
					'pricing_table_style_variation' => 'nine',
				),
			]
		);

		$this->add_control(
			'pricing_table_period',
			array(
				'label'       => __( 'Period', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Per Month', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);

		$this->add_control(
			'pricing_table_tagline',
			array(
				'label'       => __( 'Tagline', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			)
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
				'label'     => __( 'Item Icon', 'radiantthemes-addons' ),
				'description'=> __( 'Put svg image code', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::TEXTAREA,
				
				'condition' => [
					'add-img' => 'yes',
				],				

            ]				
		);
		$repeater->add_control(
			'img1',
			[
				'label'     => __( 'Item Image', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::MEDIA,	
				'condition' => [
					'add-img!' => 'yes',
				],				

            ]				
		);

		$repeater->add_control(

			'tab_title',

			[

				'label'       => esc_html__( 'Pricing Table Description', 'radiantthemes-addons' ),

				'type'        => Controls_Manager::TEXT,

				'default'     => esc_html__( 'Unlimited Websites', 'radiantthemes-addons' ),

				'dynamic'     => [

					'active' => true,

				],

				'label_block' => true,

			]

		);



		$this->add_control(

			'tabs',

			[

				'label'       => esc_html__( 'Pricing Table Description', 'radiantthemes-addons' ),

				'type'        => Controls_Manager::REPEATER,

				'fields'      => $repeater->get_controls(),

				'default'     => [

					[
						'svg'   	 => '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16" height="16" viewBox="0 0 20 20">
<path fill="" d="M18.763 1.075c-0.147-0.091-0.331-0.099-0.486-0.022l-5.776 2.888-5.776-2.888c-0.141-0.070-0.306-0.070-0.447 0l-6 3c-0.169 0.085-0.276 0.258-0.276 0.447v15c0 0.173 0.090 0.334 0.237 0.425 0.080 0.050 0.171 0.075 0.263 0.075 0.076 0 0.153-0.018 0.224-0.053l5.776-2.888 5.776 2.888c0.141 0.070 0.307 0.070 0.447 0l6-3c0.169-0.085 0.276-0.258 0.276-0.447v-15c-0-0.173-0.090-0.334-0.237-0.425zM6 16.191l-5 2.5v-13.882l5-2.5v13.882zM7 2.309l5 2.5v13.882l-5-2.5v-13.882zM18 16.191l-5 2.5v-13.882l5-2.5v13.882z"></path>
</svg>',
						'tab_title'   => esc_html__( 'Unlimited Websites', 'radiantthemes-addons' ),

					
					],

					[

						'tab_title'   => esc_html__( '24/7 Support', 'radiantthemes-addons' ),

						
					],

				],

				'title_field' => '{{{ tab_title }}}',

			]

		);

		$this->add_control(
			'pricing_table_button',
			array(
				'label'       => __( 'Button | Title', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Sign Up Now!', 'radiantthemes-addons' ),
				'label_block' => true,
			)
		);
		$this->add_control(
			'pricing_table_button_link',
			array(
				'label'       => __( 'Button | Link', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'input_type'  => 'url',
				'placeholder' => __( 'https://your-link.com', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'pricing_table_highlight',
			array(
				'label'        => __( 'Highlight ( Item will be highlight)', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'radiantthemes-addons' ),
				'label_off'    => __( 'Hide', 'radiantthemes-addons' ),
				'return_value' => 'spotlight',
				'default'      => 'spotlight',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			array(
				'label'     => __( 'Style', 'radiantthemes-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' =>
				array(
					'pricing_table_style_variation!' => 'eight',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'radiantthemes-addons' ),
				'selector' =>
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .plan-name h5,{{WRAPPER}} .rt-pricing-table.element-one .holder .pricing h4 , {{WRAPPER}} .rt-pricing-table.element-three .holder .icon-box .pricing .title',

			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
				    	'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .plan-name h5,
						{{WRAPPER}} .rt-pricing-table.element-one .holder h4' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .heading .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-three .holder .icon-box .pricing .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-nine .rt-pricing-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight > .holder > .heading .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .heading .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-ten .rt-pricing-title' => 'color: {{VALUE}}',
					
					' {{WRAPPER}} .rt-pricing-table.element-one .holder .pricing h4,
					,
					
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .pricing .price,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .pricing .price sub,

					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .pricing .price,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .pricing .price sup,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .pricing .price sub,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .more .btn' => 'color: {{VALUE}}',

					'{{WRAPPER}} .rt-pricing-table.element-one.spotlight > .holder > .pricing .pricing-tag,
					{{WRAPPER}} .rt-pricing-table.element-one > .holder > .more .btn:hover,
					{{WRAPPER}} .rt-pricing-table.element-one.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-two.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .hightlight-tag,
					{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .spotlight-tag > .spotlight-tag-text,
					{{WRAPPER}} .rt-pricing-table.element-four.spotlight > .holder > .more .btn',

					'{{WRAPPER}} .rt-pricing-table.element-one > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-two > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more .btn,
					{{WRAPPER}} .rt-pricing-table.element-four > .holder > .more .btn' => 'border-color: {{VALUE}}',

					'{{WRAPPER}} .rt-pricing-table.element-two.spotlight > .holder' => 'border-top-color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-six.spotlight> .holder::before ' => 'background-color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'tb_color',
			array(
				'label'     => esc_html__( 'Title Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
				'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .plan-name h5,{{WRAPPER}} .rt-pricing-table.element-one .holder h4' => 'background: {{VALUE}};',
					
				),
				
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'radiantthemes-addons' ),
				'selector' =>
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .list,{{WRAPPER}} .rt-pricing-table.element-one .holder ul li, {{WRAPPER}} .subtitle, .rt-pricing-table.element-ten .rt-pricing-title,{{WRAPPER}} .rt-pricing-table.element-three > .holder > .list',

			)
		);
		$this->add_control(
			'c_color',
			array(
				'label'     => esc_html__( 'Content Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
				'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .list, {{WRAPPER}} .rt-pricing-table.element-five > .holder > .list, {{WRAPPER}} .rt-pricing-table.element-one .holder ul li' => 'color: {{VALUE}};',
					
				),
				
			)
		);
		/*$this->add_control(
			'spotlight_holder_back_color',
			array(
				'label'     => esc_html__( 'Spotlight Holder Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .spotlight-tag > .spotlight-tag-text' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-nine.spotlight' => 'background: {{VALUE}};',
					
				),
				
			)
		);*/

		
		$this->add_control(
			'pricing_color',
			array(
				'label'     => esc_html__( 'Pricing Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-one .holder h5 sup,{{WRAPPER}} .rt-pricing-table.element-one .holder h5' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight > .holder > .pricing > .price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .pricing > .price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three .holder .icon-box .pricing .price' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .pricing .price' => 'color: {{VALUE}};',
					

				),
			)
		);
		/*	$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'    => esc_html__( 'Period Typography', 'radiantthemes-addons' ),
					'name'     => 'pricing_typography',
					'selector' => '{{WRAPPER}} .rt-pricing-table.element-nine .rt-price , .rt-pricing-table.element-three > .holder > .pricing .price ,  .rt-pricing-table.element-seven > .holder > .pricing > .price , .rt-pricing-table.element-seven.spotlight > .holder > .pricing > .price , .rt-pricing-table.element-ten .rt-price',
				)
			);*/
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'    => esc_html__( 'Period Typography', 'radiantthemes-addons' ),
					'name'     => 'pr_typography',
					'selector' => '{{WRAPPER}} .rt-pricing-table.element-five > .holder > .pricing .price sub, 
					{{WRAPPER}} .rt-pricing-table.element-one .holder h5 sub',
				)
			);
			$this->add_control(
			'pe_color',
			array(
				'label'     => esc_html__( 'Period Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .pricing .price sub,{{WRAPPER}} .rt-pricing-table.element-one .holder h5 sub' => 'color: {{VALUE}};',
					

				),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subtitle_typography',
				'label'    => __( 'Sub Title Typography', 'radiantthemes-addons' ),
				'selector' =>
					'{{WRAPPER}} .rt-pricing-table.element-one .holder .rt-package , .rt-pricing-table.element-three .holder .heading .subtitle',

			)
		);
		$this->add_control(
			'subtitle_color',
			array(
				'label'     => __( 'Sub Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
				    	
					'{{WRAPPER}} .rt-pricing-table.element-one .holder .rt-package' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-pricing-table.element-three .holder .heading .subtitle' => 'color: {{VALUE}}',
					
				),
			)
		);
		$this->add_control(
			'stb_color',
			array(
				'label'     => esc_html__( 'Sub Title Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
				'{{WRAPPER}} .rt-pricing-table.element-one .holder .rt-package' => 'background-color: {{VALUE}};',
					
				),
				
			)
		);
		$this->add_control(
			'subtitle_color2',
			array(
				'label'     => __( 'Sub Title Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'pricing_table_style_variation' => 'one',
				),
				'selectors' => array(
			  		'{{WRAPPER}} .rt-pricing-table.element-one .holder:hover .rt-package' => 'color: {{VALUE}}',
				),
			)
		);
		$this->add_control(
			'stb_color2',
			array(
				'label'     => esc_html__( 'Sub Title Hover Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => array(
					'pricing_table_style_variation' => 'one',
				),
				'selectors' => array(
				'{{WRAPPER}} .rt-pricing-table.element-one .holder:hover .rt-package' => 'background-color: {{VALUE}};',
					
				),
				
			)
		);	
		
		
		
		/****************/
		$this->add_control(
			'sp_gradient_bg_type',
			array(
				'label'       => esc_html__( 'Spotlight Holder Gradient Background Type', 'radiantthemes-addons' ),
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
				'condition' =>
				array(
					'pricing_table_highlight' => 'spotlight',
					
				),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'sp_gradient_color_1',
			array(
				'label'     => esc_html__( 'Spotlight Holder Gradient Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' =>
				array(
					'pricing_table_highlight' => 'spotlight',
					
				),
			)
		);

		$this->add_control(
			'sp_gradient_color_2',
			array(
				'label'     => esc_html__( 'Spotlight Holder Gradient Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-five.spotlight > .holder' => 'background: linear-gradient({{sp_gradient_bg_type.VALUE}}, {{sp_gradient_color_1.VALUE}} 0%, {{VALUE}} 100%)',
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder' => 'background: linear-gradient({{sp_gradient_bg_type.VALUE}}, {{sp_gradient_color_1.VALUE}} 0%, {{VALUE}} 100%)',
					
				
			
				),
				'condition' =>
				array(
					'pricing_table_highlight' => 'spotlight',
					
				),
			)
		);
				
$this->end_controls_section();

$this->start_controls_section(
			'section_sp',
			[
				'label' => esc_html__( 'Spotlight  Text', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Spotlight Typography', 'radiantthemes-addons' ),
				'name'     => 'spotlight_typography',
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-five > .holder > .spotlight-tag > .spotlight-tag-text ',
			)
		);
		$this->add_control(
			'spotlight_back_color',
			array(
				'label'     => esc_html__( 'Spotlight Text Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .spotlight-tag' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .spotlight-tag > .spotlight-tag-text' => 'background-color: {{VALUE}};',

					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text::after' => 'border-color: {{VALUE}} transparent;',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text' => 'background: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven.spotlight .holder > .spotlight-tag > .spotlight-tag-text::after' => 'border-color: {{VALUE}} transparent;',

				),
			)
		);
		$this->add_control(
			'spotlight_text_color',
			array(
				'label'     => esc_html__( 'Spotlight Text Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .spotlight-tag > .spotlight-tag-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three.spotlight > .holder > .spotlight-tag > .spotlight-tag-text' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .pricing .price' => 'color: {{VALUE}};',

				),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'spborder',
				'label'    => esc_html__( 'Border', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-five > .holder > .spotlight-tag > .spotlight-tag-text',
			)
		);

		$this->add_control(
			'radiant_spborder_radius',
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
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .spotlight-tag > .spotlight-tag-text' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_sp',
				'label' => __( 'Shadow', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-five > .holder > .spotlight-tag > .spotlight-tag-text',
			]
		);
$this->end_controls_section();

$this->start_controls_section(
			'section_bro1',
			[
				'label' => esc_html__( 'Price Box Button', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Button Typography', 'radiantthemes-addons' ),
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-one .holder .gen_btn, {{WRAPPER}} .rt-pricing-table.element-five > .holder > .select-btn .btn,{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more .btn',

			)
		);
		$this->add_control(
			'button_color',
			array(
				'label'     => esc_html__( 'Button Text Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-one .holder .gen_btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more .btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn' => 'color: {{VALUE}};',
					'{{WRAPPER}} .rt-pricing-table.element-ten .rt-table-buy .rt-pricing-action:hover' => 'background: {{VALUE}}; color:#fff;',
					'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .select-btn .btn' => 'color: {{VALUE}};border: 1px solid {{VALUE}};',

				),
			)
		);
		$this->add_control(
			'button_back_color',
			array(
				'label'     => esc_html__( 'Button Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(

					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn' => 'background: {{VALUE}};',

				),
				'condition' => array(
					'pricing_table_style_variation' => 'seven',
				),
			)
		);
		$this->add_control(
			'button_back_hover_color',
			array(
				'label'     => esc_html__( 'Button Background Hover Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(

					'{{WRAPPER}} .rt-pricing-table.element-seven > .holder > .started .btn:hover' => 'background: {{VALUE}};',

				),
				'condition' => array(
					'pricing_table_style_variation' => 'seven',
				),
			)
		);
		$this->add_control(
			'radiant_custom_btn_gradient_bg_type',
			array(
				'label'       => esc_html__( 'Button Gradient Background Type', 'radiantthemes-addons' ),
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
				//'condition'   => array(
				//	'pricing_table_style_variation' => 'nine',
					
				//),
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_one',
			array(
				'label'     => esc_html__( 'Button Background Gradient Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				//'condition' => array(
				//	'pricing_table_style_variation' => array( 'five','nine' ),
				

				//),
			)
		);

		$this->add_control(
			'radiant_custom_btn_gradient_bg_color_two',
			array(
				'label'     => esc_html__( 'Button Background Gradient Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .rt-pricing-table.element-three > .holder > .more .btn' => 'background: linear-gradient({{radiant_custom_btn_gradient_bg_type.VALUE}}, {{radiant_custom_btn_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				'{{WRAPPER}} .rt-pricing-table.element-five > .holder > .select-btn .btn' => 'background: linear-gradient({{radiant_custom_btn_gradient_bg_type.VALUE}}, {{radiant_custom_btn_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
			     '{{WRAPPER}} .rt-pricing-table.element-one .holder .gen_btn' => 'background: linear-gradient({{radiant_custom_btn_gradient_bg_type.VALUE}}, {{radiant_custom_btn_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				),
				//'condition' => array(
				//	'pricing_table_style_variation' => array( 'five','nine' ),
					
				//),
			)
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'border',
				'label'    => esc_html__( 'Border', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-one .holder .gen_btn',
			)
		);

		$this->add_control(
			'radiant_bborder_radius',
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
					'{{WRAPPER}} .rt-pricing-table.element-one .holder .gen_btn,{{WRAPPER}} .rt-pricing-table.element-five > .holder > .select-btn .btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_button',
				'label' => __( 'Button Shadow', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-one .holder .gen_btn, {{WRAPPER}} .rt-pricing-table.element-five > .holder > .select-btn .btn',
			]
		);
		
		$this->end_controls_section();

		$this->end_controls_section();
$this->start_controls_section(
			'section_bro',
			[
				'label' => esc_html__( 'Price Box Border', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'     => 'border2',
				'label'    => esc_html__( 'Border', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-one .holder,{{WRAPPER}} .rt-pricing-table.element-five > .holder,{{WRAPPER}} .rt-pricing-table.element-three > .holder',
			)
		);

		$this->add_control(
			'radiant_item_border_radius',
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
					'{{WRAPPER}} .rt-pricing-table.element-one .holder, {{WRAPPER}} .rt-pricing-table.element-five > .holder, {{WRAPPER}} .rt-pricing-table.element-three > .holder' => 'border-radius: {{SIZE}}{{UNIT}};',
				),
			)
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'radiantthemes-addons' ),
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-one .holder,{{WRAPPER}} .rt-pricing-table.element-five > .holder, {{WRAPPER}} .rt-pricing-table.element-three > .holder',
			]
		);
		$this->end_controls_section();
        $this->start_controls_section(
			'section_bg',
			[
				'label' => esc_html__( 'Price Box Background', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'radiantthemes-addons' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .rt-pricing-table.element-one .holder, {{WRAPPER}} .rt-pricing-table.element-five > .holder, {{WRAPPER}} .rt-pricing-table.element-three > .holder',
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
		$target   = $settings['pricing_table_button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['pricing_table_button_link']['nofollow'] ? ' rel="nofollow"' : '';

		echo '<div class="rt-pricing-table element-' . esc_html( $settings['pricing_table_style_variation'] ) . ' ' . $settings['pricing_table_highlight'] . '">';

		require __DIR__ . '/template/template-pricing-item-' . $settings['pricing_table_style_variation'] . '.php';

		echo '</div>';

		

	}

	
}
