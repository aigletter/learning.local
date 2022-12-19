<?php

$heap = new SplPriorityQueue();
$heap->insert(2, 1);
$heap->insert(1, 2);
$heap->insert(['Hello'], 3);
$heap->insert(3, 3);


echo 'Top: ' . print_r($heap->top(), true) . PHP_EOL;

while (!$heap->isEmpty()) {
    print_r($heap->extract());
    echo PHP_EOL;
}