<?php
/**
 * Popup Video Template Style One
 *
 * @package Radiantthemes
 */
/*
$output .= '<div class="rt-popup-video element-' . esc_html( $settings['radiant_popup_video_style'] ) . '" data-popup-video-align="' . esc_attr( $settings['radiant_popup_video_alignment'] ) . '">';
$output .= '<div class="holder">';
$output .= '<div class="icon">';
$output .= '<a class="video-link video-link-popup"  href="' . esc_url( $settings['radiant_popup_video_link']['url'] ) . '" ' . $target . $nofollow . '>' . wp_get_attachment_image( $settings['radiant_attach_image']['id'], 'full' ) . '</a>';
$output .= '</div></div></div>';
*/
?>

<div id="video-box" class="rt-pop" data-auto="<?php echo esc_url( $settings['radiant_popup_video_link']['url'] );  ?>">
        <div class="video-img-box">
        	<?php echo wp_get_attachment_image( $settings['radiant_attach_image']['id'], 'full' ); ?>
        </div>
        <?php if($settings['v_type']=="Youtube"){ ?>
        <div class="vpop" data-type="youtube" data-id="<?php echo $settings['vid']; ?>" data-autoplay='true'> 
			<?php echo $settings['p-svg']; ?>
        </div>
        <?php } else { ?>
        <div class="vpop" data-type="vimeo" data-id="<?php echo $settings['vid']; ?>" data-autoplay='true'>
        	<?php echo $settings['p-svg']; ?>
        </div>
        <?php }?>	


        <!-- copy this stuff and down -->
        <div id="video-popup-overlay"></div>

        <div id="video-popup-container">
            <div id="video-popup-close" class="fade">&#10006;</div>
            <div id="video-popup-iframe-container">
                <iframe id="video-popup-iframe"></iframe>
            </div>
        </div>
    </div>