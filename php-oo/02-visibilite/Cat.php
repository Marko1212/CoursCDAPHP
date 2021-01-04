<?php 

class Cat {
    // Les propriétés d'une classe ont une visibilité
    public $name;
    protected $type;
    private $fur;

    // Les méthodes d'une classe ont aussi une visibilité

    public function getFur() {
        return $this->fur;
    }

    public function setFur($fur) {
        if (strlen($fur) < 3) {
            throw new Exception('La couleur n\'est pas valide');
        }
        $this->fur = $fur;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

}