<?php

// Connexion à la base de données

// Permet de faire la connexion entre PHP et MySQL

// $db est un objet PDO
// Le premier paramètre est le DSN (Data Source Name)

try {
$db = new PDO('mysql:host=localhost;dbname=webflix', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //on active les erreurs SQL
    //l'erreur SQL, la ligne, la syntaxe etc.
]);

} catch (Exception $exception) {
    echo "<img width='100' src='assets/img/travolta.gif' /><br>";
    echo $exception->getMessage(); //affiche le message de l'erreur
    exit(); // arrête le script PHP (pas lié au bloc try catch)

}

?>