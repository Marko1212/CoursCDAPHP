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

//  owl carousel
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:50,
    autoplay: true,
    autoplayTimeout: 10000,
    autoplaySpeed: 3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
});
