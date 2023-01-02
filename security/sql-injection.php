<?php

$id = $_GET['id']; //2

$pdo = new PDO('mysql:dbname=learning-local;host=127.0.0.1', 'root', '1q2w3e');

/*$sql = "SELECT * FROM users WHERE id = " . $id;

echo $sql . '<br>';

$statement = $pdo->query($sql);*/


$sql = "SELECT * FROM users WHERE id = :id";

$statement = $pdo->prepare($sql);

$statement->execute([
    'id' => $id
]);

$result = $statement->fetch(PDO::FETCH_ASSOC);

print_r($result);