 

 
<!-- 
 


Afficher le résultat suivant en utilisant la boucle foreach :

La capitale de France est Paris.

La capitale de Espagne est Madrid.

La capitale de Italie est Rome. -->

<?php

$population = [
    'France' => 'Paris',
    'Espagne' => 'Madrid',
    'Italie' => 'Rome',
];


foreach ($population as $key => $value) {
    echo "La capitale de " . $key++ ." est " . $value . ".<br>";
}

/* 1. Lister les pays ayant plus ou 20 millions d'habitants

2. Donner la population totale des pays Européens */

$populations = [
    'France' => 67595000,
    'Suede' => 9998000,
    'Suisse' => 8417000,
    'Serbie' => 7820631,
    'Malte' => 434403,
    'Mexique' => 122273500,
    'Allemagne' => 82800000,
];

echo "Les pays de 20 millions d'habitants ou plus sont : <br>";

foreach ($populations as $key => $value) {
    if ($value >= 20000000) {
    echo $key++. "<br>";
    }
}

echo "La population totale des pays Européens est : <br>";

$sum = 0;

foreach ($populations as $key => $value) {
    $sum += $value;
    }

echo $sum. " millions d'habitants.";

?>