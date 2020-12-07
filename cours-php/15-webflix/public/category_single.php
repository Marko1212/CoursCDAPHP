<?php 

/**
 * Cette page sera comme movie_list sauf que : 
 * * On doit récupérer l'id de la catégorie dans l'URL
 * * Faire la requête pour récupérer les films de cette catégorie
 * * Ne pas afficher les filtres
 */

 require '../partials/header.php';

 //On doit récupérer l'id de la catégorie dans l'URL

 
 if (isset($_GET['id'])) {
     $id = $_GET['id'];
 } else {

    display404();
 }

 $movies = getMoviesByCategory($id);
 $category = getCategory($id);

 ?>

 <div class="container">

    <div class="row">
    <?php foreach ($movies as $movie) {
        require '../partials/card-movie.php';
    } ?>

    </div>
</div>

<?php

 require '../partials/footer.php';


 ?>