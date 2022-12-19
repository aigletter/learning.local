<?php

namespace solid\before;

class Order
{
    protected $id;

    /**
     * @var Product[]
     */
    protected $products;

    protected $dicsount;

    protected static $connection;

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

    public function generateReport(string $filename)
    {
        $report = json_encode(
            [
                'id' => $this->id,
                'products' => array_map(function (Product $product) {
                    return [
                        'price' => $product->getPrice(),
                        'quantity' => $product->getQuantity(),
                    ];
                },
                $this->products)
            ]
        );

        file_put_contents($filename, $report);
    }

    protected static function getConnection()
    {
        if (self::$connection === null) {
            self::$connection = new \PDO('mysql:dbname=learning-local;host=127.0.0.1', 'root', '1q2w3e');
        }

        return self::$connection;
    }

    public function save()
    {
        if ($this->id) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function insert()
    {
        $pdo = self::getConnection();
        $products = json_encode(array_map(function (Product $product) {
            return ['quantity' => $product->getQuantity(), 'price' => $product->getPrice()];
        }, $this->products));
        $sql = "INSERT INTO orders (products) VALUES ('{$products}')";
        $pdo->query($sql);
    }

    public function update()
    {
        $pdo = self::getConnection();
        $products = json_encode(array_map(function (Product $product) {
            return ['quantity' => $product->getQuantity(), 'price' => $product->getPrice()];
        }, $this->products));
        $pdo->query("UPDATE orders SET products = ('{$products}')");
    }

    public static function getById(int $id)
    {
        $pdo = self::getConnection();
        $statement = $pdo->query("SELECT * FROM orders WHERE id = {$id}");
        $data = $statement->fetch(\PDO::FETCH_ASSOC);
        $order = new self();
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