<?php
/**
 * Template for Case Studies Slider Style One
 *
 * @package RadiantThemes
 */

$terms   = get_the_terms( get_the_ID(), 'case-study-category' );

                      

        $output .='<div class="swiper-slide case-study-box">
        <div class="holder">
        <div class="rt-snip">
            <img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '" alt="image">
            <div class="data"><div>';
            
            if ( ! empty( $terms ) ) {
                         foreach ( $terms as $term ) {
                         $output .= '<p class="case-catagory">' .$term->name . '</p>';
                         }
                    }
              
              $output .='<h6><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6>

            </div></div>
            </div>
         </div>
</div>';
