<?php

$cities = ['Киев', 'Виница', 'Хмельницкий', 'Суммы', 'Тернополь'];

function generator(array $cities)
{
    $counter = -1;
    while (isset($cities[$counter])) {
        $counter++;
        yield $cities[$counter];
    }
}


$generator = generator($cities);
foreach ($generator as $key => $value) {
    echo 'Key: ' . $key . ', value: ' . $value . PHP_EOL;
}