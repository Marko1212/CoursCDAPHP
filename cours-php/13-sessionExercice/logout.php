
<?php

session_start();

if (isset($_SESSION['uname'])) {
    unset($_SESSION['uname']);
    //session_destroy();

    if (isset($_COOKIE['uname'])){
        $uname = $_COOKIE['uname'];
        setcookie('uname', $uname, time() - 1);
    }

    echo "<script>window.location='login.php'</script>";
} else if (isset($_SESSION['indexCurrentUser'])) {

    unset($_SESSION['users'][(int)$_SESSION['indexCurrentUser']]);
    $_SESSION['users'] = array_values($_SESSION['users']); // Re-index the array elements
    unset($_SESSION['indexCurrentUser']);

    echo "<script>window.location='login.php'</script>";
}
else {
    echo "<script>window.location='login.php'</script>";
}


?>



