<?php

namespace solid\ocp;

class FileStore implements StoreInterface
{
    protected $filename = __DIR__ . '/store';

    public function __construct()
    {
        if (!file_exists($this->filename)) {
            file_put_contents($this->filename, '');
        }
    }

    public function insert(string $storeName, array $data)
    {
        $content = file_get_contents($this->filename);
        $data = json_decode($content);
        $data[$storeName] = '';
    }

    public function update(string $storeName, array $data)
    {
        // TODO: Implement update() method.
    }

    public function getById(string $storeName, int $id): array
    {
        // TODO: Implement getById() method.
    }
}