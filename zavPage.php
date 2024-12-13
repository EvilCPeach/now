<?php
    require_once('config.php');
    session_start();
    if($_SESSION['user'] == ''){
        header('location: registr.php');
    }
    $login = $_SESSION['login'];
    $selectZav = " SELECT *
        FROM `humans`
        WHERE `login-human` = '$login' ";
    $queryZav = $link -> prepare($selectZav);
    $queryZav -> execute();
    $resultZav = $queryZav -> get_result();
    $resultZav -> fetch_assoc();
    // foreach ($resultZav as $rowZav) {
        // $marketZav = $rowZav['market-human'];
        $select = " SELECT `humans`.*,`name-market`,`FIO-seller` 
        FROM `humans` 
        JOIN `sellers` ON `sellers`.`id-seller` = `humans`.`FIO-human` 
        JOIN `markets` ON `markets`.`id-market` = `humans`.`market-human` 
        WHERE `market-human` = 1 AND `good-human` IS NOT NULL LIMIT 3; ";
        $query = $link -> prepare($select);
        $query -> execute();
        $result = $query -> get_result();
        $result -> fetch_assoc();
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/zavPage.css">
    <title>Document</title>
</head>
<body>
    <a href="exit.php">Выход</a>
    <table>
        <tr>
            <td>№ п/п</td>
            <td>Магазин</td>
            <td>Продавец</td>
            <td>Количество продаж</td>
            <td>Сумма продаж</td>
            <td>Место</td>
            <td>% премии</td>
            <td>Сумма % от суммы продаж</td>
        </tr>
        <?php foreach($result as $row){ ?>
            <tr>
                <td><?php echo $row['id-sale'];  ?></td>
                <td><?php echo $row['FIO-seller'];  ?></td>
                <td><?php echo $row['FIO-human'];  ?></td>
                <td><?php echo $row['FIO-human'];  ?></td>
                <td><?php echo $row['FIO-human'];  ?></td>
                <td><?php echo $row['FIO-human'];  ?></td>
                <td><?php echo $row['FIO-human'];  ?></td>
                <td><?php echo $row['FIO-human'];  ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>