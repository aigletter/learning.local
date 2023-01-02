<?php

namespace di;

class Something
{
    protected $name;

    public function __construct(string $name = null)
    {
        $this->name = $name;
    }
}