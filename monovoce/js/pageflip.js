$(document).ready(function() {
      $('body').addClass('js');
  	  var $tab = $('.tab');

	  $tab.on("click", function(e){
      e.preventDefault();
      var $this = $(this);
      $this.toggleClass('active');
      $this.next('.acc-panel').toggleClass('active');
    });
});