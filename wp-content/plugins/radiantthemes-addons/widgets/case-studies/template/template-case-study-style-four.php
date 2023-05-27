<?php





/**





 * Template for Case Study Style 4





 *





 * @package Radiantthemes





 */











$output = '<div class="container-fluid">


    <ul class="rt-auto-grid">';


$class="";


if ( 'true' === $settings['allow_carousel'] ) {


             $class ="swiper-slide";


			$output  .= '<div class="case-study swiper-container element-' . esc_attr( $settings['case_study_style_variation'] ) . '"';


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


		 <li '.$class.'>


        <a href="' . get_the_permalink() . '" class="rt-case-study-box-five">


          <div class="rt-img-box">


            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 20 20">


              <path fill="" d="M10 12c-0.066 0-0.132-0.013-0.194-0.039l-9.5-4c-0.185-0.078-0.306-0.26-0.306-0.461s0.121-0.383 0.306-0.461l9.5-4c0.124-0.052 0.264-0.052 0.388 0l9.5 4c0.185 0.078 0.306 0.26 0.306 0.461s-0.121 0.383-0.306 0.461l-9.5 4c-0.062 0.026-0.128 0.039-0.194 0.039zM1.788 7.5l8.212 3.457 8.212-3.457-8.212-3.457-8.212 3.457z"></path>


              <path fill="" d="M10 15c-0.066 0-0.132-0.013-0.194-0.039l-9.5-4c-0.254-0.107-0.374-0.4-0.267-0.655s0.4-0.374 0.655-0.267l9.306 3.918 9.306-3.918c0.254-0.107 0.548 0.012 0.655 0.267s-0.012 0.548-0.267 0.655l-9.5 4c-0.062 0.026-0.128 0.039-0.194 0.039z"></path>


              <path fill="" d="M10 18c-0.066 0-0.132-0.013-0.194-0.039l-9.5-4c-0.254-0.107-0.374-0.4-0.267-0.655s0.4-0.374 0.655-0.267l9.306 3.918 9.306-3.918c0.254-0.107 0.548 0.012 0.655 0.267s-0.012 0.548-0.267 0.655l-9.5 4c-0.062 0.026-0.128 0.039-0.194 0.039z"></path>


            </svg>


          </div>';


          if ( true == $settings['case_study_enable_title'] ) {





			$output .= '<h6 >' . get_the_title() .'</h6>';





		}


         if (  'yes' === $settings['case_study_enable_excerpt']) {


          $output .='<p>'.substr(get_the_excerpt(), 0,55).'</p>';


      }


          $output .='<img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '"  alt="' . get_the_title() . '" />


          <div class="discover-btn">'.$settings['case_study_link_button_text'].' </div>


        </a>


      </li>';





	endwhile;





}

$output .= '</ul>';
if ( 'true' === $settings['allow_carousel'] ) {


$output .= '</div>';


$output .= '</div>';


}





$output .= '</div>';





