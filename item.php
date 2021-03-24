<?php 
    session_start(); 

    require('components/db_config.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM `catalog` WHERE id = $id";
    $result = mysqli_query($link, $sql);
    $rows = mysqli_fetch_array($result);

    require('components/item_info.php');
?>