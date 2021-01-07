<?php

namespace Nespresso;

class ExpressoMachine {

    private $litresByExpresso; 
    private $litresByDescale;
    private $descale;
    private $unitPriceCoffee;

    private $remainingWater = 0;
    private $remainingBeans = 0;

    private $consumedWater = 0;
    private $consumedBeans = 0;

    private $cashInMachine = 0;

    private $beansMaxCapacity;
    private $waterMaxCapacity;

    public function __construct($litresByExpresso, $litresByDescale, $descale, $unitPriceCoffee, $beansMaxCapacity, $waterMaxCapacity)
    {
        $this->litresByExpresso = $litresByExpresso;
        $this->litresByDescale = $litresByDescale;
        $this->descale = $descale;
        $this->unitPriceCoffee = $unitPriceCoffee;
        $this->beansMaxCapacity = $beansMaxCapacity;
        $this->waterMaxCapacity = $waterMaxCapacity;
    }

    public function addWater($waterQuantity) {
        if ($waterQuantity <= $this->waterMaxCapacity - $this->remainingWater) {
        $this->remainingWater += $waterQuantity;
        } else {
            $this->remainingWater = $this->waterMaxCapacity;
        }

        return $this;
    }

    public function addBeans($beansQuantity) {
        if ($beansQuantity <= $this->beansMaxCapacity - $this->remainingBeans) {
            $this->remainingBeans += $beansQuantity;
            } else {
                $this->remainingBeans = $this->beansMaxCapacity;
            }

        return $this;
    }

    public function makeExpresso() {
        if ($this->remainingBeans >= 1 && $this->remainingWater >= $this->litresByExpresso && 
        ($this->consumedWater + $this->litresByExpresso < $this->descale)) {
        $this->consumedWater += $this->litresByExpresso;
        $this->consumedBeans += 1;
        $this->remainingBeans -= 1;
        $this->remainingWater -= $this->litresByExpresso;
        $this->cashInMachine += $this->unitPriceCoffee;
        return 'Voici vos '. $this->litresByExpresso .' litre(s) de café <br>';
        } else {
        
        return 'Désolé, il n\'y a pas assez d\'eau et/ou dosettes pour faire le café ou la bien la machine doit être détartrée!<br>';

        }
    } 

    public function makeDoubleExpresso() {
        if ($this->remainingBeans >= 2 && $this->remainingWater >= 2*$this->litresByExpresso &&         ($this->consumedWater + 2*$this->litresByExpresso < $this->descale)) {
            $this->consumedWater += 2*$this->litresByExpresso;
            $this->consumedBeans += 2;
            $this->remainingBeans -= 2;
            $this->remainingWater -= 2*$this->litresByExpresso;
            $this->cashInMachine += 2*$this->unitPriceCoffee;
            return 'Voici vos '. 2*$this->litresByExpresso .' litre(s) de café <br>';
            } else {
            
            return 'Désolé, il n\'y a pas assez d\'eau et/ou dosettes pour faire le café ou la bien la machine doit être détartrée!<br>';
    
            }
    } 

    public function makeExpressos($quantity) {
        if ($this->remainingBeans >= $quantity && $this->remainingWater >= $quantity*$this->litresByExpresso && $this->consumedWater + $quantity*$this->litresByExpresso < $this->descale) {
            $this->consumedWater += $quantity*$this->litresByExpresso;
            $this->consumedBeans += $quantity;
            $this->remainingBeans -= $quantity;
            $this->remainingWater -= $quantity*$this->litresByExpresso;
            $this->cashInMachine += $quantity*$this->unitPriceCoffee;
            return 'Voici vos '. $quantity*$this->litresByExpresso .' litre(s) de café <br>';
            } else {
            
            return 'Désolé, il n\'y a pas assez d\'eau et/ou dosette(s) pour faire le café ou la bien la machine doit être détartrée!<br>';
    
            }
    }

    public function getMaximumCapacity() {
        echo 'La capacité maximale de la machine à café est : <br>';
        echo 'Capacité maximale en dosettes : '. $this->beansMaxCapacity . '<br>';
        echo 'Capacité maximale en eau (litres) : '. $this->waterMaxCapacity . '<br>';
    }

    public function getStatus() {
// - Renvoie un message en fonction de l'état de la machine
// - Reste 94 cafés, What else ?
// - Ajouter de l'eau
// - Ajouter des dosettes
// - Ajouter des dosettes et de l'eau
// - Détartrage nécessaire

    $status = 'Status : <br>';

    $status .= 'Il reste '. min($this->remainingWater / $this->litresByExpresso, $this->remainingBeans) . ' café(s)<br>';

    if ($this->consumedWater > 0) {
    $status .= 'Ajouter de l\'eau : '. $this->consumedWater . ' litre(s) <br>';
    }

    if ($this->consumedBeans > 0) {
    $status .= 'Ajouter des dosettes : '. $this->consumedBeans . '<br>';
    }

    if ($this->consumedWater >= $this->descale) {
        $status .= 'Détartrage nécessaire <br>';
    }
    
    return $status;

    }

    public function descale() {
        $detartrage = '';

        if (($this->consumedWater >= $this->descale) && ($this->remainingWater >= $this->litresByDescale)) {
            $detartrage = 'Détartrage effectué <br>';
            $this->remainingWater = 0;
            $this->consumedWater = 0;
        } else if ($this->consumedWater < $this->descale) {
            $detartrage = 'Détartrage non nécessaire<br>';
        } else {
            $detartrage = 'Détartrage nécessaire mais pas assez d\'eau pour le faire<br>';
        }

        return $detartrage;
    }


    public function getMoney() {
        $message = 'Vous récupérez '.$this->cashInMachine.' euros pour '.$this->consumedBeans.' café(s)';
        $this->cashInMachine = 0;
        return $message;
    }


    public function addCapacity($container) {
        $this->beansMaxCapacity += $container->getContainerBeansCapacity();
        $this->waterMaxCapacity += $container->getContainerWaterCapacity();
        echo 'Un conteneur ajouté à la machine à café : <br>';
        echo 'Capacité en dosettes : '. $container->getContainerBeansCapacity() .'<br>';
        echo 'Capacité en eau (en litres): '. $container->getContainerWaterCapacity() .'<br>';

        return $this;
    }



}