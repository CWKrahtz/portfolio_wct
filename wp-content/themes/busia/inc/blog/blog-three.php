<?php
/**
 * Template for Blog Three
 *
 * @package busia
 */
?>
<!-- wraper_blog_main -->
<div class="wraper_blog_main style-three morden-box-layout blog-three">
	<div class="container">
		<!-- row -->
		<div class="row">
			<?php if ( 'nosidebar' === get_theme_mod( 'blog-layout' ) ) { ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php } else { ?>
				<?php if ( 'leftsidebar' === get_theme_mod( 'blog-layout' ) ) { ?>
					<?php if ( 'three-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
						<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 float-right">
					<?php } elseif ( 'four-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 float-right">
					<?php } elseif ( 'five-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
						<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 float-right">
					<?php } ?>
				<?php } elseif ( 'rightsidebar' === get_theme_mod( 'blog-layout' ) ) { ?>
					<?php if ( 'three-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
						<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 float-left">
					<?php } elseif ( 'four-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 float-left">
					<?php } elseif ( 'five-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
						<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 float-left">
					<?php } ?>
				<?php } else { ?>
					<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
				<?php } ?>
			<?php } ?>
					<!-- blog_main -->
					<div class="blog_main blog element-one blog-modern">
						<div class="blog-posts rt-modern">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									get_template_part( 'template-parts/content-blog-three', get_post_format() );
								endwhile;
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;
							?>
						</div>
					<?php busia_pagination(); ?>
					</div>
					<!-- blog_main -->
				</div>
				<?php if ( 'nosidebar' === get_theme_mod( 'blog-layout' ) ) { ?>
				<?php } else { ?>
					<?php if ( 'leftsidebar' === get_theme_mod( 'blog-layout' ) ) { ?>
						<?php if ( 'three-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
							<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 float-left">
						<?php } elseif ( 'four-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 float-left">
						<?php } elseif ( 'five-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
							<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 float-left">
						<?php } ?>
					<?php } elseif ( 'rightsidebar' === get_theme_mod( 'blog-layout' ) ) { ?>
						<?php if ( 'three-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
							<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 float-right">
						<?php } elseif ( 'four-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 float-right">
						<?php } elseif ( 'five-grid' === get_theme_mod( 'blog-layout-sidebar-width', 'three-grid' ) ) { ?>
							<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 float-right">
						<?php } ?>
					<?php } else { ?>
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<?php } ?>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
			<!-- row -->
		</div>
	<!-- wraper_blog_main -->
