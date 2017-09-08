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
	
	/*
	$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"><svg class="icon-list2"><use xlink:href="#icon-list2"></use></svg></div>');
	
	
	$(".responsive-menu-icon").click(function(){
		$(this).next("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").slideToggle();
		$( '.responsive-menu-icon' ).toggleClass("icon-open");
	});
	*/
	
	
	$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"><svg class="icon-list2"><use xlink:href="#icon-list2"></use></svg></div>');
	
	$(".nav-secondary .genesis-nav-menu").addClass("responsive-menu-two").before('<div class="responsive-menu-icon-two"><svg class="icon-list2"><use xlink:href="#icon-list2"></use></svg></div>');
	
	$(".responsive-menu-icon").click(function(){
		$(this).next("header .genesis-nav-menu, .nav-primary .genesis-nav-menu").slideToggle();
		$( '.responsive-menu-icon' ).toggleClass("icon-open");
	});
	
	$(".responsive-menu-icon-two").click(function(){
		$(this).next(".nav-secondary .genesis-nav-menu").slideToggle();
		$( '.responsive-menu-icon-two' ).toggleClass("icon-open-two");
	});
	
	
	/*
	$(window).resize(function(){
		if(window.innerWidth > 768) {
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
	*/

});