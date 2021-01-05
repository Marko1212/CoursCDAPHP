<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de compte bancaire en POO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Gestion de compte bancaire en POO (Avec la base de données)</h1>

        <?php

        require_once 'BankAccount.php';
        require_once 'BankManager.php';

        $manager = new BankManager('localhost', 'root', '', 'poo-bank-account');

        // $bankAccount01 = new BankAccount('Matthieu');

        // $manager->add($bankAccount01);

        //Vérifier que le formulaire est soumis
        //Créer une instance de compte avec les données du formulaire
        //Ajouter le compte dans la BDD et si c'est OK, afficher un message de succès

    $owner = null;
    $balance = 0;
    $overdraft = 0;

if (!empty($_POST)) {

    $owner = strip_tags($_POST['owner']);
    $balance = $_POST['balance'];
    $overdraft = $_POST['overdraft'];
    //$errors = [];

    //Faire la validation...

    $bankAccount = new BankAccount($owner, $balance, $overdraft);
    $errors = $bankAccount->getErrors();


    if (empty($errors)) {

        $manager->add($bankAccount);

        echo '<div class="container alert alert-success">
            Le compte a bien été créé!
        </div>';
    } else {
        var_dump($errors);
    }

}
        ?>

        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <form action="" method="post">
                    <label for="owner">Client</label>
                    <input type="text" name="owner" id="owner" class="form-control" value="<?=$owner; ?>"> <br />

                    <label for="balance">Montant initial</label>
                    <input type="number" name="balance" id="balance" class="form-control" value="<?=$balance; ?>"> <br />

                    <label for="overdraft">Découvert autorisé</label>
                    <input type="number" name="overdraft" id="overdraft" class="form-control" value="<?=$overdraft; ?>"> <br />

                    <button class="btn btn-primary btn-block">Ajouter le compte</button>

                </form>
                
            </div>
        </div>

        <?php
            //On veut récupérer la liste des comptes sur la BDD

        $bankAccounts = $manager->getList();
        var_dump($bankAccounts);
        ?>

    </div>
</body>

</html>