<?php
/**
 * Theme customization
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

/**
 * Display in the Head user colors
 *
 * @return void
 */
function beflex_custom_styles_enqueue() {
	get_template_part( 'inc/custom-styles/css/option', 'color' );
}
add_action( 'wp_head','beflex_custom_styles_enqueue' );

if ( ! function_exists( 'beflex_get_font_family' ) ) :
	/**
	 * Get font chosen by user
	 *
	 * @return string Font family.
	 */
	function beflex_get_font_family() {
		$font_name = get_field( 'typographie_des_titres', 'options' );
		return $font_name;
	}
endif;

if ( ! function_exists( 'beflex_get_font_weight' ) ) :
	/**
	 * Get font weight chosen by user
	 *
	 * @return string Font family.
	 */
	function beflex_get_font_weight() {
		$weight = '';
		$font_weight = get_field( 'titre_gras', 'options' );
		$weights_mapping = array(
			'light' => 100,
			'normal' => 400,
			'bold' => 700,
			'extrabold' => 900,
		);

		foreach ( $weights_mapping as $key => $value ) :
			( $font_weight === $key ) ? $weight = $value : false;
		endforeach;

		return $weight;
	}
endif;

if ( ! function_exists( 'beflex_get_font_style' ) ) :
	/**
	 * Get font style chosen by user
	 *
	 * @return string Font family.
	 */
	function beflex_get_font_style() {
		$font_style = get_field( 'titre_italic', 'options' );
		$style = ( $font_style ) ? 'italic' : 'normal';

		return $style;
	}
endif;

if ( ! function_exists( 'beflex_get_font_transform' ) ) :
	/**
	 * Get font transform chosen by user
	 *
	 * @return string Font family.
	 */
	function beflex_get_font_transform() {
		$font_transform = get_field( 'titre_majuscule', 'options' );
		$transform = ( $font_transform ) ? 'uppercase' : 'none';

		return $transform;
	}
endif;

if ( ! function_exists( 'beflex_get_font_url' ) ) :
	/**
	 * Get the google fonts links compared to user options
	 *
	 * @return array All the google font links.
	 */
	function beflex_get_font_url() {
		$url = '';
		$name = get_field( 'typographie_des_titres', 'options' );
		$native_urls = array(
			'Caveat Brush' => 'Caveat+Brush',
			'Dosis' => 'Dosis:400,300,600,700',
			'Droid Serif' => 'Droid+Serif:400,400italic,700,700italic',
			'Exo 2' => 'Exo+2:300,400i,700',
			'Hind' => 'Hind:400,300,600,700',
			'Kadwa' => 'Kadwa:400,700',
			'Lora' => 'Lora:400,400italic,700,700italic',
			'Merriweather' => 'Merriweather:400,300,300italic,400italic,700,700italic,900,900italic',
			'Nunito' => 'Nunito:400,300,700',
			'Open sans' => 'Open+Sans:400,300,300italic,400italic,700,700italic,800,800italic',
			'Oswald' => 'Oswald:400,300,700',
			'Palanquin Dark' => 'Palanquin+Dark:400,500,700',
			'Playfair' => 'Playfair+Display:400,400italic,700,700italic,900,900italic',
			'Poppins' => 'Poppins:400,300,600,700,500',
			'Raleway' => 'Raleway:400,300,300italic,400italic,700,700italic,800,800italic',
			'Roboto' => 'Roboto:400,300,300italic,400italic,700,700italic,900,900italic',
			'Work sans' => 'Work+Sans:400,300,700,800',
		);
		$urls_mapping = apply_filters( 'font_url', $native_urls );

		foreach ( $urls_mapping as $key => $value ) :
			( $key === $name ) ? $url = $value : false;
		endforeach;

		return $url;
	}
endif;

/**
 * Enqueue Google font typographie
 *
 * @return void
 */
function beflex_get_google_font() {
	$font_url = beflex_get_font_url();

	if ( ! empty( $font_url ) ) :
		$query_args = array(
			'family' => $font_url,
		);
		wp_register_style( 'eox-google_fonts', add_query_arg( $query_args, '//fonts.googleapis.com/css' ), array(), null );
		wp_enqueue_style( 'eox-google_fonts' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'beflex_get_google_font' );
