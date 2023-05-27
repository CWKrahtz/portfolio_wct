<?php
/**
 * Custom Popup  Template Style One
 *
 * @package Radiantthemes
 */
 
 $output .= '<div class="modal-element-' . esc_attr( $settings['radiant_custom_popup_style'] ) . ' modal-element">';
           $output .= ' <div class="radiantthemes-custom-button">';
                $output .= '<a href="#popup' . esc_attr( $settings['radiant_custom_popup_style'] ) . '" class="rt-case-btn rt-case-btn-swipe-hov" style="">';
                    $output .= '<span>
                        <span class="rt-text-btn" data-text="Switch Position">' . esc_attr( $settings['radiant_custom_popup_btn_text'] ) . '</span>';
						if($settings['add-svgicon']=="yes") {
                        $output .= '<span class="rt-case-btn-icon-box">' .  $settings['svgicon']  . '</span>';
	} 
	if($settings['add-svgimage']=="yes") {
		$output .= '<img src="'.  $settings['arrow_img']['url'] . '" alt="icon-image">';
	}
	
if($settings['add-svgicon_hover']=="yes") {
                       $output .= ' <span class="rt-case-btn-icon-box">' .  $settings['svgicon_hover']  . '</span>';
	} 
	if($settings['add-svgimage_hover']=="yes") {
		$output .= '<img src="'.  $settings['arrow_img_hover']['url'] . '" alt="icon-image">';
	}
	
                    $output .= '</span>';
               $output .= ' </a>';
            $output .= '</div>';

            $output .= '<div class="popup" id="popup' . esc_attr( $settings['radiant_custom_popup_style'] ) . '">';
                $output .= '<div class="popup-inner">';
                  $output .=  $settings['custom_modal_content'] ;
                    
                   $output .= ' <a class="popup-close" href="#">X</a>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
 


