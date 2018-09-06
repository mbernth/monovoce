
jQuery(function( $ ){

var ww = document.body.clientWidth;

// Add responsive meni icon
$("header .genesis-nav-menu, .nav-primary .genesis-nav-menu, .nav-secondary .genesis-nav-menu").addClass("responsive-menu").before('<div class="responsive-menu-icon"><span class="line"></span><span class="line"></span><span class="line"></span></div>');

$(document).ready(function() {
  $(".menu-primary li a").each(function() {
    if ($(this).next().length > 0) {
    	$(this).addClass("parent");
		}
	});
	
	$(".responsive-menu-icon").click(function(e) {
		e.preventDefault();
		$(this).toggleClass("icon-open");
        $(".menu-primary").toggleClass("open-primary");
        $(".full-width-content").toggleClass("body-fixed");
	});
	adjustMenu();
});

$(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 768) {
    // if "more" link not in DOM, add it
    if (!$(".more")[0]) {
    $('<div class="more">&nbsp;</div>').insertBefore($('.parent')); 
    }
        $(".responsive-menu-icon").css("display", "inline-block");
        /*
		if (!$(".responsive-menu-icon").hasClass("active")) {
			$(".menu-primary").toggleClass("hide-primary");
		// } else {
			// $(".menu-primary").removeClass("hide-primary");
        }
        */
		$(".menu-primary li").unbind('mouseenter mouseleave');
		$(".menu-primary li a.parent").unbind('click');
    $(".menu-primary li .more").unbind('click').bind('click', function() {
			
			$(this).parent("li").toggleClass("hover");
		});
	} 
	else if (ww >= 768) {
    // remove .more link in desktop view
    $('.more').remove(); 
		$(".responsive-menu-icon").css("display", "none");
        // $(".menu-primary").show();
        // $(".menu-primary").removeClass("hide-primary");
		$(".menu-primary li").removeClass("hover");
		$(".menu-primary li a").unbind('click');
		$(".menu-primary li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
		 	// must be attached to li so that mouseleave is not triggered when hover over submenu
		 	$(this).toggleClass('hover');
		});
	}
};

});