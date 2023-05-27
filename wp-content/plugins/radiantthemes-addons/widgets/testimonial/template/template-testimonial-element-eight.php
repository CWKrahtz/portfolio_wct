<?php
/**
 * Testimonial Template Style Eight
 *
 * @package Radiantthemes
 */

// START OF LAYOUT EIGHT.
if ( 'true' === $settings['testimonial_allow_carousel'] ) {
$output .= '<div class="testimonial element-eight swiper-slide">';
} else {
$output .= '<div class="testimonial element-eight">';
}
$output .= '<div class="holder">';
$output .= '<div class="testimonial-data">';
$output .= '<blockquote>';
$output .= '<p>"' . esc_attr( get_the_content() ) . '"</p>';
$output .= '</blockquote>';
$output .= '</div>';
$output .= '<div class="testimonial-title">';
$output .= '<div class="testimonial-title-data">';
$output .= '<h6 class="title">' . esc_attr( get_the_title() ) . '</h6>';
$output .= '<p class="designation">' . esc_attr( get_post_meta( get_the_ID(), '_testimonial_designation', true ) ) . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
