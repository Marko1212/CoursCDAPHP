<?php 

/**
 * Les propriétés et les méthodes statiques
 * 
 * Une propriété statique garde la même valeur peu importe l'instance de la classe.
 * Sa valeur peut changer, ce n'est pas une constante mais elle reste la même peu importe l'instance
 * 
 */

 class Chat {

    public $name;

    public static $count = 0;

    public const PAW = 4;

    public function __construct($name) {
        $this->name = $name;
        self::$count++;
    }

    /**
     * On ne peut pas utiliser $this dans une méthode statique...
     */

    public static function howMany() {
        return 'Il y a '.self::$count.' chat(s) sur le site donc '.(self::PAW * self::$count).' pattes<br />';
    }
    
 }

    // Accès à une propriété statique
    // L'opérateur :: s'appelle l'opérateur de résolution de portée (Paamayim Nekudotayim -- double deux points en hébreu)
    echo Chat::howMany();

    // Je vais instancier 2 chats

    $catA = new Chat('Bianca');
    echo Chat::$count. ' chat(s) <br />';
    $catB = new Chat('Mina');
    echo Chat::$count. ' chat(s) <br />';
    echo Chat::howMany();

    echo 'Un chat a normalement '.Chat::PAW.' pattes <br>';

    //var_dump($catA);
    //var_dump($catB);

   
    /**
     * L'héritage en POO
     */

    class Animal {
        protected $name;
        protected $type;

        public function __construct($name) {
            $this->name = $name;
        }

        public function move() {
            return $this->name. ' se déplace';
        }

    }

    // La classe Cat hérite du comportement de la classe Animal
    // On peut préfixer la classe avec le mot clé final pour éviter d'hériter de Cat (final class Cat)
    class Cat extends Animal {
        private $fur;

        public function climbsOnRoof() {
            return $this->name. ' est sur le toit...<br>';
        }

        public function move() {
            // parent::move() permet d'appliquer la méthode move du parent (Animal)
            //On peut aussi faire $this->move() dans une méthode qui n'a pas le nom move
            return parent::move().' silencieusement... <br>';
        }


    }

    $bianca = new Cat('Bianca');//ici on utilise le constructeur de la classe Animal

    var_dump($bianca);
    echo $bianca->move();
    echo $bianca->climbsOnRoof();

    // Avec l'héritage, on a ce qu'on appelle le polymorphisme

    var_dump($bianca instanceof Animal);
    var_dump($bianca instanceof Cat);

    echo '<br>';

    class Dog extends Animal {

        public function __construct($name, $type) {
            parent::__construct($name);
            $this->type = $type;
        }        

        public function move() {
            // parent::move() permet d'appliquer la méthode move du parent (Animal)
            //On peut aussi faire $this->move() dans une méthode qui n'a pas le nom move
            return parent::move().' bruyamment... <br>';
        }

        public function takeAWalk() {
            return $this->name. ' se promène avec son maître...<br>';
        }

    }

    $dog = new Dog('Pongo', 'Dalmatien');
    echo $dog->move();
    echo $dog->takeAWalk();
    var_dump($dog);



