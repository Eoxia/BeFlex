<?php

/* Set collection shortcode */

function eox_get_blocs_shortcode( $atts, $content = null ) {

	$atts = shortcode_atts( array(
        'display' => 'grid',					/*	Display : grid */
        'itemperline' => 4,						/* 	1-10 */
        'haswrapper' => 1,						/* 	1, 0 */
        'mode' => 'std',						/*	background, std, listleft, listright */
        'limit' => 999,							/* Nb de bloc maxi */
        'id' => 0,								/* 	1,2,3 ... */
        'isfullwidth' => 1,						/*  1, 0 */
        'iscarousel' => 0,						/*  1, 0 */
        'bgcolor' => '#000000',					/* #000000 */
        'txtcolor' => '#ffffff',				/* #ffffff */
        'displaybutton' => 1,					/* 1, 0 */
        'imgopacity' => 50, 					/* 0-100 */
        'align' => 'left',						/* left, center, right, justify */
        'displaymetas' => 1,					/* 1, 0 */
        'displayimg' => 1,						/* 1, 0 */
        'displaytitle' => 1,					/* 1, 0 */
        'displayexcerpt' => 1,					/* 1, 0 */
        'excerptlength' => 20,					/* 1, 0 */
        'ratio' => 'auto',						/* in progress */
        'content_title' => '',					/* statique content title */
        'content_img' => '',					/* statique content attachement ID or URL */
        'content_excerpt' => '',				/* statique content excerpt */
        'content_link' => '',					/* statique content link */
        'content_label' => ''	,				/* statique content button label */
        'bloc_button_style' => '',
        //'dynamic' => 0,							/* Dynamique : last_post, cat_post, tag_post, format_post, last_product, new_product, featured_product */
        //'dynamic_data' => 0,					/* Format post : aside, image, video, quote, link */
        //'dynamic_order' => 0,
        //'dynamic_order_data' => 0,
        //'last_post' => 0,
        // 'cat_post' => 0,
        // 'tag_post' => 0,
        // 'format_post' => 0,
        'espacement_bloc' => 1,
        'espacement_section' => 2,
        'dynamic' => 0,
        'bloctype' => 'auto',
        'custompost' => 'featured_bloc',
        'bloc_class' => 'bloc-item',
        'bg_style' => '',
        'txt_style' => '',
        'carousel_base_options' => array(
			'cellAlign' => "left",
			'contain' => true, 
			'imagesLoaded' => true
		)
    ), $atts );

	$atts = eox_format_atts($atts);

	ob_start();

	eox_get_blocs( $atts );

	return $atts['haswrapper'] ? sprintf( '<div class="gridwrapper -padding-'.$atts['espacement_bloc'].' blocs-wrapper %2$s" data-flickity-options=%3$s>%1$s</div>', ob_get_clean(), $atts['iscarousel'], json_encode( $atts['carousel_base_options'] ) ) : ob_get_clean();
}
add_shortcode( 'get_blocs', 'eox_get_blocs_shortcode' );


function eox_format_atts( $atts ){
	/* Traitement des valeurs et création des classes */

	// $atts['dynamic'] = $atts['dynamic_data'] ? 1 : 0;

	$atts['id'] = $atts['dynamic'] ? 0 : explode( ',',$atts['id'] );		/* Array convert */

	$atts['display'] = '-d-'.$atts['display'];			/* Création classe display  */

	$atts['itemperline'] = '-w-1x'.$atts['itemperline']; 	/* Création classe de largeur */

	$atts['imgopacity'] = ($atts['mode'] == 'background') ? '-o-'.sanitize_title( round( $atts['imgopacity'] )/100 ) : false;		/* Création classe d'opacité */

	$atts['mode'] = $atts['mode'] ? '-m-'.$atts['mode'] : false;					/* Création classe de mode */

	$atts['align'] = '-a-'.$atts['align'];					/* Création classe de mode */

	/* Options de base carousel */

	$carousel_base_options = array(
		'cellAlign' => "left",
		'contain' => true, 
		'imagesLoaded' => true
	);		

	$atts['displaybutton'] = $atts['displaybutton'] ? '-d-bton' : false;	 /* Création classe display bouton  */

	$atts['displayimg'] = $atts['displayimg'] ? '-d-img' : '-no-img';	 /* Création classe display bouton  */

	$atts['iscarousel'] = $atts['iscarousel'] ? 'js-flickity' : false;	 /* Création classe carousel  */

	$atts['bloc_class'] = 'bloc-item bloc-item-'.$atts['id'][0].' '.$atts['display'].' '.$atts['itemperline'].' '.$atts['mode'].' '.$atts['displaybutton'].' '.$atts['imgopacity'].' -t-'.$atts['bloctype'].' '.$atts['align'].' '.$atts['displayimg'].' -padding-'.$atts['espacement_bloc'];
	
	$atts['bg_style'] = ($atts['mode'] == '-m-background') ? sprintf('%1$s%2$s', ($atts['bgcolor'] ? 'background-color:'.$atts['bgcolor'].';' : false), ($atts['txtcolor'] ? 'color:'.$atts['txtcolor'].';' : false) ) : false;

	$atts['txt_style'] = ($atts['mode'] == '-m-background') ? sprintf('%1$s', ($atts['txtcolor'] ? 'color:'.$atts['txtcolor'].';' : false) ) : false;

	return $atts;
}


add_image_size(
	'thumb-bloc', 
	get_field( 'largeur_des_images_bloc', 'options' ) ? get_field( 'largeur_des_images_bloc', 'options' ) : 400, 
	get_field( 'hauteur_des_images_bloc', 'options' ) ? get_field( 'hauteur_des_images_bloc', 'options' ) : 260, 
	get_field( 'ratio_des_images_bloc', 'options' )
);

/* get blocs collection function */

function eox_get_blocs( $atts ){

	

	if ( $atts['id'][0] ) :
		
		$eox_get_bloc_query = new WP_Query( array( 'post_type' => $atts['custompost'], 'post__in' => $atts['id'], 'orderby' => 'post__in', 'posts_per_page'=> -1 ) );

		if ( $eox_get_bloc_query->have_posts() ) :

				while ( $eox_get_bloc_query->have_posts() ) : $eox_get_bloc_query->the_post();

					$atts['bloctype'] = get_field('type_de_bloc') ? get_field('type_de_bloc') : $atts['bloctype'];

					$atts['dynamique'] = (get_field('donnee') == 'dynamique') ? 1 : 0;

					$atts['section_bg_color'] = get_sub_field('couleur_de_fond_de_la_section');

					$atts['section_txt_color'] = get_sub_field('couleur_du_texte_de_la_section');

					//print_r( $atts );

					//$atts['bloc_button_style'] = (($atts['mode'] != '-m-background')) ? 'background-color:'.$atts['section_txt_color'].';color:'.$atts['section_bg_color'].';' : 'background-color:'.$atts['txtcolor'].';color:'.$atts['bgcolor'].';';

					if( $atts['mode'] == '-m-background') {
						$atts['bloc_button_style'] = 'background-color:'.$atts['txtcolor'].';color:'.$atts['bgcolor'].';';
					} elseif( get_sub_field('background') ) {
						$atts['bloc_button_style'] = 'background-color:'.$atts['section_txt_color'].';color:'.$atts['section_bg_color'].';';
					} else {
						$atts['bloc_button_style'] = '';
					}
					
					//print_r( $atts );

					include( locate_template('inc/blocs/tpl/content-'.$atts['bloctype'].'.php') );

				endwhile;
		
			wp_reset_postdata();

		else:
			$edit_link = '<a href="'.home_url().'/wp-admin/edit.php?post_type=featured_bloc">'.__('Ajouter', 'eoxiatheme').'</a>';
			eox_get_alert( __('Pas de bloc', 'eoxiatheme').' : '.$edit_link );
		endif;
	else:
		include( locate_template('inc/blocs/tpl/content-manuel.php') );
	endif;

}

function eox_get_dynamic( $atts ){	

	$eox_get_dynamic_query = new WP_Query( array( 'post_type' => $atts['dynamic_data'] ) );

	if( $atts['dynamic_order'] == 'date' ){
		$atts['limit'] = get_sub_field('derniers_articles');
	}

	$eox_get_dynamic_query = new WP_Query( array( 'post_type' => $atts['dynamic_data'], 'posts_per_page'=> $atts['limit'] ) );
	if ( $eox_get_dynamic_query->have_posts() ) :
		while ( $eox_get_dynamic_query->have_posts() ) : $eox_get_dynamic_query->the_post();
			the_title();
		endwhile;
	endif;
	$atts['id'] = $ids;
}


function eox_get_last_products( $atts ){
	//echo '[wpshop_products limit="'.$atts['limit'].'" order="date" sorting="no" type="list"]';
	$product_markup =  do_shortcode('[wpshop_products limit="'.$atts['limit'].'" order="date" sorting="No" type="list"]');
	$product_markup = eox_rewrite_wps_product_tpl( $product_markup, $atts );
	echo $product_markup;
}

function eox_rewrite_wps_product_tpl( $product_markup, $atts ){

	$find = array(
		'/(.+)<ul(.*?)>(.*?)<\/ul>(.+)/s',
		'/<li(.*?)>(.*?)<\/li>/s',
		'/<span class="wps-caption"(.*?)>(.*?)<\/span>/s',
		'/<span class="wps-thumbnail"(.*?)>(.*?)<\/span>/s',
		'/<span class="wps-title"(.*?)>(.*?)<\/span>/s'
	);
	$replace = array(
		'$3',
		'<div class="'.$atts['bloc_class'].' -product-item">$2</div>',
		'<span class="wps-caption" style="'.$atts['txt_style'] .'">$2</span>',
		'<span class="wps-thumbnail" style="'.$atts['bg_style'] .'">$2</span>',
		'<h3 class="bloc-title" style="'.$atts['txt_style'] .'">$2</h3>'
	);

	$product_markup = preg_replace( $find, $replace, $product_markup );
	$product_markup =  preg_replace_callback('/<p class="bloc-excerpt"[^>]*>(.*?)<\/p>/i' , function( $match ) use ( $atts ) { return ( '<p class="bloc-excerpt">'.wp_trim_words($match[1], $atts['excerptlength'] ) ).'</p>'; } , $product_markup);
	$product_markup = ( $atts['mode'] == '-m-background' ) ? preg_replace('/<div class="bloc-item-padder"[^>]*>(.*?)<\/div>/i', '<div class="bloc-item-padder" style="'.$atts['bg_style'] .'">${1}</div>' , $product_markup) : $product_markup;
	return $product_markup;
}


?>