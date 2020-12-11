<div class="col-12 col-md-6 col-lg-4 col-xl-3">
    <div class="card shadow mb-4">
        <img class='card-img-top' src="assets/uploads/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $movie['title']; ?></h5>
            <p class="card-text">Sorti en <?= substr($movie['released_at'], 0, 4); ?></p>
            <p class="card-text"><?= truncate($movie['description']); ?></p>
            <a href="movie_single.php?id=<?= $movie['id']; ?>" class="btn btn-danger btn-block">Voir le film</a>
            <?php if (isAdmin()) { ?>
                <a href="movie_update.php?id=<?= $movie['id']; ?>" class="btn btn-secondary btn-block">Modifier le film</a>
                <a href="movie_delete.php?id=<?= $movie['id']; ?>" class="btn btn-secondary btn-block" onclick="/*return confirm('Voulez vous supprimer le film?');*/" data-toggle="modal" data-target="#deleteModal<?= $movie['id']; ?>">Supprimer le film</a>
                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?= $movie['id']; ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Supprimer <?= $movie['title']; ?></h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Êtes-vous sûr(e) de vouloir supprimer le film?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                <a class="btn btn-danger" href="movie_delete.php?id=<?= $movie['id']; ?>">Oui</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
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
</div>