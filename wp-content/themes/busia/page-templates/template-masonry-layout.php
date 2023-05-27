<?php
/*
 Template Name: Masonry Layout
 */
?>
 <?php get_header(); ?>
<!-- wraper_blog_main -->
<div class="wraper_blog_main style-three morden-box-layout">
	<div class="container">
		<div class="row">
			<!-- row -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="blog_main">
					<div class="rt-masonry blog-posts">
						<?php
						$wp_query = new WP_Query(
							array(
								'post_type' => 'post',
								'order' => 'asc',
								'posts_per_page' => 9,
								// name of post type.
								'paged' => get_query_var( 'paged' ) ?: 1,
							)
						);
						$count = 1;
						while ( $wp_query->have_posts() ) :
							$wp_query->the_post();
							$count++;
							get_template_part( 'template-parts/content-blog-two', get_post_format() );
						endwhile;
						?>
					</div>
					<?php busia_pagination(); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</div>
	<!-- wraper_blog_main -->
	<?php
	get_footer();
