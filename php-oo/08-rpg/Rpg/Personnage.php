<?php

namespace Rpg;

abstract class Personnage
{

    private $nom;
    protected $pointsDeVie = 100;
    protected $pointsDeForce = 10;
    protected $pointsDeMana = 10;
    protected $inventaire = [];
    private $xp = 0;
    private $level = 0;
    private $alive = true;
    private $destructiveForce = 0;
    private static $list = []; 


    public function __construct($nom)
    {
        $this->nom = $nom;
        self::$list[] = $this;
    }

    public function attaquer($victime)
    {

        if ($victime === $this) {
            return "On ne doit pas s'attaquer soi-même!<br>";
        }

        $victime->recevoirDegats($this);

        return $this;
    }

    public function recevoirDegats(Personnage $bourreau)
    {   

        if ($this->alive === false) {
            return 'Je suis déjà mort!';
        }

        if ($bourreau === $this) {
            return "On ne doit pas s'attaquer soi-même!<br>";
        }

        if ($this->pointsDeVie <= $bourreau->getDestructiveForce()) {
            $this->alive = false;
            $this->pointsDeVie = 0;
            $bourreau -> addExperience();
            if ($bourreau->getExperience() >= 3) {
                $bourreau->increaseLevel();
            }
            else if ($bourreau->getExperience() >= 6) {
                $bourreau->increaseLevel();
            } else if ($bourreau->getExperience() >= 9) {
                $bourreau->increaseLevel();
            }   

            return $this->nom . ' tué!';
        }   

            $this->pointsDeVie -= $bourreau->getDestructiveForce();

        return $this->nom . ' attaqué!';
    }


   public function getDestructiveForce() {
        if ($this instanceof Guerrier) {
            return $this->destructiveForce = 2 * $this->getPointsDeForce();
        }

        if ($this instanceof Chasseur) {
            return $this->destructiveForce = 3 * $this->getPointsDeForce();
        }

        if ($this instanceof Magicien) {
            return $this->destructiveForce = 3 * $this->getPointsDeMana();
        }

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

    public function addPointsDeVie($pointsDeVie)
    {
        $this->pointsDeVie += $pointsDeVie;
        return $this;
    }

    public function addPointsDeForce($pointsDeForce)
    {
        $this->pointsDeForce += $pointsDeForce;
        return $this;
    }

    public function consume(UsableInterface $item)
    {
        $item->use($this);
        return $this;
    }

    public function equip(EquipableInterface $item)
    {
        if ($item->support($this)) {
        $item->use($this);
        return $this;
        }
    }


    public function getNom()
    {
        return $this->nom;
    }

    public function pick($item)
    {
        $this->inventaire[] = $item;
        return $this;
    }

    public function afficheInventaire()
    {
        foreach ($this->inventaire as $item) {
            echo $item->getNom() . '<br>';
        }
    }

    public function getLevel() {
        return "Le niveau de " . $this->getNom() . ' est : ' . $this->level . '<br>';
    }

    public function increaseLevel() {
        $this->level++;
        return $this;
    }

    public function getExperience() {
        return $this->xp;
    }

    public function addExperience() {
        $this->xp++;

        return $this;
    }

    public static function getList() {
        return self::$list;
    }

}
