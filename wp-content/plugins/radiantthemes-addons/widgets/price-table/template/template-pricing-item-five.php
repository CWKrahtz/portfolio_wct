<?php
/**
 * Template Style five Pricing Table
 *
 * @package RadiantThemes
 */

	echo'<div class="holder">';
	
	if ( $settings['pricing_table_spotlight_text']!="") {
   		echo' <div class="spotlight-tag"><p class="spotlight-tag-text">' . $settings['pricing_table_spotlight_text'] . '</p></div>';
    }	
		if ( ! empty( $settings['pricing_table_title'] ) ) {
	echo '<div class="plan-name">';
	echo ' <h5>' . $settings['pricing_table_title'] . '</h5>';
	echo '</div>';
	}
	if ( $settings['pricing_table_image_five'] ) {
	echo '<div class="icon">';
	echo wp_get_attachment_image( $settings['pricing_table_image_five']['id'], 'full' );
	echo '</div>';
	}

	echo '<div class="pricing">';
	if ( ! empty( $settings['pricing_table_price'] ) ) {
	echo ' <p class="price"><sup>' . $settings['pricing_table_currency_symbol'] . '</sup>' . $settings['pricing_table_price'] . '<sub>' . $settings['pricing_table_period'] . '</sub></p>';
	}
	if ( ! empty( $settings['pricing_table_tagline'] ) ) {
	echo'<p class="tagline">' . $settings['pricing_table_tagline'] . '</p>';
	}
	echo'</div>';
	echo'<div class="list matchHeight">';
	               echo '<ul>';
           foreach ( $settings['tabs'] as $index => $item ) :

              if ($item['add-img']=="yes") {
  $output1= '<div class="img-upload">';
  $output1 .= $item['svg'];
  $output1 .= '</div>';
} else{
    if($item['img1']['url']){
        $output1= '<div class="img-upload"><img alt="item" src="'.  $item['img1']['url'] . '">';
    $output1 .= '</div>';
    }
}  
echo '
      <li>'.$output1.' 
         ' . esc_html( $item['tab_title'] ) . '</li>';
        
            endforeach;
echo '</ul>';
	echo'</div>';
	echo'<div class="select-btn">';
	echo'<a ' . $target . $nofollow . ' class="btn" href="' . esc_url( $settings['pricing_table_button_link']['url'] )  . '"><span>' . $settings['pricing_table_button'] . '</span></a>';
	echo'</div>';
	echo'</div>';

