<?php

/* Custom styles */

add_action('wp_head','eox_hook_css');

function eox_hook_css() {
	get_template_part( 'template-parts/options', 'style' );
}

function eox_get_font_url(){

	$url;

	$name = get_field( 'typographie_des_titres', 'options' );

	$urls_mapping = array(
		'Playfair' => 'Playfair+Display:400,400italic,700,700italic,900,900italic',
		'Open sans' => 'Open+Sans:400,300,300italic,400italic,700,700italic,800,800italic',
		'Roboto' => 'Roboto:400,300,300italic,400italic,700,700italic,900,900italic',
		'Oswald' => 'Oswald:400,300,700',
		'Raleway' => 'Raleway:400,300,300italic,400italic,700,700italic,800,800italic',
		'Lora' => 'Lora:400,400italic,700,700italic',
		'Droid Serif' => 'Droid+Serif:400,400italic,700,700italic',
		'Merriweather' => 'Merriweather:400,300,300italic,400italic,700,700italic,900,900italic',
		'Dosis' => 'Dosis:400,300,600,700',
		'Hind' => 'Hind:400,300,600,700',
		'Nunito' => 'Nunito:400,300,700',
		'Caveat Brush' => 'Caveat+Brush',
		'Work sans' => 'Work+Sans:400,300,700,800',
		'Kadwa' => 'Kadwa:400,700',
		'Poppins' => 'Poppins:400,300,600,700,500',
		'Palanquin Dark' => 'Palanquin+Dark:400,500,700'
	);

	foreach ( $urls_mapping as $key => $url_mapping ) {
		$key == $name ? $url = $url_mapping : false;
	}

	return $url;
}

function eox_get_font_family(){
	$name = get_field( 'typographie_des_titres', 'options' );
	echo "'".$name."';";
}

function eox_get_font_weight(){

	$weight;

	$font_weight = get_field( 'titre_gras', 'options' );

	$weights_mapping = array(
		'light' => 100,
		'normal' => 400,
		'bold' => 700,
		'extrabold' => 900
	);

	foreach ( $weights_mapping as $key => $weight_mapping ) {
		$key == $font_weight ? $weight = $weight_mapping : false;
	}

	echo $weight;
}

function eox_get_font_style(){

	$font_style = get_field( 'titre_italic', 'options' );

	echo $font_style ? 'italic' : 'normal';
}

function eox_get_font_transform(){

	$font_transform = get_field( 'titre_majuscule', 'options' );

	echo $font_transform ? 'uppercase' : 'none';
}

function eox_google_fonts() {
	$query_args = array(
		'family' => eox_get_font_url(),
		'subset' => 'latin,latin-ext'
	);
	wp_register_style( 'eox-google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'eox-google_fonts' );
}
            
add_action('wp_enqueue_scripts', 'eox_google_fonts');

?>