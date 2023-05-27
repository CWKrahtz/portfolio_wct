<?php
/**
 * Adds a Social widget.
 *
 * @package radiantthemes-addons
 */

/**
 * Class Definition.
 */
class Radiantthemes_Social_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			// Base ID of your widget.
			'radiantthemes_social_widget',
			// Widget name will appear in UI.
			esc_html__( 'RadiantThemes Social', 'radiantthemes-addons' ),
			// Widget description.
			array(
				'description' => esc_html__( 'Widget for Social.', 'radiantthemes-addons' ),
			)
		);
	}

	/**
	 * Creating widget front-end.
	 *
	 * @param  [type] $args     description.
	 * @param  [type] $instance description.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		// before and after widget arguments are defined by themes.
		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] );
		}
		$socialtitle = ! empty( $instance['socialtitle'] ) ? $instance['socialtitle'] : '';
		// This is where you run the code and display the output.
		?>
		<?php
		if ( get_theme_mod( 'social_newtab' ) ) {
			$social_target = 'target="_blank"';
		} else {
			$social_target = '';
		}
		?>
		<?php if ( ! empty( $instance['socialtitle'] ) ) : ?>
			<h5 class="widget-title"><?php echo esc_attr( $socialtitle ); ?></h5>
		<?php endif; ?>
		<ul class="social">
			<?php if ( ! empty( get_theme_mod( 'social-icon-facebook' ) ) ) : ?>
				<li class="facebook"><a href="<?php echo esc_url( get_theme_mod( 'social-icon-facebook' ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="ti ti-facebook"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( get_theme_mod( 'social-icon-twitter' ) ) ) : ?>
				<li class="twitter"><a href="<?php echo esc_url( get_theme_mod( 'social-icon-twitter' ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="ti ti-twitter"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( get_theme_mod( 'social-icon-linkedin' ) ) ) : ?>
				<li class="linkedin"><a href="<?php echo esc_url( get_theme_mod( 'social-icon-linkedin' ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="ti ti-linkedin"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( get_theme_mod( 'social-icon-instagram' ) ) ) : ?>
				<li class="instagram"><a href="<?php echo esc_url( get_theme_mod( 'social-icon-instagram' ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="ti ti-instagram"></i></a></li>
			<?php endif; ?>
			<?php if ( ! empty( get_theme_mod( 'social-icon-dribbble' ) ) ) : ?>
				<li class="dribbble"><a href="<?php echo esc_url( get_theme_mod( 'social-icon-dribbble' ) ); ?>" <?php echo esc_attr( $social_target ); ?>><i class="ti ti-dribbble"></i></a></li>
			<?php endif; ?>
		</ul>

		<?php

		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Widget Backend
	 *
	 * @param  [type] $instance description.
	 */
	public function form( $instance ) {
		$socialtitle = ! empty( $instance['socialtitle'] ) ? $instance['socialtitle'] : '';
		// Widget admin form.
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'socialtitle' ) ); ?>"><?php esc_html_e( 'Title:', 'radiantthemes-addons' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'socialtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'socialtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $socialtitle ); ?>" />
		</p>
		<?php
	}

	/**
	 * Updating widget replacing old instances with new.
	 *
	 * @param  [type] $new_instance description.
	 * @param  [type] $old_instance description.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                = array();
		$instance['socialtitle'] = ( ! empty( $new_instance['socialtitle'] ) ) ? strip_tags(
			$new_instance['socialtitle']
		) : '';
		return $instance;
	}

}
/**
 * Register and load the widget
 */
function radiantthemes_social_load_widget() {
	register_widget( 'Radiantthemes_Social_Widget' );
}
add_action( 'widgets_init', 'radiantthemes_social_load_widget' );