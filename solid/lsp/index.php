<?php

require_once __DIR__ . '/../../vendor/autoload.php';


function ship(\solid\lsp\Order $order)
{
    $size = $order->calculateSize();
    // TODO
    echo 'Order was sent with volume ' . $size . PHP_EOL;
}

$order = new \solid\lsp\Order();
$order->addProduct(new \solid\lsp\Product(100.0, 2));
$order->addProduct(new \solid\lsp\Product(1000.0, 1));

$virtualOrder = new \solid\lsp\VirtualOrder();
$virtualOrder->addProduct(new \solid\lsp\Product(100.0, 2));
$virtualOrder->addProduct(new \solid\lsp\Product(1000.0, 1));

ship($order);
ship($virtualOrder);

exit();