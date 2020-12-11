<?php

ob_start();

//on inclut le header (et le footer via les fonctions display403 et display404) parce qu'on a besoin d'afficher une page si l'utilisateur n'est pas autorisé à effacer le film; aussi, c'est via le header qu'on accède aux fonctions
require '../partials/header.php';


if (!isAdmin()) {
    display403();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    //pas de id fourni
    display404();
}

$movie = deleteMovie($id);

header('Location: movie_list.php');


?>