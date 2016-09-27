/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
(function($){
	"use strict";
	if( $('.site-header').length ){

		$('.site').on('click', '.js-burger', function(e){
			e.preventDefault();
			$('body').toggleClass('touch-nav-active');
		});

		$('.site').on('click', '.js-search', function(e){
			e.preventDefault();
			$('body').toggleClass('search-active');
			$('#search-field input').focus();
		});

		$('.site').on('click', '.js-search-close', function(e){
			e.preventDefault();
			$('body').removeClass('search-active');
		});

		$('.touch-overlay').on('click', '', function(e){
			e.preventDefault();
			$('body').removeClass('touch-nav-active');
			$('body').removeClass('search-active');		
		});

		$('.js-close-navigation').on('click', '', function(e){
			e.preventDefault();
			$('body').removeClass('touch-nav-active');			
		});

		$(document).keyup(function(e) {
		  if (e.keyCode === 27) {
		  	$('body').removeClass('touch-nav-active');
		  	$('body').removeClass('search-active');
		  }   // esc
		});		
			
		var header = $( ".site-header" );
		var sticky_header = $( ".site-header" ).clone();
		header.addClass('--header-init');
		sticky_header.prependTo( ".site" );
		sticky_header.addClass('-sticky');

		var old_scroll;
		var old_step;
		var step;

		$(window).scroll(function (event) {

			var s = $(window).scrollTop();

			var position_header = $('.--header-init').position();

			step = ( s < old_scroll ) && ( s > position_header.top ) ? 1 : 0;

			s > position_header.top ? $('.-sticky').removeClass('-out-zone') : $('.-sticky').addClass('-out-zone');
			
			if( old_step != step ) {
				step == 1 ? $('.-sticky').addClass('-active') : $('.-sticky').removeClass('-active');
			}

			old_step = step;
			
			old_scroll = s;

		});


	}

})(jQuery);