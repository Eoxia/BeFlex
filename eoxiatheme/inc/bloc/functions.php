<?php

/*
* eox_get_latest_posts(array('type'=>'grid', 'nb_per_line'=>3, 'posts_per_page'=>6, 'order'=>'DESC' )) ?>
* Return the latests post, here the att :
* $type = grid, line (default : grid)
* $nb_per_line = what you want (default : 3)
* $posts_per_page = what you want (default : 6)
* $order = ASC, DESC (default : DESC)
*/

function eox_get_bloc( $atts = 0 ){

	print_r( $atts );

	// $eoxiaQuery = new WP_Query();

	// if( !is_array( $atts ) ) :
	// 	$atts = array();
	// endif;

	// $type = $atts['type'] ? $atts['type'] : 'grid';
	// $nb_per_line = $atts['nb_per_line'] ? $atts['nb_per_line'] : 3;
	// $posts_per_page = $atts['posts_per_page'] ? $atts['posts_per_page'] : 6;
	// $order = $atts['order'] ? $atts['order'] : 'DESC';

	// $eoxiaQuery = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page, 'order' => $order ) );

	// if ( $eoxiaQuery->have_posts() ) :

	// 	echo '<div class="blocs-wrapper '.$type.'wrapper w'.$nb_per_line.'">';

	// 	while ( $eoxiaQuery->have_posts() ) : $eoxiaQuery->the_post();
		
	// 		get_template_part( 'inc/latest-posts/content', 'default' );

	// 	endwhile;
 
	// 	echo '</div>';

	// wp_reset_postdata();

	// else :

	// 	$edit_link = '<a href="'.home_url().'/wp-admin/edit.php">'.__('Ajouter', 'eoxiatheme').'</a>';

	// 	eox_get_alert( __('Pas d\'articles', 'eoxiatheme').' : '.$edit_link );

	// endif; 
}

/* Set collection shortcode */

function eox_single_custom_post_shortcode( $atts, $content = null ) {
	ob_start();
	eox_get_bloc($atts);
	return ob_get_clean();
}
add_shortcode( 'eox_get_bloc', 'eox_single_custom_post_shortcode' );

/* */

?>