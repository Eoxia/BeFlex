<?php
class Eox_Social_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct('eox_socializer', 'Eox Socializer', array('description' => __('Display social links','eoxiatheme') ));
	}

	public function widget($args, $instance) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		echo do_shortcode('[socializer]');
		echo $args['after_widget'];
	}

	public function form($instance) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php eox_the_html( __('Display social links', 'eoxiatheme'), 'p' );
		eox_the_html( __('Setup social links in theme options panel', 'eoxiatheme'), 'p' );
	}
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;

	}
}
add_action('widgets_init', function(){register_widget('Eox_Social_Widget');});