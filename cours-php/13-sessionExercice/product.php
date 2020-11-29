

<?php

session_start();

//$indexUser = array_search($_POST['uname'], array_column($_SESSION['users'], 0));

if (isset($_SESSION['uname']) || isset($_SESSION['indexCurrentUser'])) {
    echo "<h2>Welcome to Product page</h2>";

    echo "<br><a href='welcome.php'><input type=button name=back value=Back></a>";
} else {
    echo "<script>window.location='login.php'</script>";
}

?>