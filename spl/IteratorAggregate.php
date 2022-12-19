<?php

include __DIR__ . '/Iterator.php';

class MyRepository implements IteratorAggregate
{
    protected $cities;

    public function __construct($cities = [])
    {
        $this->cities = $cities;
    }

    public function getIterator()
    {
        return new CityRepository($this->cities);
    }
}

$cities = ['Киев', 'Виница', 'Хмельницкий', 'Суммы', 'Тернополь'];
$repository = new MyRepository($cities);

foreach ($repository as $key => $value) {
    echo 'Key: ' . $key . ', value: ' . $value . PHP_EOL;
}