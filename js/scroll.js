//Non uso CSS, Jquery è cross platform
//Con il menù hamburger, non si ottiene la fascia piena
$(document).ready(function() {
    $('.navbar a').on('click', function() {
        var href = $(this).attr('href');
        var nav_h = $('.navbar').height() + 10;

        $('html, body').animate({
            'scrollTop': $(href).offset().top - nav_h
        }, 200);
    });
});

$(document).ready(function() {
    $('.home-button').on('click', function(ev) {
        var nav_h = $('.navbar').height() + 10;
        console.log("in");

        $('html, body').animate({
            'scrollTop': $('#products').offset().top - nav_h
        }, 300);
    });
});