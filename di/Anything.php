<?php

namespace di;

class Anything
{
    protected $something;

    public function __construct(Something $something)
    {
        $this->something = $something;
    }
}