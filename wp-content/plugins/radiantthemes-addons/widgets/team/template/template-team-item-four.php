<?php
/**
 * Template Style 4 for Team
 *
 * @package RadiantThemes

 */
  if ( 'true' === $settings['team_allow_carousel'] ) {
  $output .= '<article class="team-item swiper-slide ">';
 }else {
 
 $output .= '<article class="team-item col-lg-3 col-md-6 col-sm-6 col-xs-12">';
 }
// $output .= '<article class="team-item ">';
                  $output .= '<div class="holder">';
                    $output .= ' <div class="pic">';
                        $output .= '<img src="'. get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '" alt="' . get_the_title() . '">';
                    $output .= ' </div>';
                     $output .= '<div class="team-content">';
                       $output .= ' <div class="team-content-inner">';
						$terms   = get_the_terms( get_the_ID(), 'profession' );
			             if ( ! empty( $terms ) ) {
				         foreach ( $terms as $term ) {
					     $output .= '<p class="team-role">' . $term->name . '</p>';
				         }
			             }	
                           
                          $output .= '<h5  class="team-title entry-title">' . get_the_title() . '</h5>'; 
                          $output .= ' <div class="team-member-social-icon-group">';
						   

                              
                           $output .= '</div>';
                        $output .= '</div>';
                     $output .= '</div>';
                     
                  $output .= '</div>';
               $output .= '</article>';
 
 
 
 
 
