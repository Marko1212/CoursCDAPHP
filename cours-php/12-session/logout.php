<?php
session_start();

if (isset($_SESSION['uname'])) {
    session_destroy();

    if (isset($_COOKIE['uname'])){
        $uname = $_COOKIE['uname'];
        setcookie('uname', $uname, time() - 1);
    }

    echo "<script>window.location='login.php'</script>";
} else {
    echo "<script>window.location='login.php'</script>";
}


?>

