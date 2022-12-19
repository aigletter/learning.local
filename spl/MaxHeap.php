<?php

$heap = new SplMaxHeap();

$heap->insert(2);
$heap->insert(1);
$heap->insert(3);
$heap->insert('z');
$heap->insert(['hello']);
//$heap->insert(new stdClass());

echo 'Top: ' . print_r($heap->top(), true) . PHP_EOL;

while (!$heap->isEmpty()) {
    print_r($heap->extract());
    echo PHP_EOL;
}
