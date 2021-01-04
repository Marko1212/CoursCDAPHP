<?php

require_once 'Cat.php';

$mina = new Cat('Mina', 'Noir');
$bianca = new Cat('Bianca');

var_dump($mina);
var_dump($bianca);

echo '<br>';

echo 'Le chat s\'appelle '.$mina->getName();


