<?php
session_start();

if (isset($_SESSION['uname'])) {
    //session_destroy();
    unset($_SESSION['uname']);

    if (isset($_COOKIE['uname'])){
        $uname = $_COOKIE['uname'];
        setcookie('uname', $uname, time() - 1);
    }

    echo "<script>window.location='login.php'</script>";
} else if (isset($_SESSION['users'][$indexUser])) {
    //session_destroy();
    unset($_SESSION['users'][$indexUser]);

    echo "<script>window.location='login.php'</script>";
}

else {
    echo "<script>window.location='login.php'</script>";
}


?>

