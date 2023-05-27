<?php
global $product;
if ( 1 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box col-md-12">';
} elseif ( 2 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box col-md-6">';
} elseif ( 3 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box col-md-4">';
} elseif ( 4 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box col-md-3">';
} elseif ( 5 === $settings['product_no_row_items'] ) {
	echo '<div class="product-item-box colmd2">';
} else {
}
// START OF LAYOUT Eight
if ( 'true' === $settings['product_allow_carousel'] ) {
	echo '<article class="product-item swiper-slide">';
} else {
	echo '<article class="product-item">';
}
$hoverimage = get_post_meta( $product->get_id(), 'product_image_for_hover', true );
?>

<div class="holder">
	<div class="pic">
		<?php
		if ( $product->is_on_sale() ) {
			echo '<span class="onsale"> Sale</span>';
		}
	//	echo '<div class="action-buttons">' . do_shortcode( '[ti_wishlists_addtowishlist]' ) . '' . do_shortcode( '[yith_quick_view label="<span>Quick View</span>"]' ) . '</div>';
		if ( $product->is_on_sale() && ! is_admin() && ! $product->is_type( 'variable' ) ) {
			// Get product prices
			$regular_price = (float) $product->get_regular_price(); // Regular price
			$sale_price    = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)
			// "Saving price" calculation and formatting
			$saving_price  = $regular_price - $sale_price;
			$saving_price1 = ( $saving_price * 100 ) / $regular_price;
			$saving_price1 = round( $saving_price1 );
			echo '<div class="tag">' . $saving_price1 . '% Off</div>';
		}
		echo ' <a href="' . get_permalink( $product->get_id() ) . '">';
			$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' );
			echo '<img class="primary-img" src="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . '" alt="' . $product->get_title() . '" srcset="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . ' 1x, ' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'shop_single' )[0] . ' 2x" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '">';
			echo '<img class="primary-hover-img" src="' . wp_get_attachment_image_src( $hoverimage, 'medium' )[0] . '" alt="' . $product->get_title() . '" srcset="' . wp_get_attachment_image_src( $hoverimage, 'medium' )[0] . ' 1x, ' . wp_get_attachment_image_src( $hoverimage, 'shop_single' )[0] . ' 2x" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '">';
		echo '</a>';
		 if ( $product->is_type( 'variable' ) ) { 
						   echo '<div class="add-bag"><a href="'.$product->add_to_cart_url().'">Select Options</a></div>';
						  } else {
                           echo '<div class="add-bag"><a href="'.$product->add_to_cart_url().'">Add To Bag</a></div>';
						  }
		echo '</div>';
		echo '<div class="product-description">';
		echo '<div class="product-description-inner ">';
		echo '<div class="product-title"><a href="' . get_permalink( $product->get_id() ) . '">' . $product->get_title() . '</a> </div>';
		echo '<p class="price">' . $product->get_price_html() . '</p>';
		if ( $average = $product->get_average_rating() ) :
			echo '<div class="star-rating" title="' . sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $average ) . '"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"><strong class="rating">' . $average . '</strong> ' . __( 'out of 5', 'woocommerce' ) . '</span></div>';
		endif;
		?>
		<div class="meta-wrapper">
			<?php //radiantthemes_shop_color(); ?>
		</div>
		<?php
		echo '</div>';
		echo '</div>';
		echo ' </div>';
		echo '</article>';
		if ( 'false' === $settings['product_allow_carousel'] ) {
			echo '</div>';
		} else {
		}
