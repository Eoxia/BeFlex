/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
( function( $ ) {
	"use strict";

	/**
	 * Burger Navigation
	 */
	$( '#page' ).on( 'click', '#masthead .menu-toggle', function( e ){
		e.preventDefault();
		$( 'body' ).toggleClass( 'active-burger' );
	});

	$( '#page' ).on( 'click', '#burger-menu .navigation-overlay', function( e ){
		e.preventDefault();
		$( 'body' ).removeClass( 'active-burger' );
	});

	$( '#page' ).on( 'click', '#burger-menu .close-burger', function( e ){
		e.preventDefault();
		$( 'body' ).removeClass( 'active-burger' );
	});

	$(document).keyup(function(e) {
		if (e.keyCode === 27) {
			$( 'body').removeClass( 'active-burger' );
		}   // esc
	});


	/** Affiche une classe dans le body si la navigation est sticky */
	if ( $( '#masthead' ).hasClass('sticky') ) {
		$( 'body' ).addClass( 'sticky-nav' );
	}

	/**
	 * Sticky Navigation
	 */
	 if ( isSticky() ) {
		 $( '#masthead.sticky' ).addClass( '-scroll' );
	 }

	 $( window ).scroll( function ( event ) {
		 if ( isSticky() ) {
			 $( '#masthead.sticky' ).addClass( '-scroll' );
		 }
		 else {
			 $( '#masthead.sticky' ).removeClass( '-scroll' );
		 }
	 });

	/**
	 * Return true if the navigation can be sticky
	 *
	 * @method isSticky
	 * @return {Boolean}
	 */
	function isSticky() {
		if ( $( window ).scrollTop() >= $( '.site-header.sticky' ).height() ) {
			return true;
		}
		else {
			return false;
		}
	}

})( jQuery );
