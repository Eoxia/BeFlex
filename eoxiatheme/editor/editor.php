<?php

// function my_theme_add_editor_styles() {
//     add_editor_style( 'custom-editor-style.css' );
// }
// add_action( 'init', 'my_theme_add_editor_styles' );

// global $shortcodes_tab;

// var_dump($shortcodes_tab);

function mce_mod( $init ) {
	// var_dump( $init);
    $init['block_formats'] = 'Paragraph=p';

    $style_formats = array (
    array( 'title' => 'Titre 1', 'block' => 'h1' ),
    array( 'title' => 'Titre 2', 'block' => 'h2' ),
    array( 'title' => 'Titre 3', 'block' => 'h3' ),
    array( 'title' => 'Titre 4', 'block' => 'h4' ),
    array( 'title' => 'Titre 5', 'block' => 'h5' ),
    array( 'title' => 'Titre 6', 'block' => 'h6' ),
    array( 'title' => 'Chapo', 'block' => 'p', 'classes' => 'chapo' ),
    array( 'title' => 'Alerte success', 'block' => 'div', 'classes' => 'alerte success' ),
    array( 'title' => 'Alerte info', 'block' => 'div', 'classes' => 'alerte info' ),
    array( 'title' => 'Bloc Couleur 1', 'block' => 'div', 'classes' => 'bloc color-1' ),
    array( 'title' => 'Bloc Couleur 2', 'block' => 'div', 'classes' => 'bloc color-2' ),
    array( 'title' => 'Label rouge', 'inline' => 'span', 'classes' => 'label rouge' ),
    array( 'title' => 'Label bleu', 'inline' => 'span', 'classes' => 'label bleu' ),
    array( 'title' => 'Label vert', 'inline' => 'span', 'classes' => 'label vert' )
    // array( 'title' => 'Link', 'inline' => 'a', 'classes' => 'link' )
    // array( 'title' => 'Entête Accordéon', 'block' => 'div', 'classes' => 'accordeon-header' ),
    // array( 'title' => 'Contenu Accordéon', 'block' => 'div', 'classes' => 'accordeon-content' )
);

    $init['style_formats'] = json_encode( $style_formats );

    $init['style_formats_merge'] = false;
    return $init;
}
add_filter('tiny_mce_before_init', 'mce_mod');

function mce_add_buttons( $buttons ){
    array_splice( $buttons, 1, 0, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', 'mce_add_buttons' );

function editor_scripts_styles() {
    // wp_enqueue_script( 'editorJs', get_bloginfo('template_directory').'/js/editor.js' ,'','',true );
}
add_action( 'wp_enqueue_scripts', 'editor_scripts_styles' );


?>