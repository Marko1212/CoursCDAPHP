<?php

//$uname = "admin";
//$pwd = "admin";

session_start();

/* if (in_array([$_POST['uname'], $_POST['pwd']], $_SESSION['users'])) {
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
}
 */
//$indexUser = array_search([$_POST['uname'], $_POST['pwd']], $_SESSION['users']);

if (isset($_SESSION['uname'])) {
    echo "<h1>Welcome ". $_SESSION['uname']. "</h1>";
    echo "<a href='product.php'>Product</a><br>";
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
} else if (isset($_SESSION['indexCurrentUser'])) {
    echo "<h1>Welcome ". $_SESSION['users'][(int)$_SESSION['indexCurrentUser']][0]. "</h1>";
    echo "<a href='product.php'>Product</a><br>";
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
} else

   /*  
   $username = '';
    if (isset($_POST['uname'])) {
        $username = $_POST['uname'];
    }

    $year = time() + 31536000; */
    

  /*   if($_POST['remember']) {
        setcookie('remember_me', $username, $year); */
/*         } */
/*         else if(!$_POST['remember']) { */
/*             if (isset($_COOKIE['remember_me'])) { */
/*                 $past = time() - 100; */
/*                 setcookie('remember_me', 'gone', $past); */
/*             } else { */
/*                 setcookie('remember-me', '', $year); */
/*             } */
/*         } */
/*  */

    if($_POST['uname'] == "admin" && $_POST['pwd'] == "admin") {

        $_SESSION['uname'] = "admin";
        if (isset($_POST['remember'])) {
        setcookie('uname', $_POST['uname'], time() + 60*60*7);
        }
        echo "<script>window.location='welcome.php'</script>";
    } else {

    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    
    $indexUser = array_search($uname, array_column($_SESSION['users'], 0));

    if ($_POST['uname'] == $_SESSION['users'][$indexUser][0] && $_POST['pwd'] == $_SESSION['users'][$indexUser][1]) {

        $_SESSION['indexCurrentUser'] = $indexUser;

    echo "<h1>Welcome ". $_SESSION['users'][$indexUser][0]. "</h1>";
    echo "<a href='product.php'>Product</a><br>";
    echo "<br><a href='logout.php'><input type=button value=Logout name=logout></a>";
}   
    else {

        echo "<script>alert('Username and/or password incorrects!')</script>";
        echo "<script>window.location='login.php'</script>";
    }


}


?>
