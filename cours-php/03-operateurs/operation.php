<!-- Créer un fichier operation.php
Stocker 15 dans une variable.
Stocker 5 dans une autre variable.
Stocker 8 dans une autre variable.
Afficher ceci dans la page (en dynamique) :
​15 + 5 + 8 = 28

15 x (5 - 8) = -45

(8 - 5) / 15 = 0.2

Si une des opérations a un résultat inférieur à 20, afficher "Une des opérations renvoie moins de 20" en bas de la page -->

<?php

$a = 15;

$b = 5;

$c = 8;

echo '<br/>--------------------------------<br/>';

$d = $a + $b + $c;

echo $a.' + '.$b.' + '.$c.' = '.($a + $b + $c).' <br />';


//echo $d = '15 + 5 + 8 = ';

//echo $a + $b + $c;

//echo '<br/>--------------------------------<br/>';

//echo '15 x (5 - 8) = ';

echo $e = $a * ($b - $c).'<br/>';
echo "$a x ($b - $c) = ".($a * ($b - $c));

echo '<br/>--------------------------------<br/>';

//echo '(8 - 5) / 15 = ';


echo $f = ($c - $b) / $a.'<br/>';
echo "($c - $b) / $a = $f";

echo '<br/>--------------------------------<br/>';

if (($d < 20) || ($e < 20) || ($f < 20)) {
    echo 'Une des opérations renvoie moins de 20';
}


?>
