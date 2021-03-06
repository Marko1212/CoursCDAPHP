<?php


ob_start(); //on met cette ligne pour éviter des bugs avec la fonction header() (redirection)
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

$actors = getActorsForMovie($id);

if (!$category) {
    display404();
}

?>

<div class="container">
    <?php
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        if ($status === "created") {
            echo '<div class="alert alert-success text-center" role="alert">
        Le film a bien été créé dans la base de données!
    </div>';
        }
        if ($status === "updated") {
            echo '<div class="alert alert-success text-center" role="alert">
        Le film a bien été mis à jour dans la base de données!
     </div>';
        }
    }
    ?>

    <div class="row my-3">
        <div class="col-lg-6">
            <img class='img-fluid' src="assets/uploads/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
        </div>
        <div class="col-lg-6">

            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title"><?= $movie['title']; ?> <span class='small-text'><?= $category['categoryName']; ?></span></h5>
                    <p>Durée : <?= convertToHours($movie['duration']);

                                ?></p>
                    <p>Sorti le : <?= formatDate($movie['released_at']); ?></p>
                    <div><?= $movie['description']; ?></div>
                    <p class="my-3 card-text"><strong>Avec : </strong></p>
                    <?php
                    foreach ($actors as $actor) { ?>
                        <a class="card-link" href="actor_single.php?id=<?= $actor['actor_id']; ?>"><?= $actor['firstname'] . ' ' . $actor['name']; ?></a> <a href="https://fr.wikipedia.org/wiki/<?= $actor['firstname'] . '_' . $actor['name']; ?>" target="_blank">(Wikipedia)</a></br>
                    <?php }
                    ?>
                </div>
                <div class="card-footer text-muted">
                    <?php
                    $averageMovie = getAverageMovie($movie['id']);
                    echo $averageMovie . '/5';

                    //Boucle pour afficher les étoiles

                    for ($i = 1; $i <= 5; $i++) {
                        echo ($i <= $averageMovie) ? '★' : '☆';
                    }
                    ?>
                </div>
            </div>

            <div class="card shadow mt-5">
                <div class="card-body">
                    <?php
                    $comments = getCommentsByMovie($movie['id']);

                    foreach ($comments as $comment) { ?>

                        <div class="mb-3">
                            <p class="mb-0">
                                <strong><?= $comment['nickname']; ?></strong>
                                <span class="small-text">
                                    le <?= formatDate($comment['created_at'], 'd/m/Y à H\hi'); ?>
                                </span>
                            </p>
                            <p>
                                <?= $comment['message']; ?>
                                <?= $comment['note']; ?>/5
                            </p>
                        </div>
                        <hr />

                    <?php } ?>

                    <?php
                    //  pas besoin d'utiliser isset ici parce que la variable $_POST existe toujours,
                    // elle peut être vide éventuellement, mais elle existe. 
                    if (!empty($_POST)) {

                        $nickname = htmlspecialchars($_POST['nickname']); //transforme <script> en &gt;script&lt;
                        $message = strip_tags($_POST['message']); //supprime les tags <script> de la chaîne
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
                            VALUES (:nickname, :message, :note, NOW(), :movie_id)'
                            );
                            // on lie les paramètres à la requête préparée
                            $query->bindValue(':nickname', $nickname);
                            $query->bindValue(':message', $message);
                            $query->bindValue(':note', $note, PDO::PARAM_INT);
                            $query->bindValue(':movie_id', $movie['id'], PDO::PARAM_INT);
                            $query->execute(); // On exécute la requête et c'est tout...

                            // On redirige pour éviter que l'utilisateur ne renvoie le formulaire
                            header('Location: movie_single.php?id=' . $movie['id']);
                            /*                      echo '<meta http-equiv="refresh" content="0; URL=\'movie_single.php?id='.$movie['id'].'\'">'; */
                        } else {

                            //Afficher les erreurs...
                            echo "<div class='container alert alert-danger'>";
                            foreach ($errors as $error) {
                                echo '<p class="text-danger m-0">' . $error . '</p>';
                            }
                            echo '</div>';
                        }
                    }

                    ?>

                    <form method="post">

                        <label for="nickname">Pseudo</label>
                        <input type="text" name="nickname" id="nickname" class="form-control">

                        <br />

                        <label for="message">Message</label>
                        <textarea type="text" name="message" id="message" class="form-control" rows="3"></textarea>

                        <br />

                        <label for="note">Note</label>
                        <select name="note" id="note" class="form-control">
                            <?php for ($i = 0; $i <= 5; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?>/5</option>
                            <?php } ?>

                        </select>

                        <br />

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