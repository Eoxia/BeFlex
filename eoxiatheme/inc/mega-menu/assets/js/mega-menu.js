(function($){
	"use strict";	

	setTimeout(function(){

		$( '.eoxia-mega-menu' ).each(function( index ) {

			var wrapper = $(this);

			if( $(this).find('.additional-menu-field-mega-menu > input').is(':checked') ){
				$(this).find('.eoxia-mega-menu-options').stop(true).show();
				$(this).closest('.eoxia-mega-menu').addClass('-active');
			} else {
				$(this).find('.eoxia-mega-menu-options').stop(true).hide();
				$(this).closest('.eoxia-mega-menu').removeClass('-active');
			}

			$(this).on('change', '.additional-menu-field-mega-menu > input', function(e){
				$(this).closest('.eoxia-mega-menu').find('.eoxia-mega-menu-options').stop(true).slideToggle( 1 );
				$(this).closest('.eoxia-mega-menu').toggleClass('-active');
			})

			$(this).on('change', '.additional-menu-field-bloc_mode select', function(e){
				//console.log($(this).val());
				if( $(this).val() == 'background' ){
					wrapper.find('.additional-menu-field-bloc_bg_color').show();
					wrapper.find('.additional-menu-field-bloc_txt_color').show();

					wrapper.find('.additional-menu-field-bloc_opacity').show();
				} else {
					wrapper.find('.additional-menu-field-bloc_bg_color').hide();
					wrapper.find('.additional-menu-field-bloc_txt_color').hide();

					wrapper.find('.additional-menu-field-bloc_opacity').hide();
				}
			})
			//console.log( $(this).find('.additional-menu-field-mega-menu-mode select option:selected').val() );
			if( $(this).find('.additional-menu-field-bloc_mode select').val() == 'background'){
				wrapper.find('.additional-menu-field-bloc_bg_color').show();
				wrapper.find('.additional-menu-field-bloc_txt_color').show();

				wrapper.find('.additional-menu-field-bloc_opacity').show();
			} else {
				wrapper.find('.additional-menu-field-bloc_bg_color').hide();
				wrapper.find('.additional-menu-field-bloc_txt_color').hide();

				wrapper.find('.additional-menu-field-bloc_opacity').hide();
			}
			


		});

		$('.eox-color-field').wpColorPicker();

	 }, 500);

})(jQuery);

// function js_eoxia_mega_menu(){
// 	console.log(jQuery(this));
// }