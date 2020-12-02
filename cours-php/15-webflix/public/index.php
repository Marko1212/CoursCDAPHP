<?php require '../partials/header.php';
?>

<div class='container'>
<h1>Sélection de films aléatoires</h1>
    <div class='row'>
        <?php

        foreach (getRandomMovies() as $movie) { ?>
            <div class="col-3">
                <div class="card mb-4">
                <img class='card-img-top' src="assets/uploads/<?=$movie['cover']; ?>" alt="<?=$movie['title']; ?>">
                    <div class="card-body">
                        <p class="card-title"><?= $movie['title']; ?></p>
                        <p class="card-text">Sorti en <?= substr($movie['released_at'], 0, 4); ?></p>
                        <p class="card-text"><?= $movie['description']; ?></p>
                        <a href="#" class="btn btn-danger btn-block">Voir le film</a>
                        <hr>
                        <p>★★★★☆</p>
                    </div>
                </div>
            </div>


        <?php } // Fin du foreach

        echo "</div>";
        echo "</div>";

        require '../partials/footer.php';

   // la balise de fin php ici est optionnelle, car il n'y a plus rien après.     
?> 