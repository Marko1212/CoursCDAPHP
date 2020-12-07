<?php

/**
 *    Récupérer les informations du film
 * 1. Sur chaque lien "Voir le film", on doit rajouter un lien vers
 * movie_single.php?id=5 (dynamiquement)
 * 2. Sur cette page, on va récupérer l'id dans l'URL
 * 3. On doit vérifier si l'id est présent ou non (404)
 * 4. On doit récupérer le film dans la BDD avec l'id
 *      (404 s'il n'existe pas)
 * 5. On affiche les informations du film 
 *      (Jaquette + titre, durée, date, description )
 * 6. On va aussi afficher le nom de la catégorie du film
 */


require '../partials/header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    display404();
}

$movie = getMovieById($id);

$category = getCategoryPerMovieId($id);

if (!$category) {
    display404();
}

?>

<div class="container">
    <h1 class="my-4 text-center"><?= $category['categoryName']; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <img class='img-fluid' src="assets/uploads/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
        </div>
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $movie['title']; ?></h5>
                    <p>Durée : <?= convertToHours($movie['duration']);
                    
                    ?></p>
                    <p>Sorti le : <?= formatDate($movie['released_at']); ?></p>
                    <p>Catégorie : <?= $category['categoryName']; ?></p>
                    <div><?= $movie['description']; ?></div>
                    <p class="my-3 card-text">Avec : </p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
                <div class="card-footer text-muted">★★★☆☆</div>
            </div>

            <div class="card shadow mt-5">
                <div class="card-body">

                <?php 
//  pas besoin d'utiliser isset ici parce que la variable $_POST existe toujours,
// elle peut être vide éventuellement, mais elle existe. 
                if (!empty($_POST)) {
                    $nickname = $_POST['nickname'];
                    $message = $_POST['message'];
                    $note = $_POST['note'];
                    $errors = [];

                    if (empty($nickname)) {
                        $errors['nickname'] = 'Le pseudo est vide';
                    }
                    //on peut aussi utiliser la fonction mb_strlen 
                    if (strlen($message) < 15) {
                        $errors['message'] = 'Le message est trop court';
                    }

                    if ($note < 0 || $note > 5) {
                        $errors['note'] = "La note n'\est pas correcte";
                    }

                    // On fait la requête s'il n'y a pas d'erreurs

                    if (empty($errors)) {

                        // Requête SQL...
                        $query = $db->prepare(
                            'INSERT INTO `comment` (`nickname`,  `message`, `note`, `created_at`, `movie_id`)
                            VALUES (:nickname, :message, :note, NOW(), :movie_id)');
                        // on lie les paramètres à la requête préparée
                        $query->bindValue(':nickname', $nickname);
                        $query->bindValue(':message', $message);
                        $query->bindValue(':note', $note, PDO::PARAM_INT);
                        $query->bindValue(':movie_id', $movie['id'], PDO::PARAM_INT);
                        $query->execute(); // On exécute la requête et c'est tout...

                        // On redirige pour éviter que l'utilisateur ne renvoie le formulaire
                        header('Location: movie_single.php?id='.$movie['id']);

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

                <form method="post">

                <label for="nickname">Pseudo</label>
                <input type="text" name="nickname" id="nickname" class="form-control">

                <br/>

                <label for="message">Message</label>
                <textarea type="text" name="message" id="message" class="form-control" rows="3">
                </textarea>

                <br/>

                <label for="note">Note</label>
                <select name="note" id="note" class="form-control">
                    <?php for ($i = 0; $i <= 5; $i++) { ?>
                        <option value="<?= $i; ?>"><?= $i; ?>/5</option>
                    <?php } ?>

                    </select>

                    <br/>

                <button class="btn btn-danger btn-block">Envoyer</button>

                </form>

                </div>
            </div>

        </div>



    </div>
</div>

<?php


require '../partials/footer.php';

?>