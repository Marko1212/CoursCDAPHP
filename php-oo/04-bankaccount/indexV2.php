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

        $manager = new BankManager('localhost', 'root', '', 'poo-bank-account');
        
        $bankAccount01 = new BankAccount('Matthieu');

        $manager->add($bankAccount01);
        
        
        ?>

    </div>
</body>
</html>
