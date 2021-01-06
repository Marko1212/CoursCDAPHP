<?php

/**
 * 
 * Les Namespaces
 * 
 * Quand on crée des classes, on les range dans des namespaces.
 * 
 */

require_once 'Earth/Nature/Animal.php';
require_once 'Mars/Animal.php';

// Earth\Nature\Animal est le FQCN (Full Qualified Class Name)
$animal1 = new Earth\Nature\Animal();

$animal2 = new Mars\Animal();

var_dump($animal1);
var_dump($animal2);

// Pour éviter d'utiliser le namespace complet, on peut faire des use

use Earth\Nature\Animal;
use Mars\Animal as MarsAnimal;

$animal3 = new Animal();

$animal4 = new MarsAnimal();


var_dump($animal3);
var_dump($animal4);

// On peut utiliser les use dans les classes elles-mêmes

require_once 'Earth/Nature/Cat.php';
require_once 'Earth/Nature/Alien.php';

// Cette Classe va hériter de Earth\Nature\Animal;
use Earth\Nature\Cat;

// Cette Classe va hériter de Mars\Animal;
use Earth\Nature\Alien;

$bianca = new Cat();

$alien = new Alien();

var_dump($bianca);

var_dump($alien);

