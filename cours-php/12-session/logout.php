<?php
session_start();

if (isset($_SESSION['uname'])) {
    session_destroy();

    if (isset($_COOKIE['uname']) && isset($_COOKIE['pwd'])){
        $uname = $_COOKIE['uname'];
        $pwd = $_COOKIE['pwd'];
        setcookie('uname', $uname, time() - 1);
        setcookie('pwd', $pwd, time() - 1);
    }

    echo "<script>window.location='login.php'</script>";
} else {
    echo "<script>window.location='login.php'</script>";
}


?>

