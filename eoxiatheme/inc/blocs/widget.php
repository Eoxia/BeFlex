<?php
class Eoxia_Bloc_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct( 'eoxia-bloc-widget', 'Eox bloc', array( 'description' => __('Affiche les blocs','eoxiatheme') ) );
	}

	public function widget( $args, $instance ) {		

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		//$bloc_args['id'] = $instance['bloc_id'];
		$bloc_args['type'] = 'grid';
		//$bloc_args['nb_per_line'] = $instance['nb_blocs'];
		$instance['nb_blocs'] = !empty($instance['nb_blocs']) ? $instance['nb_blocs'] : 3;
		$bloc_args['custompost'] = 'featured_bloc';

		//print_r( $bloc_args );

		if ( ! empty( $instance['bloc_id'] ) ) {
			//eox_get_blocs( $bloc_args );
			echo do_shortcode('[get_blocs id='.$instance['bloc_id'].' itemperline='.$instance['nb_blocs'].']');
		}
	}
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		$instance['bloc_id'] = ( ! empty( $new_instance['bloc_id'] ) ) ? strip_tags( $new_instance['bloc_id'] ) : '';

		$instance['nb_blocs'] = ( ! empty( $new_instance['nb_blocs'] ) ) ? strip_tags( $new_instance['nb_blocs'] ) : 1;

		return $instance;

	}
	public function form( $instance ) { ?>
		<?php $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
		<?php $bloc_id = ! empty( $instance['bloc_id'] ) ? $instance['bloc_id'] : ''; ?>
		<?php $nb_blocs = ! empty( $instance['nb_blocs'] ) ? $instance['nb_blocs'] : ''; ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'eoxiatheme' ); ?>: </label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'bloc_id' ); ?>"><?php _e( 'Bloc', 'eoxiatheme' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'bloc_id' ); ?>" name="<?php echo $this->get_field_name( 'bloc_id' ); ?>">
				<option selected disabled><?php _e('Select a bloc','eoxiatheme'); ?></option>
				<?php 
				$eoxiaQuery = new WP_Query( array( 'post_type' => 'featured_bloc', 'posts_per_page' => -1 ) ); ?>

				<?php while ( $eoxiaQuery->have_posts() ) : $eoxiaQuery->the_post(); ?>

					<option value="<?php the_ID(); ?>" <?php selected( $bloc_id , get_the_ID() ); ?>><?php the_title(); ?></option>

				<?php endwhile; ?>
			</select>
			<?php wp_reset_postdata(); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'nb_blocs' ); ?>"><?php _e( 'Nb bloc par ligne','eoxiatheme' ); ?>: </label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'nb_blocs' ); ?>" name="<?php echo $this->get_field_name( 'nb_blocs' ); ?>" type="text" value="<?php echo esc_attr( $nb_blocs ); ?>">
		</p> <?php 
	}
}
add_action('widgets_init', function(){register_widget('Eoxia_Bloc_Widget');});
?>