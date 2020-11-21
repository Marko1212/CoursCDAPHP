<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les superglobales en PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<!-- Créer un fichier contact.php
Créer un formulaire avec 3 champs
Email, Sujet et Message
L'email doit être valide et obligatoire
Le sujet ne doit pas être vide
Le message doit faire au minimum 15 caractères -->

<body>
    <div class="container">
        <form class="d-flex" action="">
            <!-- Le name du input est très important -->
            <input type="text" class="form-control" name="email">
            <input type="text" class="form-control" name="sujet">
            <input type="text" class="form-control" name="message">

            <button class="btn btn-primary">Chercher</button>
        </form>

        <?php

        var_dump($_GET);

        $email = null;

        if (isset($_GET['email'])) {
            $email = $_GET['email'];
        }

/* if (strlen($nom) == 0) {
    exit('Votre nom ne doit pas être vide');
}

if (!ctype_digit($nombre1)) {
    exit('Le nombre1 n\'est pas un nombre valide');

 */
if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Cet email n\'est pas valide');
}

        ?>

    </div>

</body>

</html>