<?php
// prva stranica
session_start();
$_SESSION["var"] = 1;
print "<a href='fajl2.php'>Kliknite za prelaz na drugu stranicu. </a>";
?>