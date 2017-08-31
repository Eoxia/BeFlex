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

	/**
	 * Sticky Navigation
	 */
	 if ( isSticky() ) {
		 $( '#masthead' ).addClass( '-sticky' );
	 }

	 $( window ).scroll( function ( event ) {
		 if ( isSticky() ) {
			 $( '#masthead' ).addClass( '-sticky' );
		 }
		 else {
			 $( '#masthead' ).removeClass( '-sticky' );
		 }
	 });

	/**
	 * Return true if the navigation can be sticky
	 *
	 * @method isSticky
	 * @return {Boolean}
	 */
	function isSticky() {
		if ( $( window ).scrollTop() >= $( '.site-header' ).height() ) {
			return true;
		}
		else {
			return false;
		}
	}

})( jQuery );
