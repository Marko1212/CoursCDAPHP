<?php 

spl_autoload_register();

$monChat = new Cat();
$monChien = new Dog();

// L'interface permet aussi le polymorphisme
var_dump($monChat instanceof KingdomAnimalInterface);
var_dump($monChien instanceof KingdomAnimalInterface);





