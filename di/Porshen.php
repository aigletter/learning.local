<?php

namespace di;

class Porshen
{
    protected $something;

    public function __construct(Something $something)
    {
        $this->something = $something;
    }
}