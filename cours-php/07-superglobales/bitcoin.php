<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversion Euros Bitcoins</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- TP Conversion Euros vers bitcoins

1. Créer un formulaire avec un champ où on saisit une valeur en euros
2. Ajouter un bouton "Convertir". Au clic, on affiche la conversion en Bitcoins
Créer et appeler une fonction convert
3. Ajouter un select pour choisir le sens de conversion
   - Euros vers bitcoins
   - Bitcoins vers euros -->

    <?php

    function convert($montant, $taux = 15690, $sensConversion = "euroEnBitcoin")
    {

        if ($sensConversion === "bitcoinEnEuro") {
            return $montant * $taux;
        }

        return $montant / $taux;
    }

    $amount = null;
    $rate = null;
    $operation = null;

    if (isset($_GET['montant'])) {
        $amount = $_GET['montant'];
    }

    if (isset($_GET['taux'])) {
        $rate = $_GET['taux'];
    }

    if (isset($_GET['operation'])) {
        $operation = $_GET['operation'];
    }

    ?>

    <div class="container mt-3">
        <form>
            <p class="lead font-weight-bold">Conversion euros / bitcoins</p>
            <div class="form-group">
                <input class="form-control w-50" type="number" step="any" name="montant" placeholder="Montant à convertir" value="<?php echo $amount; ?>">
            </div>
            <div class="form-group">
                <input class="form-control w-50" type="number" step="any" name="taux" placeholder="Saisir un taux du bitcoin en euros (sinon le taux par défaut sera appliqué)" value="<?php echo $rate; ?>">
            </div>
            <div class="form-group">
                <select class="form-control w-50" name="operation">
                    <option <?php if ($operation === null) {
                                echo 'selected';
                            } ?>>Choisir un sens de conversion</option>
                    <option <?php if ($operation === 'Euros en bitcoins') {
                                echo 'selected';
                            } ?>>Euros en bitcoins</option>
                    <option <?php if ($operation === 'Bitcoins en euros') {
                                echo 'selected';
                            } ?>>Bitcoins en euros</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary form-control w-50">Convertir</button>
            </div>

        </form>
        <p>Le résultat est :</p>


        <?php


        if ($rate <= 0 && !is_null($rate)) {
            exit('Vous devez saisir un taux strictement positif!');
        }

        if (!is_null($amount) && empty(trim($amount)) && $amount != 0) {
            exit('Vous devez saisir un montant à convertir!');
        } else if (!is_null($rate) && empty(trim($rate))) {
            $rate = 15690;
        }

        $numeric = True;

        if (!is_numeric($amount) || !is_numeric($rate)) {
            $numeric = False;
        }

        switch ($operation) {
            case null:
                break;
            case "Euros en bitcoins":
                if ($numeric) {
                    echo convert($amount, $rate);
                    break;
                } else {
                    echo "Vous devez saisir un montant à convertir!";
                    break;
                }
            case "Bitcoins en euros":
                if ($numeric) {
                    echo convert($amount, $rate, "bitcoinEnEuro");
                    break;
                } else {
                    echo "<p>Vous devez saisir un montant à convertir!</p>";
                    break;
                }
            default:
                echo "Vous devez choisir un sens de conversion!";
                break;
        }

        ?>

    </div>


</body>

</html>