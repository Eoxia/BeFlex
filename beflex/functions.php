<?php
/**
 * eoxiatheme child functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eoxiatheme Child
 */

if( class_exists('acf') ) {

	/* Get custom styles features if ACF installed */
	require __DIR__ . '/inc/styles/_init.php';

}


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Hind+Vadodara:400,300,500,600,700', false );

    wp_enqueue_style( 'eox-style', get_template_directory_uri() . '/css/style.css' );

    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/css/style.css' );

    if( class_exists('acf') ):
	    $theme = get_field('theme', 'options');

	    if( $theme )
	    	wp_enqueue_style( 'child-style-mode', get_stylesheet_directory_uri() . '/css/'.$theme.'.css' );

    endif;

}




/* Load ACF field in parent, save and use ACF field in child */

add_filter('acf/settings/save_json', function() {
	return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function( $paths ) {
	$paths = array(get_template_directory() . '/acf-json');
	if(is_child_theme()){
		$paths = array(
			get_stylesheet_directory() . '/acf-json',
			get_template_directory() . '/acf-json'
		);
	}
	return $paths;
});

function eox_remove_some_widgets(){

	// Unregister some of the TwentyTen sidebars
	unregister_sidebar( 'top-2' );

}
add_action( 'widgets_init', 'eox_remove_some_widgets', 11 );

function beflex_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'beflex_custom_excerpt_length', 999 );



