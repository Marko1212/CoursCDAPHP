<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table de multiplication en PHP</title>
    <style>
        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        tr:nth-child(even) td:nth-child(even),
        tr:nth-child(odd) td:nth-child(odd) {
            background: lightgrey;
        }

        tr:nth-child(odd) td:nth-child(even),
        tr:nth-child(even) td:nth-child(odd) {
            background: white;
        }
    </style>
</head>

<body>

    <?php

    echo "<table>";



    //1ère ligne
    echo "<tr style='font-weight: bold; text-align: center'>";
    echo "<td >x</td> \n";
    for ($col = 0; $col <= 10; $col++) {
        echo "<td style='text-align:center'>$col</td> \n";
    }
    echo "</tr>";
    for ($row = 0; $row <= 10; $row++) {
        echo "<tr> \n";
        echo "<td style='font-weight: bold; text-align: center'>$row</td>";
        for ($col = 0; $col <= 10; $col++) {
            $p = $col * $row;
            if ($col === $row) {
            echo "<td style='text-align: center; background-color: grey'>$p</td> \n";
            } else {
            echo "<td style='text-align: center;'>$p</td> \n";
            }
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>

</body>

</html>