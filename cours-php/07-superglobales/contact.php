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

    $errors = [];

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    }

    if (isset($_GET['sujet'])) {
        $sujet = $_GET['sujet'];
    }

    if (isset($_GET['message'])) {
        $message = $_GET['message'];
    }

    if (!is_null($email) && empty(trim($email))) {
        $errors['email'] = 'Vous devez saisir un email!';

    } else
   
    if (!is_null($email) && filter_var(trim($email), FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'Cet email n\'est pas valide';
    } else if (strlen(trim($sujet)) == 0 && !is_null($sujet)) {
        $errors['sujet'] = 'Votre sujet ne doit pas être vide';
    } else if (mb_strlen(trim($message), 'UTF-8') < 15 && !is_null($message)) {
        $errors['message'] = "Votre message doit faire au moins 15 caractères";
    }

    ?>



    <div class="container mt-3">
        <p class="lead font-weight-bold">Contact</p>
        <form action="">
            <!-- Le name du input est très important -->
            <div class="form-group">
                <input type="email" class="form-control w-25" placeholder="email" name="email" value="<?php echo $email; ?>">
                <?php if (isset($errors['email'])) {
                echo '<span class="text-danger">'.$errors['email'].'</span>';
            } ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control w-25" placeholder="sujet" name="sujet" value="<?php echo $sujet; ?>">
                <?php if (isset($errors['sujet'])) {
                echo '<span class="text-danger">'.$errors['sujet'].'</span>';
            } ?>
            </div>
            <div class="form-group">
                <textarea class="form-control w-25" rows="3" placeholder="message" name="message"><?php echo $message; ?></textarea>
                <?php if (isset($errors['message'])) {
                echo '<span class="text-danger">'.$errors['message'].'</span>';
            } ?>
            </div>
            <div class="form-group">
                <button class="btn btn-primary form-control w-25">Chercher</button>
            </div>
        </form>



        <?php

        if (!empty($_GET) && empty($errors)) {
                echo '<span class="text-success">Message envoyé</span>';
        }

        ?>

    </div>

</body>

</html>