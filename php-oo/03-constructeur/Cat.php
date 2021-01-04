<?php 

class Cat {

private $name;
private $fur;

public function __construct($name, $fur = null) {
    $this->name=$name;
    $this->fur =$fur;

}

public function getName() {
    return $this->name;
}

}