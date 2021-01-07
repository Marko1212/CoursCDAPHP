<?php

spl_autoload_register();

use Rpg\Chasseur as Chasseur;
use Rpg\Guerrier as Guerrier;
use Rpg\Magicien as Magicien;
use Rpg\Objet as Objet;


$aragorn = new Guerrier('Aragorn');
$legolas = new Chasseur('Legolas');
$gandalf = new Magicien('Gandalf');

$aragorn->attaquer($legolas); // Enlève X points de vie en fonction de la force (Force x 2)
$legolas->attaquer($gandalf); // Enlève X points de vie si le personnage est chasseur (Force x 3)
$gandalf->attaquer($aragorn); // Enlève X points de vie en fonction du mana (Mana x 3)


echo $aragorn->getPointsDeVie() . '<br>';
echo $legolas->getPointsDeVie() . '<br>';
echo $gandalf->getPointsDeVie() . '<br>';

$potion = new Objet('Potion');
$sword = new Objet('Sword');

$aragorn->pick($potion) // Aragorn ramasse une potion
        ->pick($sword); // Aragorn ramasse une épée

echo $aragorn->afficheInventaire();



/**
 * On doit pouvoir créer des objets avec certaines particularités.
 * Une potion est utilisable pour ajouter des points de vie au personnage.
 * Une épée est équipable par un Guerrier et un bâton est équipable par un Mage.
 * On pourra créer une interface Equipable ou Usable.
 */

/* $potion = new Potion();
$sword = new Sword('Excalibur', 5);

$aragorn->pick($potion)
        ->pick($sword);

$aragorn->equip($sword);
$aragorn->consume($potion); */



