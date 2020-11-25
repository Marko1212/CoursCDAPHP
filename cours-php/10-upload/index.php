<!-- 1. Nous allons créer un formulaire de candidature à une offre d'emploi

2. L'utilisateur pourra envoyer son CV en PDF. On devra vérifier le format et la taille (limité à 5mo).

3. L'utilisateur pourra saisir son prénom, on renommera le CV avec son prénom et une chaine de caractères générée aléatoirement.

4. On ajoutera l'upload d'une image. Idéalement, on essaiera de redimensionner l'image en 300x300 dans un nouveau fichier. 
Voir l'extension GD. -->


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>

<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="file" name="file">
        <input type ="file" name="image">
        <button type="submit" name="submit">UPLOAD</button>
    </form>
   
</body>

</html>