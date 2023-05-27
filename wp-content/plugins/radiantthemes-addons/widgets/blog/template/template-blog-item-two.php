<?php
/**
 * Template for Blog Item Two.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
if ( 'yes' === $settings['blog_allow_carousel'] ) {
$output .= '<article class="blog-item swiper-slide">';
} else {
$output .= '<article class="blog-item">';
}
$output .= '<div class="holder">';
$output .= '<div class="bg-overlay"></div>';
$output .= get_the_post_thumbnail( get_the_ID(), array( 422, 350) );
$output .= '<div class="content-area">';

if($settings['blog_allow_categories']) { 
$category_link = get_category_link( get_the_category( $query->ID )[0]->cat_ID );            
$output .= '<div class="blog-category">' . get_the_category( $query->ID )[0]->name .'</div>';
}
if($settings['blog_allow_date']) {
$output .= '<span class="date">'.get_the_time('F d, Y').'</span>';
}
$output .= '<h6>' . get_the_title() . '</h6>';
 					
 					$excerpt = get_the_excerpt();
 					$excerpt = substr($excerpt, 0, $settings['max_ex']);
 					
 					if($settings['blog_allow_excerpt']) {
                    	$output .= '<p>'.$excerpt.'</p>';
                    } 
if($settings['blog_allow_read']) {
$output .= '<a class="read" href="' . get_the_permalink() . '">' . $settings['readmore_text'] . '</a>';
}
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';



              
       

