<?php
/**
 * Product Box Addon
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
 * Elementor Blog widget.
 *
 * Elementor widget that displays posts in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_style_Product extends Widget_Base {

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
		return 'radiant-product';
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
		return esc_html__( 'Product Box', 'radiantthemes-addons' );
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
		return 'eicon-products';
	}

	/**
	 * Requires css files.
	 *
	 * @return array
	 */
	public function get_style_depends() {
		return array(
			'radiantthemes-addons-custom',
		);
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array(
			'radiantthemes-product',
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

	public function get_product_categories() {
		$product_terms = get_terms(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => false,
			)
		);

		$product_category_array = array();
		$product_category_array = array( 'all' => 'Show all categories' );
		if ( ! empty( $product_terms ) ) {
			foreach ( $product_terms as $product_term ) {
				$product_category_array[ $product_term->slug ] = $product_term->name;
			}
		}

		return $product_category_array;
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
			array(
				'label' => esc_html__( 'Product Box', 'radiantthemes-addons' ),
			)
		);
		$this->add_control(
			'product_style',
			array(
				'label'       => esc_html__( 'Select  Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three' => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'  => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'  => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'   => esc_html__( 'Style Six', 'radiantthemes-addons' ),
					'seven' => esc_html__( 'Style Seven', 'radiantthemes-addons' ),
					'eight' => esc_html__( 'Style Eight', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);
		$this->add_control(
			'product_category',
			array(
				'label'       => esc_html__( 'Select Product Category', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_product_categories(),
				'default'     => 'all',
			)
		);

		$this->add_control(
			'product_allow_carousel',
			array(
				'label'   => esc_html__( 'Carousel', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default' => 'true',

			)
		);

		$this->add_control(
			'order',
			array(
				'label'       => esc_html__( 'Order', 'radiantthemes-addons' ),
				'label_block' => false,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				),
				'default'     => 'DESC',
			)
		);

		$this->add_control(
			'order_by',
			array(
				'label'       => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array(
					'date'     => esc_html__( 'Date', 'radiantthemes-addons' ),
					'title'    => esc_html__( 'Title', 'radiantthemes-addons' ),
					'ID'       => esc_html__( 'ID', 'radiantthemes-addons' ),
					'rand'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'modified' => esc_html__( 'Last Modified', 'radiantthemes-addons' ),
				),
				'default'     => 'date',
			)
		);

		$this->add_control(
			'max_posts',
			array(
				'label'       => esc_html__( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => -1,
				'description' => esc_html__( 'Number of Product to show ( -1 for all Product )', 'radiantthemes-addons' ),
				'default'     => 4,
			)
		);
		$this->add_control(
			'product_no_row_items',
			array(
				'label'       => esc_html__( 'Number of Product Show in a Row', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
				'max'         => 5,
				'min'         => 1,
				'condition'   => array(
					'product_allow_carousel' => 'false',

				),
				'default'     => 2,
			)
		);

		$this->add_control(
			'posts_in_desktop',
			array(
				'label'       => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Desktop (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 3,
				'condition'   => array(
					'product_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'posts_in_tab',
			array(
				'label'       => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Tab (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 2,
				'condition'   => array(
					'product_allow_carousel' => 'true',
				),
			)
		);

		$this->add_control(
			'posts_in_mobile',
			array(
				'label'       => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Mobile (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 1,
				'condition'   => array(
					'product_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'space_between_posts',
			array(
				'label'       => esc_html__( 'Space beteen posts', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Space between Two Posts', 'radiantthemes-addons' ),
				'condition'   => array(
					'product_allow_carousel' => 'true',
				),
				'default'     => 30,
			)
		);
		$this->add_control(
			'product_allow_navigation',
			array(
				'label'     => esc_html__( 'Navigation', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default'   => 'true',
				'condition' => array(
					'product_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'product_allow_dot_navigation',
			array(
				'label'     => esc_html__( 'Allow dot for Navigation', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				),
				'default'   => 'true',
				'condition' => array(
					'product_allow_carousel' => 'true',
				),
			)
		);
		$this->add_control(
			'nav_style',
			array(
				'label'       => esc_html__( 'Select Nav Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one' => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two' => esc_html__( 'Style Two', 'radiantthemes-addons' ),

				),
				'condition'   => array(
					'product_allow_navigation' => 'true',
					'product_allow_carousel'   => 'true',
				),
				'default'     => 'one',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_product_box',
			array(
				'label' => __( 'Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Title Typography', 'radiantthemes-addons' ),
				'name'     => 'title_typography',
				'scheme'   => Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .product-title , .product-box.element-two .product-item .holder .product-description .product-title , .product-box.element-three .product-item .holder .product-description .product-title  , .product-box.element-four .product-item .holder .product-description .product-title  , .product-box.element-five .product-item .holder .product-description .product-title ,.product-box.element-six .product-item .holder .product-description .product-title a , .product-box.element-eight .product-item .holder .product-description .product-title a',
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => esc_html__( 'Title color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .product-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-two .product-item .holder .product-description .product-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-three .product-item .holder .product-description .product-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-four .product-item .holder .product-description .product-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}}  .product-box.element-five .product-item .holder .product-description .product-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}}  .product-box.element-six .product-item .holder .product-description .product-title a' => 'color: {{VALUE}}',
					'{{WRAPPER}}  .product-box.element-eight .product-item .holder .product-description .product-title a' => 'color: {{VALUE}}',
					

				),

			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Brand Typography', 'radiantthemes-addons' ),
				'name'     => 'brand_typography',
				'scheme'   => Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .product-brand , .product-box.element-three .product-item .holder .product-description .product-brand',
			)
		);
		$this->add_control(
			'brand_color',
			array(
				'label'     => esc_html__( 'Brand color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .product-brand' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-three .product-item .holder .product-description .product-brand' => 'color: {{VALUE}}',

				),

			)
		);
		$this->add_control(
			'rating_color',
			array(
				'label'     => esc_html__( 'Rating color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .star-rating span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-two .product-item .holder .product-description .star-rating span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-three .product-item .holder .product-description .star-rating span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-four .product-item .holder .product-description .star-rating span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .product-description .star-rating span' => 'color: {{VALUE}}',
				),

			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Price Typography', 'radiantthemes-addons' ),
				'name'     => 'price_typography',
				'scheme'   => Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .product-price ,.product-box.element-two .product-item .holder .product-description .product-price ,.product-box.element-three .product-item .holder .product-description .product-price , .product-box.element-four .product-item .holder .product-description .product-price , .product-box.element-four .product-item .holder .product-description .price , .product-box.element-five .product-item .holder .product-description .product-price ,.product-box.element-six .product-item .holder .product-description .product-price , .product-box.element-eight .product-item .holder .product-description .price',
			)
		);
		$this->add_control(
			'price_color',
			array(
				'label'     => esc_html__( 'Price color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .product-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-two .product-item .holder .product-description .product-price' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-three .product-item .holder .product-description .product-price' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .product-box.element-four .product-item .holder .product-description .product-price' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .product-box.element-four .product-item .holder .product-description .price' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .product-description .product-price' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .product-box.element-six .product-item .holder .product-description .product-price' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .product-box.element-eight .product-item .holder .product-description .price' => 'color: {{VALUE}} !important',
					

				),

			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Sale Typography', 'radiantthemes-addons' ),
				'name'     => 'sale_typography',
				'scheme'   => Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .product-box.element-one .product-item .holder span.onsale , .product-box.element-four .product-item .holder .pic .offer , .product-box.element-five .product-item .holder .pic .tag , .product-box.element-six .product-item .holder .pic .offer',
			)
		);
		$this->add_control(
			'sale_color',
			array(
				'label'     => esc_html__( 'Sale color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder span.onsale' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .product-box.element-four .product-item .holder .pic .offer' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .pic .tag' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} .product-box.element-six .product-item .holder .pic .offer' => 'color: {{VALUE}} !important',

				),

			)
		);
		$this->add_control(
			'sale_background_color',
			array(
				'label'     => esc_html__( 'Sale Background color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder span.onsale' => 'background: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-four .product-item .holder .pic .offer' => 'background: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .pic .tag' => 'background: {{VALUE}}',

				),

			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Button Typography', 'radiantthemes-addons' ),
				'name'     => 'cart_typography',
				'scheme'   => Typography::TYPOGRAPHY_3,
				'selector' => '{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .add-bag a , .product-box.element-two .product-item .holder .product-description .add-bag a , .product-box.element-five .product-item .holder .product-description .add-bag a , .product-box.element-eight .product-item .holder .add-bag a',
			)
		);
		$this->add_control(
			'cart_color',
			array(
				'label'     => esc_html__( 'Button color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .add-bag a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-two .product-item .holder .product-description .add-bag a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .add-bag a, .product-box.element-five .product-item .holder .add-bag .button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-eight .product-item .holder .add-bag a, .product-box.element-eight .product-item .holder .add-bag .button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-eight .product-item .holder .add-bag a' => 'color: {{VALUE}}',
					
				),

			)
		);
		$this->add_control(
			'cart_button_color',
			array(
				'label'     => esc_html__( 'Button Background color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .add-bag a' => 'background: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-two .product-item .holder .product-description .add-bag a' => 'background: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .add-bag a, .product-box.element-five .product-item .holder .add-bag .button' => 'background: {{VALUE}}',
					'{{WRAPPER}}  .product-box.element-eight .product-item .holder .add-bag' => 'background: {{VALUE}}',
				),

			)
		);
		$this->add_control(
			'button_padding',
			array(
				'label'      => esc_html__( 'Button Padding', 'radiantthemes-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .product-box.element-five .product-item .holder .add-bag a, .product-box.element-five .product-item .holder .add-bag .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
				'condition'  => array(
					'product_style' => 'five',
				),

			)
		);
		$this->add_control(
			'button_border_color',
			array(
				'label'     => esc_html__( 'Button Border color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-five .product-item .holder .add-bag a, .product-box.element-five .product-item .holder .add-bag .button' => 'border: 1px solid {{VALUE}}',

				),
				'condition' => array(
					'product_style' => 'five',
				),

			)
		);
		$this->add_control(
			'cart_button__background_hover_color',
			array(
				'label'     => esc_html__( 'Button Background Hover color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .add-bag a:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-two .product-item .holder .product-description .add-bag a:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .add-bag a:hover, .product-box.element-five .product-item .holder .add-bag .button:hover' => 'background: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-eight .product-item .holder .add-bag a:hover' => 'background: {{VALUE}}',
				),

			)
		);
		$this->add_control(
			'cart_button_hover_color',
			array(
				'label'     => esc_html__( 'Button  Hover color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .add-bag a:hover' => 'color: {{VALUE}}; border: 1px solid {{VALUE}}',
					'{{WRAPPER}} .product-box.element-two .product-item .holder .product-description .add-bag a:hover' => 'color: {{VALUE}}; border: 1px solid {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .add-bag a:hover, .product-box.element-five .product-item .holder .add-bag .button:hover' => 'color: {{VALUE}}; ',
					'{{WRAPPER}} .product-box.element-eight .product-item .holder .add-bag a:hover, .product-box.element-eight .product-item .holder .add-bag .button:hover' => 'color: {{VALUE}}; ',
				),

			)
		);
		$this->add_control(
			'action_button_color',
			array(
				'label'     => esc_html__( 'Action Button color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .action-buttons button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-two .product-item .holder .action-buttons button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-three .product-item .holder .action-buttons button, .product-box.element-three .product-item .holder .action-buttons a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-four .product-item .holder .action-buttons button, .product-box.element-four .product-item .holder .action-buttons a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .action-buttons .button.yith-wcqv-button' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .action-buttons .tinv-wishlist a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .action-buttons .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .action-buttons .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-six .product-item .holder .action-buttons .button-area' => 'color: {{VALUE}}',

				),

			)
		);
		$this->add_control(
			'action_button_hover_color',
			array(
				'label'     => esc_html__( 'Action Button Hover color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .action-buttons button:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-two .product-item .holder .action-buttons button:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-three .product-item .holder .action-buttons button:hover, .product-box.element-three .product-item .holder .action-buttons a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-four .product-item .holder .action-buttons button:hover, .product-box.element-four .product-item .holder .action-buttons a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .action-buttons button:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .product-box.element-six .product-item .holder .action-buttons .button-area:hover button, .product-box.element-six .product-item .holder .action-buttons .button-area:hover a.rt-add-to-cart, .product-box.element-six .product-item .holder .action-buttons .button-area:hover .yith-wcwl-add-to-wishlist' => 'color: {{VALUE}}',
				),

			)
		);
		$this->add_control(
			'action_button_hover_background_color',
			array(
				'label'     => esc_html__( 'Action Button Hover Background color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => array(
					'type'  => Color::get_type(),
					'value' => Color::COLOR_1,
				),
				'selectors' => array(
					'{{WRAPPER}} .product-box.element-one .product-item .holder .product-description .action-buttons button:hover' => 'background: {{VALUE}} !important ; border: 1px solid {{VALUE}}',

					'{{WRAPPER}} .product-box.element-two .product-item .holder .action-buttons button:hover' => 'background: {{VALUE}} !important; border: 1px solid {{VALUE}}',
					'{{WRAPPER}} .product-box.element-three .product-item .holder .action-buttons button:hover, .product-box.element-three .product-item .holder .action-buttons a:hover' => 'background: {{VALUE}} !important; border: 1px solid {{VALUE}}',
					'{{WRAPPER}} .product-box.element-four .product-item .holder .action-buttons button, .product-box.element-four .product-item .holder .action-buttons a:hover' => 'background: {{VALUE}} !important; border: 1px solid {{VALUE}} !important',
					'{{WRAPPER}} .product-box.element-five .product-item .holder .action-buttons button:hover' => 'background: {{VALUE}} !important; border: 1px solid {{VALUE}}',
					'{{WRAPPER}} .product-box.element-six .product-item .holder .action-buttons .button-area:hover button, .product-box.element-six .product-item .holder .action-buttons .button-area:hover a.rt-add-to-cart, .product-box.element-six .product-item .holder .action-buttons .button-area:hover .yith-wcwl-add-to-wishlist' => 'background: {{VALUE}} !important; border: 1px solid {{VALUE}}',
				),

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

		$output = '';
		if ( 'one' == $settings['product_style'] || 'two' == $settings['product_style'] || 'three' == $settings['product_style'] || 'four' == $settings['product_style'] || 'five' == $settings['product_style'] || 'six' == $settings['product_style'] || 'eight' == $settings['product_style'] ) {
			if ( 'true' !== $settings['product_allow_carousel'] ) {

				echo '<div class="row product-box woocommerce element-' . esc_attr( $settings['product_style'] ) . ' "  data-row-items="' . esc_attr( $settings['product_no_row_items'] ) . '" >';

			} elseif ( 'true' === $settings['product_allow_carousel'] ) {

				echo '<div class="product-box woocommerce element-' . $settings['product_style'] . ' swiper-container " data-mobile-items="' . $settings['posts_in_mobile'] . '" data-tab-items="' . $settings['posts_in_tab'] . '" data-desktop-items="' . $settings['posts_in_desktop'] . '" data-spacer="' . $settings['space_between_posts'] . '">';

				echo '<div class="swiper-wrapper">';

			} else {

			}
			if ( 'all' === $settings['product_category'] ) {
				$product_category = '';
			} else {
				$product_category = array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => esc_attr( $settings['product_category'] ),
					),
				);
			}

			$query = new \WP_Query(
				array(
					'post_type'      => 'product',
					'posts_per_page' => $settings['max_posts'],
					'order'          => $settings['order'],
					'orderby'        => $settings['order_by'],
					'tax_query'      => $product_category,
				)
			);
			if ( empty( $settings['max_posts'] ) ) {
				$settings['max_posts'] = -1;
			}
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$url1      = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );
					$pro_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ), 'medium' );
					global $product;
					$productid = $product->get_id();

					require 'template/template-product-element-' . $settings['product_style'] . '.php';

				}
				wp_reset_postdata();
				for ( $x = 1; $x <= $settings['product_no_row_items']; $x++ ) {
					echo '<div class="product-item-box-dummy-' . $settings['product_no_row_items'] . '"></div>';
				}
			} else {
				echo '<p>No items found</p>';
			}
			echo '</div>';
		} else {

			if ( 'true' !== $settings['product_allow_carousel'] ) {

				$output .= '<div class="row product-box woocommerce element-' . esc_attr( $settings['product_style'] ) . ' "  data-row-items="' . esc_attr( $settings['product_no_row_items'] ) . '" >';

			} elseif ( 'true' === $settings['product_allow_carousel'] ) {

				$output .= '<div class="product-box woocommerce element-' . $settings['product_style'] . ' swiper-container ';

				$output .= '" data-mobile-items="';
				$output .= $settings['posts_in_mobile'] . '" data-tab-items="';
				$output .= $settings['posts_in_tab'] . '" data-desktop-items="';
				$output .= $settings['posts_in_desktop'] . '" data-spacer="' . $settings['space_between_posts'] . '">';
				$output .= '<div class="swiper-wrapper">';

			} else {

				$output .= '';
			}

			if ( 'all' === $settings['product_category'] ) {
				$product_category = '';
			} else {
				$product_category = array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'slug',
						'terms'    => esc_attr( $settings['product_category'] ),
					),
				);
			}

			$query = new \WP_Query(
				array(
					'post_type'      => 'product',
					'posts_per_page' => $settings['max_posts'],
					'order'          => $settings['order'],
					'orderby'        => $settings['order_by'],
					'tax_query'      => $product_category,
				)
			);
			if ( empty( $settings['max_posts'] ) ) {
				$settings['max_posts'] = -1;
			}

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$url1      = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );
					$pro_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ), 'medium' );
					global $product;
					$productid = $product->get_id();

					require 'template/template-product-element-' . $settings['product_style'] . '.php';

				}
				wp_reset_postdata();

			} else {
				echo '<p>No items found</p>';
			}

			if ( 'true' === $settings['product_allow_carousel'] ) {
				$output .= '</div>';
				if ( 'true' === $settings['product_allow_dot_navigation'] ) {
					$output .= '<div class="swiper-pagination"></div>';
				} else {

				}
			}
			if ( 'true' === $settings['product_allow_navigation'] ) {
				$output .= '</div>';
				$output .= '<div class="product-navigation-style-' . $settings['nav_style'] . '">';
				$output .= '<div class="swiper-button-next">';
				$output .= '<span class="lnr lnr-chevron-right"></span>';
				$output .= '</div>';
				$output .= '<div class="swiper-button-prev">';
				$output .= '<span class="lnr lnr-chevron-left"></span>';
				$output .= '</div>';
				$output .= '</div>';
			}

			$output .= '</div>';

			echo $output;
		}

	}

	
}
