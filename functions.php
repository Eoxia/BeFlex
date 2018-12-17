<?php
/**
 * Theme functions
 *
 * @author Eoxia <contact@eoxia.com>
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @since 1.0.0
 * @version 2.0.0-phoenix
 * @package beflex
 */

if ( ! function_exists( 'beflex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function beflex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on beflex, use a find and replace
		 * to change 'beflex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'beflex', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Autorise les extraits sur les pages.
		add_post_type_support( 'page', 'excerpt' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Main Navigation', 'beflex' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add custom style for tinymce.
		add_editor_style( 'css/custom-editor-style.css' );

		/**
		 * Create the option page with the ACF plugin
		 */
		if ( is_acf() && function_exists( 'acf_add_options_page' ) ) :
			acf_add_options_page( array(
				'page_title' => 'Theme Options',
				'menu_title' => 'Theme Options',
				'menu_slug'  => 'theme-options',
				'capability' => 'edit_posts',
				'redirect'   => false,
			));
		endif;

		/**
		 * Theme customization with ACF
		 */
		if ( is_acf() ) :
			require get_template_directory() . '/inc/custom-styles/custom-styles.php';
		endif;

	}
endif;
add_action( 'after_setup_theme', 'beflex_setup' );

if ( ! function_exists( 'beflex_hide_wp_editor' ) ) :
	/**
	 * Masque l'éditeur de WordPress sur les pages sans contenu
	 *
	 * @method beflex_hide_wp_editor
	 * @return void
	 */
	function beflex_hide_wp_editor() {
		// Stop la fonction si on ne trouve pas la variable post.
		if ( empty( $_GET['post'] ) ) return;

		// Récupère le Post ID.
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
		if ( ! isset( $post_id ) ) return;

		// Supprime l'éditeur si pas de contenu.
		$page_content = get_post_field( 'post_content', $post_id );
		if ( empty( $page_content ) ) :
			remove_post_type_support( 'page', 'editor' );
		endif;
	}
endif;
add_action( 'admin_init', 'beflex_hide_wp_editor' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function beflex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'beflex_content_width', 640 );
}
add_action( 'after_setup_theme', 'beflex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function beflex_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Blog', 'beflex' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Display on blog / post / archive pages.', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	// Enregistrement des sidebars personnalisées par l'utilisateur.
	if ( is_acf() && have_rows( 'sidebars', 'options' ) ) :
		while ( have_rows( 'sidebars', 'options' ) ) : the_row();
				$sidebar_name = get_sub_field( 'sidebar', 'options' );
				register_sidebar( array(
					'name'          => $sidebar_name,
					'id'            => sanitize_title( $sidebar_name ),
					'description'   => esc_html( get_sub_field( 'sidebar_description', 'options' ) ),
					'before_widget' => '<aside id="%1$s" class="widget %2$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<div class="widget-title">',
					'after_title'   => '</div>',
				) );
			endwhile;
	endif;
	if ( is_wpshop() ) :
		register_sidebar( array(
			'name'          => esc_html__( 'Shop', 'beflex' ),
			'id'            => 'boutique',
			'description'   => esc_html__( 'Display on shop pages', 'beflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );
	endif;
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 1', 'beflex' ),
		'id'            => 'boxfoot-1',
		'description'   => esc_html__( '1 Boxfoot. Boxfoot display before Footer', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 2', 'beflex' ),
		'id'            => 'boxfoot-2',
		'description'   => esc_html__( '2 Boxfoot. Boxfoot display before Footer', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 3', 'beflex' ),
		'id'            => 'boxfoot-3',
		'description'   => esc_html__( '3 Boxfoot. Boxfoot display before Footer', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 4', 'beflex' ),
		'id'            => 'boxfoot-4',
		'description'   => esc_html__( '4 Boxfoot. Boxfoot display before Footer', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'beflex' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Display on right in Footer', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'beflex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function beflex_scripts() {
	// Enqueue Style.
	wp_enqueue_style( 'font-opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' );
	wp_enqueue_style( 'beflex-font-awesome', get_template_directory_uri() . '/css/fontawesome/fontawesome-all.min.css' );
	wp_enqueue_style( 'beflex-style', get_template_directory_uri() . '/css/style.min.css' );
	wp_enqueue_style( 'beflex-custom-style', get_stylesheet_uri() );
	if ( class_exists( 'acf' ) ) :
		$theme = get_field( 'theme', 'options' );
		if ( ! empty( $theme ) ) :
			wp_enqueue_style( 'beflex-theme', get_template_directory_uri() . '/inc/custom-styles/css/' . $theme . '.css' );
		endif;
	endif;

	// Enqueue Scripts.
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'beflex-fontawesome', get_template_directory_uri() . '/js/inc/all.min.js', array(), '', true );
	wp_enqueue_script( 'beflex-isotope', get_template_directory_uri() . '/js/inc/isotope.min.js', array(), '', true );
	wp_enqueue_script( 'beflex-lightbox', get_template_directory_uri() . '/js/inc/simple-lightbox.min.js', array(), '', true );
	wp_enqueue_script( 'beflex-skip-link-focus-fix', get_template_directory_uri() . '/js/inc/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'beflex-main-js', get_template_directory_uri() . '/js/main.min.js', array(), '', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beflex_scripts' );

if ( class_exists( 'acf' ) ) :
	/**
	 * Ajoute la classe du theme choisi dans le body?
	 *
	 * @method beflex_add_theme_class
	 * @param Array $classes body classes.
	 * @return Array $classes body classes.
	 */
	function beflex_add_theme_class( $classes ) {
		// Récupère le choix du thème dans les options.
		$theme = get_field( 'theme', 'option' );
		if ( empty( $theme ) ) :
			$theme = 'light';
		endif;

		// Ajoute la classe dans le body.
		$classes[] = $theme;
		return $classes;
	}
	add_filter( 'body_class', 'beflex_add_theme_class' );
endif;

/**
 * Affiche le bloc du plugin Yoast SEO tout en bas des pages
 *
 * @method beflex_display_yoast_bottom
 * @return priority
 */
function beflex_display_yoast_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'beflex_display_yoast_bottom' );

/**
 * [beflex_init_tiny_buttons description]
 *
 * @param  Array $buttons liste des boutons.
 * @return Array $buttons liste des boutons.
 */
function beflex_init_tiny_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'beflex_init_tiny_buttons' );

/**
 * Ajoute des boutons personnalisés dans la barre de Tiny MCE
 *
 * @param  Array $init_array Liste des boutons.
 * @return Array Liste des boutons.
 */
function beflex_add_custom_formats( $init_array ) {
	$style_formats = array(
		array(
			'title'   => 'Entete',
			'block'   => 'div',
			'classes' => 'beflex-entete',
			'wrapper' => true,
		),
		array(
			'title'   => 'Bouton',
			'block'   => 'a',
			'classes' => 'button primary',
			'wrapper' => true,
		),
	);

	$init_array['style_formats'] = wp_json_encode( $style_formats );
	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'beflex_add_custom_formats' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions toolbox for the theme
 */
require get_template_directory() . '/inc/general-functions.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * TGM Configuration
 */
require get_template_directory() . '/inc/tgm-plugin-activation/starter-tgm.php';
