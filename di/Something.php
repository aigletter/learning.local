<?php

namespace patterns;

class Something
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}