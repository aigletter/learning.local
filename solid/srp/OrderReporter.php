<?php

namespace solid\srp;

class OrderReporter
{
    public function generateReport(string $filename, Order $order)
    {
        $report = json_encode(
            [
                'id' => $order->getId(),
                'products' => array_map(function (Product $product) {
                    return [
                        'price' => $product->getPrice(),
                        'quantity' => $product->getQuantity(),
                    ];
                },
                $order->getProducts())
            ]
        );

        file_put_contents($filename, $report);
    }
}