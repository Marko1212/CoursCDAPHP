<?php

namespace Rpg;

class Guerrier extends Personnage implements Displayable {

    protected $pointsDeForce = 20;

    public function getImage() {
        return 'images/aragorn.jpg';
    }

}