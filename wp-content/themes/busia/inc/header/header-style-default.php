<?php
/**
 * Template for Default Header
 *
 * @package busia
 */
 // $settings      = $this->get_settings_for_display();
// $nav_menu = ! empty( $settings['header_cus_nav_menu'] ) ? wp_get_nav_menu_object( $settings['header_cus_nav_menu'] ) : false;
?>
<!-- wraper_header -->
<div class="wraper_header style-default">
<!-- wraper_header_main -->
	<div class="rt-header mobile-header-style1 fixed">
			<!-- header_main -->
			<div class="header_main">
			<!-- header-responsive-nav -->
				<div class="menu-icon rt-mobile-hamburger rt-column hidden-lg">
				<div class="rt-mobile-toggle-holder">
				<div class="rt-mobile-toggle">
				<span></span><span></span><span></span>
				</div>
				</div>
				</div>
				<!-- header-responsive-nav -->
				<!-- brand-logo -->
				<div class="brand-logo">
					<div class="table">
						<div class="table-cell">
							<?php if ( has_custom_logo() ) { ?>
								<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );
								$image_alt      = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" data-no-retina="" width="81" height="49">
								</a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><p class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p></a>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- brand-logo -->
				<!-- nav -->
				<div id="rt-mainMenu" style="min-height: 0px;">
					<nav class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'top',
								'fallback_cb'    => false,
								'container'      => false,
								'depth'          => 0,
								'menu_class'     => 'mega-menu',
								'walker'         => new Radiantthemes_Default_Menu_Walker(),
							)
						);
						?>
					</nav>
				</div>
				<!-- nav -->
				<?php if ( class_exists( 'WooCommerce' ) ) { 
				global $woocommerce;
				?>
				<div class="rt-search-cart-holder">
					<div class="rt-cart-box header-elem-desk-hamburger">
					<a href="<?php echo wc_get_cart_url() ?>">						
						<div class="menu-mobile-icon cart-icon">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
							<span class="cart-count"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
						</div>
					</a>
					</div>
				</div>
			<?php } ?>
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
	</div>
	<!-- wraper_header_main_sticky -->
	<!-- wraper_header_main -->
	<div class="rt-header  style1 mobile-header-style1">
			<!-- header_main -->
			<div class="header_main">
			<!-- header-responsive-nav -->
				<div class="menu-icon rt-mobile-hamburger rt-column hidden-lg">
				<div class="rt-mobile-toggle-holder">
				<div class="rt-mobile-toggle">
				<span></span><span></span><span></span>
				</div>
				</div>
				</div>
				<!-- header-responsive-nav -->
				<!-- brand-logo -->
				<div class="brand-logo">
					<div class="table">
						<div class="table-cell">
							<?php if ( has_custom_logo() ) { ?>
								<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );
								$image_alt      = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" data-no-retina="" width="81" height="49">
								</a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><p class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p></a>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- brand-logo -->
				<!-- nav -->
				<div id="rt-mainMenu" style="min-height: 0px;">
					<nav class="apr-nav-menu--main apr-nav-menu--layout-horizontal hover-underline e--pointer-none">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'top',
								'fallback_cb'    => false,
								'container'      => false,
								'depth'          => 0,
								'menu_class'     => 'mega-menu',
								'walker'         => new Radiantthemes_Default_Menu_Walker(),
							)
						);
						class Radiantthemes_Default_Menu_Walker extends Walker_Nav_Menu {
							public function start_lvl( &$output, $depth = 0, $args = array() ) {
								// depth dependent classes
								$indent        = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
								$display_depth = ( $depth + 1 ); // because it counts the first submenu as 0
								$classes       = array(
									'sub-menu ',
									( $display_depth % 2 ? 'menu-odd' : 'menu-even' ),
									( $display_depth >= 2 ? 'sub-sub-menu' : '' ),
									'menu-depth-' . $display_depth,
								);
								$class_names = implode( ' ', $classes );
								// build html
								$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
							}
							/**
							 * Walker Nav Menu
							 *
							 * @param string       $output Passed by reference. Used to append additional content.
							 * @param WP_Post      $item Menu item data object.
							 * @param integer      $depth Depth of menu item. Used for padding.
							 * @param array|object $args An array|object of wp_nav_menu() arguments.
							 * @param integer      $current_object_id Current Object ID.
							 */
							public function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
								$this->curItem = $item;
								$indent        = ( $depth ) ? str_repeat( "\t", $depth ) : '';
								$class_names   = '';
								$value         = '';
								$mega_class    = '';
								$is_mega = ( 'mega_menu' === $item->object ) ? true : false;
								if ( $is_mega ) {
									$mega_class = ' menu-item-has-children  menu-item-mega-parent';
								}
								if ( $args->walker->has_children && $depth === 0 ) {
									$extra_names = ' rt-dropdown';
								} elseif ( $args->walker->has_children && $depth !== 0 ) {
									$extra_names = ' rt-dropdown-submenu';
								} else {
									$extra_names = '';
								}
								// var_dump($args);
								$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
								$classes[]   = 'menu-item-' . $item->ID;
								$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
								$class_names = $class_names ? ' class=" ' . esc_attr( $class_names ) . $mega_class . $extra_names . '"' : '';
								$id          = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
								$id          = $id ? ' id="' . esc_attr( $id ) . '"' : '';
								$output        .= $indent . '<li' . $id . $value . $class_names . '>';
								$atts           = array();
								$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
								$atts['target'] = ! empty( $item->target ) ? $item->target : '';
								$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
								$atts['href']   = ! empty( $item->url ) ? $item->url : '';
								$atts           = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
								$attributes     = '';
								$item_output    = '';
								foreach ( $atts as $attr => $value ) {
									if ( ! empty( $value ) ) {
										$value       = ( 'href' === $attr && ! empty( $item->url ) && ! $is_mega ) ? esc_url( $value ) : '#';
										$attributes .= ' ' . $attr . '="' . $value . '"';
									}
								}
								if ( 'page' === $item->object ) {
									$item_output .= $args->before;
									$item_output .= '<a ' . $attributes . ' data-description="' . $item->description . '">';
									$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
									$item_output .= '<span class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>';
									$item_output .= $args->after;
									// mega menu.
								} else {
									$item_output .= $args->before;
									$item_output .= '<a ' . $attributes . ' data-description="' . $item->description . '">';
									$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
									$item_output .= '<span class="arrow"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a>';
									$item_output .= $args->after;
								}
								if ( $is_mega ) {
									$post_obj = get_post( $item->object_id, 'OBJECT' );
									if ( did_action( 'elementor/loaded' ) ) {
										$item_output .= '<ul class="sub-menu"><li class="mega-menu-content">' . \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_obj->ID ) . '</li></ul>';
									} else {
										$item_output .= '<ul class="sub-menu"><li class="mega-menu-content">' . do_shortcode( $post_obj->post_content ) . '</li></ul>';
									}
								}
								$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
							}
						}
						?>
					</nav>
				</div>
				<!-- nav -->
				<?php if ( class_exists( 'WooCommerce' ) ) { 
				global $woocommerce;
				?>
				<div class="rt-search-cart-holder">
					<div class="rt-cart-box header-elem-desk-hamburger">
						<a href="<?php echo wc_get_cart_url() ?>">
						<div class="menu-mobile-icon cart-icon">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20"><path fill="" d="M8 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM8 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M15 20c-1.103 0-2-0.897-2-2s0.897-2 2-2 2 0.897 2 2-0.897 2-2 2zM15 17c-0.551 0-1 0.449-1 1s0.449 1 1 1 1-0.449 1-1-0.449-1-1-1z"></path><path fill="" d="M17.539 4.467c-0.251-0.297-0.63-0.467-1.039-0.467h-12.243l-0.099-0.596c-0.131-0.787-0.859-1.404-1.658-1.404h-1c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h1c0.307 0 0.621 0.266 0.671 0.569l1.671 10.027c0.131 0.787 0.859 1.404 1.658 1.404h10c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-10c-0.307 0-0.621-0.266-0.671-0.569l-0.247-1.48 9.965-0.867c0.775-0.067 1.483-0.721 1.611-1.489l0.671-4.027c0.067-0.404-0.038-0.806-0.289-1.102zM16.842 5.404l-0.671 4.027c-0.053 0.316-0.391 0.629-0.711 0.657l-10.043 0.873-0.994-5.962h12.076c0.117 0 0.215 0.040 0.276 0.113s0.085 0.176 0.066 0.291z"></path></svg>
							<span class="cart-count"><?php echo esc_html( $woocommerce->cart->cart_contents_count ); ?></span>
						</div>
					   </a>
					</div>
				</div>
			<?php } ?>
				<div class="clearfix"></div>
			</div>
			<!-- header_main -->
	</div>
	<!-- wraper_header_main -->
	<nav id="mobile-menu" class="side-panel" >
		<header class="side-panel-header">
			<?php if ( has_custom_logo() ) { ?>
								<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );
								$image_alt      = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" data-no-retina="" width="81" height="49">
								</a>
							<?php } else { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><p class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p></a>
							<?php } ?>
							<div class="rt-toggle-close rt-close-btn" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="12" height="12" viewBox="1.1 1.1 12 12" enable-background="new 1.1 1.1 12 12" xml:space="preserve"><path d="M8.3 7.1l4.6-4.6c0.3-0.3 0.3-0.8 0-1.2 -0.3-0.3-0.8-0.3-1.2 0L7.1 5.9 2.5 1.3c-0.3-0.3-0.8-0.3-1.2 0 -0.3 0.3-0.3 0.8 0 1.2L5.9 7.1l-4.6 4.6c-0.3 0.3-0.3 0.8 0 1.2s0.8 0.3 1.2 0L7.1 8.3l4.6 4.6c0.3 0.3 0.8 0.3 1.2 0 0.3-0.3 0.3-0.8 0-1.2L8.3 7.1z"></path></svg></div>
		</header>
		<div class="side-panel-inner mobile-side-panel-inner">
			<div class="mobile-menu-top">
			<?php
			$defaults = array(
				'menu_class'     => 'rt-mobile-menu',
				'theme_location' => 'top', // creating a fake location for better functional control.
				'fallback_cb'    => false,
				'link_after'     => '<span></span>',
				'depth'          => 0,
				'walker'         => new Radiantthemes_Default_Menu_Walker(),
			);
			?>
			<?php wp_nav_menu( $defaults ); ?>
		</div>
		</div>
	</nav>
</div>
<!-- wraper_header -->
