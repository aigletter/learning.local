<?php

namespace reflection;


class Car
{
    /**
     * @var int
     */
    protected int $power;

    /**
     * @var Engine
     */
    private Engine $engine;

    /**
     * @var mixed|null
     */
    protected $something = null;

    public function __construct(Engine $engine, int $power, $something = null)
    {
        $this->engine = $engine;
        $this->power = $power;
        $this->something = $something;
    }

    public function move(array $from, array $to, string $cargo): bool
    {
        echo $this->engine->start();

        // TODO

        return true;
    }
}