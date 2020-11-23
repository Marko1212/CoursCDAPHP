<?php

	// Acronyme
	
	function acronyme($f){

        $f = strtoupper($f);

		$words = explode(" ", $f);
		$acronym = "";
		
		foreach ($words as $w){
			$acronym .= $w[0];
		}
		
		return $acronym;
	
    }
    
    echo acronyme("Je m'appelle Marko.").'<br>';

    echo '<br>';

    //Conjuguer verbe au présent


    function conjuguer($verbe) {

        $conjugaisons = '';

        $verbe = strtolower($verbe);

        $radical = substr($verbe, 0, strlen($verbe) - 2);


        $conjugaisons .= 'Je ' .$radical. 'e' . '<br>';
        $conjugaisons .= 'Tu ' .$radical. 'es' . '<br>';
        $conjugaisons .= 'Il/Elle ' .$radical. 'e' . '<br>';
        $conjugaisons .= 'Nous ' .$radical. 'ons' . '<br>';
        $conjugaisons .= 'Vous ' .$radical. 'ez' . '<br>';
        $conjugaisons .= 'Ils/Elles ' .$radical. 'ent' . '<br>';

        return $conjugaisons;

    }


    echo conjuguer("Trouver").'<br>';
    
/* 
Statistiques : On va créer un tableau avec des adresses e-mail. Le but est d'extraire le nom du serveur après le @. On calculera ensuite le pourcentage d'utilisation de chaque fournisseur. Par exemple :

Gmail : 40%

Outlook: 20%

Orange: 20%

Autre: 20% */


$listeDesMails = ["jack@mailinator.com", 
"simon@gmail.com", "marc.antoine@outlook.fr", 
"daniil.medvedev@gmail.com", "andjelija@orange.fr", 
"olga@orange.com", "marko@mail.ru", 
"veljko@outlook.com", "matthieu.mota@boxydev.com", "john.doe@google.com"];

$listeDesDomaines = [];

foreach ($listeDesMails as $email) {

    $domain = explode('@', $email);
    $domain[1] = substr($domain[1], 0, strpos($domain[1], '.'));
    $domain[1] = ucfirst($domain[1]);


    $listeDesDomaines[] = $domain[1];
 
    // output domain
    echo $domain[1].'<br>';
}

var_dump($listeDesDomaines);




?>