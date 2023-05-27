<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $product;
global $post;
$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
if ( ! $short_description ) {
    return;
}
?>
<?php if ( $product->is_in_stock() ) { ?>
<p class="in-stock"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1 17l-5-5.299 1.399-1.43 3.574 3.736 6.572-7.007 1.455 1.403-8 8.597z"/></svg><?php echo wp_kses_post( $product->get_stock_quantity() ); ?> <?php echo esc_html__( 'In Stock', 'busia' ); ?></p>
<?php } else { ?>
<p class="out-of-stock"><?php echo esc_html__( 'Out of Stock', 'busia' ); ?></p>
<?php } ?>
<div class="woocommerce-product-details__short-description">
    <?php echo wp_kses( $short_description, 'busia' ) ; // WPCS: XSS ok. ?>
</div>
<p class="product-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></p>