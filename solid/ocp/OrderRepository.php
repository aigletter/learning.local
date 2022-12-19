<?php

namespace solid\ocp;

class OrderRepository
{
    protected $store;

    protected $connection;

    public function __construct(StoreInterface $store)
    {
        $this->store = $store;
    }

    public function save(Order $order)
    {
        if ($order->getId()) {
            $this->update($order);
        } else {
            $this->insert($order);
        }
    }

    public function insert(Order $order)
    {
        $this->store->insert('orders', [
            'id' => $order->getId(),
            'products' => array_map(function (Product $product) {
                return ['quantity' => $product->getQuantity(), 'price' => $product->getPrice()];
            }, $order->getProducts())
        ]);
    }

    public function update(Order $order)
    {
        $this->store->update('orders', [
            'id' => $order->getId(),
            'products' => array_map(function (Product $product) {
                return ['quantity' => $product->getQuantity(), 'price' => $product->getPrice()];
            }, $order->getProducts())
        ]);
    }

    public function getById(int $id)
    {
        $data = $this->store->getById('orders', $id);
        $order = new Order();
        $order->setId($data['id']);
        $order->setProducts(
            array_map(
                function ($item) {
                    return new Product($item['price'], $item['quantity']);
                },
                json_decode($data['products'], true)
            ));
        return $order;

        /*$pdo = $this->getConnection();
        $statement = $pdo->query("SELECT * FROM orders WHERE id = {$id}");
        $data = $statement->fetch(\PDO::FETCH_ASSOC);*/
    }
}