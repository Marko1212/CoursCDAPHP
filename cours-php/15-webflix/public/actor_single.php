<?php 


 require '../partials/header.php';

 // 2. On doit récupérer, le paramètre q (pour query) dans l'URL

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
 } else {
    display404();
 }

 // Nouvel opérateur en PHP 7 : Null Coalesce

/*  $q = $_GET['q'] ?? null; // Si $_GET['q'] est isset, $q vaut $_GET['q'] sinon $q vaut null

 if ($q === null) {
    echo "<div class='container'><h1>404</h1></div>";
 } */

$movies = searchMoviesOfActor($id);

if (!$movies) {
    display404();
}


?>

<div class="container mb-5">
<?php if (isset($_GET['id']) && !empty($movies)) {
     $id = $_GET['id'];
     echo "<h1 class='mt-3'>Les films de ".$movies[0]['firstname'].' '.$movies[0]['name']."</h1>";
 }
 ?>

    <div class="row">

    <?php 
    //6. Et si cet acteur n'a pas joué dans aucun film ? On affiche : "Cet acteur n'a joué dans aucun film..."
    if ($movies[0]['actor_id'] == null) { ?>
    <div class="col-12">
    <h1>Cet acteur n'a joué dans aucun film...</h1>
    </div>
    <?php
    }
        else {

        foreach ($movies as $movie) {
        require '../partials/card-movie.php';
    } 
    
}
    ?>

    </div>
</div>

<?php require '../partials/footer.php'; ?>