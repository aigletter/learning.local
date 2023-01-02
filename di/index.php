<?php

require_once __DIR__ . '/../vendor/autoload.php';


/*$something = new \di\Something();
$porshen = new \di\Porshen($something);
$engine = new \di\Engine($porshen);

$anything = new \di\Anything(clone $something);
$transmission = new \di\Transmission($anything);

$car = new \di\Car($engine, $transmission);*/

$injector = new \di\Injector();

/** @var \di\Car $car */
/*$car = $injector->make(\di\Car::class);
$car->setCruiseControl(new \di\CruiseControl());

$car->go('Kiev', 'New York', new \di\Cargo('notebook'));*/


$transport = new \di\Transport();
$transport->something();

$garage = $injector->make(\di\Garage::class);
$garage->something();


















// 1. Получить список пользовательй
// 2. В итоге получить итератор по списку пользователей

/*$storage = new \di\Storage();


$users = $storage->getItemsDirect();
$iterator1 = new ArrayIterator($users);


$iterator2 = $storage->getItemsCallback(function ($items) {
    return new ArrayIterator($items);
});



test($iterator1);
test($iterator2);

function test($iterator)
{
    if ($iterator instanceof Iterator) {
        echo 'Задача выполнена' . PHP_EOL;
    } else {
        echo 'Задача не выполнена' . PHP_EOL;
    }
}*/