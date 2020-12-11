<?php

ob_start(); //on met cela pour éviter des bugs avec la fonction header() (redirection)

require '../partials/header.php';


if (!isAdmin()) {
    display403();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    display404();
}

$movie = deleteMovie($id);

header('Location: movie_list.php');

?>