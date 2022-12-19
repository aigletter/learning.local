<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$order = new \solid\ocp\Order();
$order->addProduct(new \solid\ocp\Product(100.0, 2));
$order->addProduct(new \solid\ocp\Product(1000.0, 1));

//$store = new \solid\ocp\DbStore();
$store = new \solid\ocp\FileStore();
$repository = new \solid\ocp\OrderRepository($store);



$repository->save($order);

$order = $repository->getById(6);

$reporter = new \solid\ocp\OrderReporter();
$reporter->generateReport(__DIR__ . '/order-' . $order->getId() . '.json', $order);

exit();