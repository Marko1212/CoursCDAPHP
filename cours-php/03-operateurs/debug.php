<?php

echo $a; // Affiche une NOTICE, mais le script ne s'arrête pas

echo $a = 3;
echo 10 / 0; // Affiche un WARNING, division par zéro

echo 3;

echo 4; // Si on ne met pas le ; => affiche une ERROR Parse error: syntax error
echo 6;

$tableau = [1, 5, 3];

echo '<br />';

var_dump($tableau);

echo '<br />----------------------------------------------------<br/>';
print_r($tableau);


?>