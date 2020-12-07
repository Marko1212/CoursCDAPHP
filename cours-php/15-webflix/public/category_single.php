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

 if (!$category) {
     display404();
 }

 ?>

 <div class="container">
 <h1 class="my-4 text-center"><?= $category['name']; ?></h1>
    <div class="row">
    
    <?php foreach ($movies as $movie) {
        require '../partials/card-movie.php';
    } ?>

    </div>
</div>

<?php

 require '../partials/footer.php';


 ?>