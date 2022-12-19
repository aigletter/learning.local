<?php

class DirectoryIteratorFilter extends FilterIterator
{
    public function accept()
    {
        return $this->current()->getFilename() !== '.'
            && $this->current()->getFilename() !== '..';
    }
}

$iterator = new RecursiveDirectoryIterator(__DIR__);
$iterator = new RecursiveIteratorIterator($iterator);
$iterator = new DirectoryIteratorFilter($iterator);

/** @var DirectoryIterator $item */
foreach ($iterator as $item) {
    /*if ($item->getFilename() === '.' || $item->getFilename() === '..') {
        //if ($item->isDot()) {
        continue;
    }*/
    echo $item->getPathname() . PHP_EOL;
}