<?php

class CityRepository implements Iterator, ArrayAccess, Countable, Stringable
{
    public $name = 'City repository';

    protected $pointer;

    protected $cities;

    public function __construct($cities = [])
    {
        $this->cities = $cities;
    }

    public function add($city)
    {
        $this->cities[] = $city;
    }

    public function current()
    {
        return $this->cities[$this->pointer];
    }

    public function next()
    {
        $this->pointer++;
    }

    public function key()
    {
        return $this->pointer;
    }

    public function valid()
    {
        return isset($this->cities[$this->pointer]);
    }

    public function rewind()
    {
        $this->pointer = 0;
    }

    public function offsetExists(mixed $offset)
    {
        return isset($this->cities[$offset]);
    }

    public function offsetGet(mixed $offset)
    {
        return $this->cities[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value)
    {
        if ($offset === null) {
            $offset = count($this->cities);
        }
        $this->cities[$offset] = $value;
    }

    public function offsetUnset(mixed $offset)
    {
        unset($this->cities[$offset]);
    }

    public function count()
    {
        return count($this->cities);
    }

    public function __toString(): string
    {
        return implode(',', $this->cities);
    }
}


$cities = ['Киев', 'Виница', 'Хмельницкий', 'Суммы', 'Тернополь'];
$repository = new CityRepository($cities);

$repository->add('New York');

echo $repository[1] . PHP_EOL;

if (!isset($repository[6])) {
    $repository[6] = 'Madrid';
}

$repository[] = 'Berlin';
$repository[] = 'Paris';

if (count($repository)) {
    foreach ($repository as $key => $item) {
        echo 'Key: ' . $key . ', value: ' . $item . PHP_EOL;
        if ($key === 1000) {
            break;
        }
    }
}

echo $repository . PHP_EOL;

//unset($repository[6]);