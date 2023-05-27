<?php
/**
 * Template Style 8 for Team
 *
 * @package RadiantThemes

 */
  if ( 'true' === $settings['team_allow_carousel'] ) {
  $output .= '<div class="team-item swiper-slide ">';
 }else {
  $output .= '<div class="team-item">';
 }

                $output .= '<div class="team-hoverfx">
                    <div class="team-data">
                        <a href="' . get_the_permalink() . '">
                            <h3>' . get_the_title() . '</h3>
                        </a>';
                        $terms   = get_the_terms( get_the_ID(), 'profession' );
    if ( ! empty( $terms ) ) {
                      foreach ( $terms as $term ) {
                       $output .= '<p>' . $term->name . '</p>';
                      }
    }         
                    $output .= '</div>
                    <div class="team-figure">
                         <ul>';
                                if ( ! empty( get_post_meta( get_the_ID(), '_team_facebook', true ) ) ) {
                                    $output .= ' <li><a href="' . get_post_meta( get_the_ID(), '_team_facebook', true ) . '"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 17 17">
                                                    <g>
                                                    </g>
                                                    <path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z" fill=""></path>
                                                </svg></span></a></li>';

                                       }
                                   if ( ! empty( get_post_meta( get_the_ID(), '_team_twitter', true ) ) ) {
                                
                                    $output .='<li><a href="' . get_post_meta( get_the_ID(), '_team_twitter', true ) . '"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 17 17">
                                                    <g>
                                                    </g>
                                                    <path d="M15.253 5.038c0.011 0.151 0.011 0.302 0.011 0.454 0 4.605-3.506 9.912-9.913 9.912-1.974 0-3.808-0.572-5.351-1.564 0.281 0.032 0.551 0.042 0.842 0.042 1.629 0 3.127-0.55 4.325-1.488-1.532-0.032-2.815-1.036-3.257-2.417 0.215 0.032 0.431 0.054 0.656 0.054 0.314 0 0.627-0.043 0.918-0.118-1.596-0.324-2.794-1.726-2.794-3.419 0-0.011 0-0.033 0-0.043 0.464 0.258 1.003 0.42 1.575 0.442-0.938-0.626-1.553-1.694-1.553-2.901 0-0.647 0.173-1.241 0.475-1.759 1.715 2.115 4.293 3.496 7.184 3.646-0.055-0.259-0.087-0.529-0.087-0.799 0-1.919 1.554-3.483 3.484-3.483 1.003 0 1.909 0.42 2.546 1.1 0.787-0.151 1.541-0.442 2.211-0.841-0.259 0.809-0.809 1.489-1.532 1.919 0.702-0.075 1.381-0.269 2.007-0.539-0.475 0.69-1.068 1.306-1.747 1.802z" fill=""></path>
                                                </svg></span></a></li>';
                                            }    
                                         if ( ! empty( get_post_meta( get_the_ID(), '_team_pinterest', true ) ) ) {
                                     $output .= '
                                    <li><a href="' . get_post_meta( get_the_ID(), '_team_pinterest', true ) . '"><span class="icon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 17 17">
                                                    <g>
                                                    </g>
                                                    <path d="M13 0h-9c-2.2 0-4 1.8-4 4v9c0 2.2 1.8 4 4 4h9c2.2 0 4-1.8 4-4v-9c0-2.2-1.8-4-4-4zM16 13c0 1.654-1.346 3-3 3h-9c-1.654 0-3-1.346-3-3v-6h3.207c-0.286 0.61-0.457 1.283-0.457 2 0 2.619 2.131 4.75 4.75 4.75s4.75-2.131 4.75-4.75c0-0.717-0.171-1.39-0.457-2h3.207v6zM12.25 9c0 2.068-1.682 3.75-3.75 3.75s-3.75-1.682-3.75-3.75 1.682-3.75 3.75-3.75 3.75 1.682 3.75 3.75zM12.152 6c-0.872-1.059-2.176-1.75-3.652-1.75s-2.78 0.691-3.652 1.75h-3.848v-2c0-1.654 1.346-3 3-3h9c1.654 0 3 1.346 3 3v2h-3.848zM14.454 2.722v1.298c0 0.299-0.244 0.543-0.542 0.543h-1.368c-0.3-0.001-0.544-0.245-0.544-0.543v-1.298c0-0.299 0.244-0.543 0.544-0.543h1.368c0.298 0 0.542 0.244 0.542 0.543z" fill="" />
                                                </svg></span></a></li>';
                                              }

if ( ! empty( get_post_meta( get_the_ID(), '_team_dribble', true ) ) ) {
                                     $output .= '
                                    <li><a href="' . get_post_meta( get_the_ID(), '_team_pinterest', true ) . '"><span class="icon"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 17 17">
    <g>
    </g>
    <path d="M8.5 0c-4.694 0-8.5 3.806-8.5 8.5s3.806 8.5 8.5 8.5 8.5-3.806 8.5-8.5-3.806-8.5-8.5-8.5zM15.994 8.621c-2.075-0.456-3.896-0.423-5.469-0.092-0.251-0.627-0.536-1.273-0.849-1.93 1.681-0.648 3.292-1.586 4.548-2.934 1.106 1.308 1.776 2.994 1.776 4.835 0 0.041-0.006 0.080-0.006 0.121zM13.523 2.947c-1.16 1.257-2.688 2.135-4.297 2.74-0.76-1.468-1.69-2.96-2.814-4.385 0.664-0.193 1.363-0.302 2.088-0.302 1.934 0 3.692 0.742 5.023 1.947zM5.43 1.665c1.133 1.397 2.062 2.884 2.828 4.353-2.974 0.92-5.966 1.028-7.114 1.030 0.474-2.407 2.104-4.4 4.286-5.383zM1 8.5c0-0.151 0.014-0.3 0.022-0.449 0.065 0.001 0.134 0.001 0.212 0.001 1.306 0 4.402-0.125 7.482-1.114 0.3 0.625 0.578 1.245 0.82 1.844-3.605 1.101-5.736 3.705-6.513 4.826-1.251-1.34-2.023-3.133-2.023-5.108zM3.758 14.304c0.596-0.901 2.601-3.518 6.145-4.57 0.961 2.598 1.405 4.744 1.566 5.651-0.911 0.394-1.914 0.615-2.969 0.615-1.798 0-3.449-0.637-4.742-1.696zM12.4 14.894c-0.198-1.063-0.636-3.042-1.503-5.405 1.444-0.28 3.109-0.288 5.008 0.145-0.341 2.226-1.658 4.129-3.505 5.26z" fill="" />
</svg></span></a></li>';
                                              }

                                $output .= '</ul>
                    </div>


                    <div class="team-overlay">
                    </div>
                    <img src="'. get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '" alt="' . get_the_title() . '">
                    <div class="team_detail_bx">
                       <p>' . $term->name . '</p>
                    </div>
                </div>
            </div>';
