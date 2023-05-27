<?php
/**
 * Template for Portfolio Style Metro
 *
 * @package RadiantThemes
 */

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



 $output = '<div class="rt-portfolio-box rt-port-metro">';
   $radiant_portfolio_max_posts = ( $settings['radiant_portfolio_max_posts'] ? $settings['radiant_portfolio_max_posts'] : -1 );       

global $wp_query;
$args     = array(
	'post_type'      => 'portfolio',
		'posts_per_page' => esc_attr( $radiant_portfolio_max_posts ),
	'orderby'        => esc_attr( $settings['radiant_portfolio_looping_order'] ),
	'order'          => esc_attr( $settings['radiant_portfolio_looping_sort'] ),
	'tax_query'      => $portfolio_category,
);
$my_query = null;
$my_query = new WP_Query( $args );
$t=1;
if ( $my_query->have_posts() ) {
	while ( $my_query->have_posts() ) :
		$my_query->the_post();
		$c="";
        if($t==1|| $t==3 || $t==7 || $t==8){ $c=" box-square";}
		if($t==2|| $t==4 || $t==5|| $t==6){ $c=" box-tall";}
		//if($t==12 ){ $c=" box-tall";}
		// include file with color sanitization functions.
		if ( ! function_exists( 'sanitize_hex_color' ) ) {
			include_once ABSPATH . 'wp-includes/class-wp-customize-manager.php';
		}

		// fetch and sanitize the colors.
		$background_color = sanitize_hex_color( get_post_meta( get_the_id(), 'radiant_pc_primary_color', true ) );

      $output .= ' <div class="rt-portfolio-box-item '.$c.'">';
      $output .= '<img src="' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . '" alt="metro">';
          $output .= ' <div class="rt-portfolio-box-content" style="background:' . esc_attr( $background_color ) . '">
              <div class="rt-portfolio-box-content-inner">';
              $output .= ' 
                <h4 class="portfolio-title">';
                 $output .= get_the_title(); 
                 $output .= ' </h4> ';
                 $cats    = get_the_terms( get_the_ID(), 'portfolio-category' );
					foreach ( $cats as $cat ) {
					$term_id    = $cat->term_id;
					$ptype_name = $cat->name;
					$ptype_des  = $cat->description;
					$ptype_slug = $cat->slug;
					$term_link  = get_term_link( $cat );
					
                     $output .= ' <p class="portfolio-category">'.$ptype_name.'</p>';
					  
					  }

               
              $output .= '</div>
           </div>';
           $output .= '<a class="portfolio-link" href="' . get_the_permalink() . '"></a>
         
      </div>';
     if($t==14){$t=0;}
     $t++;  
	endwhile;
}
$output .= '</div>';