<?php
/**
 * Template for Case Studies Slider Style Two
 *
 * @package RadiantThemes
 */
$terms   = get_the_terms( get_the_ID(), 'case-study-category' );
  $output .= '<div class="swiper-slide">';
                        $output .= '<div class="card-image">';
                           $output .= ' <img src="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '" alt="Image Slider">';
                        $output .= '</div>';
                        $output .= '<div class="data-box">';
                            $output .= '<h2>' . get_the_title() . '</h2>';
                            $output .= '<div class="rt-course-hover">';
                                $output .= '<h2>' . wp_trim_words( get_the_excerpt(), 10, '...' ) . '</h2>';
                                $output .= '<p><a href="' . get_the_permalink() . '" class="view_btn view_btn-simple">Make an Appointment</a></p>';

                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';


