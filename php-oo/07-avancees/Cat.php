<?php

class Cat extends Animal implements KingdomAnimalInterface {
    public function cry() {
        return 'Miaule <br>';
    }

    public function breathe() {
        return 'Respire <br>';
    }

    public function walk() {
        return 'Marche <br>';
    }
}

