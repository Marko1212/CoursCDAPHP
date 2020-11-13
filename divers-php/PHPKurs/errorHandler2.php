<html>
<head><title>Title</title></body>
<body>
<?php
function personalizovanaGreska($errno, $errstr) {
            echo "<b> Greska: <b>  [$errno] $errstr ";
}
// sada ce se postaviti error_handler
set_error_handler("personalizovanaGreska");
// okidanje, tj. nailazenje na gresku,prikazace se vrednost promenljive koja ne postoji
echo ($test);
?>
</body>
</html>