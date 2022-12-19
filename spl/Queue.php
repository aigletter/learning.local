<?php

$queue = new SplQueue();
$queue->enqueue(2);
$queue->enqueue(1);
$queue->enqueue(3);

echo 'Top: ' . $queue->top() . PHP_EOL;
echo 'Bottom: ' . $queue->bottom() . PHP_EOL;

while (!$queue->isEmpty()) {
    echo $queue->dequeue() . PHP_EOL;
}