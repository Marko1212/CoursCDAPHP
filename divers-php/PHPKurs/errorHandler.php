<!-- // sledećom naredbom otvaramo fajl primer.txt
// u slučaju da datoteka ne postoji, skripta će sama izgenerisati grešku zajedno sa porukom koja
// najčešće nije razumljiva korisniku
// ovaj problem se može izbeći korišćenjem die() funkcije i to na sledeči način
  -->
<html>
<head><title>Primer</title></head>
<body>
<?php
if (!file_exists("primer.txt")) {
            die ("Fajl koji pokušavate da otvorite ne postoji!");
// umesto podrazumevane poruke o grešci, ispisuje se ono što smo mi naveli
}
else {
            $fajl=fopen("primer.txt", "r");
}
?>
</body>
</html>