<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register/Session</title>
  <style>
    table {

      margin: 0 auto;
      margin-top: 150px;
      border: 1px solid;
      background-color: #eee;

    }

    td {
      border: 0px;
      padding: 10px;
    }

    th {
      border-bottom: 1px solid;
      background-color: #ddd;
    }

    input[type='checkbox'] {
      margin-left: 0px;
    }

    p.success {
      margin-top: 30px;
      text-align: center;
      color: green;

    }

    p.danger {
      margin-top: 30px;
      text-align: center;
      color: red;

    }
  </style>
</head>

<body>

  <form action="" method="post">
    <table>
      <tr>
        <th colspan="2">
          <h2>Register</h2>
        </th>
      </tr>
      <tr>
        <td>Username :</td>
        <td><input type="text" name="uname" id="uname"></td>
      </tr>
      <tr>
        <td>Password :</td>
        <td><input type="password" name="pwd"></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: right;">
          <input type="submit" name="register" value="Register">
        </td>
      </tr>
    </table>

  </form>

  <?php

  session_start();
  //var_dump($_SESSION);

  if (isset($_POST['uname']) && isset($_POST['pwd'])) {

    if (empty(trim($_POST['uname'])) || empty(trim($_POST['pwd']))) {
      echo "<p class='danger'>Vous devez saisir un username et/ou mot de passe non vides!</p>";
    }
    
    else if ((isset($_SESSION['users'])) && array_search($_POST['uname'], array_column($_SESSION['users'], 0)) !== false || trim($_POST['uname'])=='admin') {

      echo "<p class='danger'>Le username que vous avez saisi est occupé, veuillez en choisir un autre!";

    }
    
    else
    
    {

      $_SESSION['users'][] = [$_POST['uname'], $_POST['pwd']];

      var_dump($_SESSION);
      echo '<br><br>';
      var_dump($_POST);

      echo "<p class='success'>Vous avez bien été enregistré(e)! Vous pouvez vous logger!</p>";
    }
  }

  ?>

</body>

</html>