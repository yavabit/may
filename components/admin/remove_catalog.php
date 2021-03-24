<?php
    session_start();

    require('../db_config.php');   

    //$photo = $_FILES['photo'];
    $id = $_POST['id']; 
    echo($_POST['id']);  
    $sql = "SELECT `imgUrl` FROM `catalog` WHERE `id`=$id";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    unlink('../../'.$row['imgUrl']);
    
    $sql = "DELETE FROM `catalog` WHERE `id`=$id";
    $result = mysqli_query($link, $sql);
    
    
    //header('Location: admin_info.php?change=catalog&type=changing');
    
?>