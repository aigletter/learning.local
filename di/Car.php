<?php

namespace patterns;

class Car
{
    protected $engine;

    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function go($a, $b, $cargo)
    {

    }
}