<!-- 1. Ecrire une boucle qui affiche les nombres de 10 à 1

2. Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100

3. Ecrire le code permettant de trouver le PGCD de 2 nombres

4. Coder le jeu du FizzBuzz

Parcourir les nombres de 0 à 100

Quand le nombre est un multiple de 3, afficher Fizz.

Quand le nombre est un multiple de 5, afficher Buzz.

Quand le nombre est un multiple de 15, afficher FizzBuzz.

Sinon, afficher le nombre -->

<?php

for($i=10; $i>=1; $i--) {
    echo $i.'<br/>';
}

for($i=1; $i<=100; $i++) {

    if($i % 2 === 0){ 
        echo $i.'<br/>';  
    } 
}

$x = 100;
$y = 50;
if ($x > $y)
{
  $temp = $x;
  $x = $y;
  $y = $temp;
}

for($i = 1; $i < ($x+1); $i++)
{
  if ($x%$i === 0 && $y%$i === 0) {
    $pgcd = $i;
  }
}

echo "Le PGCD de $x et $y est : $pgcd<br/>";

$a = 50;
$b = 100;

while ($b!==0) {
    if ($a > $b) {
        $a = $a - $b;
    } else {
        $b = $b - $a;
    }
}

echo "Le PGCD est : $a<br/>";


for ($i = 0; $i <= 100; $i++) {
    if ($i % 15 == 0) {
        echo 'FizzBuzz<br>';
    } else if ($i % 3 == 0) {
        echo 'Fizz<br>';
    } else if ($i % 5 == 0) {
        echo 'Buzz<br>';
    } else {
        echo $i . '<br>';
    }
}




?>