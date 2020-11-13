<?php
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "vesti";
$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if ($mysqli->connect_errno) {
printf("Neuspešna konekcija: %s\n", $mysqli->connect_error);
exit();
}
$mysqli->set_charset("utf8");
?>