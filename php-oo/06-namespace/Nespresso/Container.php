<?php

namespace Nespresso;

class Container {
    private $containerBeansCapacity;
    private $containerWaterCapacity;

    public function __construct($containerBeansCapacity, $containerWaterCapacity)
    {
        $this->containerBeansCapacity = $containerBeansCapacity;
        $this->containerWaterCapacity = $containerWaterCapacity;
 
    }

    public function getContainerBeansCapacity() {

        return $this->containerBeansCapacity;

    }

    public function getContainerWaterCapacity() {

        return $this->containerWaterCapacity;

    }

}