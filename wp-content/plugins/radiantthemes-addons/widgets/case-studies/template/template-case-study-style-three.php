<?php

/**

 * Template for Case Study Style 3

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

      
$output .= '
        <div class="col-lg-3 col-sm-6 col-xs-12 rt-auto-case-grid '.$class.'">

        <div href="' . get_the_permalink() . '" class="rt-case-studies">
          <div class="rt-tagbx">';
           
            if ( ! empty( $terms ) &&  'yes' === $settings['enable_cat']) {
			foreach ( $terms as $term ) {
				$output .= '<span>'.$term->name . '</span> ';
			}
		}		
          $output .= '</div>';
      
          if ( true == $settings['case_study_enable_title'] ) {

			$output .= '<h6 >' . get_the_title() .'</h6>';

		}
		if (  'yes' === $settings['case_study_enable_excerpt']) {
          $output .='<p>'.substr(get_the_excerpt(), 0,75).'</p>';
      }
          $output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"  alt="' . get_the_title() . '"/>
          <a href="' . get_the_permalink() . '" class="rt-btn rt-btn-nospace rt-btn-swipe-hov">
            <span>
              <span class="rt-text-btn" data-text="Switch Position">'.$settings['case_study_link_button_text'].'</span>
              <span class="rt-btn-icon-box"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 476.213 476.213" width="16px" height="16px" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve">
                  <polygon points="405.606,167.5 384.394,188.713 418.787,223.106 0,223.106 0,253.106 418.787,253.106 384.394,287.5 
	405.606,308.713 476.213,238.106 " fill="" />
                  
                </svg></span> <span class="rt-btn-icon-box"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 476.213 476.213" width="16px" height="16px" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve">
                  <polygon points="405.606,167.5 384.394,188.713 418.787,223.106 0,223.106 0,253.106 418.787,253.106 384.394,287.5 
	405.606,308.713 476.213,238.106 " fill="" />
                  
                </svg></span> </span>
          </a>
        </div>

      </div>';


	endwhile;

}
if ( 'true' === $settings['allow_carousel'] ) {
$output .= '</div>';
$output .= '</div>';
}

$output .= '</div>';
$output .= '</div>';
