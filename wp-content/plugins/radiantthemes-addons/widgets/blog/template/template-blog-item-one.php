<?php
/**
 * Template for Blog Item One.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output                 .= '<!-- blog-item -->';
  if ( 'yes' === $settings['blog_allow_carousel'] ) {
$output .= '<article class="blog-item swiper-slide matchHeight">';
} else {
$output                 .= '<article class="blog-item matchHeight">';
}
  
 $output .= '<div class="holder" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ')">';
            
            if($settings['blog_allow_author']) {       
                  $output .= '<div class="blog-title">';
                   
                   $output .= '<div class="blog-title-pic">'.get_avatar( get_the_author_meta( 'email' ), '150', '', 'Author Image' ).'</div>';
                    
                    $output .= ' <div class="blog-title-data"> ';
                        $output .= '<h5 class="title">'. get_the_author() .'</h5>';
                    $output .= ' </div>';
                          
                  $output .= '</div>';
              }      

                  $output .= '<div class="blog-desc">';
                     $output .= '<div class="blog-category-tab">';
                      $output .= '<ul>';
            if($settings['blog_allow_categories']) { 
                        $category_link = get_category_link( get_the_category( $query->ID )[0]->cat_ID );            
                        $output .= '<li><a class="" href="' . $category_link .'">' . get_the_category( $query->ID )[0]->name .'</a></li>';
                       $output .= ' <li>/</li>';
            }
            if($settings['blog_allow_date']) {
                        $output .= '<li>'.get_the_time('F d, Y').'</li>';
            }
                     $output .= '</ul>';
                    $output .= '</div>';
                     $output .= '<div class="blog-desc-exrpt">';
                      $output .= '<h6><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6>';
                    $output .= ' </div>';
                 $output .= ' </div>';

               $output .= '</div> ';
  
  $output .= '</article>';
  