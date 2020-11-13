<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables en PHP</title>
</head>
<body>
    <?php
$age = 26; // Initialise une variable et lui affecte la valeur 26
$mon_age = 26; // Underscore
$monAge = 26; // lowerCamelCase
$doubleAge = $monAge * 2; // $doubleAge vaut 52

echo $doubleAge; // Affiche 52
echo '<br />';

echo 'J\'ai '.$age.' ans <br />';

//En PHP, il existe l'interpolation de variables
//En utilisant les double quotes, on n'a pas besoin de
//concaténer

echo "J'ai $age ans";

?>
</body>
</html>