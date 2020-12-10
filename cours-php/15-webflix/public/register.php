<?php

// Les Regex permettent de valider un "format" de chaine
    // (+33 [1-9]|0[1-9])([.- ]?[0-9]{2}){4} valide un téléphone :
    // 0612345678
    // 06.12.34.56.78
    // 06-12-34-56-78
    // 09 12 34 56 78
    // +33 6 12 34 58 64
    // 06 12 45 65 74
    // +33 7 45 74 14 45
   /*  preg_match('/(+33 [1-9]|0[1-9])([.- ]?[0-9]{2}){4}/', '06-12-34-56-78'); // Renvoie true
    preg_match('/(+33 [1-9]|0[1-9])([.- ]?[0-9]{2}){4}/', '012-34-56-78'); // Renvoie false */

    // [0-9]+ -> Vérifie qu'une chaine contient un nombre au moins une fois
    // ?????? -> Vérifie qu'une chaine contient un caractère spécial au moins une fois

    // La regex doit être entouré du délimiteur /
 /*    preg_match('/[0-9]+/', 'azerty'); // Renvoie false car azerty ne contient pas de chiffres
    preg_match('/[0-9]+/', 'azerty1'); // Renvoie true

    if (!preg_match('/[0-9]+/', $password)) {
        $errors['password'] = 'Le mot de passe doit contenir au moins un chiffre';
    } */

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

    $email = $_POST['email'];
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

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

    if (!is_null($password) && empty($password) && !is_numeric($password)) {
        $errors['password-1'] = 'Le mot de passe est obligatoire!';
    }

    if(!is_null($password) && strlen($password) < 8) {
        $errors['password-2'] = "Le mot de passe doit contenir au moins 8 caractères!";
    }

    //les # sont des délimiteurs. Il faut mettre la regex entre délimiteurs: / ; le signe '+' dans la regex veut dire 'au moins'
    if(!is_null($password) && !preg_match('/[0-9]+/', $password)) {
        $errors['password-3'] = "Le mot de passe doit contenir au moins 1 chiffre!";
    }

    // caractères spéciaux : ni caractères (a-z, A-Z), ni chiffres (0-9)
    // @, espace, !, ?, > => caractères spéciaux

    // [0-9]+ -> Vérifie qu'une chaine contient un nombre au moins une fois
    // [^a-zA-Z0-9]+ -> Vérifie qu'une chaine contient un caractère spécial au moins une fois
    // le signe ^ veut dire : 'tout sauf', le '+' : au moins une fois
    // donc, tout sauf un caractère (minuscule ou majuscule) ou un chiffre (=caractère spécial) au moins une fois; le ç, é sont considérés comme caractères spéciaux

    if(!is_null($password) && !preg_match('/[^a-zA-Z0-9]+/', $password)) {
        $errors['password-4'] = "Le mot de passe doit contenir au moins 1 caractère spécial!";
    }

    if (!is_null($confirm) && empty($confirm) && !is_numeric($confirm)) {
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
        $query -> bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
        //Cryptage du password avant de l'enregistrer dans la bdd
        //avec l'option PASSWORD_DEFAULT, php choisit le meilleur algo de hachage (argon2i ou argon2id ou bcrypt...) 
        //en fonction de la version de php
        $query -> execute();


    $_SESSION['user'] = ['email'=> $email, 'username' => $pseudo];
     
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