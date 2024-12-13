<?php
    require_once('config.php');
    session_start();
    $add = "";
    // $query = $link -> prepare($add);
    // $query -> execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="FIO">Введите ФИО:</label>
        <input type="text" name="FIO" id="FIO">
        <label for="login">Придумайте логин:</label>
        <input type="text" name="login" id="login">
        <label for="password">Придумайте пароль:</label>
        <input type="text" name="password" id="password">
        <input type="submit">
    </form>
</body>
</html>