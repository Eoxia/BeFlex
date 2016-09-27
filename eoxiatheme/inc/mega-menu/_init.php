<?php

/* Add info box to bloc post type*/
require get_template_directory() . '/inc/mega-menu/admin.php';

/* Set blocs functions */
require get_template_directory() . '/inc/mega-menu/front.php';

/* Get assets */
function eoxia_mega_menu_assets( $hook ) {
 
	if( $hook == 'nav-menus.php'  ){

		//wp_enqueue_script( 'eoxia-mega-menu-admin-js', plugins_url( 'js/custom.js' , dirname(__FILE__) ) );
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_style( 'eoxia-mega-menu-admin-js', get_template_directory_uri() . '/inc/mega-menu/assets/css/mega-menu.css' );
		wp_enqueue_script( 'eoxia-mega-menu-admin-css', get_template_directory_uri() . '/inc/mega-menu/assets/js/mega-menu.js', array( 'wp-color-picker' ) );
		//wp_enqueue_script( 'custom-script-handle', plugins_url( 'custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}

 
	
}
add_action('admin_enqueue_scripts', 'eoxia_mega_menu_assets');

?>