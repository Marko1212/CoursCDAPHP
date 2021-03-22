<?php 

class MyClass
{
    public $public = "public";
    protected $protected = "protected";
    private $private = "private";

    function print() {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
    
}


    $obj = new MyClass();
    echo $obj->print();




?>