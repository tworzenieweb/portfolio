jQuery(function($){
	$('.portfolio-item-thumbnail-wrap').tooltip({
            placement: 'bottom'
        });
	$("a[rel^='prettyPhoto']").prettyPhoto();
	 $("img.lazy").lazyload({
            effect: "fadeIn"
        });
        
        $('.slider').bxSlider({
        mode: 'vertical',
        minSlides: 2,
        slideMargin: 0
      });

});

$(window).load(function(){
    $('.bwWrapper').BlackAndWhite({
        hoverEffect : true, // default true
        // set the path to BnWWorker.js for a superfast implementation
        webworkerPath : false,
        // for the images with a fluid width and height 
        responsive:true,
        // to invert the hover effect
        invertHoverEffect: false,
        speed: { //this property could also be just speed: value for both fadeIn and fadeOut
            fadeIn: 200, // 200ms for fadeIn animations
            fadeOut: 800 // 800ms for fadeOut animations
        }
    });
});