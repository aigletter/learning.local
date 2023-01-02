<?php

ini_set('display_errors', '1');

require_once __DIR__ . '/vendor/autoload.php';

$application = new \Learning\Local\test\boo\Application();
$application->run();

$order = new \Learning\Local\shop\cart\Order();
$order->foo();


$math = new \Learning\Math\Math();
$result = $math->sum(5, 10);

echo $result . PHP_EOL;









/*$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://google.com');

$html = $response->getBody()->getContents();
$html = str_replace('src="/', 'src="https://www.google.com/', $html);

echo $html;*/




















/*include __DIR__ . '/oop/Dog.php';

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
var_dump($result2);*/


/*$dog5 = new Dog('Bobik');
$dog5->age = 5;
//$dog->name = 'Bobik';
$dog5->sayHello();*/