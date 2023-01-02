<?php

namespace di;

class Car
{
    protected $engine;

    protected $transmission;

    protected $cruiseControl;

    public function __construct(Engine $engine, Transmission $transmission)
    {
        $this->engine = $engine;
        $this->transmission = $transmission;
    }

    public function go($a, $b, Cargo $cargo = null)
    {
        echo 'Еду от ' . $a . ' до ' . $b  . ($cargo ? ' везу ' . $cargo->getName() : '') . PHP_EOL;
    }

    public function setCruiseControl(CruiseControl $cruiseControl)
    {
        $this->cruiseControl = $cruiseControl;
    }
}