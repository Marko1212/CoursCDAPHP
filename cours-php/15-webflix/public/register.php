<?php

session_start();

ob_start(); //on met cela pour éviter des bugs avec la fonction header() (redirection)



require '../partials/header.php';

?>

<div class="container">

<?php 

//on met cela dans le cas où il y a erreur de soumission du formulaire, pour ne pas avoir de message
//d'erreur dans le formulaire (avec value)
    $email = null;
    $pseudo = null;
    $password = null;
    $confirm = null;

if (!empty($_POST)) {

    $email = htmlspecialchars($_POST['email']);
    $pseudo = strip_tags($_POST['pseudo']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    $errors = [];

    if (!is_null($email) && empty(trim($email)) && !is_numeric(trim($email))) {
        $errors['email-1'] = 'Le email est obligatoire!';
    }

    if (!is_null($email) && filter_var(trim($email), FILTER_VALIDATE_EMAIL) === false) {
        $errors['email-2'] = 'Le email n\'est pas valide';
    }

    if (!is_null($pseudo) && empty(trim($pseudo)) && !is_numeric(trim($pseudo))) {
        $errors['pseudo'] = 'Le pseudo est obligatoire!';
    }

    if (!is_null($password) && empty(trim($password)) && !is_numeric(trim($password))) {
        $errors['password-1'] = 'Le mot de passe est obligatoire!';
    }

    if(!is_null($password) && !preg_match("#[0-9]+#", $password)) {
        $errors['password-2'] = "Le mot de passe doit contenir un chiffre!";
    }

    if (!is_null($confirm) && empty(trim($confirm)) && !is_numeric(trim($confirm))) {
        $errors['confirm-1'] = 'Vous devez confirmer le mot de passe!';
    }
   
    if (!is_null($confirm) && strcmp($password, $confirm) !== 0) {
        $errors['confirm-2'] = 'La confirmation du mot de passe ne correspond pas!';
    }

    global $db;

    $query = $db->prepare('SELECT * FROM user where user.email = :email or user.username = :pseudo');
    $query -> bindValue(':email', $email);
    $query -> bindValue(':pseudo', $pseudo);
    $query -> execute();

    $results = $query -> fetchAll();

    if (count($results) === 1) {
        $errors['pseudoEmailTaken'] = "Le pseudo ou email est déjà pris!";
    }

    if (empty($errors)) {
    
        $query = $db->prepare('INSERT INTO user (email, username, password) VALUES (:email,:pseudo,:password)');
        $query -> bindValue(':email', $email);
        $query -> bindValue(':pseudo', $pseudo);
        $query -> bindValue(':password', $password);
        $query -> execute();


    $_SESSION['registered'] = $pseudo;
     
     header('Location: index.php?register=success');
     


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


    <h1 class="text-center mt-3">Inscription</h1>

    <form class="w-50 mx-auto" method="post">
        <div class="form-group"> 
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group"> 
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" placeholder="pseudo" name="pseudo" value="<?php echo $pseudo; ?>">
        </div>
        <div class="form-group"> 
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="mot de passe" name="password" value="<?php echo $password; ?>">
        </div>
        <div class="form-group"> 
            <label for="title">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="confirm" placeholder="confirmer le mot de passe" name="confirm" value="<?php echo $confirm; ?>">
        </div>
        <button class="btn btn-danger w-100 text-center mb-5" type="submit">S'inscrire</button>

    </form>

</div>


<?php require '../partials/footer.php'; ?>