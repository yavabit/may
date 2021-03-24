<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/style.css">    
    <link rel="stylesheet" href="../CSS/item.css">
    <link rel="stylesheet" href="../CSS/info.css">
    <title><?=$rows['title']?></title>
</head>
<body>
    <?php include('components/header.php');?>
    <?php require('components/info_info.php'); ?>
    <?php include('components/footer.php'); ?>
</body>
</html>
