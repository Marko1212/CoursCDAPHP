<html>
<head><title> Funkcija fopen()</title></head>
<body>
<?php
$primer=fopen("primer.txt", "r") or exit ("Greška pri otvaranju fajla!");
//otvara se fajl primer.txt u modu r(read)
while (!feof($primer)){
//naredna linija koda će se izvršavati sve dok se ne dodje do kraja fajla
echo fgets($primer)."<br>";
}
fclose($primer);
?>

<?php
$datoteka = fopen("datoteka.txt","w");
echo fwrite($datoteka,"Primer upisa u datoteku!");
fclose($datoteka);
?>
</body>
</html>