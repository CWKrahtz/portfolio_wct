<?php
/**
 * Blog Style Addon
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
 * Elementor widget that displays blog posts in different styles.
 *
 * @since 1.0.0
 */
class Radiantthemes_Style_Blog extends Widget_Base {

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
		return 'radiant-blog';
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
		return esc_html__( 'Blog', 'radiantthemes-addons' );
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
			'rt-blog',
		];
	}

	/**
	 * Requires js files.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return [
			'radiantthemes-blog',
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
	 * Get all Blog Categories.
	 *
	 * @param array $category Categories.
	 *
	 * @return array
	 */
	public function rt_get_categories( $category ) {
		$categories = get_categories(
			array(
				'taxonomy' => $category,
			)
		);
		$array[ 0 ] = 0;
		foreach ( $categories as $cat ) {
			if ( is_object( $cat ) ) {
				$array[ $cat->name ] = $cat->slug;
			}
		}

		return $array;
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
				'label' => esc_html__( 'Blog', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'style_variation',
			[
				'label'       => esc_html__( 'Blog Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'one'    => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'    => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three'    => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'    => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'    => esc_html__( 'Style Five', 'radiantthemes-addons' ),
					'six'    => esc_html__( 'Style Six', 'radiantthemes-addons' ),					
				],
				'default'     => 'one',
			]
		);

	$this->add_control(
			'select_category',
			[
				'label'       => esc_html__( 'Category', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => array_flip( $this->rt_get_categories( 'category' ) ),
				'multiple'    => true,
				'default'     => '',
			]
		);
		$this->add_control(
			'readmore_text',
			[
				'label'       => esc_html__( 'Read More Text', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => esc_html__( 'Discover More', 'radiantthemes-addons' ),
				'label_block' => true,
				'condition'   => [
					'style_variation!' => 'one',
				],
			]
		);
		
		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'radiantthemes-addons' ),
					'DESC' => esc_html__( 'Descending', 'radiantthemes-addons' ),
				],
				'default' => 'DESC',

			]
		);

		$this->add_control(
			'order_by',
			[
				'label'   => esc_html__( 'Order By', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'date'     => esc_html__( 'Date', 'radiantthemes-addons' ),
					'title'    => esc_html__( 'Title', 'radiantthemes-addons' ),
					'id'       => esc_html__( 'ID', 'radiantthemes-addons' ),
					'rand'     => esc_html__( 'Random', 'radiantthemes-addons' ),
					'modified' => esc_html__( 'Last Modified', 'radiantthemes-addons' ),

				],
				'default' => 'date',

			]
		);

		$this->add_control(
			'max_posts',
			[
				'label'       => esc_html__( 'Count', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Number of posts to show ( -1 for all posts )', 'radiantthemes-addons' ),
				'min'         => -1,
				'default'     => -1,
			]
		);

		$this->add_control(
			'blog_no_row_items',
			[
				'label'       => esc_html__( 'Number of Row Items', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Select number of items you want to see in a row', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 3,
				'condition'   => [
					'blog_allow_carousel!' => 'yes',
					'style_variation!' => 'seven',
				],
			]
		);
		$this->add_control(
			'blog_allow_excerpt',
			array(
				'label'        => esc_html__( 'Show Excerpt', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'   => [
					'style_variation' => array('two','four'),
				],

			)
		);
		$this->add_control(
			'max_ex',
			array(
				'label'       => esc_html__( 'Excerpt Limit', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'min'         => 1,
				'default'     => 75,
				'condition'   => [
					'style_variation' => array('two','four'),
					'blog_allow_excerpt' => 'yes',
				],
			)
		);
		$this->add_control(
			'blog_allow_author',
			[
				'label'        => esc_html__( 'Show Author Name', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'   => [
					'style_variation!' => array('two','three','four','five'),
				],
			]
		);
		$this->add_control(
			'blog_allow_categories',
			[
				'label'        => esc_html__( 'Show Category Name', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'   => [
					'style_variation!' => 'seven',
				],
			]
		);						
		
		$this->add_control(
			'blog_allow_date',
			[
				'label'        => esc_html__( 'Show Post Published Date', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'   => [
					'style_variation!' => 'seven',
				],
			]
		);

		$this->add_control(
			'blog_allow_read',
			array(
				'label'        => esc_html__( 'Show Read More Text', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'   => [
					'style_variation' => 'two',
				],

			)
		);

		$this->add_control(
			'blog_allow_carousel',
			[
				'label'        => esc_html__( 'Carousel', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'radiantthemes-addons' ),
				'label_off'    => esc_html__( 'No', 'radiantthemes-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'   => [
					'style_variation!' => 'three',
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
			]
		);
	    $this->add_control(
			'posts_in_desktop',
			[
				'label'       => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Desktop (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 3,
				'condition'   => [
					'blog_allow_carousel' => 'yes','style_variation!' => 'seven',
				],
			]
		);
		$this->add_control(
			'posts_in_tab',
			[
				'label'       => esc_html__( 'Number of Posts on Tab', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Tab (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 2,
				'condition'   => [
					'blog_allow_carousel' => 'yes','style_variation!' => 'seven',
				],
			]
		);

		$this->add_control(
			'posts_in_mobile',
			[
				'label'       => esc_html__( 'Number of Posts on Mobile', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Mobile (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 1,
				'condition'   => [
					'blog_allow_carousel' => 'yes','style_variation!' => 'seven',
				],
			]
		);



		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_blog_title',
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
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' =>
					'
					{{WRAPPER}} .blog.element-one .blog-item > .holder > .blog-desc > .blog-desc-exrpt h6,
					{{WRAPPER}} .blog.element-two article.blog-item .holder h6,
					{{WRAPPER}} .blog.element-three .blog-item > .holder > .data .title,

					{{WRAPPER}} .blog.element-four .blog-item > .holder > .data .title a,{{WRAPPER}} .blog.element-five .blog-item > .holder > .data .title,
					{{WRAPPER}} .blog.element-six .blog-item > .holder > .data .title',
				
			]
		);

		$this->add_control(
			'blog_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
				    '{{WRAPPER}} .blog.element-one .blog-item > .holder > .blog-desc > .blog-desc-exrpt h6 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-two article.blog-item .holder h6' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-three .blog-item > .holder > .data .title' => 'color: {{VALUE}}',

					'{{WRAPPER}} .blog.element-four .blog-item > .holder > .data .title a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-five .blog-item > .holder > .data .title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-six .blog-item > .holder > .data .title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_blog_date',
			[
				'label' => esc_html__( 'Date', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Date Typography', 'radiantthemes-addons' ),
				'name'     => 'date_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => 
				    '{{WRAPPER}} .blog.element-one li,{{WRAPPER}} .blog.element-two article.blog-item .holder span,{{WRAPPER}} .blog.element-three li,{{WRAPPER}} .blog.element-four li,
				    {{WRAPPER}} .blog.element-five li,	

					.blog.element-one .blog-item > .holder > .data > .post-meta > .date , .blog.element-one .blog-item .holder .data .post-meta .date',
				 
			]
		);

		$this->add_control(
			'blog_date_color',
			[
				'label'     => esc_html__( 'Date Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog.element-one li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-two article.blog-item .holder span, {{WRAPPER}} .blog.element-three li,{{WRAPPER}} .blog.element-four li,{{WRAPPER}} .blog.element-five li' => 'color: {{VALUE}}',

					'{{WRAPPER}} .date' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog-item > .holder > .data .date' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog .blog-item > .holder > .meta > ul > li.date' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-three .style-one .entry-main .entry-header .date' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_blog_category',
			[
				'label' => esc_html__( 'Category', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Category Typography', 'radiantthemes-addons' ),
				'name'     => 'category_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog.element-one li a,{{WRAPPER}} .blog.element-two article.blog-item .holder .blog-category,{{WRAPPER}} .blog.element-three li a,{{WRAPPER}} .blog.element-four li a,

				 {{WRAPPER}} .blog.element-five li a, {{WRAPPER}} .blog.element-six .blog-item > .holder > .pic > .blog-desc .blog-category-tab ul li a',
			]
		);

		$this->add_control(
			'blog_category_color',
			[
				'label'     => esc_html__( 'Category Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
				    '{{WRAPPER}} .blog.element-one li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-two article.blog-item .holder .blog-category' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-three li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-four li a'=>'color: {{VALUE}}',

					'{{WRAPPER}} .blog.element-five li a,{{WRAPPER}} .blog.element-six .blog-item > .holder > .pic > .blog-desc .blog-category-tab ul li a' => 'color: {{VALUE}}',
					
					
				],
			]
		);
		$this->add_control(
			'blog_category_background_color',
			[
				'label'     => esc_html__( 'Category Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
				    '{{WRAPPER}} .blog.element-one li a,{{WRAPPER}} .blog.element-two article.blog-item .holder .blog-category, {{WRAPPER}} .blog.element-six .blog-item > .holder > .pic > .blog-desc .blog-category-tab ul li a' => 'background-color: {{VALUE}}',
					
				],
				'condition'   => [
					'style_variation' => Array('one','two','six'),
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_blog_author',
			[
				'label' => esc_html__( 'Author', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style_variation!' => Array('two','four','five'),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Author Typography', 'radiantthemes-addons' ),
				'name'     => 'author_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' =>    '{{WRAPPER}} .blog.element-one .blog-item > .holder > .blog-title > .blog-title-data > .title,{{WRAPPER}} .author, {{WRAPPER}} .blog.element-three .style-one .post-meta span.author, {{WRAPPER}} h6.author',
				
				
			]
		);

		$this->add_control(
			'blog_author_color',
			[
				'label'     => esc_html__( 'Author Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					    '{{WRAPPER}} .blog.element-one .blog-item > .holder > .blog-title > .blog-title-data > .title' => 'color: {{VALUE}}',
						'{{WRAPPER}} .blog.element-two .blog-item > .holder > .data > .post-meta > span.author' => 'color: {{VALUE}}',
						'{{WRAPPER}} .blog.element-three .style-one .post-meta span.author' => 'color: {{VALUE}}',
						'{{WRAPPER}} h6.author' => 'color: {{VALUE}}',
						
					],
				
			]
		);
		
 		$this->end_controls_section();
 		$this->start_controls_section(
			'section_style_ex',
			[
				'label' => esc_html__( 'Excerpt', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style_variation' => Array('two','four'),
				],
			]
		);
 		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'label'    => esc_html__( 'Excerpt Typography', 'radiantthemes-addons' ),
				'name'     => 'ex_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' =>
					'{{WRAPPER}} .blog.element-two article.blog-item .holder p,{{WRAPPER}} .blog.element-four .blog-item > .holder > .data p',
			)
		);

		$this->add_control(
			'blog_ex_color',
			array(
				'label'     => esc_html__( 'Excerpt Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog.element-two article.blog-item .holder p,{{WRAPPER}} .blog.element-four .blog-item > .holder > .data p' => 'color: {{VALUE}}',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_blog_button',
			[
				'label' => esc_html__( 'Button', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition'   => [
					'style_variation' => Array('two' , 'four','five'),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Button Typography', 'radiantthemes-addons' ),
				'name'     => 'button_typography',
				'scheme'   => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog.element-two article.blog-item .holder a ,
				{{WRAPPER}} .blog.element-six .blog-item > .holder > .data .btn span , .blog.element-four .blog-item > .holder > .data a.read,{{WRAPPER}} .blog.element-five .blog-item > .holder > .data a.read',
				
			]
		);
       

		$this->add_control(
			'blog_btn_color',
			[
				'label'     => esc_html__( 'Button Text Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog.element-two article.blog-item .holder a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-two article.blog-item .holder a:before' => 'background: {{VALUE}}',
					'{{WRAPPER}} .blog.element-four .blog-item > .holder > .data a.read' => 'color: {{VALUE}}',
					'{{WRAPPER}} .blog.element-five .blog-item > .holder > .data a.read' => 'color: {{VALUE}}',
					
					'{{WRAPPER}} .blog.element-six .blog-item > .holder > .data .btn span' => 'color: {{VALUE}}',
					 
				
				],
				'condition'   => [
					'style_variation!' => 'one',
				],
			]
		);
		/*
		$this->add_control(
			'blog_btn_icon_color',
			[
				'label'     => esc_html__( 'Button Icon Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog.element-six .blog-item > .holder > .data .btn i' => 'color: {{VALUE}}',
					
					 
				
				],
				'condition'   => [
					'style_variation' => 'six',
				],
			]
		);


		$this->add_control(
			'radiant_blog_btn_gradient_bg_add',
			[
				'label'        => esc_html__( 'Add Gradient Background?', 'radiantthemes-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
				'label_off'    => esc_html__( 'No', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'description'  => esc_html__( 'Please Note: If selected, please do not use any background image or direct backgrund color.', 'radiantthemes-addons' ),
				'condition'   => [
					'style_variation' => Array('two','five'),
				],
			]
		);

		$this->add_control(
			'radiant_blog_btn_gradient_bg_type',
			[
				'label'       => esc_html__( 'Gradient Background Type', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => [
					'to bottom'       => esc_html__( 'To Bottom', 'radiantthemes-addons' ),
					'to top'          => esc_html__( 'To Top', 'radiantthemes-addons' ),
					'to right'        => esc_html__( 'To Right', 'radiantthemes-addons' ),
					'to left'         => esc_html__( 'To Left', 'radiantthemes-addons' ),
					'to top left'     => esc_html__( 'To Top Left', 'radiantthemes-addons' ),
					'to bottom left'  => esc_html__( 'To Bottom Left', 'radiantthemes-addons' ),
					'to top right'    => esc_html__( 'To Top Right', 'radiantthemes-addons' ),
					'to bottom right' => esc_html__( 'To Bottom Right', 'radiantthemes-addons' ),
				],
				'condition'   => [
					'radiant_blog_btn_gradient_bg_add' => 'yes',
					'style_variation' => Array('two','five'),
				],
				'description' => esc_html__( 'Select backgroud type.', 'radiantthemes-addons' ),
			]
		);

		$this->add_control(
			'radiant_blog_btn_gradient_bg_color_one',
			[
				'label'     => esc_html__( 'Background Color (One)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'radiant_blog_btn_gradient_bg_add' => 'yes',
					'style_variation' => Array('two','five'),
				],
			]
		);

		$this->add_control(
			'radiant_blog_btn_gradient_bg_color_two',
			[
				'label'     => esc_html__( 'Background Color (Two)', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog.element-two .blog-item > .holder > .post-btn > .post-button' => 'background: linear-gradient({{radiant_blog_btn_gradient_bg_type.VALUE}}, {{radiant_blog_btn_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
					'{{WRAPPER}} .blog.element-five .blog-item .holder .post-btn .post-button .ti-arrow-right' => 'background: linear-gradient({{radiant_blog_btn_gradient_bg_type.VALUE}}, {{radiant_blog_btn_gradient_bg_color_one.VALUE}} 0%, {{VALUE}} 100%)',
				],
				'condition' => [
					'radiant_blog_btn_gradient_bg_add' => 'yes',
					'style_variation' => Array('two','five'),

				],
			]
		);
		*/

		$this->add_control(
			'radiant_blog_btn_bg_color',
			[
				'label'     => esc_html__( 'Background Color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog.element-two .blog-item > .holder > .post-btn > .post-button,{{WRAPPER}} .blog.element-four .blog-item > .holder > .data a.read,{{WRAPPER}} .blog.element-five .blog-item > .holder > .data a.read' => 'background: {{VALUE}}',
				],
				'condition' => [
					'radiant_blog_btn_gradient_bg_add!' => 'yes',
					'style_variation!' => 'two',
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

		//$navigation_style = 'yes' === $settings['allow_nav'] ? 'owl-nav-style-' . esc_attr( $settings['navigation_style'] ) : '';
		//$dot_style        = 'yes' === $settings['allow_dots'] ? 'owl-dot-style-' . esc_attr( $settings['navigation_dot_style'] ) : '';

		$output = '';

		if ( 'yes' !== $settings['blog_allow_carousel'] ) {

			if ( 'seven' === $settings['style_variation'] ) {
                   $output .= '<div class="row rt-blog-card">';

			} elseif ( 'one' === $settings['style_variation'] ) {
				$output .= '<div class="blog element-' . $settings['style_variation'] . ' isotope"';
				$output .= ' data-row-items="';
				$output .= esc_attr( $settings['blog_no_row_items'] ) . '"';
				$output .= '>';
			} else {
				$output .= '<div class="blog element-' . $settings['style_variation'] . '" ';
				$output .= ' data-row-items="';
				$output .= esc_attr( $settings['blog_no_row_items'] ) . '"';
				$output .= '>';
			}
		} elseif ( 'yes' === $settings['blog_allow_carousel'] ) {

			
			$output .= '<div class="blog element-' . $settings['style_variation'] . ' swiper-container ';
			
			$output .= '" data-mobile-items="';
			$output .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output .= $settings['posts_in_desktop'] . '">';
			$output .= '<div class="swiper-wrapper">';

		} else {
		    
			$output .= '';
		}

		if ( is_array( $settings['select_category'] ) ) {
			$cat_list = implode( ',', $settings['select_category'] );
		} else {
			$cat_list = '';
		}
	
		$query = new \WP_Query(
			array(
				'post_type'      => 'post',
				'category_name'  => $cat_list,
				'posts_per_page' => $settings['max_posts'],
				'order'          => $settings['order'],
				'orderby'        => $settings['order_by'],
			)
		);

			$data = 0;
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
			//setPostViews(get_the_ID());
				require 'template/template-blog-item-' . $settings['style_variation'] . '.php';

			}
			wp_reset_postdata();
		} else {
			$output .= '<p>No items found</p>';
		}
		if ( 'yes' === $settings['blog_allow_carousel'] ) {
		$output .= '</div>';
		
				if ( 'true' === $settings['allow_dots'] ) {
		  				$output .= '<div class="swiper-pagination"></div>';
				}  
		}
        if ( 'seven' === $settings['style_variation'] ) {
            $output .= '</div>
				<!--rt-news-style-4-->
			</div>';
		}
			
			$output .= '</div>';
			echo $output;
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	
}