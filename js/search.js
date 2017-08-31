/**
 * File search.js
 *
 */
( function( $ ) {

	$('#page').on('click', '#masthead .js-search', function(e){
		e.preventDefault();
		$('body').toggleClass('search-active');
		$('#search-area .search-field').focus();
	});

	$('#page').on('click', '#search-area .search-overlay', function(e){
		e.preventDefault();
		$('body').removeClass('search-active');
	});

	$(document).keyup(function(e) {
		if (e.keyCode === 27) {
			$('body').removeClass('search-active');
		}   // esc
	});

} )( jQuery );
