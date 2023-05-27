<?php
// START OF LAYOUT SEVEN.
$t = get_post_meta( get_the_ID(), 'star_rating', true ); 
 if ( 'true' === $settings['testimonial_allow_carousel'] ) {
	if ( ! has_post_thumbnail() ) {
		$output .= '<div class="testimonial-item no-image swiper-slide">';
	} else {
		$output .= '<div class="testimonial-item swiper-slide">';
	}
} else {

	if ( ! has_post_thumbnail() ) {
		$output .= '<div data-thumb="<img src=\'' . plugins_url( 'radiantthemes-addons/assets/images/No-Thumbnail.jpg' ) . '\' alt=\'Thumbnail Image\'>" class="testimonial-item no-image">';
	} else {
		$output .= '<div data-thumb="<img src=\'' . esc_attr( get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) ) . '\' alt=\'Thumbnail Image\'>" class="testimonial-item">';
	}
}
$output .= '<div class="holder">';
$output .= '<div class="star-rating">';
for($i=0;$i<$t;$i++){
                $output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="14" height="14">
    <g> <g><polygon points="512,197.816 325.961,185.585 255.898,9.569 185.835,185.585 0,197.816 142.534,318.842 95.762,502.431
          255.898,401.21 416.035,502.431 369.263,318.842 " fill="#FAC01E"></polygon></g></g></svg>';
    } 
$output .= '</div>';
$output .= '<div class="testimonial-data">';
$output .= '<blockquote>';
$output .= '<p>"' . esc_attr( get_the_content() ) . '"</p>';
$output .= '</blockquote>';
$output .= '</div>';
$output .= '<div class="testimonial-title">';
$output .= '<div class="testimonial-title-pic">';
$output .= '<img class="testi-pic-three" height="145" width="145" src="' . get_the_post_thumbnail_url( get_the_ID() ) . '" alt="Testimonial Image"></div>';
$output .= '<div class="testimonial-title-data">';
$output .= '<h6 class="title">' . esc_attr( get_the_title() ) . '</h6>';
$output .= '<p class="designation">' . esc_attr( get_post_meta( get_the_ID(), '_testimonial_designation', true ) ) . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';