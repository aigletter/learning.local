<?php

namespace di;

class Injector
{
    public static function getInstance()
    {
        return new self();
    }

    public function make(string $className)
    {
        $reflectionClass = new \ReflectionClass($className);
        $dependencies = [];
        if ($constructor = $reflectionClass->getConstructor()) {
            foreach ($constructor->getParameters() as $parameter) {
                $name = $parameter->getName();
                $type = $parameter->getType();
                if ($type && !$type->isBuiltin()) {
                    $value = $this->make($type->getName());
                } else {
                    $value = null;
                }
                $dependencies[$name] = $value;
            }
        }

        return $reflectionClass->newInstanceArgs($dependencies);
    }
}