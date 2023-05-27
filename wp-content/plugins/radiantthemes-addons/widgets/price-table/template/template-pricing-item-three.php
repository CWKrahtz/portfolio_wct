<?php
/**
 * Template Style Three Pricing Table
 *
 * @package RadiantThemes
 */

echo'<div class="holder">';
if ( $settings['pricing_table_spotlight_text'] ) {
    echo'<div class="hightlight-tag">' . $settings['pricing_table_spotlight_text'] . '</div>';
}

    echo '<div class="icon-box">';
	if ( $settings['pricing_table_image'] ) {
       echo ' <div class="icon">';
           echo wp_get_attachment_image( $settings['pricing_table_image']['id'], 'full' );
        echo '</div>';
	}

      echo '  <div class="pricing">';
		if ( ! empty( $settings['pricing_table_title'] ) ) {
            echo'<div class="title">' . $settings['pricing_table_title'] . '</div>';
		}
		if ( ! empty( $settings['pricing_table_price'] ) ) {
            echo'<div  class="price">' . $settings['pricing_table_currency_symbol'] . $settings['pricing_table_price'] . '<sub class="csub2">' . $settings['pricing_table_period'] . '</sub></div>';
		}
		if ( ! empty( $settings['pricing_table_tagline'] ) ) {
    echo'<p class="tagline">' . $settings['pricing_table_tagline'] . '</p>';
}
        echo '</div>';
   echo ' </div>';


    echo'<div class="heading">';

if ( ! empty( $settings['pricing_table_subtitle'] ) ) {
    echo'<div  class="subtitle">' . $settings['pricing_table_subtitle'] . '</div>';
}
    echo '</div>';
    


    echo '<div class="list">';
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
    echo '</div>';
    
    echo '<div class="more">';
    echo'<a  ' . $target . $nofollow . ' class="btn" href="' . esc_url( $settings['pricing_table_button_link']['url'] )  . '"><span>' . $settings['pricing_table_button'] . '</span></a>';
    echo '</div>';
    echo '</div>';





