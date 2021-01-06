<?php

/* - Une moto possède TOUJOURS 2 roues.
Une moto peut faire du 1 roue (Surcharge de accélérer) à 100 km/h */

class Moto extends Vehicle {

    //private const NB_WHEELS_MOTO = 2;

    //pas de $this hors de la fonction ou du constructeur!
    protected $nbWheels = 2; 

    public function __construct($brand, $price)
    {
        parent::__construct($brand, $price);
        $this->maxSpeed += 90;
        //$this->nbWheels = self::NB_WHEELS_MOTO;
        
    }
  
    public function accelerate()
    {
        return parent::accelerate() .' et fait du 1 roue! <br>';
    }

}