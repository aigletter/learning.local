<?php

namespace di;

class Transport
{
    public function something(){
        $car = Injector::getInstance()->make(Car::class);
        $car->go('a', 'b');
    }
}