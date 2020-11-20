<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les superglobales en PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <form class="d-flex" action="">
            <!-- Le name du input est très important -->
            <input type="text" class="form-control" name="email">
            <input type="text" class="form-control" name="sujet">
            <input type="text" class="form-control" name="message">

            <button class="btn btn-primary">Chercher</button>
        </form>

        <?php

        var_dump($_GET);

        ?>

    </div>

</body>

</html>