<?php

ini_set('display_errors', '1');

session_start();

$pdo = new PDO('mysql:dbname=learning-local;host=127.0.0.1', 'root', '1q2w3e');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = htmlentities($_POST['comment']);
    $pdo->query("INSERT INTO comments (post_id, content) VALUES ({$_GET['id']}, '{$comment}')");

    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}



$sql = "SELECT * FROM posts WHERE id = :id";

$statement = $pdo->prepare($sql);

$statement->execute([
    'id' => $_GET['id']
]);

$post = $statement->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM comments WHERE post_id = :post_id";
$statement = $pdo->prepare($sql);
$statement->execute([
    'post_id' => $_GET['id']
]);
$comments = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
<head>
    <title>POST <?php echo $post['id'] ?></title>
</head>
<body>
    <div class="content">
        <div class="post">
            <h1><?php echo $post['title']; ?></h1>
            <div>
                <?php echo $post['content'] ?>
            </div>
        </div>
        <br><br>
        <hr>
        <br><br>
        <div class="comments">
            <h3>Комментарии:</h3>
            <?php if ($comments): ?>
                <?php foreach ($comments as $comment): ?>
                    <p>
                        <?php echo htmlentities($comment['content']) ?>
                    </p>
                    <hr>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Пока нет комментариев</p>
            <?php endif; ?>
        </div>

        <br><br>

        <form method="post">
            <textarea name="comment" rows="4" cols="50"></textarea>
            <br><br>
            <input type="submit">
        </form>
    </div>
</body>
</html>
