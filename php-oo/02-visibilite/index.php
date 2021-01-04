<?php

require_once 'Cat.php';

$bianca = new Cat();

$bianca->name = 'Bianca';

echo $bianca->name;

echo '<br>';

//$bianca->fur = 'Blanc';
//echo $bianca->fur;

/* $bianca->type = 'Chat de gouttière';
echo $bianca->type; */

$bianca->setFur('Blanc');
$bianca->setType('Chat de gouttière');

echo $bianca->getFur();
echo '<br>';
echo $bianca->getType();

$bianca->setFur('Blanc')
    ->setType('Chat de gouttière');

    echo '<br>';

echo $bianca->getType();

echo '<br>';