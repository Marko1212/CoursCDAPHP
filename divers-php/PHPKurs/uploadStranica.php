<?php

$target = "upload/";

$target = $target . basename( $_FILES['fajl']['name']);

//basename daje ime fajla koji je uploadovan ;

if(move_uploaded_file($_FILES['fajl']['tmp_name'], $target))

{

echo "Uspešan upload!";

}

else {

echo "Neuspešan upload!";

}

?>