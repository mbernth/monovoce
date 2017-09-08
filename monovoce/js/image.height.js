// Image Section Height
var windowHeight = $( window ).height();

				$( '.image-section' ) .css({'height': windowHeight / 1.35 +'px'});
		
				$( window ).resize(function(){
	
				var windowHeight = $( window ).height();
			
				$( '.image-section' ) .css({'height': windowHeight / 1.35 +'px'});
	
});
		