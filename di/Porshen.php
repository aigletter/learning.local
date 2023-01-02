<?php

namespace patterns;

class Porshen
{
    protected $something;

    public function __construct(Something $something)
    {
        $this->something = $something;
    }
}