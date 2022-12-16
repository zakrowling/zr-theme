$(document).ready(function() {

    // Scroll functions
    // ------------------------------

    var lastscrolltop = 0;
    $(window).scroll(function(event){

	// Header show / hide on scroll
 	var state = $(this).scrollTop();
        if (state > lastscrolltop){
            $('#header, #footer').addClass('hidden'); // Going down
        } else {
            $('#header, #footer').removeClass('hidden'); // Going up
        }
        lastscrolltop = state;
        if($(window).scrollTop() < 15) {
            $('#header, #footer').removeClass('hidden');
            $("#work-paging li").removeClass('active');
            $('body.home #header').css("background-color","rgba(0,0,0,0)");
        }

	// Undo image zoom if set
	$('#gallery img.item').removeClass('zoom');
	var windscroll = $(window).scrollTop();

	// Scroll to home work
	if (windscroll >= 0) {
        $('#page .work a').each(function(i) {
            if ($(this).position().top <= windscroll) {
                $("#work-paging li.active").removeClass('active');
                $("#work-paging li").eq(i).addClass('active');
                $("#page .work a").eq(i).addClass('animated');
            }
        });
        } else {
        	$("#work-paging li.active").removeClass('active');
		    $("#page .work a.animated").removeClass('animated');
    	}

    }).scroll();

    // Homepage Work Paging
    // ------------------------------
    $("#work-paging li").click(function() {
	var active_item = $(this).attr('class');
    $('html, body').animate({
        scrollTop: $("a[name=" + active_item + "]").offset().top - 70
    }, 200);
    });
   
    // Gallery Image Zoom
    // ------------------------------
    $('#gallery img.item').click(function() {
	    $(this).toggleClass('zoom');
    });

    $(document).on("keyup", function(e) {
        var code = e.which;
	    var active_item =  $("#work-paging li.active");
        if (code == 40) {
	    if (!$("#work-paging li").hasClass('active')) {
		active_item =  $("#work-paging li:first");
		active_item.click();
		return false;
	    } else {
		active_item.next().click();
	    }
            active_item.next().click();
        } else if (code == 38) {
             active_item.prev().click();
        }
    });
});