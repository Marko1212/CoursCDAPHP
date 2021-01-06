<?php

/* Une voiture possède TOUJOURS 4 roues.
Une voiture peut accélérer à 130 km/h */

class Car extends Vehicle {

    const NB_WHEELS_CAR = 4;

    public function __construct($brand, $price)
    {
        parent::__construct($brand, $price);
        $this->nbWheels = self::NB_WHEELS_CAR;
    }
  
    public function accelerate()
    {
        if ($this->started) {
            $this->speed = 130;
            echo $this->brand . ' has accelerated, current speed is : '.$this->speed.' km/h <br>';
        } else {
            echo 'You must start your '. $this->brand .' before accelerating! Current speed is : '.$this->speed.' km/h <br>';
        }

        return $this->speed;
    }






}