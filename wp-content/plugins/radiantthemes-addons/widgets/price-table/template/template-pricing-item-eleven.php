<?php
/**
 * Template Style Eleven Pricing Table
 *
 * @package RadiantThemes
 */
 
 
            echo'<div class="holder" style="background-image:url('. wp_get_attachment_image_url( $settings['pricing_table_image_eleven']['id'], 'full' ).'); background-repeat: no-repeat; background-size: cover; border-radius: 20px;">';
              echo'<div class="heading">';
			  if ( ! empty( $settings['pricing_table_title'] ) ) {
              echo'<h3 class="rt-pricing-title">' . $settings['pricing_table_title'] . '</h3>';
			  }
              echo'</div>';
              
             echo' <div class="rt-list">';
               echo' <p>' . $settings['pricing_table_subtitle'] . '</p>';
				if ( ! empty( $settings['pricing_table_price'] ) ) {
                echo'<div class="rt-price">' . $settings['pricing_table_currency_symbol'] . ' ' . $settings['pricing_table_price'] . '<span class="rt-supsub">';
                
                    echo'<sup class="rt-superscript">/ ' . $settings['pricing_table_period'] . '</sup>';
                  echo'</span>';
                echo'</div>';
				}
             echo' </div>';

              echo'<div class="rt-content-list matchHeight">';
                echo $settings['content'];
              echo'</div>';
              
              echo'<div class="rt-price-demo"><a href="' . $settings['pricing_table_button_link'] . '">' . $settings['pricing_table_button'] . '</a>';
                  echo'<span class="rt-supsub">';
                    echo'<sup class="rt-subscript">';
                      echo'<a href="' . $settings['pricing_table_button_link'] . '" class="rt-action"><i class="fa fa-chevron-right"></i></a>';
                    echo'</sup>';
                  echo'</span>';
                echo'</div>';

           echo' </div>';
          

 