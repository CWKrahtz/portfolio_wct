<?php
/**
 * Template for Blog Item Four.
 *
 * @package RadiantThemes
 */

// POST FORMAT STANDARD.
$output .= '<!-- blog-item -->';
if ( 'yes' === $settings['blog_allow_carousel'] ) {
$output .= '<article class="blog-item swiper-slide">';
} else {
$output .= '<article class="blog-item">';
}
$output .= '<div class="holder">';
$output .= '<div class="pic">';
$output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';


$output .= '<div class="blog-desc">';
                     $output .= '<div class="blog-category-tab">';
                      $output .= '<ul>';
            if($settings['blog_allow_categories']) { 
                        $category_link = get_category_link( get_the_category( $query->ID )[0]->cat_ID );            
                        $output .= '<li><a class="" href="' . $category_link .'">' . get_the_category( $query->ID )[0]->name .'</a></li>';
                       $output .= ' <li></li>';
            }
                     $output .= '</ul>';
                    $output .= '</div>';


$output .= '</div>';

$output .= '</div>';

$output .= '<div class="data">';

$output .= '<div class="blog-title">';
                    $output .= '<div class="blog-title-pic">'.get_avatar( get_the_author_meta( 'email' ), '150', '', 'Author Image' ).'</div>';
         if($settings['blog_allow_author']) { 
                    $output .= ' <div class="blog-title-data"> ';
                        $output .= '<h6 class="author">'. get_the_author() .'</h6>';
                    $output .= ' </div>';
          }
                  $output .= '</div>';

if($settings['blog_allow_date']) {
  //$output .= '<li>'.get_the_time('F d, Y').'</li>';
  $output .= '<p class="date">' .get_the_time('F d, Y'). '</p>';
}

  $output .= '<h6 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6>';
        
       // $output .= '<a class="read" href="' . get_the_permalink() . '">' . $settings['readmore_text'] . '</a>';

      $output .= '</div>';
    $output .= '</div>';
  $output .= '</article>';
$output .= '<!-- blog-item -->';
