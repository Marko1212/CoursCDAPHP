
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande de produits</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>

    <?php

    $email = null;
    $produit = null;
    $errors = [];

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['produit'])) {
        $produit = $_POST['produit'];
    }

    if (!is_null($email) && empty(trim($email))) {
        $errors['email'] = 'Vous devez saisir un email!';
    } else
   
    if (!is_null($email) && filter_var(trim($email), FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'Cet email n\'est pas valide';
    }

    if ($produit === 'choisir') {
        $errors['produit'] = 'Vous devez choisir un produit!';
    }


    ?>

    <div class="container mt-3">
        <form method="post">
            <p class="lead font-weight-bold">Commande de produits</p>
            <div class="form-group">
                <input class="form-control w-50" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                <?php if (isset($errors['email'])) {
                    echo '<span class="text-danger">' . $errors['email'] . '</span>';
                } ?>
            </div>
            <div class="form-group">
                <select class="form-control w-50" name="produit">
                    <option value="choisir" <?php if ($produit === null) {
                                                echo 'selected';
                                            } ?>>Choisir un produit</option>
                    <option value="chemise" <?php if ($produit === 'chemise') {
                                                echo 'selected';
                                            } ?>>Chemise</option>
                    <option value="pantalons" <?php if ($produit === 'pantalons') {
                                                    echo 'selected';
                                                } ?>>Pantalons</option>
                    <option value="chaussures" <?php if ($produit === 'chaussures') {
                                                    echo 'selected';
                                                } ?>>Chaussures</option>
                </select>
                <?php if (isset($errors['produit'])) {
                    echo '<span class="text-danger">' . $errors['produit'] . '</span>';
                } ?>
            </div>
            <div class="form-group">
                <button class="btn btn-primary form-control w-50">Commander</button>
            </div>

        </form>

        <?php

        $fileHandler = fopen('mes-commandes.txt', 'a+');

        $date = date('d/m/Y' .' à '. 'H:i:s', time());

        switch ($produit) {
            case null:
                break;
            case "chemise":
                fwrite($fileHandler, "$email a commandé une chemise le $date". PHP_EOL);
            break;
            case "pantalons":
                fwrite($fileHandler, "$email a commandé un pantalon le $date". PHP_EOL);
            break;

            case "chaussures":

                fwrite($fileHandler, "$email a commandé des chaussures le ". $date . PHP_EOL);
            break;
        }

        fclose($fileHandler);

        if (!empty($_POST) && empty($errors)) {
            echo '<span class="text-success">Commande effectuée!</span>';
        }

        ?>

    </div>


</body>

</html>