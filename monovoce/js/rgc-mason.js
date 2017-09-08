// thanks to Sridhar Katakam: http://sridharkatakam.com/using-masonry-genesis-pinterest-like-layout/

jQuery(function($) {
    var $container = $('.pin-main');
 
    $container.imagesLoaded( function(){
        $container.masonry({
            itemSelector: 'article',
            isAnimated: true,
            gutterWidth: 0
        });
    });

});