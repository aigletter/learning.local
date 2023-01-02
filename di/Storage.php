<?php

namespace di;

class Storage
{
    public function getItemsDirect()
    {
        return [
            [
                'id' => 1,
                'name' => 'John',
            ],
            [
                'id' => 2,
                'name' => 'Sergey'
            ]
        ];
    }

    public function getItemsCallback(callable $callback)
    {
        $items = $this->getItemsDirect();

        return $callback($items);
    }
}