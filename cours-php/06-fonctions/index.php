
<?php

// Déclare une fonction hello
function hello($argument, $lang = 'fr') {

    if ($lang === 'en') {
    return 'Hello ' . $argument;
    }
    return 'Bonjour '.$argument;
}

echo hello('Marko'); // L'appel de la fonction affiche Hello world!
echo hello('world', 'en');
// Attention, on ne peut pas nommer 2 fonctions avec le même nom
function say($argument, $argument2) {
    return $argument . ' ' . $argument2;
}

echo say('Hello', 'world!'); // L'appel de la fonction affiche Hello world!