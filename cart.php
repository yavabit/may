<?php
    session_start();
    require('components/db_config.php');
    
    //var_dump(json_encode($_SESSION));    
    if(count($_SESSION['cart']['id'])>0) {
        $sql = "SELECT * from `catalog` WHERE id IN (".implode(',',$_SESSION['cart']['id']).")";
        $result = mysqli_query($link, $sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); 
    }
    
    
    require('components/cart_info.php');
?>