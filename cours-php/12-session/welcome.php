<?php

$uname = "admin";
$pwd = "admin";

session_start();

if (isset($_SESSION['uname'])) {

    echo "<h1>Welcome ". $_SESSION['uname']. "</h1>";
    echo "<a href='product.php'>Product</a><br>";
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";

} else {

    
   $username = '';
    if (isset($_POST['uname'])) {
        $username = $_POST['uname'];
    }
   

    $year = time() + 31536000;

    setcookie('remember-me', '', $year);

    if($_POST['remember']) {
        setcookie('remember_me', $username, $year);
        }
        else if(!$_POST['remember']) {
            if (isset($_COOKIE['remember_me'])) {
                $past = time() - 100;
                setcookie('remember_me', 'gone', $past);
            }
        }

    if($_POST['uname'] == $uname && $_POST['pwd'] == $pwd) {

        $_SESSION['uname'] = $uname;

        echo "<script>window.location='welcome.php'</script>";
    } else {

        echo "<script>alert('username and/or password incorrects!')</script>";

        echo "<script>window.location='login.php'</script>";
    }
}




?>
