<?php
/*
* eox_get_diaporama(array( 'ids' => 196, 120, 'template' => 'default' )) ?>
* Return the diaporama selected, here the att :
* $ids = id of your diaporama
* $template = template uses to display (default : default)
*/


add_image_size(
	'thumb-diaporama', 
	get_field( 'largeur_des_images_diaporama', 'options' ), 
	get_field( 'hauteur_des_images_diaporama', 'options' ), 
	get_field( 'ratio_des_images_diaporama', 'options' ) 
);

function eox_get_diaporama( $atts ){

	$eoxia_diaporama_query = new WP_Query();

	if( is_array( $atts ) ){
		$ids = explode(",", $atts['id']);
		$id = $ids[0];
		$template = isset($atts['template']) ? $atts['template'] : 'default';
		$eoxia_diaporama_query = new WP_Query( array( 'post_type' => 'diaporama', 'post__in' => $ids, 'orderby' => 'post__in' ) );
	}

	$i = 0;

	if ( $eoxia_diaporama_query->have_posts() ) :

		while ( $eoxia_diaporama_query->have_posts() ) : $eoxia_diaporama_query->the_post();

			get_template_part( 'inc/diaporama/content', $template );

			$i++;

		endwhile;

	wp_reset_postdata();

	endif; 
}

function eox_get_diaporama_shortcode( $atts, $content = null ) {
	ob_start();
	eox_get_diaporama( $atts );
	return ob_get_clean();
}
add_shortcode( 'get_diaporama', 'eox_get_diaporama_shortcode' );

?>