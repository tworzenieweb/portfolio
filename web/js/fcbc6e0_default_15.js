jQuery(function($){
	$('.portfolio-item-thumbnail-wrap').tooltip();
	$("a[rel^='prettyPhoto']").prettyPhoto();
	 $("img.lazy").lazyload({
            effect: "fadeIn"
        });
        
        $(".scrollable").scrollable({ vertical: true });
        
});
