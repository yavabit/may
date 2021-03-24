<?php
    session_start();

    require('../db_config.php');   

    $photo = $_FILES['photo'];
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
      
    $target = "../../img/catalog-items/".basename($photo['name']);    
    move_uploaded_file($photo['tmp_name'], $target);

    $img = 'img/catalog-items/'.basename($photo['name']);
    

    $sql = "INSERT INTO `catalog` (`title`,`imgUrl`,`category`,`type`,`price`,`is_new`,`is_popular`) values ('$title','$img','$category','$type','$price','$new','$pop')";
    $result = mysqli_query($link, $sql);   
    
    header('Location: admin_info.php?change=catalog&type=add');
    
?>