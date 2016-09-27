<?php
class Eoxia_Diaporama_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct( 'eoxia-diaporama-widget', 'Eox Diaporama', array( 'description' => __('Display a diaporama', 'eoxiatheme') ) );
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		if ( ! empty( $instance['diaporama_id'] ) ) {
			echo do_shortcode('[get_diaporama id="'.$instance['diaporama_id'].'"]');
		}
		echo $args['after_widget'];
	}
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['diaporama_id'] = ( ! empty( $new_instance['diaporama_id'] ) ) ? strip_tags( $new_instance['diaporama_id'] ) : '';
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;

	}
	public function form( $instance ) { ?>
		<?php $diaporama_id = ! empty( $instance['diaporama_id'] ) ? $instance['diaporama_id'] : ''; ?>
		<?php $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'bloc_id' ); ?>"><?php _e( 'Diaporama', 'eoxiatheme' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'diaporama_id' ); ?>" name="<?php echo $this->get_field_name( 'diaporama_id' ); ?>">
				<option selected disabled><?php _e( 'Select a diaporama','eoxiatheme' ); ?></option>
				<?php 
				$eoxiaQuery = new WP_Query( array( 'post_type' => 'diaporama' ) ); ?>

				<?php while ( $eoxiaQuery->have_posts() ) : $eoxiaQuery->the_post(); ?>

					<option value="<?php the_ID(); ?>" <?php selected( $diaporama_id , get_the_ID() ); ?>><?php the_title(); ?></option>

				<?php endwhile; ?>
			</select>
			<?php wp_reset_postdata(); ?>
		</p> <?php 
	}
}
add_action('widgets_init', function(){register_widget('Eoxia_Diaporama_Widget');});
?>