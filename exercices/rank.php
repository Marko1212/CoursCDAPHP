
<?php

$values = [];
$values[0] = 17;
$values[1] = 27;
$values[2] = 17;
$values[3] = '-';
$values[4] = 5;
$values[5] = 3;
$values[6] = '-';

$values2 = [];
$values2['zero'] = 17;
$values2['one'] = 27;
$values2['two'] = 17;
$values2['three'] = '-';
$values2['four'] = 5;
$values2['five'] = 3;
$values2['six'] = '-';

$ordered_values = $values;
rsort($ordered_values);

$ordered_values2 = $values2;
rsort($ordered_values2);

foreach ($ordered_values2 as $key => $value) {
    echo 'key : '.$key.' '.' value : '.$value.'<br/>';
}

foreach ($values as $key => $value) {
    foreach ($ordered_values as $ordered_key => $ordered_value) {
        if ($value === $ordered_value) {
            $key = $ordered_key;
            break;
        }
    }
    echo $value.'- Rank: '.((int) $key + 1).'<br/>';
}
