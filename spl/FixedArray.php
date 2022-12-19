<?php

$array = new SplFixedArray(3);
$array[0] = 1;
$array[1] = 2;
$array[2] = 3;

$array[3] = 4;

foreach ($array as $key => $value) {
    echo $value . PHP_EOL;
}