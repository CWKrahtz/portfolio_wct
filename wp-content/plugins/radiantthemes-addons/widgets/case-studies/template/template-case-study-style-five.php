<?php

/**

 * Template for Case Study Style 5

 *

 * @package Radiantthemes

 */



$output = '<div class="col-12 col-xs-12 rt-case-tab">';
$class="";


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




$output .='<div class="col-6 col-xs-12 col-sm-6 col-md-6 box-rt-case-tab">
            <div class="rt-effect rt-effect-six ">
                <div class="holder-area">
                    <img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"  alt="' . get_the_title() . '" class="img-fluid">
                    <div class="rt-case-tab-text">
                    </div>
                </div>
                <div class="data">
                    <div class="tag-area">';
                    if ( ! empty( $terms ) &&  'yes' === $settings['enable_cat']) {
      foreach ( $terms as $term ) {
        $output .= '<div class="tab-txt">'.$term->slug . '</div> ';
      }
    }    
                    
                        
                    $output .= '</div>';
                     if ( true == $settings['case_study_enable_title'] ) {
                         $output .= '<h6>' . get_the_title() .'</h6>';
                      }
                    $output .= ' 
                    <a href="' . get_the_permalink() . '" class="rt-case-btn rt-case-btn-nospace rt-case-btn-swipe-hov" style="">
                        <span>
                            <span class="rt-text-btn" data-text="Switch Position">'.$settings['case_study_link_button_text'].'</span>
                            <span class="rt-case-btn-icon-box"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 476.213 476.213" width="16px" height="16px" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve">
                                    <polygon points="405.606,167.5 384.394,188.713 418.787,223.106 0,223.106 0,253.106 418.787,253.106 384.394,287.5 
  405.606,308.713 476.213,238.106 " fill="" />
                            
                                </svg></span>
                            <span class="rt-case-btn-icon-box"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 476.213 476.213" width="16px" height="16px" style="enable-background:new 0 0 476.213 476.213;" xml:space="preserve">
                                    <polygon points="405.606,167.5 384.394,188.713 418.787,223.106 0,223.106 0,253.106 418.787,253.106 384.394,287.5 
  405.606,308.713 476.213,238.106 " fill="" />
                                 
                                </svg></span>
                        </span>
                    </a>
                </div>
            </div>

        </div>';
	endwhile;

}


$output .= '</div>';

