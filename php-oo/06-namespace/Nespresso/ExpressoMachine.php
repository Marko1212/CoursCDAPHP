<?php

namespace Nespresso;

class ExpressoMachine {

    private $litresByExpresso; 
    private $litresByDescale;
    private $descale;

    private $capacityWater = 0;
    private $capacityBeans = 0;

    private $consumedWater = 0;
    private $consumedBeans = 0;

    public function __construct($litresByExpresso, $litresByDescale, $descale)
    {
        $this->litresByExpresso = $litresByExpresso;
        $this->litresByDescale = $litresByDescale;
        $this->descale = $descale;
    }

    public function addWater($waterQuantity) {
        $this->capacityWater += $waterQuantity;

        return $this;
    }

    public function addBeans($beansQuantity) {
        $this->capacityBeans += $beansQuantity;

        return $this;
    }


    public function makeExpresso() {
        $this->consumedWater += $this->litresByExpresso;
        $this->consumedBeans += 1;
        
        return 'Voici vos '. $this->litresByExpresso .' litre(s) de café <br>';
    } 

    public function makeDoubleExpresso() {
        $this->consumedWater += 2*$this->litresByExpresso;
        $this->consumedBeans += 2;

        return 'Voici vos '. 2 * $this->litresByExpresso .' litre(s) de café <br>';
    } 

    public function makeExpressos($quantity) {
        $this->consumedWater += $quantity * $this->litresByExpresso;
        $this->consumedBeans += $quantity;

        return 'Voici vos '. $quantity * $this->litresByExpresso .' litre(s) de café <br>';
    }

    public function getStatus() {
// - Renvoie un message en fonction de l'état de la machine
// - Reste 94 cafés, What else ?
// - Ajouter de l'eau
// - Ajouter des dosettes
// - Ajouter des dosettes et de l'eau
// - Détartrage nécessaire

    $status = 'Status : <br>';

    $status .= 'Il reste '. ($this->capacityBeans - $this->consumedBeans). ' café(s)<br>';

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

        if ($this->consumedWater >= $this->descale && ($this->capacityWater - $this->consumedWater >= $this->litresByDescale)) {
            $detartrage = 'Détartrage effectué <br>';
            $this->capacityWater = 0;
            $this->consumedWater = 0;
        } else if ($this->consumedWater < $this->descale) {
            $detartrage = 'Détartrage non nécessaire<br>';
        } else {
            $detartrage = 'Détartrage nécessaire mais pas assez d\'eau pour le faire<br>';
        }

        return $detartrage;
    }



}