<?php
    session_start();

    require('../db_config.php');   

    //$photo = $_FILES['photo'];
    $id = $_POST['id'];
    $img = $_POST['img'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $type = $_POST['type'];

    $special = $_POST['special'];

    if($special == 'new') {
        $new = 1;
        $pop = 0;
    } else if($special == 'pop') {
        $new = 0;
        $pop = 1;
    } else if($special == 0) {
        $new = 0;
        $pop = 0;
    }
      
    //$target = "../../img/catalog-items/".basename($photo['name']);    
    //move_uploaded_file($photo['tmp_name'], $target);

    //$img = 'img/catalog-items/'.basename($photo['name']);
   
    
    
    
    if(isset($_POST['add_sale'])) {
        $old_price = $_POST['old_price'];
        $new_price = $_POST['new_price'];
        $sale = $_POST['sale_percent'];

        $sql = "INSERT INTO `sales` VALUES($id,$old_price,$sale)";
        $result = mysqli_query($link, $sql);   

        $price = $new_price;        
    }

    if (isset($_POST['change_sale'])) {
        
        $old_price = $_POST['old_price'];
        $new_price = $_POST['new_price'];
        $sale = $_POST['sale_percent'];

        $sql = "UPDATE `sales` SET `old_price` = $old_price, `Скидка` = $sale WHERE `id` = $id";
        $result = mysqli_query($link, $sql);   

        $price = $new_price;        
    }

    $sql = "UPDATE `catalog` SET `title` = '$title',`imgUrl` = '$img',`category`='$category',`type`='$type',`price`=$price,`is_new`=$new,`is_popular`=$pop WHERE `id`=$id";
    $result = mysqli_query($link, $sql);
    
    header('Location: admin_info.php?change=catalog&type=changing');
    
?>