<?php
session_start();

require('../components/db_config.php');

if($_POST['action']=='add') {
    if(isset($_POST['id'])) {

        $curItem = $_POST['id'];
    
        $sql = "SELECT * FROM `catalog` WHERE id = $curItem";
        $result = mysqli_query($link, $sql);
        $rows = mysqli_fetch_array($result);
    
        unset($_SESSION['result']);
        unset($_SESSION['order']);
    
        if(array_search($curItem, $_SESSION['cart']['id']) == false) {
    
            $_SESSION['cart']['id'][] = $curItem;
            $_SESSION['cart']['price'][] = $rows['price'];
    
            $resData['count'] = count($_SESSION['cart']['id']);
            $resData['id'] = $curItem;
            $resData['title'] = $rows['title'];
    
            for($i = 0; $i<count($_SESSION['cart']['price']); $i++) {
                $resData['price_sum'] += $_SESSION['cart']['price'][$i];
            }
            $resData['success'] = true;
        } else {
            $resData['success'] = false;
        }
    
       
        echo json_encode($resData);    
    }
}

if($_POST['action']=='count') {
    if(isset($_POST['id'])) {

        $curItem = $_POST['id'];
        $curCount = $_POST['count'];
        $curFinalPrcie = $_POST['finalPriceItem'];
        
        $_SESSION['cart']['finalPrice'][] = $curFinalPrcie;
       
        $_SESSION['cart']['count'][] = $curCount;

        

        echo json_encode($resData);    
    }
}

if($_POST['action'] == 'remove') { 
    if(isset($_POST['id'])) {
        
        $curItem = $_POST['id'];

        
        $sql = "SELECT * FROM `catalog` WHERE id = $curItem";
        $result = mysqli_query($link, $sql);
        $rows = mysqli_fetch_array($result);
        
        foreach($_SESSION['cart']['id'] as $key => $item){
            if ($item == $curItem){
                unset($_SESSION['cart']['id'][$key]);
                $resData['priceItem'] = $_SESSION['cart']['price'][$key];
                unset($_SESSION['cart']['price'][$key]);
            }
        }
        $resData['count'] = count($_SESSION['cart']['id']);
        $resData['id'] = $curItem;
        $resData['success'] = true;    
       
        echo json_encode($resData);    

    }
}

if($_POST['action'] == 'removeAll') { 

    $_SESSION['cart']['id'] = array();
    $_SESSION['cart']['price'] = array();
    
    $resData['count'] = count($_SESSION['cart']['id']);
    $resData['success'] = true;   
    echo json_encode($resData);    

    
}

if($_POST['action'] == 'delivery') {

    if($_POST['type'] == 'add') {
        $_SESSION['cart']['final_sum'] = $_SESSION['cart']['final_sum'] + 200; 
    }  

    if($_POST['type'] == 'delete') {
        $_SESSION['cart']['final_sum'] = $_SESSION['cart']['final_sum'] - 200; 
    }  

    $resData['resultsum'] = $_SESSION['cart']['final_sum'];   

       
    echo json_encode($resData);  
}
