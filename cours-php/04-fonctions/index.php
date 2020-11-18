<?php
/*
* Quelques fonctions utiles en PHP
*/

// Est-ce que la variable $prenom est définie ou existe ou alors vaul null

//$prenom = 'Marko';
var_dump(isset($prenom)); // Renvoie false si $prenom n'est pas défini
echo '<br>';

//Est-ce que le contenu d'une variable est vide?

var_dump(empty($prenom));
$prenom = '';
var_dump(empty($prenom));

