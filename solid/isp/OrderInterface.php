<?php

namespace solid\isp;

interface OrderInterface
{
    public function addProduct(Product $product);

    public function calculateTotalSum();
}