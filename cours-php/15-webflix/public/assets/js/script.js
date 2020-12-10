//alert('Le JS fonctionne!');


if ($(window).height() >= $(document).height()) {
    $('footer').addClass('sticky-to-bottom');
}



 //on doit exécuter le code précédent au resize de la fenêtre

$(window).resize(function() {

    if ($(window).height() >= $(document).height()) {
        $('footer').addClass('sticky-to-bottom');
    } else {
        $('footer').removeClass('sticky-to-bottom');
    }

});