<?php

function login()
{
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['sum'] = 100000;
}

function isLogged()
{
    session_start();
    return isset($_SESSION['logged']);
}

function hasMoney($sum)
{
    session_start();
    return $sum <= $_SESSION['sum'];
}

function checkToken($token)
{
    //print_r($_SESSION);
    return isset($_SESSION['token']) && $_SESSION['token'] === $token;
}

function setToken()
{
    session_start();
    $_SESSION['token'] = md5($_COOKIE['PHPSESSID'] . 'ASDFASDFSFAF' . (1000 * 25 / 67));
    return $_SESSION['token'];
}

function sendMoney(string $to, int $sum)
{
    if (isLogged() && hasMoney($sum) && checkToken($_GET['token'])) {
        $_SESSION['sum'] -= $sum;
        echo 'Деньги в сумме ' . $sum . ' успешно переведены ' . $to;
    } else {
        echo 'Иди гуляй хакер';
    }
}

function view()
{
    $token = setToken();
    echo <<<HERE
    <form>
        <input type="hidden" name="action" value="send">
        <input type="hidden" name="token" value="$token">
        <label>sum</label>
        <input name="sum">
        <br><br>
        <label>to</label>
        <input name="to">
        <br><br>
        <input type="submit">
    </form>
HERE;

}