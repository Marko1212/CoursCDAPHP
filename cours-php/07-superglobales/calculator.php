<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice en PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
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
        <div class="container mt-3">
            <p class="lead font-weight-bold">Calculatrice de base</p>
            <div class="form-group">
                <input class="form-control w-25" type="number" name="nombre1" placeholder="Nombre 1" value="<?php echo $nombre1; ?>">
            </div>
            <div class="form-group">
                <input class="form-control w-25" type="number" name="nombre2" placeholder="Nombre 2" value="<?php echo $nombre2; ?>">
            </div>
            <div class="form-group">
                <select class="form-control w-25" name="operation">
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
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Calculer</button>
            </div>
        
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
                echo "<p>Vous devez saisir deux valeurs numériques!</p>";
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
                if ($nombre2 != 0) {
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

</div>

</body>

</html>