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
    $title = null;
    $description = null;
    $cover = null;
    $duration = null;
    $released_at = null;
    $categorySelected = null;

if (!empty($_POST)) {

    $title = htmlspecialchars($_POST['title']);
    $description = strip_tags($_POST['description']);
    $cover = $_POST['cover'];
    $duration = $_POST['duration'];
    $released_at = $_POST['released_at'];
    $categorySelected = $_POST['category'];

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
    
    // On fait la requête s'il n'y a pas d'erreurs

    if (empty($errors)) {

     addMovie($title, $description, $cover, $duration, $released_at, $categorySelected);
     
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


    <h1 class="text-center mt-3">Ajouter un film</h1>

    <form class="w-50 mx-auto" method="post">
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" placeholder="titre" name="title" value="<?php echo $title; ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="description"><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="cover">Jaquette</label>
            <input type="text" class="form-control" id="cover" placeholder="cover" name="cover">
        </div>
        <div class="form-group">
            <label for="duration">Durée</label>
            <input type="number" class="form-control" id="duration" placeholder="durée" name="duration" value="<?php echo $duration; ?>">
        </div>
        <div class="form-group">
            <label for="date">Sortie</label>
            <input type="date" class="form-control" id="date" placeholder="Date de sortie" name="released_at" value="<?php echo $released_at; ?>">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
                <?php
                $categories = getCategories();

                foreach ($categories as $category) { ?>
                    <option <?php if ($categorySelected == $category['id']) { ?>selected="true" <?php } ?> value = '<?= $category['id']; ?>'><?= $category['name']; ?></option>
                <?php } // Fin du foreach
                ?>
            </select>
        </div>

        <button class="btn btn-danger w-100 text-center mb-5" type="submit">Ajouter</button>

    </form>

</div>


<?php require '../partials/footer.php'; ?>