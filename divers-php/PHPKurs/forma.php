<!DOCTYPE html>
<html>
  <head>
    <title>Unos nove vesti</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
    <h1>Unos nove vesti</h1>
    <hr />
    <form method="post" action="">
      Naziv : <input type="text" name="naziv" /><br />
      Opis : <textarea name="opis"></textarea><br />
      <input type="submit" name="unos" value="Ubaci" />
    </form>
    <?php
if (isset($_POST["unos"])){
//Prikupljanje podataka sa forme
 
if (isset($_POST['naziv'])&&isset($_POST['opis'])){
$naziv = $_POST['naziv'];
$opis = $_POST['opis'];
 
//Operacije nad bazom
include "konekcija.php";
$sql="INSERT INTO tabela (DrugaKolona, TrecaKolona) VALUES ('".$naziv."', '".$opis."')";
if ($mysqli->query($sql)){ echo "
    <p>Uspešno ste ubacili novu vest</p>
    "; } else { echo "
    <p>Greška! Vest nije ubačena</p>
    " . $mysqli->error; } } else { //Ako POST parametri nisu prosleđeni echo
    "Parametri nisu prosleđeni!"; } $mysqli->close(); } ?>
  </body>
</html>
