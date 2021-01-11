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

    $validation = new Validation($form);
    $validation -> name('civility') -> min(2) -> required();
    $validation -> name('email')->required();
    $validation -> name('telephone')->required();
    $validation -> name('message')->min(15)->required();



    ?>

    <form method='post' action=''>

        <?php echo $form->input('civility'); ?>
        <?php echo $validation->getError('civility'); ?>
        <?php echo $form->input('email'); ?>
        <?php echo $validation->getError('email'); ?>
        <?php echo $form->input('telephone', 'number'); ?>
        <?php echo $validation->getError('telephone'); ?>
        <?php echo $form->input('message'); ?>
        <?php echo $validation->getError('message'); ?>

        <?= $form->button('Envoyer'); ?>
    </form>

    <?php 

    //

    if ($form->isSubmit()) {

        var_dump($form->getData());
        //le getData doit me renvoyer toutes les données
        //du formulaire ($_POST)

        var_dump($validation->getErrors());
    }

    ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>