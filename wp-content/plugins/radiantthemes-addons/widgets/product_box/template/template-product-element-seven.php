<?php
$output          .= ' <article class="product-item">';
$output          .= '<div class="holder">';
$output          .= '<div class="pic">';
$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' );
$output          .= ' <a href="' . get_permalink( $product->get_id() ) . '">

<img class="primary-img" src="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . '" alt="No Image Found" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '" srcset="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . ' 1x, ' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'shop_single' )[0] . ' 2x" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '"></a>';
$output          .= ' </div>';
$output          .= '<div class="product-description">';
$output          .= '<div class="product-description-inner ">';
$output          .= '<h4 class="product-title"><a href="' . get_permalink( $product->get_id() ) . '">' . $product->get_title() . '</a></h4>';
$sale_price       = get_post_meta( get_the_ID(), '_price', true );
if ( $sale_price == '' ) {
} else {
	$output .= '<p class="price">' . $product->get_price_html() . '</p>';
}
$output .= ' <div class="action-buttons"><a  href="' . $product->add_to_cart_url() . '" class="rt-add-to-cart"><span>' . esc_html__( 'Add To Bag', 'dello' ) . '</span></a></div>';
$output .= '</div>';
$output .= '</div>';
$output .= ' </div>';
$output .= ' </article> ';
