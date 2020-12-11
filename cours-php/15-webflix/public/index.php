<?php

require '../partials/header.php';
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">


  <?php foreach (getSliderMovies() as $index => $movie) {
        ?>
            <!-- On peut écrire un if sur un seul ligne grâce au ternaire -->
            <!-- ? équivaut à if () { } -->
            <!-- : équivaut au else -->
            <!-- On peut aussi faire ($index !== 0) ?: 'active'; -->
            <?php if ($index % 3 === 0) { ?>
                <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                    <div class="d-flex">
            <?php } ?>

                <img src="assets/uploads/<?= $movie['cover']; ?>" class="d-block" alt="<?= $movie['title']; ?>">

            <?php if (($index + 1) % 3 === 0 || ($index + 1) === count(getSliderMovies())) { ?>
                    </div> <!-- Fin de la div .d-flex -->
                </div>
            <?php } ?>

        <?php } ?>


   <?php

 /*    $n_imagesParSlide = 3;

    $i = 0;

    while ($i < count(getSliderMovies()) && $i % 3 == 0) {
    ?>
      <div class='carousel-item <?php if ($i == 0) {
                                  $slideActive = 'active';
                                } else {
                                  $slideActive = '';
                                }
                                echo $slideActive; ?>'>
        <div class="d-flex">
          <?php
          for ($j = $i; $j <= $i + $n_imagesParSlide - 1; $j++) {
          ?>


            <img src="assets/uploads/<?= getSliderMovies()[$j]['cover']; ?>" class='d-block' alt="<?= getSliderMovies()[$j]['title']; ?>">






          <?php }  */ ?>


      <!--   </div>
      </div> -->
    <?php
 /*      $i += $n_imagesParSlide;
    } */
    ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class='container mt-4 mb-5'>
  <?php

  if (isset($_GET['register'])) {
    $register = $_GET['register'];
    if ($register === 'success') {
      echo '<div class="alert alert-success text-center" role="alert">
      Vous êtes bien inscrit(e)!
            </div>';
    }
  }
  if (isset($_GET['login'])) {
    $login = $_GET['login'];
    if ($login === 'success') {
      echo '<div class="alert alert-success text-center" role="alert">
      Vous êtes bien connecté(e)!
            </div>';
    }
  }
  if (isset($_SESSION['user'])) {
    echo '<div class="alert alert-success text-center" role="alert">
  Bienvenue à ' . $_SESSION['user']['username'] . '!
   </div>';
  }

  ?>
  <h1>Sélection de films aléatoires</h1>
  <div class='row'>
    <?php
    // si on ne met pas col-12 ci-dessous, Bootstrap le mettra automatiquement
    foreach (getRandomMovies() as $movie) { ?>
      <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="card shadow mb-4">
          <img class='card-img-top' src="assets/uploads/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $movie['title']; ?></h5>
            <p class="card-text">Sorti en <?= substr($movie['released_at'], 0, 4); ?></p>
            <p class="card-text"><?= truncate($movie['description']); ?></p>
            <a href="movie_single.php?id=<?= $movie['id']; ?>" class="btn btn-danger btn-block">Voir le film</a>
          </div>
          <div class="card-footer text-muted">★★★☆☆</div>
        </div>
      </div>


    <?php } // Fin du foreach 
    ?>

  </div>
</div>

<?php require '../partials/footer.php';

//cette dernière balise ci-dessous est optionnelle
?>