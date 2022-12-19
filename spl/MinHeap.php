<?php

$heap = new SplMinHeap();

$heap->insert(2);
$heap->insert(1);
$heap->insert(3);

echo 'Top: ' . $heap->top() . PHP_EOL;

while (!$heap->isEmpty()) {
    echo $heap->extract() . PHP_EOL;
}