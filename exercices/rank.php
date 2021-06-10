
<?php

$values = array();
$values[0] = 17;
$values[1] = 27;
$values[2] = 17;
$values[3] = '-';
$values[4] = 5;
$values[5] = 3;
$values[6] = '-';


$ordered_values = $values;
rsort($ordered_values);

foreach ($values as $key => $value) {
    foreach ($ordered_values as $ordered_key => $ordered_value) {
        if ($value === $ordered_value) {
            $key = $ordered_key;
            break;
        }
    }
    echo $value . '- Rank: ' . ((int) $key + 1) . '<br/>';
}