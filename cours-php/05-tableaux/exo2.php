<?php


$eleves = [
    0 => [
        'nom' => 'Matthieu',
        'notes' => [10, 8, 16, 20, 17, 16, 15, 2]
    ],
    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 18, 12, 15, 13, 7]
    ],
    2 => [
        'nom' => 'Jean',
        'notes' => [17, 14, 6, 2, 16, 18, 9]
    ],
    3 => [
        'nom' => 'Enzo',
        'notes' => [1, 14, 6, 2, 1, 8, 9]
    ]
];
/* 
1/ Afficher la liste de tous les éléves avec leurs notes.

Exemple :

Matthieu a eu 10, 8, 16, 20, 17, 16, 15 et 2

Thomas a eu 4, 18, 12, 15, 13 et 7

Jean a eu 17, 14, 6, 2, 16, 18 et 9

2/ Calculer la moyenne de Jean. On part de $eleves[2]['notes']

La fonction count permet de compter les éléments d'un tableau

3/ Combien d'élèves ont la moyenne ?
Exemple :
Matthieu a la moyenne
Jean n'a pas la moyenne
Thomas a la moyenne
Nombre d'éléves avec la moyenne : 2

4/ Quel(s) éléve(s) a(ont) la meilleure note ?
Exemple: Thomas a la meilleure note : 19

5/ Qui a eu au moins un 20 ?
Exemple: Personne n'a eu 20
         Quelqu'un a eu 20
 */

echo "Les notes des élèves sont : <br>";

foreach ($eleves as $key => $elevenotes) {

        $string = '';
        for($i = 0; $i < count($elevenotes['notes']); $i++) {

            if ($i <= count($elevenotes['notes']) - 2) {
                if ($i === count($elevenotes['notes']) - 2 ) {
                    $string .= $elevenotes['notes'][$i] . '';
                } else {
                    $string .= $elevenotes['notes'][$i] . ', ';
                }
            }
            else {
                $string .=' et '. $elevenotes['notes'][$i];
            }
            }
            // A VOIR A QUOI SERT LE ++!!!
            echo $elevenotes['nom']++. " a eu " .$string. ".<br>";
        }

    echo "La moyenne de Jean est : <br>";
    
    $somme = 0;
        
        for($i = 0; $i < count($eleves[2]['notes']); $i++) {
            $somme += $eleves[2]['notes'][$i];
        }

    echo round($somme / count($eleves[2]['notes']), 1) .'<br>';
    
    $nombreElevesAvecMoyenne = 0;

    for ($i = 0; $i < count($eleves); $i++) {
        $somme = 0;
        for ($j = 0; $j < count($eleves[$i]['notes']); $j++) {
            $somme += $eleves[$i]['notes'][$j];
        }

        if ($somme / count($eleves[$i]['notes']) >= 10) {
            echo $eleves[$i]['nom'].' a la moyenne.<br>';
            $nombreElevesAvecMoyenne++;
        } else {
            echo $eleves[$i]['nom']." n'a pas la moyenne.<br>";
        }
    }

    echo "Nombre d'élèves avec la moyenne : ".$nombreElevesAvecMoyenne.".<br>";

    $elevesMeilleuresNotes = []; 

    for ($i = 0; $i < count($eleves); $i++) {
        $noteMax = 0;
        for ($j = 0; $j < count($eleves[$i]['notes']); $j++) {
            if ($eleves[$i]['notes'][$j] > $noteMax) {
                $noteMax = $eleves[$i]['notes'][$j];
            }
        }
        echo '<br>';
        $elevesMeilleuresNotes[$i] = [$eleves[$i]['nom'], $noteMax];
        var_dump($elevesMeilleuresNotes[$i]);
    }

  $noteMaxMax = 0;
  for ($i = 0; $i < count($eleves); $i++){
   
    if ($elevesMeilleuresNotes[$i][1] > $noteMaxMax) {
        $noteMaxMax = $elevesMeilleuresNotes[$i][1];
    }
  }

  echo '<br>La meilleure note est : ' .$noteMaxMax.'<br>';

  foreach($elevesMeilleuresNotes as $eleve) {
      if ($eleve[1] === $noteMaxMax) {
          echo $eleve[0].' a la meilleure note.<br>';
      }
  }

  $compteurDeVingts = 0;
  
  foreach($elevesMeilleuresNotes as $eleve) {
    if ($eleve[1] === 20) {
        $compteurDeVingts++;
    }
}
if  ($compteurDeVingts === 0) {
    echo "Personne n'a eu vingt.<br>";
} else {
    echo "Quelqu'un a eu vingt.<br>";
}

?>