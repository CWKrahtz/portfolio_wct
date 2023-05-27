<?php
/**
 * Custom Popup  Template Style Five
 *
 * @package Radiantthemes
 */
 
 
 $output .= '<div class="rt-modal-element-' . esc_attr( $settings['radiant_custom_popup_style'] ) . '">';
            $output .= '<input id="rt-modal-pop-trigger" type="checkbox" />';
           $output .= ' <label for="rt-modal-pop-trigger" class="rt-gradient-btn demo">' . esc_attr( $settings['radiant_custom_popup_btn_text'] ) . '</label>';
            $output .= '<div class="rt-modal-pop-overlay" role="dialog" aria-labelledby="-rt-modal-pop-title" aria-describedby="modal_desc">';
                $output .= '<div class="rt-modal-pop-wrap">';
                   $output .= ' <label for="rt-modal-pop-trigger">&#10006;</label>'.$settings['custom_modal_content'].' </div>';
            $output .= '</div>';
       $output .= ' </div>';
 

 
 

 