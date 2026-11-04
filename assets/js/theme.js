/**
 * Beflex front-end scripts.
 *
 * @package Beflex
 */

( function () {
	'use strict';

	/**
	 * Fix the site header to the top of the screen once the page is scrolled past it.
	 */
	function beflexSiteHeaderInit() {
		var header = document.querySelector( '.header-sticky' );
		var siteBlocks = document.querySelector( '.wp-site-blocks' );

		if ( ! header ) {
			return;
		}

		if ( siteBlocks ) {
			siteBlocks.style.paddingTop = header.offsetHeight + 'px';
		}

		var update = function () {
			header.classList.toggle( '-sticky', window.scrollY >= header.offsetHeight );
		};

		update();
		window.addEventListener( 'scroll', update, { passive: true } );
	}

	if ( 'loading' === document.readyState ) {
		document.addEventListener( 'DOMContentLoaded', beflexSiteHeaderInit );
	} else {
		beflexSiteHeaderInit();
	}
}() );
