<?php
/**
 * Template Style One Pricing Table
 *
 * @package RadiantThemes
 */


                 $output .= '<div class="holder t">';
                 if ( $settings['pricing_table_highlight'] ) {
   echo' <div class="spotlight-tag"><p class="spotlight-tag-text">' . $settings['pricing_table_spotlight_text'] . '</p></div>';
    
}
                    if ( ! empty( $settings['pricing_table_title'] ) ) {
	$output .= '<h4>' . $settings['pricing_table_title'] . '</h4>';
}
                 if ( ! empty( $settings['pricing_table_price'] ) ) {
                    $output .= '<h5><sup>'.$settings['pricing_table_currency_symbol'].'</sup>'.
                    $settings['pricing_table_price'].'
                    <sub>'.$settings['pricing_table_period'].'</sub>

                    </h5>';
                }
                    if ( ! empty( $settings['pricing_table_subtitle'] ) ) {
	$output .= '<div class="rt-package">' . $settings['pricing_table_subtitle'] . '</div>';
}
        $output .= '<ul>';
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
$output .= '
      <li>'.$output1.' 
         ' . esc_html( $item['tab_title'] ) . '</li>';
        
            endforeach;
$output .= '</ul>';
                   //$output     .= $settings['content'];


                    $output .= '<div class="butn_area">';
                       
                        $output .= '<a ' . $target . $nofollow . ' class="gen_btn" href="'. esc_url( $settings['pricing_table_button_link']['url'] ) . '"><span>' . $settings['pricing_table_button'] . '</span></a>';
                     $output .= '</div>
                </div>';













echo $output;
