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

if(isset($_POST['uname']) && isset($_POST['pwd'])) {

    $_SESSION['users'][] = [$_POST['uname'], $_POST['pwd']];
    
    echo "<p class='success'>Vous avez bien été enregistré(e)! Vous pouvez vous logger!</p>";

}

?>

</body>

</html>