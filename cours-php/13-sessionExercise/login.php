<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Logout/Cookie/Session</title>
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
  </style>
</head>

<body>

  <form action="welcome.php" method="post">
    <table>
      <tr>
        <th colspan="2">
          <h2>Login</h2>
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
        <td>Remember me :</td>
        <td><input type="checkbox" name="remember" <?php if (isset($_COOKIE['uname'])) {
                                                      echo 'checked="checked"';
                                                    } else {
                                                      echo '';
                                                    }
                                                    ?>></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align: right;">
          <input type="submit" name="login" value="Login">
        </td>
      </tr>
    </table>

  </form>

  <?php

if (isset($_COOKIE['uname'])) {
  $uname = $_COOKIE['uname'];
  echo "<script>
  document.getElementById('uname').value = '$uname';
  </script>";
}
?>

</body>

</html>