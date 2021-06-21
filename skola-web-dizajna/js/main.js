// dodavanje hamburger meni ikonice

$('.navbar-toggler').html("<i class='fas fa-bars' style='color:#d8303e;'></i>");

// sticky nav 

$(window).on('scroll', function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
        $('.sticky').addClass('stickyAdd');
    } else {
        $('.sticky').removeClass('stickyAdd');
    }
});

