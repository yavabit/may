<?php
    session_start();
    require('../db_config.php');
    
    $login = $_POST['login'];
    $pass = md5($_POST['pass']);
    
    //$sql = "INSERT INTO `admin` VALUES (NULL, '$login','$pass')";
    
    $sql = "SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$pass' ";
    $check_admin = mysqli_query($link, $sql);
    if (mysqli_num_rows($check_admin) > 0) {
        $_SESSION['login'] = 'yes';

        header('Location: admin_info.php');
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: admin_log.php');
    } 
?>