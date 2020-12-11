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
    //pas de id fourni dans l'url, on affiche une erreur 404
    display404();

   /**
    * Attention à la faille CSRF
    * Pour se protéger de la faille, il faut générer un token (un stock aléatoire)
    * qu'on stocke dans la session.
    * Pour supprimer un film, on ajutera le token dans
    * l'url et on vérifiera que ce token correspond à celui de la session.
    *
    */
}

// Ici on vérifie que l'utilisateur n'est pas victime d'une faille CSRF
if (!isset($_GET['token']) || $_GET['token'] !== $_SESSION['token'] ) {
    display403();
}

$movie = deleteMovie($id);

header('Location: movie_list.php');


?>