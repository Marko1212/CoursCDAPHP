<?php
spl_autoload_register();

use Stagiaire\Stagiaire;

$stagiaire = new Stagiaire(1, '2021-02-03 15:51:19', 'Marko',
                    '19026437213', '1999-03-04' );


$info = $stagiaire->getId() . ' - '. $stagiaire->getCreatedAt() . ' - '. $stagiaire->getName()
        . ' - ' . $stagiaire->getPhone() . ' - ' . $stagiaire->getBirthday();

echo $info;