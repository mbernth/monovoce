$(document).ready(function() {
 
  $("#owl-slider").owlCarousel({
 
      navigation : false, // Show next and prev buttons
	  pagination : false,
      slideSpeed : 30000,
      paginationSpeed : 30000,
      singleItem:true,
	  autoPlay : 10000,
      stopOnHover : false,
	  addClassActive : true,
      transitionStyle : "fade"
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});