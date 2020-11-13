<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo PHP</title>
</head>
<body>
    <?php

$prénom = 'Marko';

echo '<h1>Bonjour '.$prénom.'</h1>';

echo "<h1>Bonjour $prénom</h1>";
?>

<h1>Bonjour <?php  echo $prénom?></h1>
</body>
</html>