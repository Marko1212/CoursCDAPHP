<?php

/**
 * Une classe abstraite est une classe qu'on ne peut pas instancier directement
 * 
 */
abstract class Animal {
    protected $name;
    protected $color;

    public function __construct($name) {
        $this->name = $name;
    }

    abstract public function walk();
}
