<?php

/**
 * 
 * Les Namespaces
 * 
 * Quand on crée des classes, on les range dans des namespaces.
 * 
 */

 /**
  * Autoloading des classes
  * On peut utiliser spl_autoload_register() à la place des require
  * La fonction va chercher dans le dossier dans lequel le fichier index.php se situe
  * La fonction ne charge la classe que si elle est utilisée par le code.
  *
  */

  spl_autoload_register(function($class) {
      
   // var_dump($class.'.php');
    require_once $class.'.php';
  });

  //équivaut à : spl_autoload_register();
  

//require_once 'Earth/Nature/Animal.php';
//require_once 'Mars/Animal.php';

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

/* require_once 'Earth/Nature/Cat.php';
require_once 'Earth/Nature/Alien.php'; */

// Cette Classe va hériter de Earth\Nature\Animal;
use Earth\Nature\Cat;

// Cette Classe va hériter de Mars\Animal;
use Earth\Nature\Alien;

$bianca = new Cat();

$alien = new Alien();

var_dump($bianca);

var_dump($alien);

