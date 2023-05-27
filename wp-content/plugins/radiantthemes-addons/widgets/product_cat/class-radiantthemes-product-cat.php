<?php
/**
 * Product Category Addon
 *
 * @package Radiantthemes
 */

namespace RadiantthemesAddons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
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
class Radiantthemes_style_Product_Cat extends Widget_Base {

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
		return 'radiant-product-cat';
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
		return esc_html__( 'Product Category', 'radiantthemes-addons' );
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
		return 'eicon-product-categories';
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

 			'rt-product-cat',
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
		$product_category_array = array( 'all' => 'Select Parent categories' );
		if ( ! empty( $product_terms ) ) {
			foreach ( $product_terms as $product_term ) {
				$product_category_array[ $product_term->term_id ] = $product_term->name;
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
				'label' => esc_html__( 'Product Category', 'radiantthemes-addons' ),
			)
		);

		$this->add_control(
			'cat_style',
			array(
				'label'       => esc_html__( 'Select  Style', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => array(
					'one'   => esc_html__( 'Style One', 'radiantthemes-addons' ),
					'two'   => esc_html__( 'Style Two', 'radiantthemes-addons' ),
					'three'   => esc_html__( 'Style Three', 'radiantthemes-addons' ),
					'four'   => esc_html__( 'Style Four', 'radiantthemes-addons' ),
					'five'   => esc_html__( 'Style Five', 'radiantthemes-addons' ),
				),
				'default'     => 'one',
			)
		);
		$this->add_control(
			'product_category',
			array(
				'label'       => esc_html__( 'Select Parent Category', 'radiantthemes-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT2,
				'options'     => $this->get_product_categories(),
				'default'     => 'all',
			)
		);


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
			'posts_in_desktop',
			array(
				'label'       => esc_html__( 'Number of Posts on Desktop', 'radiantthemes-addons' ),
				'type'        => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Posts on Desktop (in single row)', 'radiantthemes-addons' ),
				'min'         => 1,
				'default'     => 3,

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

			)
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
			'product_allow_dot_navigation',
			[
				'label'   => esc_html__( 'Allow dot for Navigation', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default' => 'true',

			]
		);
		$this->add_control(
			'product_allow_navigation',
			[
				'label'   => esc_html__( 'Navigation', 'radiantthemes-addons' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'false' => esc_html__( 'No', 'radiantthemes-addons' ),
					'true'  => esc_html__( 'Yes', 'radiantthemes-addons' ),
				],
				'default' => 'true',

			]
		);



		$this->end_controls_section();
		$this->start_controls_section(
			'section_style_product_cat_box',
			[
				'label' => __( 'Style', 'radiantthemes-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Parent Cat Typography', 'radiantthemes-addons' ),
				'name'     => 'p_cat_typography',
				'selector' => '{{WRAPPER}} .rt-product-cat.element-one .holder .data .main-cat',
				'condition'   => [
					'cat_style' => 'one',
				],
			]
		);
		$this->add_control(
			'p_cat_color',
			[
				'label'     => esc_html__( 'Parent Cat color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-product-cat.element-one .holder .data .main-cat' => 'color: {{VALUE}}',

				],
				'condition'   => [
					'cat_style' => 'one',
				],

			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Sub Cat Typography', 'radiantthemes-addons' ),
				'name'     => 'sub_cat_typography',
				'selector' => '{{WRAPPER}} .rt-product-cat.element-one .holder .data .rt-cat-hover .sub-cat , .rt-product-cat.element-two .holder .data .rt-cat-hover .sub-cat,.rt-product-cat.element-three .holder .data .rt-cat-hover .sub-cat, .rt-product-cat.element-five .holder .data .rt-cat-hover .sub-cat',
			]
		);
		$this->add_control(
			'sub_cat_color',
			[
				'label'     => esc_html__( 'Sub Cat color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-product-cat.element-one .holder .data .rt-cat-hover .sub-cat' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-product-cat.element-two .holder .data .rt-cat-hover .sub-cat' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-product-cat.element-three .holder .data .rt-cat-hover .sub-cat' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-product-cat.element-five .holder .data .rt-cat-hover .sub-cat' => 'color: {{VALUE}}',

				],

			]
		);
			$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Description Typography', 'radiantthemes-addons' ),
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .rt-product-cat.element-five .holder .data .main-cat',
				'condition'   => array(
					'cat_style' => 'five',

				),
			]
		);
		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Description color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-product-cat.element-five .holder .data .main-cat' => 'color: {{VALUE}}',


				],
				'condition'   => array(
					'cat_style' => 'five',

				),

			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'    => esc_html__( 'Button Typography', 'radiantthemes-addons' ),
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .rt-product-cat.element-five .holder .data .rt-cat-hover a',
				'condition'   => array(
					'cat_style' => 'five',

				),
			]
		);
		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__( 'Button color', 'radiantthemes-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .rt-product-cat.element-five .holder .data .rt-cat-hover a' => 'color: {{VALUE}}',


				],
				'condition'   => array(
					'cat_style' => 'five',

				),

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
		// get the current taxonomy term

		$parent_category_ID = $settings['product_category'];
		$prod_categories = get_terms( 'product_cat', array(
		'orderby'    => $settings['order_by'],
		'order'      => $settings['order'],
		'parent' => $parent_category_ID,
		// 'hide_empty' => 1
		));

		if ( 'one' === $settings['cat_style'] ) {


				?>
			<?php	$output1 = '<div class="rt-product-cat element-'.$settings['cat_style'].' row' .  ' swiper-container ';

			$output1 .= '" data-mobile-items="';
			$output1 .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output1 .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output1 .= $settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
			$output1 .= '<div class="swiper-wrapper">';
			echo $output1;
			?>
			<?php  foreach( $prod_categories as $prod_cat ) :
                    $cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                    $cat_thumb_url = wp_get_attachment_image_url( $cat_thumb_id , 'full');
                    $term_link = get_term_link( $prod_cat, 'product_cat' );

            ?>

				<div class="swiper-slide" >
				<a class="holder" href="<?php echo $term_link; ?>">
				<img src="<?php echo $cat_thumb_url; ?>" alt="image" >
				<div class="rt_lightpop_overlay">
				<div class="eltdf-pli-plus"></div></div>
				<div class="data"><p class="main-cat"><?php echo  $term_name = get_term( $parent_category_ID )->name;?></p>
				<div class="rt-cat-hover">
				<h3 class="sub-cat"><?php echo $prod_cat->name; ?></h3>
				</div>
				</div>
				</a>
				</div>



            <?php endforeach; wp_reset_query();
			?>
			</div>

        <!-- If we need navigation buttons -->
		<?php if ( 'true' === $settings['product_allow_dot_navigation'] ) { ?>
		<div class="swiper-pagination"></div>
		<?php  } else { }
        if ( 'true' === $settings['product_allow_navigation'] ) {
		?>
		<div class="product-navigation">
		<div class="swiper-button-next-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
		</div>
		<div class="swiper-button-prev-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
		</div>
		</div>

		<?php } else { }?>

    </div>
			<?php
		} elseif ( 'two' === $settings['cat_style'] ){

				?>
			<?php	$output1 = '<div class="rt-product-cat element-'.$settings['cat_style'].' row' .  ' swiper-container ';

			$output1 .= '" data-mobile-items="';
			$output1 .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output1 .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output1 .= $settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
			$output1 .= '<div class="swiper-wrapper">';
			echo $output1;
			?>
			<?php  foreach( $prod_categories as $prod_cat ) :
                    $cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                    $cat_thumb_url = wp_get_attachment_image_url( $cat_thumb_id , 'full');
                    $term_link = get_term_link( $prod_cat, 'product_cat' );

            ?>

				<div class="swiper-slide" >
				<a class="holder" href="<?php echo $term_link; ?>">
				<img src="<?php echo $cat_thumb_url; ?>" alt="image" >
				<div class="rt_lightpop_overlay">
				<div class="eltdf-pli-plus"></div></div>
				<div class="data">
				<div class="rt-cat-hover">
				<h3 class="sub-cat"><?php echo $prod_cat->name; ?></h3>
				</div>
				</div>
				</a>
				</div>



            <?php endforeach; wp_reset_query();
			?>
			</div>

        <!-- If we need navigation buttons -->
		<?php if ( 'true' === $settings['product_allow_dot_navigation'] ) { ?>
		<div class="swiper-pagination"></div>
		<?php  } else { }
        if ( 'true' === $settings['product_allow_navigation'] ) {
		?>
		<div class="product-navigation">
		<div class="swiper-button-next-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
		</div>
		<div class="swiper-button-prev-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
		</div>
		</div>

		<?php } else { }?>

    </div>
	<?php

		}
		elseif ( 'three' === $settings['cat_style'] ){        ?>

				<?php	$output1 = '<div class="rt-product-cat element-'.$settings['cat_style'].' row' .  ' swiper-container ';

			$output1 .= '" data-mobile-items="';
			$output1 .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output1 .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output1 .= $settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
			$output1 .= '<div class="swiper-wrapper">';
			echo $output1;
			?>
			<?php  foreach( $prod_categories as $prod_cat ) :
                    $cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                    $cat_thumb_url = wp_get_attachment_image_url( $cat_thumb_id , 'full');
                    $term_link = get_term_link( $prod_cat, 'product_cat' );

            ?>

				<div class="swiper-slide cat-item" >
				<a class="holder" href="<?php echo $term_link; ?>">
				<div class="cat-img" >
				<img src="<?php echo $cat_thumb_url; ?>" alt="image" >
				</div>
				<div class="rt_lightpop_overlay">
				<div class="eltdf-pli-plus"></div></div>
				<div class="data">
				<div class="rt-cat-hover">
				<h3 class="sub-cat"><?php echo $prod_cat->name; ?></h3>
				</div>
				</div>
				</a>
				</div>



            <?php endforeach; wp_reset_query();
			?>
			</div>

        <!-- If we need navigation buttons -->
		<?php if ( 'true' === $settings['product_allow_dot_navigation'] ) { ?>
		<div class="swiper-pagination"></div>
		<?php  } else { }
        if ( 'true' === $settings['product_allow_navigation'] ) {
		?>
		<div class="product-navigation">
		<div class="swiper-button-next-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
		</div>
		<div class="swiper-button-prev-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
		</div>
		</div>

		<?php } else { }?>

    </div>
	<?php

	    } elseif ( 'four' === $settings['cat_style'] ){
		?>

		<?php	$output1 = '<div class="rt-product-cat element-'.$settings['cat_style'].' row' .  ' swiper-container ';

			$output1 .= '" data-mobile-items="';
			$output1 .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output1 .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output1 .= $settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
			$output1 .= '<div class="swiper-wrapper">';
			echo $output1;
			?>
			<?php  foreach( $prod_categories as $prod_cat ) :
                    $cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                    $cat_thumb_url = wp_get_attachment_image_url( $cat_thumb_id , 'full');
                    $term_link = get_term_link( $prod_cat, 'product_cat' );

            ?>

				<div class="swiper-slide" >
				<a class="holder" href="<?php echo $term_link; ?>">
				<div class="cat-img" >
				<img src="<?php echo $cat_thumb_url; ?>" alt="image" >
				</div>

				<div class="data">

				<h3 class="sub-cat"><?php echo $prod_cat->name; ?></h3>

				</div>
				</a>
				</div>



            <?php endforeach; wp_reset_query();
			?>
			</div>

        <!-- If we need navigation buttons -->
		<?php if ( 'true' === $settings['product_allow_dot_navigation'] ) { ?>
		<div class="swiper-pagination"></div>
		<?php  } else { }
        if ( 'true' === $settings['product_allow_navigation'] ) {
		?>
		<div class="product-navigation">
		<div class="swiper-button-next-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
		</div>
		<div class="swiper-button-prev-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
		</div>
		</div>

		<?php } else { }?>

    </div>

	<?php

	} elseif ( 'five' === $settings['cat_style'] ){
	?>
	<?php	$output1 = '<div class="rt-product-cat element-'.$settings['cat_style'].' row' .  ' swiper-container ';

			$output1 .= '" data-mobile-items="';
			$output1 .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output1 .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output1 .= $settings['posts_in_desktop'] . '" data-spacer="'.$settings['space_between_posts'] . '">';
			$output1 .= '<div class="swiper-wrapper">';
			echo $output1;
			?>
			<?php  foreach( $prod_categories as $prod_cat ) :
                    $cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                    $cat_thumb_url = wp_get_attachment_image_url( $cat_thumb_id , 'full');
                    $term_link = get_term_link( $prod_cat, 'product_cat' );

            ?>

				<div class="swiper-slide" >
				<div class="holder" >
				<img src="<?php echo $cat_thumb_url; ?>" alt="image" >
				<div class="rt_lightpop_overlay">
				</div>
				<div class="data">
				<div class="rt-cat-hover">
				<h3 class="sub-cat"><?php echo $prod_cat->name; ?></h3>
				<p class="main-cat"><?php echo  $prod_cat->description?></p>
				<a href="<?php echo $term_link; ?>"><?php echo esc_html__( 'Shop Now', 'radiantthemes-addons' );?></a>
				</div>
				</div>
				</div>
				</div>



            <?php endforeach; wp_reset_query();
			?>
			</div>

        <!-- If we need navigation buttons -->
		<?php if ( 'true' === $settings['product_allow_dot_navigation'] ) { ?>
		<div class="swiper-pagination"></div>
		<?php  } else { }
        if ( 'true' === $settings['product_allow_navigation'] ) {
		?>
		<div class="product-navigation">
		<div class="swiper-button-next-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
		</div>
		<div class="swiper-button-prev-cat">
		<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#676666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
		</div>
		</div>

		<?php } else { }?>

    </div>

	<?php }

	}

	
}
