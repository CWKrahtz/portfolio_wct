<?php
/**
 * Template for Blog Item Three.
 *
 * @package RadiantThemes
 */

// POST FORMAT QUOTE.
$output .= '<div class="col-lg-6 col-md-6 col-xs-12">';
$output .= '<!-- blog-item -->';
if ( 'yes' === $settings['blog_allow_carousel'] ) {
$output .= '<article class="blog-item swiper-slide">';
} else {
$output .= '<article class="blog-item">';
}
$output .= '<div class="holder matchHeight">';
$output .= '<div class="pic">';
$output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
$output .= '</div>';
$output .= '<div class="data">';

$output .= '<div class="blog-category-tab">';
$output .= '<ul>';

if($settings['blog_allow_date']) {
$output .= '<li>'.get_the_time('M d, Y').'</li>';
}

$output .= ' <li>/</li>';

if($settings['blog_allow_categories']) { 
$category_link = get_category_link( get_the_category( $query->ID )[0]->cat_ID );                      
$output .= '<li><a class="" href="' . $category_link .'">' . get_the_category( $query->ID )[0]->name .'</a></li>';
}


$output .= '</ul>';
$output .= '</div>';

//$output .= '<h6 class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6>';

$output .= '<h6 class="title"><a href="' . get_the_permalink() . '">' . get_the_title(). '</a></h6>';


$output .= '</div>';
$output .= '</div>';
$output .= '</article>';
$output .= '<!-- blog-item -->';
$output .= '</div>';



