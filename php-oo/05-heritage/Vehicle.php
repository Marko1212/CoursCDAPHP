
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

    private static $countInstancesVehicle = 0;
    private $registerNumber = 0;
    private $price;
    protected $brand;
    protected $speed = 0;
    protected $started = false;
    protected $nbWheels;
    

    public function __construct($brand, $price, $nbWheels = 4)
    {
        self::$countInstancesVehicle++;
        $this->registerNumber = self::$countInstancesVehicle;
        $this->price = $price;
        $this->brand = $brand;
        $this->nbWheels = $nbWheels;
    }

    public function start()
    {
        $this->started = true;
        echo $this->brand . ' starts...<br>';

        return $this;
    }

    public function accelerate()
    {
        if ($this->started) {
            $this->speed = 10;
            echo $this->brand . ' has accelerated <br>';
        } else {
            echo 'You must start your vehicle before accelerating!<br>';
        }

        return $this->speed;
    }

    public function getRegisterNumber()
    {
        echo $this->brand . ' has registration number : ' . $this->registerNumber . '<br>';
        return $this;
    }
}
