<?php

namespace Rpg;

class Sword extends Objet implements EquipableInterface {

    private $force;

    public function __construct($nom, $force)
    {
        $this->nom = $nom;
        $this->force = $force;
    }

    public function use($personnage) {

        $personnage->addPointsDeForce($this->force);

    }

    public function support(Personnage $personnage) {
        return $personnage instanceof Guerrier;
    }
}