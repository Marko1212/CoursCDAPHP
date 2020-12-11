<?php

// Ce fichier contient toutes les variables globales pour le site

$pageActive = basename($_SERVER['PHP_SELF']);

//on démarre la session

session_start();

// On va générer un token pour le CSRF

if (!isset($_SESSION['token'])){
$_SESSION['token'] = md5(uniqid());
}



?>