<?php

/* Exercices
Créer une fonction calculant le carré d'un nombre
Créer une fonction calculant l'aire d'un rectangle et une fonction pour celle d'un cercle
Créer une fonction calculant le prix TTC d'un prix HT. Nous aurons besoin de 2 paramètres, le prix HT et le taux.
Ajouter un 3ème paramètre à cette fonction permettant de l'utiliser dans les 2 sens (HT vers TTC ou TTC vers HT) */

function square($argument) {
    return $argument*$argument;

}

function rectangle($longueur, $largeur) {
    return $longueur*$largeur;
}

function circle($radius) {
    return pi()*$radius*$radius;
}

function conversionPrix($prix, $taux, $sensConversion="htversttc") {

    if ($sensConversion === "ttcversht") {
        return 100/(100 + $taux) * $prix;
    }

    return (100 + $taux)/100 * $prix;
}

echo square(2).'<br>';
echo rectangle(2,3).'<br>';
echo circle(2).'<br>';

echo conversionPrix(100,20).'<br>';

echo conversionPrix(100,20, "ttcversht").'<br>';



?>