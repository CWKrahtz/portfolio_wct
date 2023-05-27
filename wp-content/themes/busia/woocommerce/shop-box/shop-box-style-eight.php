<?php
/**
 * Shop Box Style Eight Template
 *
 * @package busia
 */
?>
<!-- radiantthemes-shop-box style-eight -->
<div <?php post_class( 'radiantthemes-shop-box  style-eight' ); ?>>
	<div class="holder">
		<div class="pic">
			
		
			<?php if ( $product->is_on_sale() ) { ?>
			<span class="onsale"><?php echo esc_html__( 'Sale', 'busia' ); ?></span>
			<?php } ?>
			<a href="<?php echo get_permalink( $product->get_id() ); ?>">
				<?php 
						 	$thumbnail_id = get_post_thumbnail_id( $product->get_id() );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
                            if ( $alt ) {
							    // Nothing to do here
							} else {
							    $alt = get_the_title();
							}
						
						 ?>
				<img class="primary-img" src="<?php the_post_thumbnail_url( 'woocommerce_thumbnail' ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
				<img class="primary-hover-img" src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'woocommerce_thumbnail' )[0]; ?>" alt="<?php echo esc_attr( $alt ); ?>" />
			</a>
			<div class="add-bag">
				<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="rt-add-to-cart">
					<span>
						<?php
						if ( $product->is_type( 'variable' ) ) {
							echo esc_html__( 'Select Options', 'busia' );
						} else {
							echo esc_html__( 'Add to Cart', 'busia' );
						}
						?>
					</span>
				</a>
			</div>
		</div>
		<div class="product-description">
			<div class="product-description-inner ">
			    
				<a href="<?php echo get_permalink(); ?>">
					<?php
					/**
					 * Woocommerce Shop Loop Item Title hook.
					 * woocommerce_shop_loop_item_title hook.
					 *
					 * @hooked woocommerce_template_loop_product_title - 10
					 */
					do_action( 'woocommerce_shop_loop_item_title' );
					?>
				</a>
				<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
				<?php
				if ( $average = $product->get_average_rating() ) :
					echo '<div class="star-rating" title="' . sprintf( __( 'Rated %s out of 5', 'busia' ), $average ) . '"><span style="width:' . ( ( $average / 5 ) * 100 ) . '%"><strong class="rating">' . $average . '</strong> ' . __( 'out of 5', 'busia' ) . '</span></div>';
				endif;
				?>
				<div class="meta-wrapper">
					<?php //radiantthemes_shop_color(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- radiantthemes-shop-box style-eight -->
