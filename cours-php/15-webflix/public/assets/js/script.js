//alert('Le JS fonctionne!');


if ($(window).height() >= $(document).height()) {
    $('footer').addClass('sticky-to-bottom');
}



 //on doit exécuter le code précédent au resize de la fenêtre

$(window).resize(function() {

    if ($('footer').offset().top <= $('html').height()){
        $('footer').removeClass('sticky-to-bottom');
    }

    if ($(window).height() >= $(document).height()) {
        $('footer').addClass('sticky-to-bottom');
    } else {
        $('footer').removeClass('sticky-to-bottom');
    }

});