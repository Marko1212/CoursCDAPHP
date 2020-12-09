<?php

ob_start(); //on met cela pour éviter des bugs avec la fonction header() (redirection)

/**
 * Formulaire d'ajout de film
 * 
 * Ici, on va créer un formulaire permettant d'ajouter un film.
 * Le champ title devra faire 2 caractères minimum.
 * Le champ description devra faire 15 caractères minimum.
 * On pourra uploader une jaquette. Le nom du fichier uploadé doit être le nom du film "transformé", "Le Parrain" -> "le-parrain.jpg"
 * Le champ durée devra être un nombre entre 1 et 999.
 * Le champ released_at devra être une date valide.
 * Le champ category devra être un select généré dynamiquement avec les catégories de la BDD
 * On doit afficher les messages d'erreurs et s'il n'y a pas d'erreurs on ajoute le film et on redirige sur la page movie_list.php
 * BONUS : Il faudrait afficher un message de succès après la redirection. Il faudra utiliser soit la session, soit un paramètre dans l'URL
 */


require '../partials/header.php';

?>

<div class="container">

<?php 

//on met cela dans le cas où il y a erreur de soumission du formulaire, pour ne pas avoir de message
//d'erreur dans le formulaire (avec value)
    $email = null;
    $pseudo = null;
    $password = null;
    $confirm = null;

if (!empty($_POST)) {

    $email = htmlspecialchars($_POST['email']);
    $pseudo = strip_tags($_POST['pseudo']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    $errors = [];
    if (strlen($title) < 2) {
        $errors['title'] = 'Le titre est trop court';
    }
    if (strlen($description) < 15) {
        $errors['description'] = 'La description est trop courte';
    }
    if ($duration < 1 || $duration > 999) {
        $errors['duration'] = "La durée n'est pas bonne";
    }
    if (!validateDate($released_at)) {
        $errors['released_at'] = "La date n'est pas bonne";
    }

    //Ici on peut faire l'upload
    //on s'assure que le fichier fait au plus 10Mo
    //on s'assure aussi que c'est bien une image
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    $maxSize = 10 * 1024 * 1024;

    if ($cover['error'] === 0 && $cover['size'] <= $maxSize && in_array($cover['type'], $allowedTypes)) {

        //on s'assure que le dossier existe
        if (!is_dir('assets/uploads')) {
            mkdir('assets/uploads');
        }


        $extension = pathinfo($cover['name'])['extension'];
        $fileName = str_replace(' ','-', strtolower($title)).'.'.$extension;

        move_uploaded_file($cover['tmp_name'], 'assets/uploads/'.$fileName);
        


    }   else {
        $errors['cover'] = 'Le fichier est trop lourd ou le format est incorrect...';
    }
    
    // On fait la requête s'il n'y a pas d'erreurs

    if (empty($errors)) {

     addMovie($title, $description, $fileName, $duration, $released_at, $categorySelected);
     
     header('Location: movie_single.php?id='.$db->lastInsertId().'&status=success');
     //header('Location: movie_list.php?status=success');


    } else {

        //Afficher les erreurs...
        echo "<div class='container alert alert-danger'>";
        foreach($errors as $error) {
            echo '<p class="text-danger m-0">'.$error.'</p>';
        }
        echo '</div>';

    }

}

?>


    <h1 class="text-center mt-3">Inscription</h1>

    <form class="w-50 mx-auto" method="post">
        <div class="form-group"> 
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group"> 
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" placeholder="pseudo" name="pseudo" value="<?php echo $pseudo; ?>">
        </div>
        <div class="form-group"> 
            <label for="password">Mot de passe</label>
            <input type="text" class="form-control" id="password" placeholder="password" name="password" value="<?php echo $password; ?>">
        </div>
        <div class="form-group"> 
            <label for="title">Confirmer le mot de passe</label>
            <input type="text" class="form-control" id="confirm" placeholder="Confirmer le mot de passe" name="confirm" value="<?php echo $confirm; ?>">
        </div>
        <button class="btn btn-danger w-100 text-center mb-5" type="submit">S'inscrire</button>

    </form>

</div>


<?php require '../partials/footer.php'; ?>