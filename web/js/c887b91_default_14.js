jQuery(function($){
	$('.portfolio-item-thumbnail-wrap').tooltip();
	$("a[rel^='prettyPhoto']").prettyPhoto();
	 $("img").lazyload({
            effect: "fadeIn"
        });
});
