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
// START OF LAYOUT THREE
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
	//	echo '<div class="action-buttons"> ' . do_shortcode( '[ti_wishlists_addtowishlist]' ) . '' . do_shortcode( '[yith_quick_view label="<span>Quick View</span>"]' );
		if ( $product->is_type( 'simple' ) ) {
			echo '<div class="rt-add-to-cart">';
			do_action( 'radiantthemes_simple_add_to_cart' );
			echo '</div>';
		} else {
			echo '<a class="rt-add-to-cart"  href="' . $product->add_to_cart_url() . '"><i class="lnr-cart"></i></a>';
		}
		echo '</div>';
		$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' );
		echo '<a href="' . get_permalink( $product->get_id() ) . '">';
		echo '<img alt="custom-image" class="primary-img" src="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . '" alt="No Image Found" srcset="' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'medium' )[0] . ' 1x, ' . wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'shop_single' )[0] . ' 2x" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '">';
		echo '<img alt="custom-image" class="primary-hover-img" src="' . wp_get_attachment_image_src( $hoverimage, 'medium' )[0] . '" alt="Hover Image" srcset="' . wp_get_attachment_image_src( $hoverimage, 'medium' )[0] . ' 1x, ' . wp_get_attachment_image_src( $hoverimage, 'shop_single' )[0] . ' 2x" height="' . $image_attributes[2] . '" width="' . $image_attributes[1] . '">';
		echo '</a>';
		echo '</div>';
		echo '<div class="product-description">';
		echo '<div class="product-description-inner ">';
		$terms = get_the_terms( $post->ID, 'brand' );
		if ( $terms && ! is_wp_error( $terms ) ) :
			//only displayed if the product has at least one category
			$cat_links = array();
			foreach ( $terms as $term ) {
				$cat_links[] = $term->name;
			}
			$on_cat = join( ' ', $cat_links );
			echo '<p class="product-brand">' . $on_cat . '</p>';
		endif;
		if ( $average = $product->get_average_rating() ) :
			echo '<div class="star-rating" title="' . sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $average ) . '"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __( 'out of 5', 'woocommerce' ) . '</span></div>';
		endif;
		echo '<div class="product-title"><a href="' . get_permalink( $product->get_id() ) . '">' . $product->get_title() . '</a></div>';
		echo '<div class="price">' . $product->get_price_html() . '</div>';
		?>
		<div class="meta-wrapper">
			<?php //radiantthemes_shop_color(); ?>
		</div>
		<?php
		echo '</div>';
		echo ' </div>';
		echo '</div>';
		echo '</article>';
		if ( 'false' === $settings['product_allow_carousel'] ) {
			echo '</div>';
		} else {
		}
