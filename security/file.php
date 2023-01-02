<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $allowed = [
        'image/jpeg',
        'image/png'
    ];
    $mime = mime_content_type($_FILES['avatar']['tmp_name']);
    if (!in_array($mime, $allowed)) {
        die('Не разрешенный тип файла');
    }

    move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . '/images/' . $_FILES['name']);
}

?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="avatar">
    <br><br>
    <input type="submit">
</form>
