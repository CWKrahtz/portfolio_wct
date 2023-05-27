<?php
/**
 * Template Style Eleven Pricing Table
 *
 * @package RadiantThemes
 */
 echo'<div class="holder">';
 if ( $settings['pricing_table_spotlight_text'] ) {
   	  			echo'<div class="spotlight-tag"><p class="spotlight-tag-text">' . $settings['pricing_table_spotlight_text'] . '</p></div>';
					}
            echo'<div class="heading">';
			 if ( ! empty( $settings['pricing_table_title'] ) ) {
   	  			echo'<h3 class="rt-pricing-title">' . $settings['pricing_table_title'] . '</h3>';
			 }
           echo' </div>';
   	  		    echo'<div class="rt-list">';
            		echo'<p>' . $settings['pricing_table_subtitle'] . '</p>';
              echo'</div>';

              echo'<div class="rt-content-list matchHeight">';
            	    echo $settings['content'];
            	echo'</div>';
if ( ! empty( $settings['pricing_table_price'] ) ) {
            	 echo'<div class="rt-price">' . $settings['pricing_table_currency_symbol'] . '' . $settings['pricing_table_price'] . '';
            	 	echo'<span class="rt-supsub">';
            	 		echo'<sup class="rt-superscript">' . $settings['pricing_table_period1'] . '</sup>';
            	 		echo'<sub class="rt-subscript">' . $settings['pricing_table_period'] . '</sub>';
            	 	echo'</span>';
            	 echo'</div>';
}
            	 echo'<div class="rt-pricing-button">';
                    echo'<a href="' . $settings['pricing_table_button_link'] . '" class="rt-action"><i class="fa fa-chevron-right"></i></a>';
                 echo'</div>';
                echo'</div>';
 

 