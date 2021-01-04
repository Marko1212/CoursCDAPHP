<?php


require_once 'Car.php';

$renault = new Car('Renault', 'Mégane');
$mercedes = new Car('Mercedes', 'Benz');

var_dump($renault);
echo '<br>';
var_dump($mercedes);
echo '<br>';

echo $renault->move();
echo '<br>';
echo $mercedes->horn();
echo '<br>';

echo $renault->move();
echo '<br>';

echo $mercedes->horn();
echo '<br>';

echo $renault->move();
echo '<br>';
echo $mercedes->move();

echo '<br>';

echo 'Le niveau d\'essence (en litres) de la '. $renault->getBrand() .' '.$renault->getModel() .' est de : '.$renault->getFuelLevel();
echo '<br>';

echo 'Le niveau d\'essence (en litres) de la Mercedes est de : '.$mercedes->getFuelLevel();
echo '<br>';

for ($i=0; $i < 24; $i++){
    echo $renault->move();
}

echo '<br>';

echo 'Le niveau d\'essence (en litres) de la '. $renault->getBrand() .' '.$renault->getModel() .' est de : '.$renault->getFuelLevel();
echo '<br>';

$renault->addFuel(30000);

echo 'Le niveau d\'essence (en litres) de la '. $renault->getBrand() .' '.$renault->getModel() .' est de : '.$renault->getFuelLevel();
echo '<br>';



