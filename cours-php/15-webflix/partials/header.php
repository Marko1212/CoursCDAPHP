<?php
// on inclut ici tous les fichiers de configuration du site
require '../config/database.php';
require '../config/functions.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webflix</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css" </head> <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Webflix</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nos films</a>
                    </li>
                    <?php
                        $categories = getCategories();
                    ?>
                    <li class="nav-item dropdown pl-3">
                        <a class="btn btn-outline-danger dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            Nos catégories
                        </a>
                        <div class="dropdown-menu">

                            <?php
                            // $query est un objet PDOStatement
                            // $query = $db->query('SELECT * FROM category');

                            // $result et $results sont des tableaux / objets
                            // contenant les colonnes en clé et les données en valeur
                            //$result = $query->fetch(); // Renvoie une seule ligne de résultat


                            // $categories = $query->fetchAll(); // Renvoie toutes les lignes de résultat

                            //On va parcourir toutes les catégories
                            // RAPPEL : <?= équivaut à <?php echo
                            foreach ($categories as $category) { ?>
                                <a class="dropdown-item" href="#"><?= $category['name']; ?></a>
                            <?php } // Fin du foreach
                            ?>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Go</button>
                </form>
            </div>
        </div> <!-- fin du container -->
    </nav>