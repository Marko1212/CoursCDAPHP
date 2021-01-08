<?php

namespace Rpg;

class Potion extends Objet implements UsableInterface {


    public function __construct()
    {
        $this->nom = 'Potion';
    }

    public function use($personnage) {

        $personnage->addPointsDeVie(10);

    }


}