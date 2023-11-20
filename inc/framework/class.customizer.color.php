<?php
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Class to create a custom date picker
 */
class Arte_Color_Control extends WP_Customize_Control {

	public $type = 'coloor';

	/**
	 * Enqueue the styles and scripts
	 */
	public function enqueue() {

		wp_enqueue_style( 'wp-color-picker' );

		wp_enqueue_script(
			'arte-color-picker',
			get_template_directory_uri() . '/assets/admin/js/wp-color-picker-alpha.js',
			array( 'wp-color-picker' ),
			rand(),
			true
		);
		wp_enqueue_script(
			'arte-color-picker-control',
			get_template_directory_uri() . '/assets/admin/js/customizer.control.color.js',
			array( 'arte-color-picker' ),
			rand(),
			true
		);

	}

	/**
	 * Render the content on the theme customizer page
	 */
	public function render_content() {
		?>
        <span class="customize-control-title">
          <?php echo esc_html( $this->label ); ?>
        </span>
        <span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
        <div class="color-picker-wrapper-curly">
            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" class="curly_color">
            <input type="text"  data-alpha="true" data-alpha-reset="true" data-alpha-enabled="true" class="color-picker" data-default-color="<?php echo isset( $this->setting->default ) ? $this->setting->default : '' ?>"  value="<?php echo esc_attr( $this->value() ); ?>" />
        </div>
		<?php
	}
}

?>
