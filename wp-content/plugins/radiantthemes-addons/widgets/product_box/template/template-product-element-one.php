<?php
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
// START OF LAYOUT ONE.
if ( 'true' === $settings['product_allow_carousel'] ) {
	echo '<article class="product-item swiper-slide">';
} else {
	echo '<article class="product-item">';
}
?>
<div class="holder">
	<div class="pic">
		<?php
		if ( $product->is_on_sale() ) {
			echo '<span class="onsale"> Sale</span>';
		}
		$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' );
		echo '<a href="' . get_permalink( $product->get_id() ) . '">
			<img  src="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . '" alt="Product Image" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '" srcset="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . ' 1x, ' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'shop_single' )[0] . ' 2x" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '">
		</a>';
		echo '</div>';
		echo ' <div class="product-description">';
		echo '<div class="product-description-inner ">';
		//echo '<div class="action-buttons">' . do_shortcode( '[ti_wishlists_addtowishlist]' ) . '' . do_shortcode( '[yith_quick_view label="<span>Quick View</span>"]' ) . '</div>';
		if ( $average = $product->get_average_rating() ) :
			echo '<div class="star-rating" title="' . sprintf( __( 'Rated %s out of 5', 'dello' ), $average ) . '"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __( 'out of 5', 'dello' ) . '</span></div>';
		endif;
		echo '<div class="product-title"><a href="' . get_permalink( $product->get_id() ) . '">' . $product->get_title() . ' </a></div>';
		echo '<div class="price">' . $product->get_price_html() . '</div>';
		?>
		<?php if ( $product->is_type( 'variable' ) ) { ?>
			<div class="meta-wrapper">
				<?php //radiantthemes_shop_color(); ?>
			</div>
		<?php } ?>
		<?php
		if ( $product->is_type( 'variable' ) ) {
			echo '<div class="add-bag"><a href="' . $product->add_to_cart_url() . '">' . sprintf( 'Select Options', 'dello' ) . '</a></div>';
		} else {
			echo '<div class="add-bag">';
			do_action( 'radiantthemes_simple_add_to_cart' );
			echo '</div>';
		}
		?>
	</div>
	</div>
	</div>
</article>
<?php
if ( 'false' === $settings['product_allow_carousel'] ) {
	echo '</div>';
} else {
}
