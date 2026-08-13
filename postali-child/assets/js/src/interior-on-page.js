jQuery( function ( $ ) {
	"use strict";

    nav.find('a').on('click', function () {
    var $el = $(this);
    var id = $el.attr('href');
    
    $('html, body').animate({
        scrollTop: $(id).offset().top - nav_height
    }, 1200);
    
    return false;
    });



function isScrolledIntoView(elem, cont) {
    var contTop = $(cont).offset().top;
    var contBottom = contTop + $(cont).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= contBottom) && (elemTop >= contTop));
}

$(window).scroll(function(){
    function elementScrolled(elem)
    {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top;
        return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
    }
     
    if(elementScrolled('.address-map')) {
        var els = $('.sidebar-links'),
            i = 0,
            f = function () {
                $(els[i++]).addClass('fade-out');
                if(i < els.length) setTimeout(f, 400);
            };
        f();
    } else {
        $(".sidebar-links").removeClass("fade-out");
    }
}); 

    $(function() {
		$(".expand").on( "click", function() {
			$(this).next().slideToggle(200);
			$('.icon-expand').toggleClass('clicked');
		});
	});

    $('.links > a').click(function() {
		$('.detail').slideToggle(200);
        $('.links > a').removeClass('active');
        $(this).toggleClass('active');
	});

    if (screen.width < 993) {
        $('.icon-expand').addClass('clicked');
        
        $('.links > a').click(function() {
            $('.icon-expand').removeClass('clicked');
        });
    }

});