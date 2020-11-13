<!DOCTYPE html>
<html>
<head>
<title>Pregled novih vesti</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
include "konekcija.php";
if (isset ($_GET['akcija']) && isset ($_GET['PrvaKolona'])){
$akcija = $_GET['akcija'];
$id = $_GET['PrvaKolona'];
switch ($akcija){
case "brisanje":
$upit = "DELETE FROM tabela WHERE PrvaKolona = ".$id;
if (!$q=$mysqli->query($upit)){
echo "<br>Geska. Upit nije izvrsen<br/>" . mysql_query();
die();
} else {
echo "<p>Zapis je uspešno obrisan!</p>";
}
break;
default:
echo "<p>Ova akcija ne postoji!</p>";
break;
}
}
$sql="SELECT PrvaKolona, DrugaKolona, TrecaKolona, CetvrtaKolona FROM tabela";
if (!$q=$mysqli->query($sql)){
echo "Nastala je greska pri izvodenju upita<br>" . mysql_query();
die();
}
if ($q->num_rows==0){
echo "Nema novih vesti";
} else {
?>
<table>
<tr>
<td><b>Naziv</b></td>
<td><b>Opis</b></td>
<td><b>Akcija</b></td>
</tr>
<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->DrugaKolona; ?></td>
<td><?php echo $red->TrecaKolona; ?></td>
<td><a href="?akcija=brisanje&PrvaKolona=<?php echo $red->PrvaKolona; ?>">Brisanje</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>
</body>
</html>