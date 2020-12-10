<?php

ob_start(); //on met cela pour éviter des bugs avec la fonction header() (redirection)

require '../partials/header.php';


if (!isAdmin()) {
    display403();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    display404();
}

$movie = getMovieById($id);


?>

<div class="container">

<?php 

//on met cela dans le cas où il y a erreur de soumission du formulaire, pour ne pas avoir de message
//d'erreur dans le formulaire (avec value)
    $title = $movie['title'];
    $description = $movie['description'];
    $cover = $movie['cover'];
    $duration = $movie['duration'];
    $released_at = $movie['released_at'];
    $categorySelected = $movie['category_id'];

if (!empty($_POST)) {

    $title = htmlspecialchars($_POST['title']);
    $description = strip_tags($_POST['description']);
    $cover = $_FILES['cover'];
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
        $errors['cover'] = "Aucun fichier n'est uploadé, le fichier est trop lourd ou le format est incorrect...";
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


    <h1 class="text-center mt-3">Modifier un film</h1>

    <form class="w-50 mx-auto" method="post" enctype="multipart/form-data">
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
            <input type="file" class="form-control" id="cover" placeholder="cover" name="cover">
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

        <button class="btn btn-danger w-100 text-center mb-5" type="submit">Modifier</button>

    </form>

</div>


<?php require '../partials/footer.php'; ?>