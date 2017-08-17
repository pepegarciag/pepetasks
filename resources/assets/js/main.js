jQuery(function($) {

    //Initiat WOW JS
	new WOW().init();

	$(window).on('load', function(){
        $('.main-slider').addClass('animate-in');
    });

});