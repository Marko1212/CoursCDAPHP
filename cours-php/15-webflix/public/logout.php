<?php
session_start();

unset($_SESSION['user']);

//pas besoin de faire ob_start() ici parce qu'il n'y a pas d'affichage
header('Location: index.php');


?>