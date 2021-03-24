<?php
    session_start();

    //var_dump($_SESSION['cart']);
    require('components/db_config.php');

    $limit = 8;

    $sql = "SELECT * FROM `catalog` WHERE is_popular = 1";
    $result = mysqli_query($link, $sql);
    $rows_pop = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $pop_items_on_page = array_slice($rows_pop, 0, $limit, true);

    $sql = "SELECT * FROM `catalog` WHERE is_new = 1";
    $result = mysqli_query($link, $sql);
    $rows_new = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $new_items_on_page = array_slice($rows_new, 0, $limit, true);
    
    

    require('components/index_info.php');
?>