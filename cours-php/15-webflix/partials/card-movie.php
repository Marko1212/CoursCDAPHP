<div class="col-12 col-md-6 col-lg-4 col-xl-3">
    <div class="card shadow mb-4">
        <img class='card-img-top' src="assets/uploads/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $movie['title']; ?></h5>
            <p class="card-text">Sorti en <?= substr($movie['released_at'], 0, 4); ?></p>
            <p class="card-text"><?= truncate($movie['description']); ?></p>
            <a href="movie_single.php?id=<?=$movie['id']; ?>" class="btn btn-danger btn-block">Voir le film</a>
            <?php if (isAdmin()) { ?>
            <a href="movie_update.php?id=<?=$movie['id']; ?>" class="btn btn-secondary btn-block">Modifier le film</a>
            <a href="movie_delete.php?id=<?=$movie['id']; ?>" class="btn btn-secondary btn-block">Supprimer le film</a>
            <?php } ?>
        </div>
        <div class="card-footer text-muted">
        <?php 
                   $averageMovie = getAverageMovie($movie['id']); 
                   echo $averageMovie.'/5'; 
                   
                   //Boucle pour afficher les étoiles

                   for ($i = 1; $i <= 5; $i++) {
                        echo ($i <= $averageMovie) ? '★' : '☆';
                   }
        ?>
        </div>
    </div>
</div>