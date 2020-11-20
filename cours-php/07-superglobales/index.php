<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les superglobales en PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <a href="https://www.google.fr/search?q=sac">Rechercher un sac</a><br>
    <a href="index.php?q=telephone&os=ios">Rechercher un téléphone iOS</a><br>

<br>

<form class="d-flex" action="">
    <!-- Le name du input est très important -->
    <input type="text" class="form-control" name="q">
    <button class="btn btn-primary">Chercher</button>
</form>

<?php

var_dump($_GET);

$nom = '';
$nombre1 = 'a';
$email = 'matthieu';

if (strlen($nom) == 0) {
    exit('Votre nom ne doit pas être vide');
}

if (!ctype_digit($nombre1)) {
    exit('Le nombre1 n\'est pas un nombre valide');
}

if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Cet email n\'est pas valide');
}

?>

</div>
    
</body>
</html>