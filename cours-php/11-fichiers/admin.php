
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes</title>
</head>
<body>

<div>
            <h1>La liste des commandes</h1>
            <?php
                // On peut lire le contenu d'un fichier
               // $fichier = fopen('mes-commandes.txt', 'r');
               // $commandes = fread($fichier, 1000000);
                $commandes = file_get_contents('mes-commandes.txt'); // Avec cette ligne, on n'a plus besoin de faire le fopen ni le fread
                // echo $commandes;
                // Je remplace tous les retours à la ligne du fichier par une balise br
                echo str_replace(PHP_EOL, '<br />', $commandes);
            ?>
</div>
    
</body>
</html>