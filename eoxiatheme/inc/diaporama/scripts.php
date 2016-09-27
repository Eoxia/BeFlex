<?php
function eox_diapoarama_scripts() {

	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/inc/diaporama/assets/css/flickity.css' );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/inc/diaporama/assets/js/flickity.pkgd.min.js' );

}
add_action( 'wp_enqueue_scripts', 'eox_diapoarama_scripts' );
?>