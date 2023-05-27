<?php
/**
 * Radiantthemes Customizer Custom Controls
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Custom Control Base Class
	 */
	class Radiantthemes_Custom_Control extends WP_Customize_Control {
		protected function get_busia_resource_url() {
			if ( strpos( wp_normalize_path( __DIR__ ), wp_normalize_path( WP_PLUGIN_DIR ) ) === 0 ) {
				// We're in a plugin directory and need to determine the url accordingly.
				return plugin_dir_url( __DIR__ );
			}
			return trailingslashit( get_template_directory_uri() );
		}
	}
	/**
	 * Custom Section Base Class
	 */
	class Radiantthemes_Custom_Section extends WP_Customize_Section {
		protected function get_busia_resource_url() {
			if ( strpos( wp_normalize_path( __DIR__ ), wp_normalize_path( WP_PLUGIN_DIR ) ) === 0 ) {
				// We're in a plugin directory and need to determine the url accordingly.
				return plugin_dir_url( __DIR__ );
			}
			return trailingslashit( get_template_directory_uri() );
		}
	}
	/**
	 * Image Checkbox Custom Control
	 */
	class Radiantthemes_Image_Checkbox_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'image_checkbox';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="image_checkbox_control">
				<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<?php $chkboxValues = explode( ',', esc_attr( $this->value() ) ); ?>
				<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-multi-image-checkbox" <?php $this->link(); ?> />
				<?php foreach ( $this->choices as $key => $value ) { ?>
					<label class="checkbox-label">
						<input type="checkbox" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php checked( in_array( esc_attr( $key ), $chkboxValues ), 1 ); ?> class="multi-image-checkbox"/>
						<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" title="<?php echo esc_attr( $value['name'] ); ?>" />
					</label>
				<?php	} ?>
			</div>
			<?php
		}
	}
	/**
	 * Text Radio Button Custom Control
	 */
	class Radiantthemes_Text_Radio_Button_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'text_radio_button';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="text_radio_button_control">
				<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<div class="radio-buttons">
					<?php foreach ( $this->choices as $key => $value ) { ?>
						<label class="radio-button-label">
							<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
							<span><?php echo esc_html( $value ); ?></span>
						</label>
					<?php	} ?>
				</div>
			</div>
			<?php
		}
	}
	/**
	 * Image Radio Button Custom Control
	 */
	class Radiantthemes_Image_Radio_Button_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'image_radio_button';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="image_radio_button_control">
				<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<?php foreach ( $this->choices as $key => $value ) { ?>
					<label class="radio-button-label">
						<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
						<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $value['name'] ); ?>" title="<?php echo esc_attr( $value['name'] ); ?>" />
					</label>
				<?php	} ?>
			</div>
			<?php
		}
	}
	/**
	 * Single Accordion Custom Control
	 */
	class Radiantthemes_Single_Accordion_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'single_accordion';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'radiantthemes-custom-controls-js', $this->get_busia_resource_url() . 'assets/js/customizer.js', array( 'jquery' ), time(), true );
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$allowed_html = array(
				'a'      => array(
					'href'   => array(),
					'title'  => array(),
					'class'  => array(),
					'target' => array(),
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'i'      => array(
					'class' => array(),
				),
			);
			?>
			<div class="single-accordion-custom-control">
				<div class="single-accordion-toggle"><?php echo esc_html( $this->label ); ?><span class="accordion-icon-toggle dashicons dashicons-plus"></span></div>
				<div class="single-accordion customize-control-description">
					<?php
					if ( is_array( $this->description ) ) {
						echo '<ul class="single-accordion-description">';
						foreach ( $this->description as $key => $value ) {
							echo '<li>' . $key . wp_kses( $value, $allowed_html ) . '</li>';
						}
						echo '</ul>';
					} else {
						echo wp_kses( $this->description, $allowed_html );
					}
					?>
				</div>
			</div>
			<?php
		}
	}
	/**
	 * Simple Notice Custom Control
	 */
	class Radiantthemes_Simple_Notice_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'simple_notice';
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$allowed_html = array(
				'a'      => array(
					'href'   => array(),
					'title'  => array(),
					'class'  => array(),
					'target' => array(),
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'i'      => array(
					'class' => array(),
				),
				'span'   => array(
					'class' => array(),
				),
				'code'   => array(),
			);
			?>
			<div class="simple-notice-custom-control">
				<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
				<?php } ?>
			</div>
			<?php
		}
	}
	/**
	 * Slider Custom Control
	 */
	class Radiantthemes_Slider_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'slider_control';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'radiantthemes-custom-controls-js', $this->get_busia_resource_url() . 'assets/js/customizer.js', array( 'jquery', 'jquery-ui-core' ), time(), true );
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="slider-custom-control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php $this->link(); ?> />
				<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->value() ); ?>"></span>
			</div>
			<?php
		}
	}
	/**
	 * Toggle Switch Custom Control
	 */
	class Radiantthemes_Toggle_Switch_Custom_control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'toggle_switch';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="toggle-switch-control">
				<div class="toggle-switch">
					<input type="checkbox" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr( $this->value() ); ?>"
					<?php
					$this->link();
					checked( $this->value() );
					?>
					>
					<label class="toggle-switch-label" for="<?php echo esc_attr( $this->id ); ?>">
						<span class="toggle-switch-inner"></span>
						<span class="toggle-switch-switch"></span>
					</label>
				</div>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
			</div>
			<?php
		}
	}
	/**
	 * Sortable Repeater Custom Control
	 */
	class Radiantthemes_Sortable_Repeater_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'sortable_repeater';
		/**
		 * Button labels
		 */
		public $button_labels = array();
		/**
		 * Constructor
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Merge the passed button labels with our default labels
			$this->button_labels = wp_parse_args(
				$this->button_labels,
				array(
					'add' => __( 'Add', 'busia' ),
				)
			);
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'radiantthemes-custom-controls-js', $this->get_busia_resource_url() . 'assets/js/customizer.js', array( 'jquery', 'jquery-ui-core' ), time(), true );
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="sortable_repeater_control">
				<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-sortable-repeater" <?php $this->link(); ?> />
				<div class="sortable_repeater sortable">
					<div class="repeater">
						<input type="text" value="" class="repeater-input" placeholder="https://" /><span class="dashicons dashicons-sort"></span><a class="customize-control-sortable-repeater-delete" href="#"><span class="dashicons dashicons-no-alt"></span></a>
					</div>
				</div>
				<button class="button customize-control-sortable-repeater-add" type="button"><?php echo wp_kses( $this->button_labels['add'], 'rt-content' ); ?></button>
			</div>
			<?php
		}
	}
	/**
	 * Dropdown Select2 Custom Control
	 */
	class Radiantthemes_Dropdown_Select2_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'dropdown_select2';
		/**
		 * The type of Select2 Dropwdown to display. Can be either a single select dropdown or a multi-select dropdown. Either false for true. Default = false
		 */
		private $multiselect = false;
		/**
		 * The Placeholder value to display. Select2 requires a Placeholder value to be set when using the clearall option. Default = 'Please select...'
		 */
		private $placeholder = 'Please select...';
		/**
		 * Constructor
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Check if this is a multi-select field
			if ( isset( $this->input_attrs['multiselect'] ) && $this->input_attrs['multiselect'] ) {
				$this->multiselect = true;
			}
			// Check if a placeholder string has been specified
			if ( isset( $this->input_attrs['placeholder'] ) && $this->input_attrs['placeholder'] ) {
				$this->placeholder = $this->input_attrs['placeholder'];
			}
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'radiantthemes-select2-js', $this->get_busia_resource_url() . 'assets/js/select2.full.min.js', array( 'jquery' ), '4.0.13', true );
			wp_enqueue_script( 'radiantthemes-custom-controls-js', $this->get_busia_resource_url() . 'assets/js/customizer.js', array( 'radiantthemes-select2-js' ), time(), true );
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), '1.1', 'all' );
			wp_enqueue_style( 'radiantthemes-select2-css', $this->get_busia_resource_url() . 'assets/css/select2.min.css', array(), '4.0.13', 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$defaultValue = $this->value();
			if ( $this->multiselect ) {
				$defaultValue = explode( ',', $this->value() );
			}
			?>
			<div class="dropdown_select2_control">
				<?php if ( ! empty( $this->label ) ) { ?>
					<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title">
						<?php echo esc_html( $this->label ); ?>
					</label>
				<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-dropdown-select2" value="<?php echo esc_attr( $this->value() ); ?>" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?> />
				<?php
				if ( $this->multiselect ) {
					$select_class = 'multi[]';
				} else {
					$select_class = 'single';
				}
				if ( $this->multiselect ) {
					$multi_select_class = 'multiple="multiple" ';
				} else {
					$multi_select_class = '';
				}
				?>
				<select name="select2-list-<?php echo wp_kses( $select_class, 'rt-content' ); ?>" class="customize-control-select2" data-placeholder="<?php echo esc_attr( $this->placeholder ); ?>" <?php echo wp_kses( $multi_select_class, 'rt-content' ); ?>>
					<?php
					if ( ! $this->multiselect ) {
						// When using Select2 for single selection, the Placeholder needs an empty <option> at the top of the list for it to work (multi-selects dont need this)
						echo '<option></option>';
					}
					foreach ( $this->choices as $key => $value ) {
						if ( is_array( $value ) ) {
							echo '<optgroup label="' . esc_attr( $key ) . '">';
							foreach ( $value as $optgroupkey => $optgroupvalue ) {
								if ( $this->multiselect ) {
									echo '<option value="' . esc_attr( $optgroupkey ) . '" ' . ( in_array( esc_attr( $optgroupkey ), $defaultValue ) ? 'selected="selected"' : '' ) . '>' . esc_attr( $optgroupvalue ) . '</option>';
								} else {
									echo '<option value="' . esc_attr( $optgroupkey ) . '" ' . selected( esc_attr( $optgroupkey ), $defaultValue, false ) . '>' . esc_attr( $optgroupvalue ) . '</option>';
								}
							}
							echo '</optgroup>';
						} else {
							if ( $this->multiselect ) {
								echo '<option value="' . esc_attr( $key ) . '" ' . ( in_array( esc_attr( $key ), $defaultValue ) ? 'selected="selected"' : '' ) . '>' . esc_attr( $value ) . '</option>';
							} else {
								echo '<option value="' . esc_attr( $key ) . '" ' . selected( esc_attr( $key ), $defaultValue, false ) . '>' . esc_attr( $value ) . '</option>';
							}
						}
					}
					?>
				</select>
			</div>
			<?php
		}
	}
	/**
	 * Dropdown Posts Custom Control
	 */
	class Radiantthemes_Dropdown_Posts_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'dropdown_posts';
		/**
		 * Posts
		 */
		private $posts = array();
		/**
		 * Constructor
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Get our Posts
			$this->posts = get_posts( $this->input_attrs );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="dropdown_posts_control">
				<?php if ( ! empty( $this->label ) ) { ?>
					<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title">
						<?php echo esc_html( $this->label ); ?>
					</label>
				<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<select name="<?php echo esc_attr( $this->id ); ?>" id="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?>>
					<?php
					if ( ! empty( $this->posts ) ) {
						foreach ( $this->posts as $post ) {
							printf(
								'<option value="%s" %s>%s</option>',
								$post->ID,
								selected( $this->value(), $post->ID, false ),
								$post->post_title
							);
						}
					}
					?>
				</select>
			</div>
			<?php
		}
	}
	/**
	 * TinyMCE Custom Control
	 */
	class Radiantthemes_TinyMCE_Custom_control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'tinymce_editor';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'radiantthemes-custom-controls-js', $this->get_busia_resource_url() . 'assets/js/customizer.js', array( 'jquery' ), time(), true );
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
			wp_enqueue_editor();
		}
		/**
		 * Pass our TinyMCE toolbar string to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['radiantthemestinymcetoolbar1'] = isset( $this->input_attrs['toolbar1'] ) ? esc_attr( $this->input_attrs['toolbar1'] ) : 'bold italic bullist numlist alignleft aligncenter alignright link';
			$this->json['radiantthemestinymcetoolbar2'] = isset( $this->input_attrs['toolbar2'] ) ? esc_attr( $this->input_attrs['toolbar2'] ) : '';
			$this->json['radiantthemesmediabuttons']    = isset( $this->input_attrs['mediaButtons'] ) && ( $this->input_attrs['mediaButtons'] === true ) ? true : false;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="tinymce-control">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<textarea id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_html( $this->value() ); ?></textarea>
			</div>
			<?php
		}
	}
	/**
	 * Google Font Select Custom Control
	 */
	class Radiantthemes_Google_Font_Select_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'google_fonts';
		/**
		 * The list of Google Fonts
		 */
		private $fontList = false;
		/**
		 * The saved font values decoded from json
		 */
		private $fontValues = array();
		/**
		 * The index of the saved font within the list of Google fonts
		 */
		private $fontListIndex = 0;
		/**
		 * The number of fonts to display from the json file. Either positive integer or 'all'. Default = 'all'
		 */
		private $fontCount = 'all';
		/**
		 * The font list sort order. Either 'alpha' or 'popular'. Default = 'alpha'
		 */
		private $fontOrderBy = 'alpha';
		/**
		 * Get our list of fonts from the json file
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Get the font sort order
			if ( isset( $this->input_attrs['orderby'] ) && strtolower( $this->input_attrs['orderby'] ) === 'popular' ) {
				$this->fontOrderBy = 'popular';
			}
			// Get the list of Google fonts
			if ( isset( $this->input_attrs['font_count'] ) ) {
				if ( 'all' != strtolower( $this->input_attrs['font_count'] ) ) {
					$this->fontCount = ( abs( (int) $this->input_attrs['font_count'] ) > 0 ? abs( (int) $this->input_attrs['font_count'] ) : 'all' );
				}
			}
			$this->fontList = $this->busia_getGoogleFonts( 'all' );
			// Decode the default json font value
			$this->fontValues = json_decode( $this->value() );
			// Find the index of our default font within our list of Google fonts
			$this->fontListIndex = $this->busia_getFontIndex( $this->fontList, $this->fontValues->font );
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'radiantthemes-select2-js', $this->get_busia_resource_url() . 'assets/js/select2.full.min.js', array( 'jquery' ), '4.0.13', true );
			wp_enqueue_script( 'radiantthemes-custom-controls-js', $this->get_busia_resource_url() . 'assets/js/customizer.js', array( 'radiantthemes-select2-js' ), time(), true );
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), '1.1', 'all' );
			wp_enqueue_style( 'radiantthemes-select2-css', $this->get_busia_resource_url() . 'assets/css/select2.min.css', array(), '4.0.13', 'all' );
		}
		/**
		 * Export our List of Google Fonts to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['radiantthemesfontslist'] = $this->fontList;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$fontCounter  = 0;
			$isFontInList = false;
			$fontListStr  = '';
			if ( ! empty( $this->fontList ) ) {
				?>
				<div class="google_fonts_select_control">
					<?php if ( ! empty( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php } ?>
					<?php if ( ! empty( $this->description ) ) { ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
					<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-google-font-selection" <?php $this->link(); ?> />
					<div class="google-fonts">
						<select class="google-fonts-list" control-name="<?php echo esc_attr( $this->id ); ?>">
							<?php
							foreach ( $this->fontList as $key => $value ) {
								$fontCounter++;
								// $fontListStr .= '<option value="' . $value->family . '" ' . selected( $this->fontValues->font, $value->family, false ) . '>' . $value->family . '</option>';
								echo '<option value="' . $value->family . '" ' . selected( $this->fontValues->font, $value->family, false ) . '>' . $value->family . '</option>';
								if ( $this->fontValues->font === $value->family ) {
									$isFontInList = true;
								}
								if ( is_int( $this->fontCount ) && $fontCounter === $this->fontCount ) {
									break;
								}
							}
							// if ( ! $isFontInList && $this->fontListIndex ) {
							// 	$fontListStr = '<option value="' . $this->fontList[ $this->fontListIndex ]->family . '" ' . selected( $this->fontValues->font, $this->fontList[ $this->fontListIndex ]->family, false ) . '>' . $this->fontList[ $this->fontListIndex ]->family . ' (default)</option>' . $fontListStr;
							// }
							// echo $fontListStr;
							?>
						</select>
					</div>
					<div class="weight-style">
						<select class="google-fonts-fontweight-style">
							<?php
							foreach ( $this->fontList[ $this->fontListIndex ]->variants as $key => $value ) {
								echo '<option value="' . $value . '" ' . selected( $this->fontValues->fontweight, $value, false ) . '>' . $value . '</option>';
							}
							?>
						</select>
					</div>
					<input type="hidden" class="google-fonts-category" value="<?php echo wp_kses( $this->fontValues->category, 'rt-content' ); ?>">
					<div class="typography-align">
						<label class="google-fonts-typography-label">Text Align</label>
						<select class="google-fonts-text-align">
							<option value="">Default</option>
							<option value="left">Left</option>
							<option value="right">Right</option>
							<option value="center">Center</option>
							<option value="justify">Justify</option>
							<option value="justify-all">Justify All</option>
							<option value="start">Start</option>
							<option value="end">End</option>
							<option value="match-parent">Match Parent</option>
							<option value="inherit">Inherit</option>
							<option value="initial">Initial</option>
							<option value="revert">Revert</option>
							<option value="unset">Unset</option>
						</select>
					</div>
					<div class="typography-transform">
						<label class="google-fonts-typography-transform">Text Style</label>
						<select class="google-fonts-text-transform">
							<option value="none">None</option>
							<option value="uppercase">Upper Case</option>
							<option value="lowercase">Lower Case</option>
							<option value="capitalize">Capitalize</option>
							<option value="inherit">Inherit</option>
							<option value="initial">Initial</option>
							<option value="revert">Revert</option>
							<option value="unset">Unset</option>
						</select>
					</div>
					<div class="typography-group">
						<div class="typography-size">
							<label class="google-fonts-typography-transform">Text Size</label>
							<input type="number" min="0" value="<?php echo esc_attr( $this->fontValues->textsize ); ?>" class="google-fonts-text-size" />
							<select class="google-fonts-text-size-unit">
								<option value="px">px</option>
								<option value="em">em</option>
								<option value="rem">rem</option>
								<option value="%">%</option>
							</select>
						</div>
						<div class="typography-line-height">
							<label class="google-fonts-typography-line-height">Line Height</label>
							<input type="number" min="0" value="<?php echo esc_attr( $this->fontValues->textlineheight ); ?>" class="google-fonts-text-line-height" />
							<select class="google-fonts-line-height-unit">
								<option value="px">px</option>
								<option value="em">em</option>
								<option value="rem">rem</option>
								<option value="%">%</option>
							</select>
						</div>
						<div class="typography-letter-spacing">
							<label class="google-fonts-typography-letter-spacing">Letter Spacing</label>
							<input type="number" min="0" value="<?php echo esc_attr( $this->fontValues->textletterspacing ); ?>" class="google-fonts-text-letter-spacing" />
							<select class="google-fonts-letter-spacing-unit">
								<option value="px">px</option>
								<option value="em">em</option>
								<option value="rem">rem</option>
							</select>
						</div>
						<div class="typography-margin-top">
							<label class="google-fonts-typography-margin-top">Margin Top</label>
							<input type="number" min="0" value="<?php echo esc_attr( $this->fontValues->textmargintop ); ?>" class="google-fonts-text-margin-top" />
							<select class="google-fonts-margin-top-unit">
								<option value="px">px</option>
								<option value="em">em</option>
								<option value="rem">rem</option>
							</select>
						</div>
						<div class="typography-margin-right">
							<label class="google-fonts-typography-margin-right">Margin Right</label>
							<input type="number" min="0" value="<?php echo esc_attr( $this->fontValues->textmarginright ); ?>" class="google-fonts-text-margin-right" />
							<select class="google-fonts-margin-right-unit">
								<option value="px">px</option>
								<option value="em">em</option>
								<option value="rem">rem</option>
							</select>
						</div>
						<div class="typography-margin-bottom">
							<label class="google-fonts-typography-margin-bottom">Margin Bottom</label>
							<input type="number" min="0" value="<?php echo esc_attr( $this->fontValues->textmarginbottom ); ?>" class="google-fonts-text-margin-bottom" />
							<select class="google-fonts-margin-bottom-unit">
								<option value="px">px</option>
								<option value="em">em</option>
								<option value="rem">rem</option>
							</select>
						</div>
						<div class="typography-margin-left">
							<label class="google-fonts-typography-margin-left">Margin Left</label>
							<input type="number" min="0" value="<?php echo esc_attr( $this->fontValues->textmarginleft ); ?>" class="google-fonts-text-margin-left" />
							<select class="google-fonts-margin-left-unit">
								<option value="px">px</option>
								<option value="em">em</option>
								<option value="rem">rem</option>
							</select>
						</div>
					</div>
				</div>
				<?php
			}
		}
		/**
		 * Find the index of the saved font in our multidimensional array of Google Fonts
		 */
		public function busia_getFontIndex( $haystack, $needle ) {
			foreach ( $haystack as $key => $value ) {
				if ( $value->family == $needle ) {
					return $key;
				}
			}
			return false;
		}
		/**
		 * Return the list of Google Fonts from our json file. Unless otherwise specfied, list will be limited to 30 fonts.
		 */
		public function busia_getGoogleFonts( $count = 30 ) {
			// Google Fonts json generated from https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=YOUR-API-KEY
			$fontFile = $this->get_busia_resource_url() . 'inc/google-fonts-alphabetical.json';
			if ( $this->fontOrderBy === 'popular' ) {
				$fontFile = $this->get_busia_resource_url() . 'inc/google-fonts-popularity.json';
			} else if ( $this->fontOrderBy === 'custom' ) {
				$fontFile = $this->get_busia_resource_url() . 'inc/radiant-custom-fonts.json';
			} else {
				$fontFile = $this->get_busia_resource_url() . 'inc/google-fonts-alphabetical.json';
			}
			$request = wp_remote_get( $fontFile );
			if ( is_wp_error( $request ) ) {
				return '';
			}
			$body    = wp_remote_retrieve_body( $request );
			$content = json_decode( $body );
			if ( $count == 'all' ) {
				return $content->items;
			} else {
				return array_slice( $content->items, 0, $count );
			}
		}
	}
	/**
	 * Alpha Color Picker Custom Control
	 */
	class Radiantthemes_Customize_Alpha_Color_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'alpha-color';
		/**
		 * Add support for palettes to be passed in.
		 *
		 * Supported palette values are true, false, or an array of RGBa and Hex colors.
		 */
		public $palette;
		/**
		 * Add support for showing the opacity value on the slider handle.
		 */
		public $show_opacity;
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'radiantthemes-custom-controls-js', $this->get_busia_resource_url() . 'assets/js/customizer.js', array( 'jquery', 'wp-color-picker' ), time(), true );
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array( 'wp-color-picker' ), '1.0', 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			// Process the palette
			if ( is_array( $this->palette ) ) {
				$palette = implode( '|', $this->palette );
			} else {
				// Default to true.
				$palette = ( false === $this->palette || 'false' === $this->palette ) ? 'false' : 'true';
			}
			// Support passing show_opacity as string or boolean. Default to true.
			$show_opacity = ( false === $this->show_opacity || 'false' === $this->show_opacity ) ? 'false' : 'true';
			?>
				<label>
				<?php
				// Output the label and description if they were passed in.
				if ( isset( $this->label ) && '' !== $this->label ) {
					echo '<span class="customize-control-title">' . sanitize_text_field( $this->label ) . '</span>';
				}
				if ( isset( $this->description ) && '' !== $this->description ) {
					echo '<span class="description customize-control-description">' . sanitize_text_field( $this->description ) . '</span>';
				}
				?>
				</label>
				<input class="alpha-color-control" type="text" data-show-opacity="<?php echo esc_attr( $show_opacity ); ?>" data-palette="<?php echo esc_attr( $palette ); ?>" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?>  />
				<?php
		}
	}
	/**
	 * WPColorPicker Alpha Color Picker Custom Control
	 */
	class Radiantthemes_Alpha_Color_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'wpcolorpicker-alpha-color';
		/**
		 * ColorPicker Attributes
		 */
		public $attributes = '';
		/**
		 * Color palette defaults
		 */
		public $defaultPalette = array(
			'#000000',
			'#ffffff',
			'#dd3333',
			'#dd9933',
			'#eeee22',
			'#81d742',
			'#1e73be',
			'#8224e3',
		);
		/**
		 * Constructor
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			$this->attributes .= 'data-default-color="' . esc_attr( $this->value() ) . '"';
			$this->attributes .= 'data-alpha="true"';
			$this->attributes .= 'data-reset-alpha="' . ( isset( $this->input_attrs['resetalpha'] ) ? $this->input_attrs['resetalpha'] : 'true' ) . '"';
			$this->attributes .= 'data-custom-width="0"';
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
			wp_enqueue_script( 'wp-color-picker-alpha', $this->get_busia_resource_url() . 'assets/js/wp-color-picker-alpha-min.js', array( 'wp-color-picker' ), '1.0', true );
			wp_enqueue_style( 'wp-color-picker' );
		}
		/**
		 * Pass our Palette colours to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['colorpickerpalette'] = isset( $this->input_attrs['palette'] ) ? $this->input_attrs['palette'] : $this->defaultPalette;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="wpcolorpicker_alpha_color_control">
			<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
			<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<input type="text" class="wpcolorpicker-alpha-color-picker" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-colorpicker-alpha-color" <?php echo wp_kses( $this->attributes, 'rt-content' ); ?> <?php $this->link(); ?> />
			</div>
			<?php
		}
	}
	/**
	 * Sortable Pill Checkbox Custom Control
	 */
	class Radiantthemes_Pill_Checkbox_Custom_Control extends Radiantthemes_Custom_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'pill_checkbox';
		/**
		 * Define whether the pills can be sorted using drag 'n drop. Either false or true. Default = false
		 */
		private $sortable = false;
		/**
		 * The width of the pills. Each pill can be auto width or full width. Default = false
		 */
		private $fullwidth = false;
		/**
		 * Constructor
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			// Check if these pills are sortable
			if ( isset( $this->input_attrs['sortable'] ) && $this->input_attrs['sortable'] ) {
				$this->sortable = true;
			}
			// Check if the pills should be full width
			if ( isset( $this->input_attrs['fullwidth'] ) && $this->input_attrs['fullwidth'] ) {
				$this->fullwidth = true;
			}
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'radiantthemes-custom-controls-js', $this->get_busia_resource_url() . 'assets/js/customizer.js', array( 'jquery', 'jquery-ui-core' ), time(), true );
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			$reordered_choices = array();
			$saved_choices     = explode( ',', esc_attr( $this->value() ) );
			// Order the checkbox choices based on the saved order
			if ( $this->sortable ) {
				foreach ( $saved_choices as $key => $value ) {
					if ( isset( $this->choices[ $value ] ) ) {
						$reordered_choices[ $value ] = $this->choices[ $value ];
					}
				}
				$reordered_choices = array_merge( $reordered_choices, array_diff_assoc( $this->choices, $reordered_choices ) );
			} else {
				$reordered_choices = $this->choices;
			}
			?>
			<div class="pill_checkbox_control">
			<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
			<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-sortable-pill-checkbox" <?php $this->link(); ?> />
				<?php
				if ( $this->sortable ) {
					$sortable_class = ' sortable';
				} else {
					$sortable_class = '';
				}
				if ( $this->fullwidth ) {
					$fullwidth_class = ' fullwidth_pills';
				} else {
					$fullwidth_class = '';
				}
				?>
				<div class="sortable_pills<?php echo wp_kses( $sortable_class, 'rt-content' ) . wp_kses( $fullwidth_class, 'rt-content' ); ?>">
			<?php foreach ( $reordered_choices as $key => $value ) { ?>
					<label class="checkbox-label">
						<input type="checkbox" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php checked( in_array( esc_attr( $key ), $saved_choices, true ), true ); ?> class="sortable-pill-checkbox"/>
						<span class="sortable-pill-title"><?php echo esc_attr( $value ); ?></span>
						<?php if ( $this->sortable && $this->fullwidth ) { ?>
							<span class="dashicons dashicons-sort"></span>
						<?php } ?>
					</label>
				<?php	} ?>
				</div>
			</div>
			<?php
		}
	}
	/**
	 * Upsell section
	 */
	class Radiantthemes_Upsell_Section extends Radiantthemes_Custom_Section {
		/**
		 * The type of control being rendered
		 */
		public $type = 'radiantthemes-upsell';
		/**
		 * The Upsell URL
		 */
		public $url = '';
		/**
		 * The background color for the control
		 */
		public $backgroundcolor = '';
		/**
		 * The text color for the control
		 */
		public $textcolor = '';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'radiantthemes-custom-controls-js', $this->get_busia_resource_url() . 'assets/js/customizer.js', array( 'jquery' ), time(), true );
			wp_enqueue_style( 'radiantthemes-custom-controls-css', $this->get_busia_resource_url() . 'assets/css/customizer.css', array(), time(), 'all' );
		}
		/**
		 * Render the section, and the controls that have been added to it.
		 */
		protected function render() {
			$bkgrndcolor = ! empty( $this->backgroundcolor ) ? esc_attr( $this->backgroundcolor ) : '#fff';
			$color       = ! empty( $this->textcolor ) ? esc_attr( $this->textcolor ) : '#555d66';
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="busia_upsell_section accordion-section control-section control-section-<?php echo esc_attr( $this->id ); ?> cannot-expand">
				<h3 class="upsell-section-title" <?php echo ' style="color:' . $color . ';border-left-color:' . $bkgrndcolor . ';border-right-color:' . $bkgrndcolor . ';"'; ?>>
					<a href="<?php echo esc_url( $this->url ); ?>" target="_blank"<?php echo ' style="background-color:' . $bkgrndcolor . ';color:' . $color . ';"'; ?>><?php echo esc_html( $this->title ); ?></a>
				</h3>
			</li>
			<?php
		}
	}
	/**
	 * URL sanitization
	 *
	 * @param  string   Input to be sanitized (either a string containing a single url or multiple, separated by commas)
	 * @return string   Sanitized input
	 */
	if ( ! function_exists( 'busia_url_sanitization' ) ) {
		function busia_url_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false ) {
				$input = explode( ',', $input );
			}
			if ( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[ $key ] = esc_url_raw( $value );
				}
				$input = implode( ',', $input );
			} else {
				$input = esc_url_raw( $input );
			}
			return $input;
		}
	}
	/**
	 * Switch sanitization
	 *
	 * @param  string       Switch value
	 * @return integer  Sanitized value
	 */
	if ( ! function_exists( 'busia_switch_sanitization' ) ) {
		function busia_switch_sanitization( $input ) {
			if ( true === $input ) {
				return 1;
			} else {
				return 0;
			}
		}
	}
	/**
	 * Radio Button and Select sanitization
	 *
	 * @param  string       Radio Button value
	 * @return integer  Sanitized value
	 */
	if ( ! function_exists( 'busia_radio_sanitization' ) ) {
		function busia_radio_sanitization( $input, $setting ) {
			// get the list of possible radio box or select options
			$choices = $setting->manager->get_control( $setting->id )->choices;
			if ( array_key_exists( $input, $choices ) ) {
				return $input;
			} else {
				return $setting->default;
			}
		}
	}
	/**
	 * Integer sanitization
	 *
	 * @param  string       Input value to check
	 * @return integer  Returned integer value
	 */
	if ( ! function_exists( 'busia_sanitize_integer' ) ) {
		function busia_sanitize_integer( $input ) {
			return (int) $input;
		}
	}
	/**
	 * Text sanitization
	 *
	 * @param  string   Input to be sanitized (either a string containing a single string or multiple, separated by commas)
	 * @return string   Sanitized input
	 */
	if ( ! function_exists( 'busia_text_sanitization' ) ) {
		function busia_text_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false ) {
				$input = explode( ',', $input );
			}
			if ( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[ $key ] = sanitize_text_field( $value );
				}
				$input = implode( ',', $input );
			} else {
				$input = sanitize_text_field( $input );
			}
			return $input;
		}
	}
	/**
	 * Array sanitization
	 *
	 * @param  array    Input to be sanitized
	 * @return array    Sanitized input
	 */
	if ( ! function_exists( 'busia_array_sanitization' ) ) {
		function busia_array_sanitization( $input ) {
			if ( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[ $key ] = sanitize_text_field( $value );
				}
			} else {
				$input = '';
			}
			return $input;
		}
	}
	/**
	 * Alpha Color (Hex, RGB & RGBa) sanitization
	 *
	 * @param  string   Input to be sanitized
	 * @return string   Sanitized input
	 */
	if ( ! function_exists( 'busia_hex_rgba_sanitization' ) ) {
		function busia_hex_rgba_sanitization( $input, $setting ) {
			if ( empty( $input ) || is_array( $input ) ) {
				return $setting->default;
			}
			if ( false === strpos( $input, 'rgb' ) ) {
				// If string doesn't start with 'rgb' then santize as hex color
				$input = sanitize_hex_color( $input );
			} else {
				if ( false === strpos( $input, 'rgba' ) ) {
					// Sanitize as RGB color
					$input = str_replace( ' ', '', $input );
					sscanf( $input, 'rgb(%d,%d,%d)', $red, $green, $blue );
					$input = 'rgb(' . busia_in_range( $red, 0, 255 ) . ',' . busia_in_range( $green, 0, 255 ) . ',' . busia_in_range( $blue, 0, 255 ) . ')';
				} else {
					// Sanitize as RGBa color
					$input = str_replace( ' ', '', $input );
					sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
					$input = 'rgba(' . busia_in_range( $red, 0, 255 ) . ',' . busia_in_range( $green, 0, 255 ) . ',' . busia_in_range( $blue, 0, 255 ) . ',' . busia_in_range( $alpha, 0, 1 ) . ')';
				}
			}
			return $input;
		}
	}
	/**
	 * Only allow values between a certain minimum & maxmium range
	 *
	 * @param  number   Input to be sanitized
	 * @return number   Sanitized input
	 */
	if ( ! function_exists( 'busia_in_range' ) ) {
		function busia_in_range( $input, $min, $max ) {
			if ( $input < $min ) {
				$input = $min;
			}
			if ( $input > $max ) {
				$input = $max;
			}
			return $input;
		}
	}
	/**
	 * Google Font sanitization
	 *
	 * @param  string   JSON string to be sanitized
	 * @return string   Sanitized input
	 */
	if ( ! function_exists( 'busia_google_font_sanitization' ) ) {
		function busia_google_font_sanitization( $input ) {
			$val = json_decode( $input, true );
			if ( is_array( $val ) ) {
				foreach ( $val as $key => $value ) {
					$val[ $key ] = sanitize_text_field( $value );
				}
				$input = json_encode( $val );
			} else {
				$input = json_encode( sanitize_text_field( $val ) );
			}
			return $input;
		}
	}
	/**
	 * Date Time sanitization
	 *
	 * @param  string   Date/Time string to be sanitized
	 * @return string   Sanitized input
	 */
	if ( ! function_exists( 'busia_date_time_sanitization' ) ) {
		function busia_date_time_sanitization( $input, $setting ) {
			$datetimeformat = 'Y-m-d';
			if ( $setting->manager->get_control( $setting->id )->include_time ) {
				$datetimeformat = 'Y-m-d H:i:s';
			}
			$date = DateTime::createFromFormat( $datetimeformat, $input );
			if ( $date === false ) {
				$date = DateTime::createFromFormat( $datetimeformat, $setting->default );
			}
			return $date->format( $datetimeformat );
		}
	}
	/**
	 * Slider sanitization
	 *
	 * @param  string   Slider value to be sanitized
	 * @return string   Sanitized input
	 */
	if ( ! function_exists( 'busia_range_sanitization' ) ) {
		function busia_range_sanitization( $input, $setting ) {
			$attrs = $setting->manager->get_control( $setting->id )->input_attrs;
			$min  = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
			$max  = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
			$step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );
			$number = floor( $input / $attrs['step'] ) * $attrs['step'];
			return busia_in_range( $number, $min, $max );
		}
	}
}
