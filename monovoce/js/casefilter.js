$(function() {
		var selectedClass = "";
		jQuery.easing.def = "easeInQuad";
		$(".fil-cat").click(function(){ 
			selectedClass = $(this).attr("data-rel");
     		$("#genesis-content").fadeTo(100, 0.1);
			$("#genesis-content article").not("."+selectedClass).fadeOut().removeClass('scale-anm');
    			setTimeout(function() {
      			$("."+selectedClass).fadeIn().addClass('scale-anm');
      			$("#genesis-content").fadeTo(300, 1);
    			}, 300); 
		
		});
	
	$('.btn').click(function() {
  	$('.btn').removeClass('active'); // remove all active classes
  	$(this).addClass('active'); // add active class to element clicked
	});
	
});