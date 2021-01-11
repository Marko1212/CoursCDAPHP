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
    private static $listOfPersonnages = [];


    public function __construct($nom)
    {
        $this->nom = $nom;
        self::$listOfPersonnages[] = $this;
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
            return 'Je suis déjà mort!<br>';
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

            return $this->nom . ' tué!<br>';
        }   

            $this->pointsDeVie -= $bourreau->getDestructiveForce();

        return $this->nom . ' attaqué!<br>';
    }


   public function getDestructiveForce() {
        if ($this instanceof Guerrier) {
            $this->destructiveForce = 2 * $this->getPointsDeForce();
            return $this->destructiveForce;
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

 /*    public function afficheInventaire()
    {
        foreach ($this->inventaire as $item) {
            echo $item->getNom() . '<br>';
        }
    }
 */
       /**
     * Afficher l'inventaire du personnage
     */
    public function afficheInventaire() {
        $html = '<ul>';
        foreach ($this->inventaire as $item) {
            // .= permet de concaténer à la suite
            $html .= '<li>'.$item->getNom().'</li>';
        }
        $html .= '</ul>';
        return $html;
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
        return self::$listOfPersonnages;
    }

}
