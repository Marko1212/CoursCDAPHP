<?php

/* 1. Nous cherchons à afficher la date du jour au format "Wednesday 24 may 2018, il est 10h38 et 12 secondes". Cherchez sur Google la fonction PHP permettant de faire cela. Comment choisir le format de la date ?



2. Nous voulons récupérer le jour qu'il sera dans 10 jours exactement. Pensez que strtotime renvoie un timestamp.

3. Combien de jours reste-t-il avant Noël ? */

echo date("l").' '.date('d F Y').', il est '.date('H\hi\m').' et '.date('s').' secondes.'.'<br>';

echo date('l', strtotime('10 days')).'<br>';

$jourDeNoel = strtotime('December 25');

$time = time();

$days = round(($jourDeNoel - $time)/60/60/24);

echo "Il reste " . $days . " jours avant Noël.";

?>



