<?php

if( ! class_exists('flex_bloc') ) :

class flex_bloc {
	
	var $name,
		$id,
		$data,
		$style,
		$l10n;
	
	function __construct( $bloc_atts, $section_atts ) {
		
		//add_action('init',	array($this, 'init'), 5);

		//print_r( 'SECTION : '.$section_atts );
		//print_r( 'BLOC : '.$bloc_atts );
		
	}

	function render(){

	}

	function get_title(){

	}

	function get_thumbnail(){

	}
	
}


/*
*  acf
*
*  The main function responsible for returning the one true acf Instance to functions everywhere.
*  Use this function like you would a global variable, except without needing to declare the global.
*
*  Example: <?php $acf = acf(); ?>
*
*  @type	function
*  @date	4/09/13
*  @since	4.3.0
*
*  @param	N/A
*  @return	(object)
*/

// function acf() {

// 	global $acf;
	
// 	if( !isset($acf) ) {
	
// 		$acf = new acf();
		
// 		$acf->initialize();
		
// 	}
	
// 	return $acf;
	
// }


// initialize
//acf();



endif; // class_exists check

?>
