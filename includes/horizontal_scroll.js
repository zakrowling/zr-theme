$(document).ready(function() {
	
	// Horizontal Scroll
	// --------------------
	$('html, body').mousewheel(function(event, delta) {
      this.scrollLeft -= (delta * 30);
      event.preventDefault();
   	});
	
});