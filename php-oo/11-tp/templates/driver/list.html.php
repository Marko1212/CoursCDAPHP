<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des conducteurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    Menu

    <div class="container">
    <h1>Liste des conducteurs</h1>
    <table>
    <?php foreach ($drivers as $driver) { ?>
<tr>
    <td><?= $driver->getId(); ?></td>
    <td><?= $driver->getFirstName(); ?></td>
    <td><?= $driver->getName(); ?></td>
</tr>
<?php } ?>
    </table>
    </div>
</body>
</html>
