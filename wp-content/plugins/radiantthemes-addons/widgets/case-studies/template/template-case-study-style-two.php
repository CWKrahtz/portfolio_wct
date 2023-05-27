<?php

/**

 * Template for Case Study Style 2

 *

 * @package Radiantthemes

 */



$output = '<div class="container">
    <div class="rt-grid row">';
$class="";
if ( 'true' === $settings['allow_carousel'] ) {
             $class ="swiper-slide";
			$output  .= '<div class="case-study swiper-container element-' . esc_attr( $settings['clients_style'] ) . '"';
			 $output .= ' data-mobile-items="';
			$output  .= $settings['posts_in_mobile'] . '" data-tab-items="';
			$output  .= $settings['posts_in_tab'] . '" data-desktop-items="';
			$output  .= $settings['posts_in_desktop'] . '" data-spacer="' . $settings['space_between_posts'] . '">';
			$output  .= '<div class="swiper-wrapper">';
		}

// WP_Query arguments.

global $wp_query;



$no_of_case_studies = ( $settings['no_of_case_studies'] ? $settings['no_of_case_studies'] : -1 );



if ( 'all' === $settings['case_category'] ) {
      $category = '';
    } else {
      $category = array(
        array(
          'taxonomy' => 'case-study-category',
          'field'    => 'slug',
          'terms'    => esc_attr( $settings['case_category'] ),
        ),
      );
    }

    

   

$args     = array(

	'post_type'      => 'case-studies',

	'posts_per_page' => esc_attr( $no_of_case_studies ),

	'orderby'        => esc_attr( $settings['case_study_looping_order'] ),

	'order'          => esc_attr( $settings['case_study_looping_sort'] ),
  'tax_query'      => $category,

);

$my_query = null;

$my_query = new WP_Query( $args );
$t=1;
if ( $my_query->have_posts() ) {

	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'case-study-category' );

         $output .= '<article class="col-lg-4 col-sm-12 '.$class.'">
        <figure class="rt-text-appear-effect">
        <a  href="' . get_the_permalink() . '" >
           <img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"  alt="' . get_the_title() . '"/>
          <figcaption>
            <div class="data">';
             if ( true == $settings['case_study_enable_title'] ) {
        		$output .= '<h6 >' . get_the_title() .'</h6>';
     		}
     		if ( ! empty( $terms ) &&  'yes' === $settings['enable_cat']) {
			foreach ( $terms as $term ) {
				$output .= '<p>'.$term->slug . '</p> ';
			}
		}		 
            $output .= ' 
            </div>
          </figcaption>
          </a>
        </figure>

      </article>';


	endwhile;

}
if ( 'true' === $settings['allow_carousel'] ) {
$output .= '</div>';
$output .= '</div>';
}

$output .= '</div>';
$output .= '</div>';
