<?php
    session_start();
    require('components/db_config.php');

    (int)$final_sum = (int)$_POST['final'];
    $_SESSION['cart']['final_sum'] = $final_sum;
    
    $_SESSION['cart']['item_count'] = $_POST['countItems'];
    
    $sql = "SELECT * from `catalog` WHERE id IN (".implode(',',$_SESSION['cart']['id']).")";
    $result = mysqli_query($link, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    require('components/order_info.php');
?>