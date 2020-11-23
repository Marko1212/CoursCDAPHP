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



?>