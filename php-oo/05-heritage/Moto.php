<?php

/* - Une moto possède TOUJOURS 2 roues.
Une moto peut faire du 1 roue (Surcharge de accélérer) à 100 km/h */

class Moto extends Vehicle {

    private const NB_WHEELS_MOTO = 2;

    public function __construct($brand, $price)
    {
        parent::__construct($brand, $price);
        $this->nbWheels = self::NB_WHEELS_MOTO;
    }
  
    public function accelerate()
    {
        if ($this->started) {
            $this->speed = 100;
            echo $this->brand . ' has accelerated and its speed is : '.$this->speed.' km/h <br>';
        } else {
            echo 'You must start your '. $this->brand .' before accelerating! Current speed is : '.$this->speed.' km/h <br>';
        }

        return $this->speed;
    }

}