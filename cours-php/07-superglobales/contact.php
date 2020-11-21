<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les superglobales en PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<?php

$email = null;
$sujet = null;
$message = null;

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

if (isset($_GET['sujet'])) {
    $sujet = $_GET['sujet'];
}

if (isset($_GET['message'])) {
    $message = $_GET['message'];
}

?>



    <div class="container">
        <form action="">
            <!-- Le name du input est très important -->
            <div class="form-group">
            <input type="text" class="form-control w-25" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
            <input type="text" class="form-control w-25" name="sujet" value="<?php echo $sujet; ?>">
            </div>
            <div class="form-group">
            <input type="text" class="form-control w-25" name="message" value="<?php echo $message; ?>">
            </div>
            <div class="form-group">
            <button class="btn btn-primary form-control w-25">Chercher</button>
            </div>
        </form>

<?php

        /* var_dump($_GET); */

       

    if (strlen(trim($sujet)) == 0 && !is_null($sujet)) {
        exit('Votre nom ne doit pas être vide');
    }

 if (!is_null($email) && empty(trim($email))) {
     exit('Vous devez saisir un email!');
 }

 if (!is_null($email) && filter_var(trim($email), FILTER_VALIDATE_EMAIL)===false) {
    exit("Cet email n\'est pas valide");
}

if (mb_strlen(trim($message), 'UTF-8') <15 && !is_null($message)) {
    exit("Votre message doit faire au moins 15 caractères");
}

    ?>

    </div>

</body>

</html>