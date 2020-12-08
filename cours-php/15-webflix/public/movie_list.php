<?php require '../partials/header.php';

// On va récupérer la liste des films 

if (isset($_GET['sort'])) {
  $sort = $_GET['sort'];
} else {
  $sort = 'id';
}




$movies = getMovies($sort);

?>



<div class="container">

<?php 
if (isset($_GET['status'])) {
  $status = $_GET['status'];
  if ($status === "success") {
  echo '<div class="alert alert-success text-center" role="alert">
  Vous avez inséré un nouveau film dans la base de données!
   </div>';
}
}
?>

  <div class="dropdown my-4">
    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
      Trier par
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="movie_list.php?sort=title">Nom</a>
      <a class="dropdown-item" href="movie_list.php?sort=duration">Durée</a>
      <a class="dropdown-item" href="movie_list.php?sort=released_at">Date</a>
    </div>
  </div>

  <div class="row">
    <?php foreach ($movies as $movie) {
      require '../partials/card-movie.php';
    } ?>

  </div>
</div>


<?php require '../partials/footer.php'; ?>