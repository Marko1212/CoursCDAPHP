<?php

try {
    $dbh = new PDO('mysql:host=localhost;port=3306;dbname=exam_m2i', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
}

foreach($dbh->query('SELECT * from stagiaire') as $row) {
    //print_r($row);
    $info = $row['id'] . ' - '. $row['created_at'] . ' - '. $row['name']
        . ' - ' . $row['phone'] . ' - ' . $row['birthday'] . '<br>';

    echo $info;
}