<?php

namespace solid\dip;

interface StoreInterface
{
    public function insert(string $storeName, array $data);

    public function update(string $storeName, array $data);

    public function getById(string $storeName, int $id): array;
}