<?php
setcookie("nazivkolačića", "vrednostkolačića", time()+7200);
// kolačić sadrži: ime - nazivkolačića, vrednost - vrednostkolačića i datum isteka 2 sata
?>
<?php
if (isset($_COOKIE['nazivkolačića'])) {
// vrši se provera vrednosti za kolačić sa navedenim imenom
echo "Naziv kolačića je" . " " . $_COOKIE['nazivkolačića'];
}
else {
echo "Naziv nije dodeljen";
}
?>
<html>
<head><title>Kolačić</title></head>
<body>
</body>
</html>