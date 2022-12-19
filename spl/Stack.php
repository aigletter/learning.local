<?php

$stack = new SplStack();
$stack->push(2);
$stack->push(1);
$stack->push(3);

echo 'Top: ' . $stack->top() . PHP_EOL;
echo 'Bottom: ' . $stack->bottom() . PHP_EOL;

while (!$stack->isEmpty()) {
    echo $stack->pop() . PHP_EOL;
}