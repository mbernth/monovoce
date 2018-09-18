jQuery(function( $ ){

	if( $( document ).scrollTop() > 0 ){
		$( '.site-header' ).addClass( 'dark' );			
	}

	// Add opacity class to site header
	$( document ).on('scroll', function(){

		if ( $( document ).scrollTop() > 0 ){
			$( '.site-header' ).addClass( 'dark' );			

		} else {
			$( '.site-header' ).removeClass( 'dark' );			
		}

	});
	

	// Add and remove class when in view
	$(window).scroll(function(){
    // This is then function used to detect if the element is scrolled into view
    function elementScrolled(elem)
    {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top;
        return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
    }
     
		
	// Detect Class
    if(elementScrolled('.footer .gridcontainer')) {
		$( '.footer .gridcontainer' ).addClass( 'animated' );
		}else{
		$( '.footer .gridcontainer' ).removeClass( 'animated' );
        
    }
	});


});