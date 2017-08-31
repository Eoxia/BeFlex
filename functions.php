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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Navigation principale', 'beflex' ),
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

		/**
		 * Create the option page with the ACF plugin
		 */
		if ( is_acf() ) :
			acf_add_options_page( array(
				'page_title' 	=> 'Theme Options',
				'menu_title'	=> 'Theme Options',
				'menu_slug' 	=> 'theme-options',
				'capability'	=> 'edit_posts',
				'redirect'		=> false,
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
		'description'   => esc_html__( 'S\'affichera sur les pages blogs / catégories de blog / articles.', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
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
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				) );
			endwhile;
	endif;
	if ( is_wpshop() ) :
		register_sidebar( array(
			'name'          => esc_html__( 'Boutique', 'beflex' ),
			'id'            => 'boutique',
			'description'   => esc_html__( 'Cette sidebar s\'affiche sur les pages de votre boutique.', 'beflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	endif;
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 1', 'beflex' ),
		'id'            => 'boxfoot-1',
		'description'   => esc_html__( '1ere zone du Boxfoot. Le Boxfoot s\'affiche juste avant le footer.', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 2', 'beflex' ),
		'id'            => 'boxfoot-2',
		'description'   => esc_html__( '2eme zone du Boxfoot. Le Boxfoot s\'affiche juste avant le footer.', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 3', 'beflex' ),
		'id'            => 'boxfoot-3',
		'description'   => esc_html__( '3eme zone du Boxfoot. Le Boxfoot s\'affiche juste avant le footer.', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 4', 'beflex' ),
		'id'            => 'boxfoot-4',
		'description'   => esc_html__( '4eme zone du Boxfoot. Le Boxfoot s\'affiche juste avant le footer.', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'beflex' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'S\'affiche à droite dans le footer', 'beflex' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'beflex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function beflex_scripts() {
	// Enqueue Style.
	wp_enqueue_style( 'beflex-style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'beflex-custom-style', get_stylesheet_uri() );
	if ( class_exists( 'acf' ) ) :
		$theme = get_field( 'theme', 'options' );
		if ( ! empty( $theme ) ) :
			wp_enqueue_style( 'beflex-theme', get_template_directory_uri() . '/inc/custom-styles/css/' . $theme . '.css' );
		endif;
	endif;

	// Enqueue Scripts.
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'beflex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'beflex-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'beflex-search', get_template_directory_uri() . '/js/search.js', array(), '', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beflex_scripts' );

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
