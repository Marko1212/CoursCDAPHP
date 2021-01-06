<?php

/* Une voiture possède TOUJOURS 4 roues.
Une voiture peut accélérer à 130 km/h */

class Car extends Vehicle {

    //const NB_WHEELS_CAR = 4;

    public function __construct($brand, $price)
    {
        parent::__construct($brand, $price);
        //$this->nbWheels = self::NB_WHEELS_CAR;
        $this->maxSpeed += 120;
    }



}