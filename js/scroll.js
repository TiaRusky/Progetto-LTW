$(document).ready(function() {
    let sameValue = 1500;
    var nav_h = $('.navbar').height() + 10;

    $('.navbar a').on('click', function() {
        var href = $(this).attr('href');
        $('html, body').animate({
            'scrollTop': $(href).offset().top - nav_h
        }, 200);
    });



    $(".home-button").on('click', function() {
        $('html, body').animate({
            'scrollTop': $('footer').offset().top - nav_h
        }, 700, 'swing');
        //then come back
        setTimeout(() => {
            $('html, body').animate({
                'scrollTop': $('#about').offset().top - nav_h
            }, sameValue, 'swing');
        }, sameValue);
    });
});

// Metodo per cambiare da pagina x a home e scorrere nella banda selezionata