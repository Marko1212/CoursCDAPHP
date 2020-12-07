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

// Pour éviter les injections SQL, on va vérifier le paramètre $filtre
// Idéalement, on utilisera une requête préparée...


if (in_array($filtre, ['id', 'title', 'duration', 'released_at'])) {   
   $triSelect .= " ORDER BY ".trim($filtre)."";
 }


 $query = $db->query($triSelect);


return $query->fetchAll();

}

/**
 * Permet de rechercher un film dans la BDD
 * La fonction nous renvoie un tableau de films
 */

 function searchMovie($q) {

global $db;

$orderBy = $_GET['sort'] ?? 'id';
//$query = $db->query('SELECT * FROM `movie` where `title` like "%'.$q.'%"');

if (!in_array($orderBy, ['id', 'title', 'duration', 'released_at'])) {   
    $orderBy = 'id';
  }


$query = $db-> prepare('SELECT * from `movie` WHERE `title` LIKE :q ORDER BY '.$orderBy);
// Le bindValue permet de remplacer les paramètres de la requête préparée par
// la "vraie" valeur
$query -> bindValue(':q', '%'.$q.'%');
$query -> execute();


return $query->fetchAll();


 }

 function display404() {

http_response_code(404); // on force le statut 404 sur la requête (important pour les API!)
echo '<div class="container"><h1>404</h1> </div>';
require '../partials/footer.php'; 
exit();

    }


function getMoviesByCategory($id) {

    global $db;

    $query = $db -> prepare('SELECT * FROM `movie` WHERE category_id = :id');
    $query -> bindValue(':id', $id, PDO::PARAM_INT);
    $query -> execute();

    return $query -> fetchAll(); 

}

function getMovieById($id) {

    global $db;

    $query = $db -> prepare('SELECT * FROM `movie` WHERE id = :id');
    $query -> bindValue(':id', $id, PDO::PARAM_INT);
    $query -> execute();

    return $query -> fetch(); 

}

function getCategory($id) {
    global $db;

    $query = $db->prepare('SELECT * FROM `category` WHERE id = :id');
    $query -> bindValue(':id', $id, PDO::PARAM_INT);
    $query -> execute();

    return $query -> fetch(); // fetch renvoie une seule ligne
}

function getCategoryPerMovieId($id) {
    global $db;

    $query = $db->prepare('SELECT category.id as categoryId, category.name as categoryName from category inner join movie on movie.id = category.id and movie.id= :id');
    $query -> bindValue(':id', $id, PDO::PARAM_INT);
    $query -> execute();

    return $query -> fetch(); // fetch renvoie une seule ligne
}

function convertToHours($duration) {

    $hours = floor($duration / 60); // Get the number of whole hours
    $duration = $duration % 60; // Get the remainder of the hours
    
    if ($duration < 10) {
        $duration = '0'.$duration;
    }
    return $hours.'h'.$duration; // Format it as hourshminutes where minutes is 2 digits

}

function formatDate($date) {

$formatedDate = date('d F Y', strtotime($date));

$frenchMonths = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

$englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

$formatedDate = str_replace($englishMonths, $frenchMonths, $formatedDate);

return $formatedDate;


}
    
    
    ?>