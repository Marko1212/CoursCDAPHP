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
    
    echo acronyme("World of Warcraft.").'<br>';

    echo '<br>';

    //Conjuguer verbe au présent
    //cas particuliers : ajouter, manger, placer

    function conjuguer($verbe) {

        $conjugaisons = '';

        $verbe = strtolower($verbe);

        $voyelles = ["a", "e", "i", "o", "u", "y", "ù", "é", "è", "ê", "â", "à", "î", "ô", "û"];

        $radical = substr($verbe, 0, strlen($verbe) - 2);

        if (in_array($verbe[0], $voyelles)) {
        $conjugaisons .= 'J\'' .$radical. 'e' . '<br>'; 
        } else {
        $conjugaisons .= 'Je ' .$radical. 'e' . '<br>';
        }

        $conjugaisons .= 'Tu ' .$radical. 'es' . '<br>';
        $conjugaisons .= 'Il/Elle ' .$radical. 'e' . '<br>';
        if (substr($radical, -1) === "g") {
            $radical .= "e";
            $conjugaisons .= 'Nous ' .$radical. 'ons' . '<br>';
            $radical = substr($radical, 0, -1);
        } else if (substr($radical, -1) === "c") {
            $radical = substr($radical, 0, -1) . 'ç';
            $conjugaisons .= 'Nous ' .$radical. 'ons' . '<br>';
            $radical = substr($radical, 0, -2). 'c';

        } else {
            $conjugaisons .= 'Nous ' .$radical. 'ons' . '<br>';
        }
        $conjugaisons .= 'Vous ' .$radical. 'ez' . '<br>';
        $conjugaisons .= 'Ils/Elles ' .$radical. 'ent' . '<br>';

        return $conjugaisons;

    }

    echo conjuguer("manger").'<br>';
    echo conjuguer("ajouter").'<br>';
    echo conjuguer("trouver").'<br>';
    echo conjuguer("placer").'<br>';
    
/* 
Statistiques : On va créer un tableau avec des adresses e-mail. Le but est d'extraire le nom du serveur après le @. On calculera ensuite le pourcentage d'utilisation de chaque fournisseur. Par exemple :

Gmail : 40%

Outlook: 20%

Orange: 20%

Autre: 20% */


$listeDesMails = ["jack@mailinator.com", 
"simon@gmail.com", "marc.antoine@outlook.fr", 
"daniil.medvedev@gmail.com", "andjelija@orange.fr", "neil@free.fr",
"olga@orange.com", "marko@mail.ru", "pierrot@google.com", "radomir.askovic@sfr.fr",
"veljko@outlook.com", "matthieu.mota@boxydev.com", "john.doe@gmail.com"];

$listeDesDomaines = [];

for ($i = 0; $i < count($listeDesMails); $i++) {

    $domain = explode('@', $listeDesMails[$i]);
    $domain[1] = substr($domain[1], 0, strpos($domain[1], '.'));
    $domain[1] = ucfirst($domain[1]);
    echo $domain[1].'<br>';

    $listeDesDomaines[$i] = $domain[1];
 
    // output domain
   // echo $domain[1].'<br>';
}

/* var_dump($listeDesDomaines); */

echo '<br>';

$listeDomainesFrequences = [];

for ($j= 0; $j < count($listeDesDomaines); $j++) {
    $listeDomainesFrequences[$listeDesDomaines[$j]] = array_count_values($listeDesDomaines)[$listeDesDomaines[$j]];
}
/* 
var_dump($listeDomainesFrequences); */

$nombreAutres = count($listeDesMails);

foreach($listeDomainesFrequences as $domaine => $frequence) {
    if ($domaine === "Gmail" || $domaine === "Orange" || $domaine === "Outlook") {
    echo $domaine.' : '. round($frequence / count($listeDesMails) * 100, 2) .'%<br>';
    $nombreAutres -= $frequence;
}
}

echo 'Autre : '. round($nombreAutres / count($listeDesMails) *  100, 2) .'%<br>';



?>