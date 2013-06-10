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
