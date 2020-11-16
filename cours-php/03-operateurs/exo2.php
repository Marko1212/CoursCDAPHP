<!-- 
Créer une boucle qui affiche 10 étoiles (*)
Imbriquer la boucle dans une autre boucle afin d'afficher 10 lignes de 10 étoiles
Nous obtenons un carré. Trouver un moyen de modifier le code pour obtenir un triangle rectangle. -->

<?php

for ($i = 0; $i < 10; $i++) {
    echo "*";
}

echo '<br>';

for ($i = 0; $i < 10; $i++) {
    echo '<br/>';
    for ($j = 0; $j < 10; $j++) {
        echo "*";
    }
}

echo '<br/>';

for($i=0; $i < 10 ; $i++)
{

echo"<br>";
for($j=0; $j <=$i ; $j++){
echo "*" ;
}



}

?>