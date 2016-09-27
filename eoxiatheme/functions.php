<?php
/**
 * eox functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eox
 */



if ( ! function_exists( 'eox_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eox_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on eox, use a find and replace
	 * to change 'eoxiatheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'eoxiatheme', get_template_directory_uri() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'eoxiatheme' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );


	/* Add Editor Features */

	require 'editor/editor.php';

	add_editor_style( 'editor/editor-styles.css' );
	
	if( class_exists('acf') ) {

		/* Get blocs features if ACF installed */
		require get_template_directory() . '/inc/bloc/_init.php';

		/* Get blocs features if ACF installed */
		require get_template_directory() . '/inc/blocs/_init.php';

		/* Get socials features if ACF installed */
		require get_template_directory() . '/inc/social/_init.php';

		/* Get diaporama feature if ACF installed */
		require get_template_directory() . '/inc/diaporama/_init.php';

		/* Get diaporama feature if ACF installed */
		require get_template_directory() . '/inc/sidebars/_init.php';

	}

	/* Get Latest Posts features */
	//require get_template_directory() . '/inc/latest-posts/_init.php';

	/* Get Mega menu features */
	require get_template_directory() . '/inc/mega-menu/_init.php';

	/* Get news feature */
	//require get_template_directory() . '/inc/diaporama/_init.php';


	// include_once('inc/diaporama.php' );

	if( class_exists('acf') ) {
		
		acf_add_options_page(array(
			'page_title' 	=> 'Theme Options',
			'menu_title'	=> 'Theme Options',
			'menu_slug' 	=> 'theme-options',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

		add_image_size(
			'thumb-blog', 
			get_field( 'largeur_image_blog', 'options' ), 
			get_field( 'hauteur_image_blog', 'options' ), 
			get_field( 'ratio_des_images_blog', 'options' ) 
		);

		
		
	}

	

}
endif; // eox_setup
add_action( 'after_setup_theme', 'eox_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eox_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eox_content_width', 1600 );
}
add_action( 'after_setup_theme', 'eox_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function eox_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'top 1', 'eoxiatheme' ),
		'id'            => 'top-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'top 2', 'eoxiatheme' ),
		'id'            => 'top-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar blog', 'eoxiatheme' ),
		'id'            => 'sidebar-blog',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 1', 'eoxiatheme' ),
		'id'            => 'boxfoot-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 2', 'eoxiatheme' ),
		'id'            => 'boxfoot-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 3', 'eoxiatheme' ),
		'id'            => 'boxfoot-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Boxfoot 4', 'eoxiatheme' ),
		'id'            => 'boxfoot-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Footer 1', 'eoxiatheme' ),
	// 	'id'            => 'footer-1',
	// 	'description'   => '',
	// 	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</aside>',
	// 	'before_title'  => '<h3 class="widget-title">',
	// 	'after_title'   => '</h3>',
	// ) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'eoxiatheme' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'eox_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eox_scripts() {

	wp_enqueue_style( 'eox-style', get_template_directory_uri() . '/css/style.css' );	

	wp_enqueue_style( 'eox-userstyle', get_template_directory_uri() . '/style.css' );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'eox-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'eox-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eox_scripts' );



/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/*
 * Include the TGM configuration
 */
require_once( get_template_directory() . '/inc/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/inc/starter-tgm.php' );

/**
 * Custom functions that act independently of the theme templates.
 */
// require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// require get_template_directory() . '/inc/jetpack.php';

/* Themes features */

/* get des alertes */
function eox_get_alert( $message = 'Erreur', $type = 'error' ){
	echo '<div><div class="alerte '.$type.'">'.$message.'</div></div>';
}

/* get des widgets */
function eox_get_widget( $name ){
	if ( is_active_sidebar( $name ) ):
		dynamic_sidebar( $name );
	elseif ( is_user_logged_in() ):
		eox_get_alert('<a href="'.home_url().'/wp-admin/widgets.php">Le widget ('.$name.') est vide, vous pouvez le configurer</a>', 'warning');
	endif;
}

/* get data */
function eox_html( $string, $balise = 'span' , $classes = '', $styles = ''){
	$classes = $classes ? sprintf('class="%s"', $classes ) : false;
	return $string ? sprintf( '<%2$s %3$s style="%4$s">%1$s</%2$s>', wp_strip_all_tags( $string ), $balise, $classes, $styles ) : false;
}

/* get & echo data */

function eox_the_html( $string, $balise='span' , $classes='', $styles = ''){
	echo eox_html( $string, $balise, $classes, $styles );
}

/* get link */

function eox_html_link( $label, $link , $classes='', $styles = '' ){
	$classes = $classes ? sprintf('class="%s"', $classes ) : false;
	return $link ? sprintf( '<a href="%2$s" %3$s style="%4$s">%1$s</a>', wp_strip_all_tags( $label ), $link, $classes, $styles ) : false;
}

/* get & echo link */

function eox_the_html_link( $label, $link , $classes='', $styles='' ){
	echo eox_html_link( $label, $link, $classes, $styles );	
}


function eox_html_img( $id, $display = 1, $size = 'thumb-bloc' ){
	if( $id && $display ):
		//return wp_get_attachment_image( $id, $size ).eox_html_caption( $id );		
		return wp_get_attachment_image( $id, $size );		
	endif;
}

function eox_html_caption( $id ){
	$image_meta =  wp_get_attachment_metadata( $id );
	//$image_caption = $image_meta['image_meta']['caption'];
	//print_r( $image_meta['image_meta'] );
	//$image_meta = $image_meta ? $image_meta : ' ';

	// if( !$image_meta ){
	// 	$image_meta = 'no caption';
	// }

	//print_r( $image_meta.'<hr>' );

	return sprintf( '<figcaption>%1$s</figcaption>', $image_meta['image_meta']['caption'] );

	//return 'figcation';

	//print_r( $image_meta );
	
}

function eox_the_html_img( $id, $display = 1 , $size = 'thumb-bloc' ){
	echo eox_html_img( $id, $display, $size );
}

function eox_image_metas( $img ){ ?>
	<?php if( $img['caption'] ): ?>
		<figcaption><?php echo parsed_language( $img['caption'] ); ?></figcaption>
	<?php else: ?>
		<figcaption><?php echo $img['title']; ?></figcaption>
	<?php endif; ?>
	<?php if( $img['description'] ): ?>
		<span class="entry-description"><?php echo parsed_language( $img['description'] ); ?></span>
	<?php endif; ?>
<?php }

/* */

function eox_get( $string = '', $replace = 0, $display = 1 ){
	if(  $replace && $display ){
		return $replace;
	} elseif( $string && $display ) {
		return $string;
	}	
}

function eox_the_post_categories( $id = 0 ){
	$string = '';
	if( $id ){
		$eox_cats = get_the_category( $id );
		if( $eox_cats ):
			$string .= '<div class="eox-categories">';
			foreach ($eox_cats as $key => $eox_cat) {
				if( $eox_cat->cat_ID != 1 ){
					$eox_cat_link = get_category_link( $eox_cat->cat_ID );
					$string .= '<a href="'.$eox_cat_link.'" class="eox-label">';
					$string .= $eox_cat->name;
					$string .= '</a>';
				}
			}
			$string .= '</div>';
		endif;
	}
	return $string;
}

function eox_post_footer( $id = 0, $size = 'mini' ){
	$user_ID = get_current_user_id();
	$author_metas = get_the_author_meta( 'url', $user_ID );
	$avatar = get_avatar( $user_ID );
	$prenom = get_the_author_meta( 'first_name', $user_ID );
	$nom = get_the_author_meta( 'last_name', $user_ID );
	$description = get_the_author_meta( 'description', $user_ID );
	echo '<div class="entry-author --'.$size.'">';
	if( $size == 'mini' ){
		
		$info = '<span class="author-name">'.$prenom.' '.$nom.'</span>';
		$avatar = get_avatar( $user_ID, 25 );
	} else {
		$info = '<span class="author-name">'.$prenom.' '.$nom.'</span>';
		$info .= '<span class="author-description">'.$description.'</span>';
		$avatar = get_avatar( $user_ID, 120 );
	}
	echo '<div class="author-avatar">';
	echo $avatar;
	echo '</div>';
	echo '<div class="author-info">';
	echo $info;
	echo '</div>';
	echo '</div>';
}

function eox_serialize_shortcode_atts( $atts ){
	$attsstr = '';
	foreach( $atts as $key => $val ) {
		$attsstr .= $key.'='.eox_get_shortcode_val( $key, $val ).' ';
	}
	return $attsstr;
}

function eox_get_shortcode_val( $key, $val ){
	if( is_array( $val ) ){
		//return $key;
		return (in_array($key, $val) ? 1 : 0);
	} else {
		return $val ? $val : 0;
	}
	
}

