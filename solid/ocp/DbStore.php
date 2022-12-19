<?php

namespace solid\ocp;

class DbStore implements StoreInterface
{
    protected function getConnection()
    {
        if ($this->connection === null) {
            $this->connection = new \PDO('mysql:dbname=learning-local;host=127.0.0.1', 'root', '1q2w3e');
        }

        return $this->connection;
    }

    public function insert(string $storeName, array $data)
    {
        $pdo = $this->getConnection();
        unset($data['id']);
        $columns = implode(',', array_keys($data));
        $values = array_map(function ($item) {
            if (is_array($item)) {
                $item = json_encode($item);
            }
            return $item;
        }, array_values($data));
        $values = "'" . implode("','", $values) . "'";

        $sql = "INSERT INTO $storeName ($columns) VALUES ($values)";
        $pdo->query($sql);
    }

    public function update(string $storeName, array $data)
    {
        // TODO: Implement update() method.
    }

    public function getById(string $storeName, int $id): array
    {
        $pdo = $this->getConnection();
        $statement = $pdo->query("SELECT * FROM $storeName WHERE id = {$id}");
        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }
}