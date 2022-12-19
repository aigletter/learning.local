<?php

namespace solid\srp;

class OrderRepository
{
    protected $connection;

    protected function getConnection()
    {
        if ($this->connection === null) {
            $this->connection = new \PDO('mysql:dbname=learning-local;host=127.0.0.1', 'root', '1q2w3e');
        }

        return $this->connection;
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
        $pdo = $this->getConnection();
        $products = json_encode(array_map(function (Product $product) {
            return ['quantity' => $product->getQuantity(), 'price' => $product->getPrice()];
        }, $order->getProducts()));
        $sql = "INSERT INTO orders (products) VALUES ('{$products}')";
        $pdo->query($sql);
    }

    public function update(Order $order)
    {
        $pdo = $this->getConnection();
        $products = json_encode(array_map(function (Product $product) {
            return ['quantity' => $product->getQuantity(), 'price' => $product->getPrice()];
        }, $order->getProducts()));
        $pdo->query("UPDATE orders SET products = ('{$products}')");
    }

    public function getById(int $id)
    {
        $pdo = $this->getConnection();
        $statement = $pdo->query("SELECT * FROM orders WHERE id = {$id}");
        $data = $statement->fetch(\PDO::FETCH_ASSOC);
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
    }
}