<?php

spl_autoload_register();

use Rpg\Chasseur as Chasseur;
use Rpg\Guerrier as Guerrier;
use Rpg\Magicien as Magicien;
use Rpg\Objet as Objet;
use Rpg\Potion as Potion;
use Rpg\Sword as Sword;

$aragorn = new Guerrier('Aragorn');
$legolas = new Chasseur('Legolas');
$gandalf = new Magicien('Gandalf');

$merlin = new Magicien('Merlin');

$lebonchasseur = new Chasseur('Le bon chasseur');

$aragorn->attaquer($legolas); // Enlève X points de vie en fonction de la force (Force x 2)
$legolas->attaquer($gandalf); // Enlève X points de vie si le personnage est chasseur (Force x 3)
$gandalf->attaquer($aragorn); // Enlève X points de vie en fonction du mana (Mana x 3)
echo $gandalf->attaquer($gandalf); // il essaie de s'attaquer soi même, pas permis

echo $aragorn->getPointsDeVie() . '<br>';
echo $legolas->getPointsDeVie() . '<br>';
echo $gandalf->getPointsDeVie() . '<br>';

$potion0 = new Objet('Potion0');
$sword0 = new Objet('Sword0');

$aragorn->pick($potion0) // Aragorn ramasse une potion
        ->pick($sword0); // Aragorn ramasse une épée

echo $aragorn->afficheInventaire();

echo $aragorn->getExperience() . '<br>';

$aragorn->getLevel();

$aragorn->attaquer($legolas)
        ->attaquer($legolas)
        ->attaquer($legolas);

echo $aragorn->getExperience() . '<br>';

//echo $legolas->getPointsDeVie() . '<br>';

// Si Legolas meurt, Aragorn gagne de l'expérience. On gagne 1 point par personnage.
// Un personnage doit donc avoir un niveau actuel et une expérience actuelle.
// Un niveau correspond à un nombre de points (Niveau * 3)
// 0 - 1 : 3
// 1 - 2 : 6
// 2 - 3 : 9

$aragorn->attaquer($merlin)
        ->attaquer($merlin)
        ->attaquer($merlin)
        ->attaquer($merlin);

echo $merlin->getPointsDeVie() . '<br>';

$aragorn->attaquer($lebonchasseur)
        ->attaquer($lebonchasseur)
        ->attaquer($lebonchasseur);

echo $aragorn->getExperience() . '<br>';

echo $aragorn->getLevel();






/**
 * On doit pouvoir créer des objets avec certaines particularités.
 * Une potion est utilisable pour ajouter des points de vie au personnage.
 * Une épée est équipable par un Guerrier et un bâton est équipable par un Mage.
 * On pourra créer une interface Equipable ou Usable.
 */

$potion = new Potion();
$sword = new Sword('Excalibur', 5);

$aragorn->pick($potion)
        ->pick($sword);

echo $aragorn->afficheInventaire();

$aragorn->equip($sword);
$aragorn->consume($potion);

echo 'Points de vie de Aragorn : '. $aragorn->getPointsDeVie() .' <br>';
echo 'Points de force de Aragorn : '. $aragorn->getPointsDeForce() .' <br>';



