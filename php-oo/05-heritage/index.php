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

    var_dump($catA);
    var_dump($catB);

   


