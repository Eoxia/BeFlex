<?php

class Eoxia_Mega_Menu extends Walker_Nav_Menu {

    // Tell Walker where to inherit it's parent and id values
    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );

    // add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	    // depth dependent classes

	    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
	    $classes = array(
	        'sub-menu',
	        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
	        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
	        'menu-depth-' . $display_depth
	        );
	    $class_names = implode( ' ', $classes );
	  
	    // build html
	    // $output .= 'a';
	    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	    //$output .= 'b';
	}

	// function end_lvl( &$output, $depth ) {
	//     $output .= "</ul>";
	// }
	  
	// add main/sub classes to li's and links
	 function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	    global $wp_query;

	    $mega_menu = get_post_meta( $item->ID, '_menu_item_mega-menu', true );

	    $mega_menu_nb_item = get_post_meta( $item->ID, '_menu_item_nb_items', true );

	    $mega_menu_bloc = get_post_meta( $item->ID, '_menu_item_bloc_column', true );

	    $mega_menu_mode = get_post_meta( $item->ID, '_menu_item_bloc_mode', true );

	    $mega_menu_bloc_align = get_post_meta( $item->ID, '_menu_item_bloc_align', true );

	    $mega_menu_bloc_opacity = get_post_meta( $item->ID, '_menu_item_bloc_opacity', true );

	    $mega_menu_background_color = get_post_meta( $item->ID, '_menu_item_bloc_bg_color', true );

	    $mega_menu_txt_color = get_post_meta( $item->ID, '_menu_item_bloc_txt_color', true );

	    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	  
	    // depth dependent classes
	    $depth_classes = array(
	        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
	        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
	        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
	        'menu-item-depth-' . $depth
	    );
	    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
	  
	    // passed classes
	    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
	  
	    // build html	    
	    
	    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="eoxia-'.$mega_menu.'-active ' . $depth_class_names . ' ' . $class_names . '">';
	  
	    // link attributes
	    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
	  	
	  	if ( is_object($args) ):

		    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
		        $args->before,
		        $attributes,
		        $args->link_before,
		        apply_filters( 'the_title', $item->title, $item->ID ),
		        $args->link_after,
		        $args->after
		    );
		else:
			$item_output = '';
		endif;
	  	 //$output .= 't';
	    // build html

	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	    //$output .= 't';
	    $output .= $mega_menu ? '<div class="eoxia-mega-menu gridw'.$mega_menu_nb_item.'">' : false;

	    if( $mega_menu_bloc && $mega_menu ){

	    	//$eoxiaQuery = new WP_Query( array( 'post_type' => 'featured_bloc', 'post__in' => array( $mega_menu_bloc ) ) );
	    	
	    	//while ( $eoxiaQuery->have_posts() ) : $eoxiaQuery->the_post();
	    	$bloc_atts['id'] = $mega_menu_bloc;
	    	$bloc_atts['mode'] = 'background';
	    	$bloc_atts['itemperline'] = 1;
	    	$bloc_atts['mode'] = $mega_menu_mode;
	    	$bloc_atts['bgcolor'] = $mega_menu_background_color;
	    	$bloc_atts['txtcolor'] = $mega_menu_txt_color;
			$bloc_atts['align'] = $mega_menu_bloc_align;
			$bloc_atts['imgopacity'] = $mega_menu_bloc_opacity;
	    	//print_r( $bloc_atts );
	    	$output .= eox_get_blocs_shortcode( $bloc_atts );
	    	$output .= '<div class="menu-wrapper">';
	    	//endwhile;
	    	//wp_reset_postdata();
	    	
	    	//$output .=  $mega_menu_bloc;
	    } else {

	    }
	}

	 function end_el( &$output, $item, $depth = 0, $args = array() ) {

		$mega_menu = get_post_meta( $item->ID, '_menu_item_mega-menu', true );
		$output .= $mega_menu ? '</div>' : false;
		$output .= "</li>";
	 }

}

?>