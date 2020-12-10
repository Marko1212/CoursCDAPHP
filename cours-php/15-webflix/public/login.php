<?php

session_start();

ob_start(); //on met cela pour éviter des bugs avec la fonction header() (redirection)


require '../partials/header.php';

?>

<div class="container">

<?php 

//on met cela dans le cas où il y a erreur de soumission du formulaire, pour ne pas avoir de message
//d'erreur dans le formulaire (avec value)
    $emailPseudo = null;
    $password = null;

if (!empty($_POST)) {

    $emailPseudo = htmlspecialchars($_POST['emailPseudo']);
    $password = trim($_POST['password']);

    $errors = [];

    if (!is_null($emailPseudo) && empty(trim($emailPseudo)) && !is_numeric(trim($emailPseudo))) {
        $errors['emailPseudo'] = 'Vous devez saisir votre email ou pseudo!';
    }


    if (!is_null($password) && empty(trim($password)) && !is_numeric(trim($password))) {
        $errors['password'] = 'Vous devez saisir votre mot de passe!';
    }

    global $db;

    $query = $db->prepare('SELECT * FROM user where user.email = :emailPseudo or user.username = :emailPseudo');
    $query -> bindValue(':emailPseudo', $emailPseudo);
    $query -> execute();

    $results = $query -> fetchAll();

    if (empty($results) || !password_verify($password, $results[0]['password'])) {
        $errors['wrongData'] = "Utilisateur ou mot de passe incorrect!";
    }

    if (empty($errors) && !empty($results)) {


    $_SESSION['connected'] = $emailPseudo;
     
     header('Location: index.php?login=success');
     


    } else {

        //Afficher les erreurs...
        echo "<div class='container alert alert-danger'>";
        foreach($errors as $error) {
            echo '<p class="text-danger m-0">'.$error.'</p>';
        }
        echo '</div>';

    }

}

?>


    <h1 class="text-center mt-3">Connexion</h1>

    <form class="w-50 mx-auto" method="post">
        <div class="form-group"> 
            <label for="emailPseudo">Email ou pseudo</label>
            <input type="text" class="form-control" id="emailPseudo" placeholder="email ou pseudo" name="emailPseudo" value="<?php echo $emailPseudo; ?>">
        </div>
        <div class="form-group"> 
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="mot de passe" name="password" value="<?php echo $password; ?>">
        </div>
        <button class="btn btn-danger w-100 text-center mb-5" type="submit">Se connecter</button>
    </form>

</div>


<?php require '../partials/footer.php'; ?>