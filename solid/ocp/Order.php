<?php

namespace solid\ocp;

class Order
{
    protected $id;

    /**
     * @var Product[]
     */
    protected $products;

    protected $dicsount;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function calculateTotalSum()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPrice() * $product->getQuantity();
        }

        return $sum - (float) $this->dicsount;
    }




}