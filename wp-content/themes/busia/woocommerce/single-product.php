<?php
/**
 * Template Single Product
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
get_header( 'shop' ); ?>
<div class="wraper_shop_single style-one">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- START SHOP SINGLE CONTENT -->
						<?php include get_parent_theme_file_path( 'woocommerce/shop-details-box/shop-details-box-style-one.php' ); ?>
						<!-- END SHOP SINGLE CONTENT -->
					</div>
				</div>
				<!-- row -->
			</div>
		</div>
<?php
get_footer( 'shop' );
