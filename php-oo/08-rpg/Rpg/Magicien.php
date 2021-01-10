<?php

namespace Rpg;

class Magicien extends Personnage implements Displayable {

    protected $pointsDeMana = 20;

    public function getImage() {
        return 'images/gandalf.jpg';
    }

}