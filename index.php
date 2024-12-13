<?php
    require_once('config.php');
    session_start();
    $select = " SELECT `humans`.*,`name-login`,`name-password` 
        FROM `humans`
        JOIN `logins` ON `logins`.`id-login` = `humans`.`login-human`
        JOIN `passwords` ON `passwords`.`id-password` = `humans`.`password-human`; ";
    $query = $link -> prepare($select);
    $query -> execute();
    $result = $query -> get_result();
    $result -> fetch_assoc();
    foreach ($result as $row) {
        if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST)){
            $inputLogin = $_POST['login'];
            $inputPassword = $_POST['password'];
            if($inputLogin == 'admin' && $inputPassword == '111'){
                $_SESSION['user'] = 'admin';
                header('location: adminPage.php');
            }
            if($inputLogin == $row['name-login'] && $row['id-post-human'] == 1){
                $_SESSION['user'] = 'zav';
                $_SESSION['login'] = $inputLogin;
                header('location: zavPage.php'); 
            }
            if($inputLogin == $row['name-login'] && $row['id-post-human'] == 2){
                $_SESSION['user'] = 'prod';
                header('location: sellerPage.php');
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Добро пожаловать!</h1>
        <label for="login">Введите логин:</label>
        <input type="login" name="login" id="login">
        <label for="password">Введите пароль:</label>
        <input type="password" name="password" id="password">
        <input type="submit">
        <a href="registr.php">Зарегистрироваться</a>
    </form>
</body>
</html>