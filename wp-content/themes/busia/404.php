<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package radiantthemes
 */
get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<!-- wraper_error_main -->
		<div class="wraper_error_main style-one">
			<!-- START OF 404 STYLE ONE CONTENT -->
			<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- error_main -->
							<div class="error_main">
									<!-- radiantthemes-content -->
									<?php if ( get_theme_mod( 'page_not_found_editor') ) { ?>
									<?php echo wp_kses( get_theme_mod( 'page_not_found_editor'), 'rt-content' ); ?>
									<?php } else { ?>
									<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/assets/images/customizer/404-page.svg" alt="<?php echo esc_html__( '404 image', 'busia' ); ?>" />
									<h3><?php echo esc_html( 'OOPS! Nothing Was Found', 'busia') ;?></h3>
									<h6><?php echo esc_html( 'The page you are looking for might have been removed had it’s name changed or is temporarily unavailable', 'busia') ;?></h6>
									<?php }?>
									<!-- radiantthemes-content -->
									<!-- radiantthemes-button-link -->
									<?php if ( get_theme_mod( 'page_not_found_button_text') ) { ?>
										<a class="btn" href="<?php echo esc_url( home_url() ); ?>"><span><?php echo esc_html( get_theme_mod( 'page_not_found_button_text') ); ?></span></a>
									<?php } else { ?>	
										<a class="btn" href="<?php echo esc_url( home_url() ); ?>"><span><?php echo esc_html( 'Back To Home', 'busia' ); ?></span></a>
									<?php } ?>
									<!-- radiantthemes-button-link -->
							</div>
							<!-- error_main -->
						</div>
					</div>
					<!-- row -->
				</div>
				<!-- END OF 404 STYLE ONE CONTENT -->
		</div>
		<!-- wraper_error_main -->
	</main><!-- #main -->
</div><!-- #primary -->
<?php
	get_footer();
