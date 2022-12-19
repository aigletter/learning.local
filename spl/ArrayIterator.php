<?php

/*$array = [
    [
        'id' => 1,
        'name' => 'John'
    ],
    [
        'id' => 2,
        'name' => 'Bob'
    ]
];

foreach ($array as $key => $item) {
    $item['name'] = 'Helloworld';
    //$array[$key]['name'] = 'Helloworld';
}

echo $array[0]['name'] . PHP_EOL;*/




$cities = ['Киев', 'Виница', 'Хмельницкий', 'Суммы', 'Тернополь'];
$iterator = new ArrayIterator($cities);

foreach ($iterator as $item) {
    echo $item . PHP_EOL;
}