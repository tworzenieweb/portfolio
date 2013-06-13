jQuery(function($){
	$('.portfolio-item-thumbnail-wrap').tooltip({
            placement: 'bottom'
        });
	 $("img.lazy").lazyload({
            effect: "fadeIn"
        });
        
        $('.flexslider').flexslider({
        easing: "easeInOutSine",
        directionNav: false,
        animationSpeed: 1500,
        slideshowSpeed: 5000
        });
        
});
