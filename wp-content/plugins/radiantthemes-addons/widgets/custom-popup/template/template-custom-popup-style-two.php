<?php
/**
 * Custom Popup  Template Style Two
 *
 * @package Radiantthemes
 */
 $output .= ' <div class="rt-modal-div">';
             $output .= '<div id="rt-modal-container">';
                 $output .= '<div class="modal-background">';
                     $output .= '<div class="modal">'.$settings['custom_modal_content'].'<svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none">
                            <rect x="0" y="0" fill="none" width="226" height="162" rx="3" ry="3"></rect>
                        </svg></div>';
                 $output .= '</div>';
             $output .= '</div>';
             $output .= '<div class="content">';
                $output .= ' <div class="rt-modal-style-btn">';
                     $output .= '<div class="rtbtn-content-item">';
                         $output .= '<div class="modal-element-' . esc_attr( $settings['radiant_custom_popup_style'] ) . ' modal-element">';
                            $output .= ' <button class="rtbtn-content-button rtbtn-content-button-hyperion button" id="one"><span><span>' . esc_attr( $settings['radiant_custom_popup_btn_text'] ) . '</span></span></button>';
                         $output .= '</div>';

                     $output .= '</div>';
                $output .= ' </div>';
            $output .= ' </div>';
         $output .= '</div>';
 
 
 