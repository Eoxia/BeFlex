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
  wp_enqueue_style( 'custom-child-style', get_stylesheet_directory_uri() . '/style.css' );

  if( class_exists('acf') ) :
    $theme = get_field('theme', 'options');

    if( $theme ) :
    	wp_enqueue_style( 'child-style-mode', get_stylesheet_directory_uri() . '/css/'.$theme.'.css' );
		endif;

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

function epx_update_widget(){

	// Unregister some of the EoxiaTheme sidebars
	unregister_sidebar( 'top-1' );
	unregister_sidebar( 'top-2' );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar boutique', 'eoxiatheme' ),
		'id'            => 'sidebar-boutique',
		'description'   => esc_html__( 'S\'affichera sur les page catégories de produits / produits WPshop', 'eoxiatheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'epx_update_widget', 11 );

function beflex_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'beflex_custom_excerpt_length', 999 );

/**
 * Affiche le bloc Yoast tout en bas de l'admin
 */
function yoast_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_bottom');
