
<?php

/* Un véhicule possède une immatriculation, un prix, une marque et 4 roues.
On va devoir incrémenter l'immatriculation à chaque création de véhicule.
Tous les attributs sont privés ou protégés.
Un véhicule peut démarrer ou accélérer.
La méthode accélérer renvoie la vitesse du véhicule (10 km/h)
La vitesse du véhicule est un attribut idéalement.
 */

class Vehicle
{

    private static $lastRegistration = 0;
    private $registerNumber;
    //il faut bien créer 2 variables, 1 static l'autre dynamique pour que ça marche
    //si on a une seule variable static, toutes les instances auront la même immatriculation à la fin
    //puisque une variable static a la même valeur pour toutes les instances de la classe
    // or, les immatriculations sont différentes pour chaque véhicule
    //d'où la nécessité d'avoir 2 variables: une variable static et une variable d'instance

    private $price;
    protected $brand;
    protected $speed = 0;
    protected $maxSpeed = 10;
    protected $started = false;
    protected $nbWheels = 4;
    

    public function __construct($brand, $price)
    {
        $this->registerNumber = ++self::$lastRegistration;
        $this->price = $price;
        $this->brand = $brand;
    }

    // le $this doit se trouver dans une méthode ou le constructeur!

    public function start()
    {
        $this->started = true;
        echo $this->brand . ' starts...<br>';

        return $this;
    }

    public function accelerate()
    {
        if ($this->started) {
            $this->speed = $this->maxSpeed;
            return $this->brand . ' has accelerated, current speed is : '.$this->maxSpeed.' km/h<br>';
        } else {
            return 'You must start your vehicle before accelerating!<br>';
        }
    }

    public function getRegisterNumber()
    {
        echo $this->brand . ' has registration number : ' . $this->registerNumber . '<br>';
        return $this;
    }
}
