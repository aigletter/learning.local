<?php

namespace di;

class Garage
{
    protected $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function something()
    {
        $this->car->go('c', 'd');
    }
}