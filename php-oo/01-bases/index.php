<?php

class Cat {

    var $name;
    var $type;
    var $fur;

    function cry() {
        return 'Miaou !';
    }

    function eat() {
        return $this->name.' mange';
    }
    
}

$bianca = new Cat();

$bianca->name='Bianca';
$bianca->type='Chat de gouttière';
$bianca->fur='Blanc';

echo 'Mon chat s\'appelle '.$bianca->name.' et il fait '.$bianca->cry();

echo '<br>';

$mina = new Cat();

$mina->name = 'Mina';

echo $mina->name.' peut aussi faire '.$mina->cry();

echo '<br>';
echo $bianca->eat();
echo '<br />';
echo $mina->eat();
echo '<br />';

var_dump($bianca);
var_dump($mina);



