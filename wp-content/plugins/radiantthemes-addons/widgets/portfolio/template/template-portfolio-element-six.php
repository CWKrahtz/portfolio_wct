<?php
/**
 * Template for Portfolio Style six
 *
 * @package RadiantThemes
 */
$tem = 1; 
$j = 0;
$k = 1;
if ( empty( $settings['radiant_portfolio_category'] ) ) {
	$portfolio_category = '';
} else {
	$portfolio_category = array(
		array(
			'taxonomy' => 'portfolio-category',
			'terms'    => $settings['radiant_portfolio_category'],
		),
	);
	$hidden_filter      = 'hidden';
}
$output  = '<!-- rt-portfolio-box -->';
$output .= '<div class="rt-portfolio-box element-six row">';
// WP_Query arguments.
global $wp_query;
$args     = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => esc_attr( $settings['radiant_portfolio_max_posts'] ),
	'orderby'        => esc_attr( $settings['radiant_portfolio_looping_order'] ),
	'order'          => esc_attr( $settings['radiant_portfolio_looping_sort'] ),
	'tax_query'      => $portfolio_category,
);
$my_query = null;
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio-category' );

		$output .= '<div class="'.$class.'">
               <article class="rt-portfolio-box-item">
                  <div class="holder">
                     <div class="pic">
                        <img src="' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '" alt="No Image Found">
                     </div>
                     <div class="rt-portfolio-box-content">
                        <a class="portfolio-link" href="' . get_the_permalink() . '"></a>
                        <div class="rt-portfolio-box-content-inner"><div class="rt-portfolio-box-content-inner-holder">';
                        $cats    = get_the_terms( get_the_ID(), 'portfolio-category' );
			foreach ( $cats as $cat ) {
				$term_id    = $cat->term_id;
				$ptype_name = $cat->name;
				$ptype_des  = $cat->description;
				$ptype_slug = $cat->slug;
				$term_link  = get_term_link( $cat );
				$output    .= '<span class="portfolio-category">';
				$output    .= $ptype_name;
				$output    .= '</span>';
			}
                           $output .='
                           <h4 class="portfolio-title">
                           <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                              
                           </h4>
                           </div> 
                        </div>
                     </div>

                  </div>  
               </article>
            </div>';

		

	endwhile;
}
$output .= '</div><!-- rt-portfolio-box -->';
