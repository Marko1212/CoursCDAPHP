<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire en POO</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    spl_autoload_register();


    $form = new Form($_POST);

    //Pour les erreurs

    //$validation = new Validation();
    //$validation -> name('email')->required();
    //$_POSTvalidation -> name('message')->min(15)->required();
    //$form->setValidation($validation);



    ?>

    <form method='post' action=''>
        <?php echo $form->input('email'); ?>
        <?php echo $form->input('telephone', 'number'); ?>
        <?php echo $form->input('message'); ?>

        <?= $form->button('Envoyer'); ?>
    </form>

    <?php 

    //

    if ($form->isSubmit()) {

        var_dump($form->getData());
        //le getData doit me renvoyer toutes les données
        //du formulaire ($_POST)

        //var_dump($form->getErrors());
    }

    ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>