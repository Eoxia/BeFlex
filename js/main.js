/**
 * Main javascript file for the theme
 *
 */
jQuery( document ).ready(function() {

	beflexFlexibleGalleryInit();
	beflexNavigationInit();
	beflexSearchInit();

});

/**
 * Javascript of Flexible Gallery
 *
 */

function beflexFlexibleGalleryInit() {
	jQuery('.flexible-gallery .gallery-container.masonry').isotope({
		itemSelector: '.gallery',
		percentPosition: true,
	})

	var i = 0;
	var lightbox = [];
	jQuery('.flexible-gallery').each(function() {
		var content = jQuery(this).find('.gallery .content');

		var args = {
			showCounter: false,
			navText    : ['<i class="fal fa-angle-left"></i>','<i class="fal fa-angle-right"></i>'],
			closeText  : '<i class="fal fa-times"></i>'
		};

		lightbox[i] = content.simpleLightbox( jQuery.extend( args, content.data('lightbox') ) );
		i++;
	})
}

/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */

function beflexNavigationInit() {
	/**
	 * Burger Navigation
	 */
	jQuery( '#page' ).on( 'click', '#masthead .menu-toggle', function( e ){
		e.preventDefault();
		jQuery( 'body' ).toggleClass( 'active-burger' );
	});

	jQuery( '#page' ).on( 'click', '#burger-menu .navigation-overlay', function( e ){
		e.preventDefault();
		jQuery( 'body' ).removeClass( 'active-burger' );
	});

	jQuery( '#page' ).on( 'click', '#burger-menu .close-burger', function( e ){
		e.preventDefault();
		jQuery( 'body' ).removeClass( 'active-burger' );
	});

	jQuery(document).keyup(function(e) {
		if (e.keyCode === 27) {
			jQuery( 'body').removeClass( 'active-burger' );
		}   // esc
	});


	/** Affiche une classe dans le body si la navigation est sticky */
	if ( jQuery( '#masthead' ).hasClass('sticky') ) {
		jQuery( 'body' ).addClass( 'sticky-nav' );
	}

	/**
	 * Sticky Navigation
	 */
	 if ( isSticky() ) {
		 jQuery( '#masthead.sticky' ).addClass( '-scroll' );
	 }

	 jQuery( window ).scroll( function ( event ) {
		 if ( isSticky() ) {
			 jQuery( '#masthead.sticky' ).addClass( '-scroll' );
		 }
		 else {
			 jQuery( '#masthead.sticky' ).removeClass( '-scroll' );
		 }
	 });
}

/**
 * Return true if the navigation can be sticky
 *
 * @method isSticky
 * @return {Boolean}
 */
function isSticky() {
	if ( jQuery( window ).scrollTop() >= jQuery( '.site-header.sticky' ).height() ) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * File search.js
 *
 */
function beflexSearchInit() {
	jQuery('#page').on('click', '#masthead .js-search', function(e){
		e.preventDefault();
		jQuery('body').toggleClass('search-active');
		jQuery('#search-area .search-field').focus();
	});

	jQuery('#page').on('click', '#search-area .search-overlay', function(e){
		e.preventDefault();
		jQuery('body').removeClass('search-active');
	});

	jQuery(document).keyup(function(e) {
		if (e.keyCode === 27) {
			jQuery('body').removeClass('search-active');
		}   // esc
	});
}