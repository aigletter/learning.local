<?php

$iterator = new RecursiveDirectoryIterator(__DIR__);
$iterator = new RecursiveIteratorIterator($iterator);

/** @var DirectoryIterator $item */
foreach ($iterator as $item) {
    if ($item->getFilename() === '.' || $item->getFilename() === '..') {
    //if ($item->isDot()) {
        continue;
    }
    echo $item->getFilename() . PHP_EOL;
}