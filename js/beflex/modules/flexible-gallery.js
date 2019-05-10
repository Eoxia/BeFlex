/**
 * Javascript of Flexible Gallery
 *
 */

function beflexFlexibleGalleryInit() {
	var i = 0;
	var lightbox = [];
	jQuery('.wp-block-gallery').each(function() {
		var content = jQuery(this).find('.blocks-gallery-item a');

		var args = {
			showCounter: false,
			navText    : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
			closeText  : '<i class="fas fa-times"></i>'
		};

		lightbox[i] = content.simpleLightbox( args );
		i++;
	})
}
