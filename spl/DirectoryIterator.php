<?php

$iterator = new DirectoryIterator(__DIR__);

/** @var DirectoryIterator $item */
foreach ($iterator as $item) {
    //if ($item->getFilename() === '.' || $item->getFilename() === '..') {
    if ($item->isDot()) {
        continue;
    }
    echo $item->getFilename() . PHP_EOL;
}