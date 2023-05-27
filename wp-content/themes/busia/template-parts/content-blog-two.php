<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package busia
 */
?>
<div class="rt-grid">
	<div class="rt-image-box">
		<?php 
						 	$thumbnail_id = get_post_thumbnail_id( $post->ID );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
                            if ( $alt ) {
							    // Nothing to do here
							} else {
							    $alt = get_the_title();
							}
						
						 ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php esc_url( the_post_thumbnail_url( 'full' ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>" /></a>
	</div>
	<div class="rt-masonry-detail-box">
		<span class="rt-masonry-detail-author"><?php echo esc_html__( 'By ', 'busia' ); ?><?php the_author(); ?> </span><span class="rt-masonry-detail-date">  <?php the_time( ' F jS, Y' ); ?></span>
		<h4 class="rt-masonry-detail-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo the_title(); ?></a></h4>
	</div>
</div>
