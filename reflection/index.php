<?php

require_once __DIR__ . '/../vendor/autoload.php';

/*$car = new \reflection\Car(new \reflection\Engine(), 100);

$reflectionClass = new ReflectionClass(\reflection\Car::class);
$property = $reflectionClass->getProperty('engine');
if ($property->isPublic()) {
    $car->engine->start();
}*/

// ГДЕ-ТО ВЗЯЛИ
$className = \reflection\Car::class;
$data = [
    'power' => 1000,
];

$reflectionClass = new ReflectionClass($className);

/*$properties = $reflectionClass->getProperties();
foreach ($properties as $property) {
    echo 'Property name: ' . $property->getName() . PHP_EOL;
    if ($property->hasType()) {
        echo 'Property type: ' . $property->getType()->getName() . PHP_EOL;
    } else {
        echo 'Undefined type' . PHP_EOL;
    }
    echo '---------' . PHP_EOL;
}

$methods = $reflectionClass->getMethods();
foreach ($methods as $method) {
    echo 'Method name: ' . $method . PHP_EOL;
    foreach ($method->getParameters() as $parameter) {
        echo 'Parameter name: ' . $parameter->getName() . PHP_EOL;
    }
}*/

$attributes = [];
if ($constructor = $reflectionClass->getConstructor()) {
    $parameters = $constructor->getParameters();
    foreach ($parameters as $parameter) {
        $name = $parameter->getName();
        $type = $parameter->getType();
        if ($type && !$type->isBuiltin()) {
            $typeName = $type->getName();
            $value = new $typeName();
        } elseif (isset($data[$name])) {
            $value = $data[$name];
        } elseif ($parameter->allowsNull()) {
            $value = null;
        }

        $attributes[$name] = $value;
    }
}

//$object = new $className(...array_values($attributes));
$object = $reflectionClass->newInstanceArgs($attributes);

$reflectionProperty = new ReflectionProperty($object, 'power');
$reflectionProperty->setAccessible(true);
$reflectionProperty->setValue($object, 2000);
$value = $reflectionProperty->getValue($object);

echo $value;

//

//print_r($object);


exit();