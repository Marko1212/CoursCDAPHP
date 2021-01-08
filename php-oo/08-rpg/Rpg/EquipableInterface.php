<?php

namespace Rpg;

interface EquipableInterface {

    public function use(Personnage $personnage);
    public function support(Personnage $personnage);

}
