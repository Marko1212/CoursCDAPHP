<?php 

spl_autoload_register();

$monChat = new Cat('Bianca');
$monChien = new Dog('Pengo');

// L'interface permet aussi le polymorphisme
var_dump($monChat instanceof KingdomAnimalInterface);
var_dump($monChien instanceof KingdomAnimalInterface);


//Rugissement

echo $monChat->cry();
echo $monChien->cry();

var_dump($monChat instanceof Animal);
var_dump($monChien instanceof Animal);

//On ne peut implémenter une classe abstraite
//$monChien2 = new Animal('Medor');
//var_dump($monChien2);




