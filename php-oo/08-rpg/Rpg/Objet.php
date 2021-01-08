<?php

namespace Rpg;

class Objet {

    protected $nom;
    
    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }
}