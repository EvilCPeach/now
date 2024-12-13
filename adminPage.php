<?php
    require_once('config.php');
    session_start();
    $select = "SELECT `humans`.*, `name-market` 
        FROM `humans` 
        JOIN `markets` ON `markets`.`id-market` = `humans`.`market-human` 
        WHERE `id-post-human` = 1;";
    $query = $link -> prepare($select);
    $query -> execute();
    $result = $query -> get_result();
    $result -> fetch_assoc();
    if($_SESSION['user'] == ''){
        header('location: registr.php');
    }
    if($_SESSION['user'] != 'admin'){
        header('location: /');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="exit.php">Выход</a>
    <table>
        <tr>
            <td>№ п/п</td>
            <td>Магазин</td>
            <td>Заведующий</td>
            <td>Количество продаж</td>
            <td>Сумма продаж</td>
            <td>Место</td>
            <td>% премии</td>
            <td>Сумма окладов</td>
            <td>Сумма % от суммы продаж</td>
            <td>Итого</td>
        </tr>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row['id-sale']; ?></td>
                <td><?php echo $row['name-market']; ?></td>
                <td><?php echo $row['FIO-human']?></td>
                <td><?php echo $row['FIO-human']?></td>
                <td><?php echo $row['FIO-human']?></td>
                <td><?php echo $row['FIO-human']?></td>
                <td><?php echo $row['FIO-human']?></td>
                <td><?php echo $row['FIO-human']?></td>
                <td><?php echo $row['FIO-human']?></td>
                <td><?php echo $row['FIO-human']?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>