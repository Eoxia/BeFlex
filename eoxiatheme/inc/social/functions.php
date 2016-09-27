<?php

/* get blocs collection function */

function eox_get_socials( $atts ){

	$type = 'ib';
	$nb_per_line = 0;

	if( is_array( $atts ) ){

		$type = $atts['type'] ? $atts['type'] : 'grid';
		$nb_per_line = $atts['nb_per_line'] ? $atts['nb_per_line'] : 4;

	}	
	
	if( have_rows('liens_reseaux', 'options') ):

		echo '<div class="socializer-wrapper '.$type.'wrapper w'.$nb_per_line.'">';
	    while ( have_rows('liens_reseaux', 'options') ) : the_row();

			get_template_part( 'inc/social/content', 'social' );

	    endwhile;

	    echo '</div>';

	else :
		
		$edit_link = '<a href="'.home_url().'/wp-admin/admin.php?page=theme-options">'.__('Ajouter', 'eoxiatheme').'</a>';

		eox_get_alert( __('Pas de liens sociaux', 'eoxiatheme').' : '.$edit_link );

	endif;
}

/* Set collection shortcode */

function eox_socializer_shortcode( $atts, $content = null ) {
	ob_start();
	eox_get_socials($atts);
	return ob_get_clean();
}
add_shortcode( 'socializer', 'eox_socializer_shortcode' );

/* */

?>