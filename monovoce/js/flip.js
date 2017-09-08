$(document).ready(function(){

		// set up hover panels
		// although this can be done without JavaScript, we've attached these events
		// because it causes the hover to be triggered when the element is tapped on a touch device
		$('.hover').hover(function(){
			$(this).addClass('flip');
		},function(){
			$(this).removeClass('flip');
		});

		// set up click/tap panels
		// $('.click').toggle(function(){
		//	$(this).addClass('flip');
		// },function(){
		//	$(this).removeClass('flip');
		// });
		
		// set up click/tap panels
		$('.click').click(function(){
			
			$(this).toggleClass("flip");
			/*
			if($(this).hasClass('flip')) {
				var isHovering = false;
				$(this).find('.back a').each(function() {
					if($(this).is(":hover")) {
						isHovering = true;
					}
				});
				
				if(!isHovering)
					$(this).removeClass('flip');
			} else {
				$(this).addClass('flip');
			}
			*/
		});

		// set up block configuration
		$('.block .action').click(function(){
			$('.block').addClass('flip');
		});
		$('.block .edit-submit').click(function(e){
			$('.block').removeClass('flip');

			// why not update that list for fun?
			$('#list-title').text($('#form_title').val());
			$('#list-items').empty();
			for (var num = $('#form_items').val(); num >= 1; num--) {
				$('#list-items').append('<li>Super seller</li>');
			}
			e.preventDefault();
		});

		// set up contact form link
		$('.contact .action').click(function(e){
			$('.contact').addClass('flip');
			e.preventDefault();
		});
		$('.contact .edit-submit').click(function(e){
			$('.contact').removeClass('flip');
			e.preventDefault();
		});
		
		
		// show and hide click-box
		$('.team-image').hover(function(){
			if($(this).hasClass('show')) {
				var isHovering = false;
				
				if(!isHovering)
					$(this).removeClass('show');
			} else {
				$(this).addClass('show');
			}
			
		});
		

	});