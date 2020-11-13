<?php
session_start();
?>
<html>
<head><title>$_SESSION promenljiva</title></head>
<body>
<?php
if (isset($_SESSION['view'])) {
            $_SESSION['view'] = $_SESSION['view'] + 1;
}
else {
            $_SESSION['view']=1;
}
echo "Na ovoj stranici bili ste: " . " " . $_SESSION['view'] . " " . "puta";
?>
</body>
</html>