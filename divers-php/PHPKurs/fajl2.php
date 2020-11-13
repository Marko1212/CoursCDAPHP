<?php
// druga stranica
session_start();
$_SESSION["var"]=$_SESSION["var"] + 5;
print $_SESSION["var"];
?>