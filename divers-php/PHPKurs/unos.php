<!DOCTYPE html>
<html>
<head>
<title>Naslov</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>Ovo je primer pripremljenih naredbi</h1>
<hr/>
<?php
include "konekcija.php";
//U naredna dva koraka pripremamo upit
$pripremljen_upit = "INSERT INTO tabela (DrugaKolona, TrecaKolona) VALUES (?, ?)";
$pr = $mysqli->prepare ($pripremljen_upit);
//Slede koraci u kojima dodeljujemo vrednosti varijablama koje se ubacuju u bazu
$naziv = "Motorola Play Plus";
$opis = "Motorola je telefon kompanije Lenovo";
//Sada je potrebno da varijable koje smo definisali u prethodnom koraku povežemo sa //parametrima. To činimo preko funkcije bind_param()
$pr->bind_param("ss", $naziv, $opis);
$pr->execute();
$mysqli->close();
?>
</body>
</html>