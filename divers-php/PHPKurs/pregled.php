<!DOCTYPE html>
<html>
<head>
<title>Pregled novih vesti</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
include "konekcija.php";
$sql="SELECT DrugaKolona, TrecaKolona FROM tabela ORDER BY PrvaKolona ASC";
if (!$q=$mysqli->query($sql)){
echo "<p>Greška, upit nije kreiran</p>" . mysql_query();
exit();
}
if ($q->num_rows==0){
echo "Nema novih vesti";
} else {
?>
<table>
<tr>
<td><b>Naziv</b></td>
<td><b>Opis</b></td>
</tr>
<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->DrugaKolona; ?></td>
<td><?php echo $red->TrecaKolona; ?></td>
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