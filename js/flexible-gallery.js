/**
 * Javascript of Flexible Gallery
 *
 */
( function( $ ) {

	$( document ).ready(function() {

		$('.flexible-gallery .gallery-container.masonry').isotope({
			itemSelector: '.gallery',
			percentPosition: true,
		})

		var i = 0;
		var lightbox = [];
		$('.flexible-gallery').each(function() {
			lightbox[i] = $(this).find('.gallery .content').simpleLightbox({
				showCounter: false,
				navText    : ['<i class="fal fa-angle-left"></i>','<i class="fal fa-angle-right"></i>'],
				closeText  : '<i class="fal fa-times"></i>'
			});
			i++;
		})

	})

} )( jQuery );
