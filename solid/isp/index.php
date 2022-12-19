<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$order = new \solid\isp\Order();
$order->addProduct(new \solid\isp\Product(100.0, 2));
$order->addProduct(new \solid\isp\Product(1000.0, 1));

$virtualOrder = new \solid\isp\VirtualOrder();
$virtualOrder->addProduct(new \solid\isp\Product(100.0, 2));
$virtualOrder->addProduct(new \solid\isp\Product(1000.0, 1));



exit();