<?php

/*
Nous allons créer un ensemble de véhicules.

Un véhicule possède une immatriculation, un prix, une marque et 4 roues.
On va devoir incrémenter l'immatriculation à chaque création de véhicule.
Tous les attributs sont privés ou protégés.
Un véhicule peut démarrer ou accélérer.
La méthode accélérer renvoie la vitesse du véhicule (10 km/h)
La vitesse du véhicule est un attribut idéalement.

- Une moto possède TOUJOURS 2 roues.
Une moto peut faire du 1 roue (Surcharge de accélérer) à 100 km/h

- Une voiture possède TOUJOURS 4 roues.
Une voiture peut accélérer à 130 km/h


- Un Camion possède un chargement (tableau), une capacité de chargement (à définir dans son constructeur)
Par exemple, si le camion a une capacité de 5, il ne peut avoir que 5 éléments dans son tableau chargement
On doit pouvoir faire $camion->addItem('Tomates');
Si je dépasse la capacité, j'ai une erreur
Un camion peut avoir X roues (constructeur)
Un camion peut accélérer à 90 km/h

BONUS:
Un camion peut attacher ou détacher une remorque (méthode)
Le fait d'attacher LA remorque permet d'agrandir la capacité du camion (x2)
Attention, si on détache la remorque, on perd le chargement qui est de trop
BONUS:
Un véhicule ne peut accélérer que s'il a déjà démarré.
*/

require_once 'Vehicle.php';
require_once 'Car.php';
require_once 'Moto.php';
require_once 'Camion.php';

$car1 = new Car('BMW', 10000);
echo $car1->accelerate();
$car1->start();
$car1->getRegisterNumber();
echo $car1->accelerate();

$moto1 = new Moto('Yamaha', 5000);
$moto1->start();
echo $moto1->accelerate();
$moto1->getRegisterNumber();

$camion1 = new Camion('Mercedes', 50000, 3);
$camion1->getRegisterNumber();
$camion1->addItem('PC')->addItem('iPhone')->addItem('TV');
echo $camion1->accelerate();


$camion1->addItem('Tomate'); // Le camion est plein



$camion1->attachTrailer(); // On double la capacité du camion (6)

$camion1->addItem('Tomate')->addItem('Salade')->addItem('Frites');
$camion1->getItems();

$camion1->start();
echo $camion1->accelerate();

$camion1->detachTrailer();
$camion1->getItems(); // Tableau avec PC, iPhone, TV */

$camion2 = new Camion('Ford', 60000, 7, 18);
$camion2->getRegisterNumber();




