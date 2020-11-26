<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Logout</title>
</head>
<body>
    <form action = "welcome.php" method="post">
        <table align="center">
                <tr>
                  <th colspan="2"><h2 align="center">Login</h2></th>
                </tr>
                <tr>
                  <td>Username :</td>
                  <td><input type="text" name = "uname"></td>
                </tr>
                <tr>
                  <td>Password :</td>
                  <td><input type="password" name = "pwd"></td>
                </tr>
                <tr>
                    <td align="right" colspan="2">
                <input type = "submit" name="login" value="Login">
                    </td>
                </tr>
</table>

    </form>
    
</body>
</html>