<?php

$list = new SplDoublyLinkedList();
$list->push(2);
$list->push(1);
$list->push(3);

//echo $list[0];

$list[] = 100;
echo $list[3] . PHP_EOL;

/*echo $list->top();
echo $list->bottom();*/

//$element = $list->pop();

//echo $list->count();

/*while (!$list->isEmpty())
{
    echo $list->pop() . PHP_EOL;
}*/

/*foreach ($list as $item) {
    echo $item . PHP_EOL;
}*/

//echo $list->count() . PHP_EOL;
