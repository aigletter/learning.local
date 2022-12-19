<?php

include __DIR__ . '/oop/Dog.php';

$dog1 = new Dog('Bob', 2);
$dog1->sayHello();
//$dog->name = 'Bob';
//$dog->age = 2;

//unset($dog1);

//echo $dog->name . "\n";
//echo $dog->age . PHP_EOL;

$dog2 = new Dog('Bob', 2);
$result1 = $dog1 == $dog2;

var_dump($result1);


$dog3 = $dog1;
$dog3->name = 'Tuzik';

//echo $dog1->name;
$result2 = $dog1 === $dog2;
var_dump($result2);


/*$dog5 = new Dog('Bobik');
$dog5->age = 5;
//$dog->name = 'Bobik';
$dog5->sayHello();*/