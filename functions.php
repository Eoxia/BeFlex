<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Beflex
 * @since 4.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'beflextheme_support' ) ) :
	/**
	 * Theme support.
	 *
	 * Block themes automatically get post-thumbnails, responsive-embeds,
	 * editor-styles, html5 and automatic-feed-links support.
	 *
	 * @since 4.0.0
	 *
	 * @return void
	 */
	function beflextheme_support() {
		load_theme_textdomain( 'beflex', get_template_directory() . '/languages' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/css/style.min.css' );
	}
endif;
add_action( 'after_setup_theme', 'beflextheme_support' );

/**
 * Enqueue scripts and styles.
 *
 * @since 4.0.0
 *
 * @return void
 */
function beflextheme_scripts() {
	$version = wp_get_theme( get_template() )->get( 'Version' );

	wp_enqueue_style( 'beflex-style', get_template_directory_uri() . '/assets/css/style.min.css', array(), $version );

	wp_enqueue_script(
		'beflex-script',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		$version,
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'beflextheme_scripts' );

/**
 * Add class to body.
 *
 * @since 4.0.0
 *
 * @param string[] $classes Body classes.
 * @return string[] Body classes.
 */
function beflex_add_custom_classes_to_body( $classes ) {
	if ( ! is_admin() ) {
		$classes[] = 'frontend';
	}
	return $classes;
}
add_filter( 'body_class', 'beflex_add_custom_classes_to_body' );

// Block patterns.
require_once get_template_directory() . '/inc/block-patterns.php';
