<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$store = new \solid\dip\FileStore();
//$store = new \solid\dip\DbStore();
$repository = new \solid\dip\OrderRepository($store);

$order = $repository->getById(6);

exit();

/*

OS
read();
write():

AAA
read()
{
    // todo
}
write()
{
    // todo
}

BBB
read()
{
    // todo
}
write()
{
    // todo
}

*/