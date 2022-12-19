<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$order = new \solid\srp\Order();
$order->addProduct(new \solid\srp\Product(100.0, 2));
$order->addProduct(new \solid\srp\Product(1000.0, 1));

$repository = new \solid\srp\OrderRepository();
$repository->save($order);

$order = $repository->getById(6);

$reporter = new \solid\srp\OrderReporter();
$reporter->generateReport(__DIR__ . '/order-' . $order->getId() . '.json', $order);

exit();