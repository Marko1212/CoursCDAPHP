<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice en PHP</title>
</head>
<body>

<form>
            <input type = "number" name = "nombre1" placeholder = "Nombre 1">
            <input type = "number" name = "nombre2" placeholder = "Nombre 2">
            <select name = "operator">
                <option>Aucune</option>
                <option>Ajouter</option>
                <option>Soustraire</option>
                <option>Multiplier</option>
                <option>Diviser</option>
            </select>
            <button type = "submit" name = "submit" value = "submit">Calculer</button>
</form>
        <p>Le résultat est :</p>
           

    <?php 
       if (isset($_GET['submit'])) {
           $firstNum = $_GET['nombre1'];
           $secondNum = $_GET['nombre2'];
           $operator = $_GET['operator'];
      
    switch ($operator) {
           case "Ajouter":
               echo $firstNum + $secondNum;
               break;
           case "Soustraire":
               echo $firstNum - $secondNum;
               break;
           case "Multiplier":
               echo $firstNum * $secondNum;
               break;
           case "Diviser":
               echo $firstNum / $secondNum;
               break;
           default:
               echo "Vous devriez choisir une opération!";
               break;
       }
     }
    ?>    
    </body>
</html>