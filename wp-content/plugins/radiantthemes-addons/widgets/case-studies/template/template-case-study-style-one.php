<?php

/**

 * Template for Case Study Style One

 *

 * @package Radiantthemes

 */



$output = '<div>
    <div class="row">';



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

           if($t%2) {

		$output .= '<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 leftpane "> <a data-tilt data-tilt-glare="false" data-tilt-max="7" class="c-logo" href="' . get_the_permalink() . '" title="Tilt.js demo website">
          <img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"  alt="' . get_the_title() . '"/>

          <div class="holder">';
          if ( true == $settings['case_study_enable_title'] ) {

			$output .= '<h4 >' . get_the_title() .'</h4>';

		}
           
            $output .= '<a href="' . get_the_permalink() . '" class="rt-readmore-btn">'.$settings['case_study_link_button_text'].' <svg version="1.1" x="0px" y="0px" viewBox="0 0 476.213 476.213" width="16px" height="16px" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve">
                <polygon points="405.606,167.5 384.394,188.713 418.787,223.106 0,223.106 0,253.106 418.787,253.106 384.394,287.5 
    405.606,308.713 476.213,238.106 " fill=""></polygon>
              </svg></a>
          </div>

        </a>
        </div>';
    }   else {
          $output .= '<div class="col-lg-4 col-md-12  col-sm-12 col-xs-12 rightpane ">
        <a data-tilt data-tilt-glare="false" data-tilt-max="7" class="c-logo" href="' . get_the_permalink() . '" title="Tilt.js demo website">
           <img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"  alt="' . get_the_title() . '"/>
          <div class="holder">';
          if ( true == $settings['case_study_enable_title'] ) {

			$output .= '<h4 >' . get_the_title() . '</h4>';

		}
           
            $output .= '<a href="' . get_the_permalink() . '" class="rt-readmore-btn">'.$settings['case_study_link_button_text'].'  <svg version="1.1" x="0px" y="0px" viewBox="0 0 476.213 476.213" width="16px" height="16px" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve">
                <polygon points="405.606,167.5 384.394,188.713 418.787,223.106 0,223.106 0,253.106 418.787,253.106 384.394,287.5 
    405.606,308.713 476.213,238.106 " fill=""></polygon>
              </svg></a>
          </div>

        </a>
        </div>';
 }
 $t++;
	endwhile;

}


$output .= '</div>';
$output .= '</div>';
