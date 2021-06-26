<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />

    <!-- Owl carousel -->

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>

<body>
    <?php

    $activePage = $_SERVER['SCRIPT_NAME'];

    ?>

    <!-- nav -->
    <nav class="navbar navbar-expand-lg fixed-top sticky">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= ($activePage == '/skola-web-dizajna/index.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="index.php">Naslovna <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= ($activePage == '/skola-web-dizajna/onama.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="onama.php">O nama</a>
                    </li>
                    <li class="nav-item <?= ($activePage == '/skola-web-dizajna/blog.php') ? 'active' : ''; ?>">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>