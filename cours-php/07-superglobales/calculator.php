<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice en PHP</title>
</head>

<body>

    <?php

    $nombre1 = null;
    $nombre2 = null;

    if (isset($_GET['nombre1'])) {
        $nombre1 = $_GET['nombre1'];
    }

    if (isset($_GET['nombre2'])) {
        $nombre2 = $_GET['nombre2'];
    }

    $operation = null;

    if (isset($_GET['operation'])) {
        $operation = $_GET['operation'];
    }


    ?>



    <form>
        <input type="number" name="nombre1" placeholder="Nombre 1" value="<?php echo $nombre1; ?>">
        <input type="number" name="nombre2" placeholder="Nombre 2" value="<?php echo $nombre2; ?>">
        <select name="operation">
            <option <?php if ($operation === null) {
                        echo 'selected';
                    } ?>>Choisir une opération</option>
            <option <?php if ($operation === 'Ajouter') {
                        echo 'selected';
                    } ?>>Ajouter</option>
            <option <?php if ($operation === 'Soustraire') {
                        echo 'selected';
                    } ?>>Soustraire</option>
            <option <?php if ($operation === 'Multiplier') {
                        echo 'selected';
                    } ?>>Multiplier</option>
            <option <?php if ($operation === 'Diviser') {
                        echo 'selected';
                    } ?>>Diviser</option>
        </select>
        <button>Calculer</button>
    </form>
    <p>Le résultat est :</p>

    <?php

    $numeric = True;

    if (!is_numeric($nombre1) || !is_numeric($nombre2)) {
        $numeric = False;
    }

    switch ($operation) {
        case null:
            break;
        case "Ajouter":
            if ($numeric) {
                echo $nombre1 + $nombre2;
                break;
            } else {
                echo "Vous devez saisir deux valeurs numériques!";
                break;
            }
        case "Soustraire":
            if ($numeric) {
                echo $nombre1 - $nombre2;
                break;
            } else {
                echo "Vous devez saisir deux valeurs numériques!";
                break;
            }
        case "Multiplier":
            if ($numeric) {
                echo $nombre1 * $nombre2;
                break;
            } else {
                echo "Vous devez saisir deux valeurs numériques!";
                break;
            }
        case "Diviser":
        
            if ($numeric) {
                if ($nombre2!=0) {
                echo $nombre1 / $nombre2;
                break;
            } else {
                echo "La division par 0 est impossible! Veuillez saisir une valeur non nulle!";
                break;
            }
        } else {

                echo "Vous devez saisir deux valeurs numériques!";
                break;

        }

        default:
            echo "Vous devez choisir une operation!";
            break;
    }

    ?>



</body>

</html>