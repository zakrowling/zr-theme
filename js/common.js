$(document).ready(function() {

    var page_scroll = $('html, body');

    // Show Hide Mobile Menu
    // --------------------
    $('#show_main_menu').click(function() {
      	$('#main_menu').toggle();
	$('#footer').toggle();
        $(this).toggleClass('active');
	$('#header-i').toggleClass('active');
    });
   	
   	
    // Back to Start
    // --------------------
   page_scroll.scroll(function() {
        var left_scroll = $(document).scrollLeft();
        if (left_scroll > 0) {
            $('#page .go_back').fadeIn('slow');
        }
    });

    $('#page .go_back').click(function(){
        page_scroll.animate({
            scrollLeft: 0
        }, 'slow');
    });
    
   
});