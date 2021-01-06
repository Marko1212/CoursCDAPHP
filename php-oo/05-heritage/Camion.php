<?php

/* Un Camion possède un chargement (tableau), une capacité de chargement (à définir dans son constructeur)
Par exemple, si le camion a une capacité de 5, il ne peut avoir que 5 éléments dans son tableau chargement
On doit pouvoir faire $camion->addItem('Tomates');
Si je dépasse la capacité, j'ai une erreur
Un camion peut avoir X roues (constructeur)
Un camion peut accélérer à 90 km/h 

BONUS:
Un camion peut attacher ou détacher une remorque (méthode)
Le fait d'attacher LA remorque permet d'agrandir la capacité du camion (x2)
Attention, si on détache la remorque, on perd le chargement qui est de trop

*/

class Camion extends Vehicle {

    private $load = [];
    private $loadingCapacity;
    private $trailer = false;

    public function __construct($brand, $price, $loadingCapacity, $nbWheels = 12)
    { 
        parent::__construct($brand, $price);
        $this->loadingCapacity = $loadingCapacity;
        $this->nbWheels = $nbWheels;
    }

    public function addItem($item) {
        if (count($this->load) < $this->loadingCapacity) {
        $this->load[] = $item;
        } else {
            echo 'The truck is full! No item loaded! <br>';
        }
        return $this;
    }

    public function accelerate()
    {
        if ($this->started) {
            $this->speed = 90;
            echo $this->brand . ' has accelerated, current speed is : '.$this->speed.' km/h <br>';
        } else {
            echo 'You must start your '. $this->brand .' before accelerating! Current speed is : '.$this->speed.' km/h <br>';
        }

        return $this->speed;
    }


    public function attachTrailer() {
        if (!$this->trailer) {
            $this->trailer = true;
            $this->loadingCapacity *= 2;
        } else {
            echo 'The trailer is already attached!';
        }
    }

    public function detachTrailer() {
        if ($this->trailer) {
            $this->trailer = false;
            $this->loadingCapacity /= 2;
            $this->load = array_slice($this->load, 0, $this->loadingCapacity);

        } else {
            echo 'Currently, the truck has no trailer!';
        }
    }

    public function getItems() {

        echo $this->brand.' has the following items loaded : <br>';

        foreach($this -> load as $item)
        {
                echo $item . '<br>';
        }
    }


}