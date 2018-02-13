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

	$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"><div class="bar"></div></div>');
	
	$('.responsive-menu-icon').on('click', function() {
		$(this).next("header .genesis-nav-menu, .nav-primary .genesis-nav-menu").slideToggle();
		$( '.responsive-menu-icon' ).toggleClass("icon-open");
		$('.bar').toggleClass('animate');
		$('.site-header').toggleClass('main-menu-open');
	});

});