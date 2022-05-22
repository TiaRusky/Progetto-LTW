$(document).ready(function() {
    $('.home-bg-sx').animate({ deg: 90 }, {
        duration: 1200,
        step: function(now) {
            $(this).css({ transform: 'rotate(' + now + 'deg)' });
        }
    });
    $('.home-bg-sx').animate({ deg: 0 }, {
        duration: 1200,
        step: function(now) {
            $(this).css({ transform: 'rotate(' + now + 'deg)' });
        }
    });
});

$(document).ready(function() {
    $('.home-bg-dx').animate({ deg: -90 }, {
        duration: 1200,
        step: function(now) {
            $(this).css({ transform: 'rotate(' + now + 'deg)' });
        }
    });
    $('.home-bg-dx').animate({ deg: 0 }, {
        duration: 1200,
        step: function(now) {
            $(this).css({ transform: 'rotate(' + now + 'deg)' });
        }
    });
});