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
