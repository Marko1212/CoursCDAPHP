<?php

/*

Fonctions utiles pour le site


*/

function getCategories() { 

    global $db;

    $query = $db->query('SELECT * FROM category ORDER BY `name`');

    // $result et $results sont des tableaux / objets
    // contenant les colonnes en clé et les données en valeur
    //$result = $query->fetch(); // Renvoie une seule ligne de résultat


    $categories = $query->fetchAll(); // Renvoie toutes les lignes de résultat

  
    return $categories;

}

function getRandomMovies() { 

    global $db;

    $query = $db->query('SELECT * FROM movie order by rand() limit 4');

    // $result et $results sont des tableaux / objets
    // contenant les colonnes en clé et les données en valeur
    //$result = $query->fetch(); // Renvoie une seule ligne de résultat


    $movies = $query->fetchAll(); // Renvoie toutes les lignes de résultat

  
    return $movies;

}

function getSliderMovies() { 

    global $db;

    $query = $db->query('SELECT * FROM movie WHERE cover IS NOT NULL order by released_at desc limit 9');

    // $result et $results sont des tableaux / objets
    // contenant les colonnes en clé et les données en valeur
    //$result = $query->fetch(); // Renvoie une seule ligne de résultat


    $movieSlider = $query->fetchAll(); // Renvoie toutes les lignes de résultat

  
    return $movieSlider;

}

function getMovies($filtre) {

global $db;

$triSelect = 'SELECT * FROM movie';

if(isset($filtre) && (trim($filtre)!='')) {   
   $triSelect .= " ORDER BY ".trim($filtre)."";
 }


 $query = $db->query($triSelect);


return $query->fetchAll();

}


?>