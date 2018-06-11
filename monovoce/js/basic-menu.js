jQuery(function( $ ){

    // Add responsive meni icon
    $("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"><span class="line"></span><span class="line"></span><span class="line"></span></div>');

    $(".responsive-menu > .menu-item").click(function(event){
		if (event.target !== this)
		return;
			$(this).find(".sub-menu:first").slideToggle(function() {
			$(this).parent().toggleClass("menu-open");
		});
	});

});