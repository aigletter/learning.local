<?php

require_once __DIR__ . '/../../vendor/autoload.php';

/*$order = new \solid\before\Order();
$order->addProduct(new \solid\before\Product(100.0, 2));
$order->addProduct(new \solid\before\Product(1000.0, 1));

$order->save();*/

$order = \solid\before\Order::getById(6);

$order->generateReport(__DIR__ . '/order-' . $order->getId() . '.json');

exit();