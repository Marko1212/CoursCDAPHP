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
case "izmena_forma":
$upit="SELECT PrvaKolona, DrugaKolona, TrecaKolona FROM tabela WHERE PrvaKolona=".$id;
if (!$q=$mysqli->query($upit)){
echo "<p>Greska pri izvodjenju upita</p>" . mysql_query();
die();
} else {
if ($q->num_rows!=1){
echo "<p>Vest ne postoji.</p>";
} else {
$vest = $q->fetch_object();
$naziv = $vest->DrugaKolona;
$opis = $vest->TrecaKolona;
}}?>
<h1>Izmena vesti</h1>
<hr/>
<form method="post" action="?akcija=izmena&PrvaKolona=<?php echo $_GET['PrvaKolona'];?>">
Naziv : <input type="text" name="naziv" /><br/>
Opis : <textarea name="opis"></textarea><br/>
<input type="submit" name="unos" value="Ubaci" />
</form>
<?php
break;
case "izmena":
if (isset ($_POST['naziv']) && isset ($_POST['opis'])){
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
$upit="UPDATE tabela SET DrugaKolona='". $naziv ."', TrecaKolona='" . $opis . "' WHERE PrvaKolona=". $id;
if ($mysqli->query($upit)){
if ($mysqli->affected_rows > 0 ){
echo "<p>Vest je uspešno izmenjena.</p>";
} else {
echo "<p>Vest nije izmenjena.</p>";
}
} else {
echo "<p>Greška pri izmeni vesti</p>" . mysql_error();
}
} else {
echo "<p>Nisu prosleđeni parametri za izmenu</p>";
}
break;
default:
echo "<p>Nepostojeća akcija!</p>";
break;
}
}
$sql="SELECT PrvaKolona, DrugaKolona, TrecaKolona FROM tabela";
if (!$q=$mysqli->query($sql)){
echo "Greska pri izvodenju upita<br>" . mysql_query();
die();
}
if ($q->num_rows==0){
echo "Nema vesti";
} else {
?>
<h1>Prikaz novih vesti</h1>
<hr/>
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
<td><a href="?akcija=izmena_forma&PrvaKolona=<?php echo $red->PrvaKolona; ?>">Izmena</a></td>
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