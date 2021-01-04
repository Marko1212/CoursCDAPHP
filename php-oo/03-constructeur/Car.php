<?php

/*
 * On va créer une classe Voiture.
 * Il faudra créer la classe dans un fichier à part
 * Une voiture possède 4 roues, une couleur, une marque et un modèle.
 * Une voiture peut être construite avec tous ses attributs
 * Elle peut aussi rouler et klaxonner (Une chaîne).
 * On n'oubliera pas les getters et les setters.
 * On instanciera au moins 2 voitures différentes...
 * 
 * BONUS : Une voiture a un niveau d'essence (50L). On réduit la jauge de 2L à chaque fois qu'on appelle la méthode rouler.
 */

class Car {

    private $wheels;
    private $color;
    private $model;
    private $brand;

    private $fuelLevel;


    public function __construct($brand, $model, $color='white', $wheels=4, $fuelLevel=50) {
        $this->color=$color;
        $this->model=$model;
        $this->wheels = $wheels;
        $this->fuelLevel = $fuelLevel;
        $this->brand= $brand;
    }
    

    public function getWheels() {
        return $this->wheels;
    }

    public function setWheels($wheels) {
        $this->wheels = $wheels;
        return $this;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
        return $this;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
        return $this;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
        return $this;
    }

    public function getFuelLevel() {
        if ($this->fuelLevel >= 0) {

        return $this->fuelLevel;

    }
        return 'no fuel';
    }

    public function setFuelLevel($fuelLevel) {
        $this->fuelLevel = $fuelLevel;

        return $this;
    }

  
    function move() {
        $this->fuelLevel -= 2;
        if ($this->fuelLevel >= 0 ) {

            return $this->brand .' '. $this->model. ' moves !';
        }
        return $this->brand .' '. $this->model. ' does not have any fuel, please refuel immediately !';
    }

    function horn() {
        return $this->brand .' '. $this->model.' horns !';
    }



}