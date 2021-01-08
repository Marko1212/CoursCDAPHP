<?php

namespace Rpg;

abstract class Personnage
{

    protected $nom;
    protected $pointsDeVie = 100;
    protected $pointsDeForce = 10;
    protected $pointsDeMana = 10;
    protected $inventaire = [];


    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function attaquer($person)
    {

        if ($person === $this) {
            return "On ne doit pas s\'attaquer soi-même!";
        }

        $person->recevoirDegats($this);

        return $this;
    }

    public function recevoirDegats(Personnage $person)
    {

        if ($person instanceof Guerrier) {
            $this->pointsDeVie -= 2 * $person->getPointsDeForce();
        }

        if ($person instanceof Chasseur) {
            $this->pointsDeVie -= 3 * $person->getPointsDeForce();
        }

        if ($person instanceof Magicien) {
            $this->pointsDeVie -= 3 * $person->getPointsDeMana();
        }

        if ($this->pointsDeVie <= 0) {
            return $this->nom . ' tué!';
        }

        return $this->nom . ' attaqué!';
    }


    public function getPointsDeForce()
    {
        return $this->pointsDeForce;
    }

    public function getPointsDeMana()
    {
        return $this->pointsDeMana;
    }

    public function getPointsDeVie()
    {
        return $this->pointsDeVie;
    }

    public function pick($arme)
    {
        $this->inventaire[] = $arme;
        return $this;
    }

    public function afficheInventaire()
    {
        foreach ($this->inventaire as $item) {
            echo $item->getNom() . '<br>';
        }
    }
}
