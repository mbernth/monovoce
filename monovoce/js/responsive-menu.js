jQuery(function( $ ){
	
	// Add opacity class to site header
	if( $( document ).scrollTop() > 0 ){
		$( '.site-header' ).addClass( 'dark' );			
	}
	$( document ).on('scroll', function(){
		if ( $( document ).scrollTop() > 0 ){
			$( '.site-header' ).addClass( 'dark' );			

		} else {
			$( '.site-header' ).removeClass( 'dark' );			
		}
	});

	// Add responsive menu
	$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"><div class="bar"></div></div>');
	
	$('.responsive-menu-icon').on('click', function() {
		$(this).next("header .genesis-nav-menu, .nav-primary .genesis-nav-menu").slideToggle();
		// $( '.genesis-nav-menu' ).toggleClass("genesis-nav-menu-open");
		$( '.responsive-menu-icon' ).toggleClass("icon-open");
		$('.bar').toggleClass('animate');
		$('.site-header').toggleClass('main-menu-open');
	});

	$(window).resize(function(){
		if(window.innerWidth > 1279) {
			$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu, nav .sub-menu").removeAttr("style");
			$(".responsive-menu > .menu-item").removeClass("menu-open");
		}
	});

	$(".responsive-menu > .menu-item").click(function(event){
		if (event.target !== this)
		return;
			$(this).find(".sub-menu:first").slideToggle(function() {
			$(this).parent().toggleClass("menu-open");
		});
	});

});