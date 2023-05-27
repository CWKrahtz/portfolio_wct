<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package busia
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
	<div class="entry-blog-content">
		<div class="post-meta">
			<span class="date"><?php echo get_the_time( 'F d, Y' ); ?></span>
			<header class="entry-header">
				<h2 class="entry-title"><?php the_title(); ?></h2>
			</header><!-- .entry-header -->
			<div class="entry-extra-item">
			<?php if ( get_theme_mod( 'display_categries', 1 ) ) { ?>
			
				<div class="tag-name">
					<?php
					$category_detail = get_the_category( get_the_id() );
					$result          = '';
					foreach ( $category_detail as $item ) :
						$category_link = get_category_link( $item->cat_ID );
						$result       .= '<a href = "' . esc_url( $category_link ) . '">' . $item->name . '</a>';
						endforeach;
						echo wp_kses( $result, 'post' );
					?>
				</div>
				<?php }?>
				<?php if ( get_theme_mod( 'display_author_information' ,1 ) ) { ?>
				
				<span class="rt-author"><?php esc_attr_e( 'By', 'busia' ); ?> <?php the_author(); ?></span>
				<?php }?>
				<span class="comment">
					<?php
					if ( 0 === get_comments_number() || '0' === get_comments_number() ) {
						echo esc_html__( '0 Comments', 'busia' );
					} elseif ( 1 === get_comments_number() || '1' === get_comments_number() ) {
						echo esc_html__( '1 Comment', 'busia' );
					} else {
						echo get_comments_number() . ' ' . esc_html__( 'Comments', 'busia' );
					}
					?>
				</span>
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post-thumbnail ">
					<?php the_post_thumbnail( 'full' ); ?>
				</div><!-- .post-thumbnail -->
			<?php } ?>
		</div>
	</div>
	<div class="entry-main">
		<div class="entry-content default-page">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. */
						__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'busia' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'busia' ),
					'after'  => '</div>',
				)
			);
			?>
			<div class="clearfix"></div>
		</div><!-- .entry-content -->
	</div><!-- .entry-main -->
</article><!-- #post-## -->
