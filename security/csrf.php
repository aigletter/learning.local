<?php

//ini_set('display_errors', '1');

include __DIR__ . '/functions.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'login':
            login();
            break;
        case 'page':
            view();
            break;
        case 'send':
            sendMoney($_GET['to'], $_GET['sum']);
            break;
    }

}