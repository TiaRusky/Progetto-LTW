//Non uso CSS, Jquery è cross platform
//Con il menù hamburger, non si ottiene la fascia piena
$(document).ready(function() {
    $('.navbar a').on('click', function(ev) {
        var href = $(this).attr('href');
        var nav_h = $('.navbar').height() + 10;

        $('html, body').animate({
            'scrollTop': $(href).offset().top - nav_h
        }, 200);

    });
});