<?php

/*$str1 = 'Hello world';
$hash1 = md5($str1);

$str2 = 'Хеш-функция (англ. hash function от hash — «превращать в фарш», «мешанина»[1]), или функция свёртки — функция, осуществляющая преобразование массива входных данных произвольной длины в выходную битовую строку установленной длины, выполняемое определённым алгоритмом. Преобразование, производимое хеш-функцией, называется хешированием. Исходные данные называются входным массивом, «ключом» или «сообщением». Результат преобразования называется «хешем», «хеш-кодом», «хеш-суммой», «сводкой сообщения».';
$hash2 = md5($str2);*/

$salt = '3fde6bb0541asdfas4ebdadf7c2ff31123';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = new PDO('mysql:dbname=learning-local;host=127.0.0.1', 'root', '1q2w3e');

    $hash = md5($_POST['password'] . $salt);
    //$pdo->query("INSERT INTO users (name, password) VALUES ('{$_POST['name']}', '$hash')");

    $statement = $pdo->query("SELECT * FROM users WHERE name = '{$_POST['name']}' AND password = '$hash'");
    $user = $statement->fetch(PDO::FETCH_ASSOC);
}

?>

<form method="post">
    <label>Name</label>
    <br>
    <input name="name">
    <br><br>
    <label>Password</label>
    <br>
    <input name="password">
    <br><br>
    <input type="submit">
</form>
