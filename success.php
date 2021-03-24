<?php
    session_start();
    //принять гет запрос, проверить его, если он есть записать сессионные переменные в БД, в саксес инфо вывести данные из бд по заказу
    require('components/db_config.php');
    require('components/mail.php');

    
    if(isset($_GET['paymentId'])&&isset($_GET['account'])&&isset($_SESSION['cart'])&&isset($_SESSION['order'])) {

        $receipt = $_GET['paymentId'];       
        
        $type_order = $_SESSION['order']['type_order']; // Самовывоз, доставка

        //Контакты
        $name = $_SESSION['order']['name'];
        $tel = $_SESSION['order']['tel'];
        $email = $_SESSION['order']['email'];

        //Доставка        
        $addres = $_SESSION['order']['addres'];        

        //Дата доставки        
        $date_del = $_SESSION['order']['date_del'];        

        //Дата самовывоза       
        $date_pickup = $_SESSION['order']['date_pickup'];        

        //Способ оплаты
        $payment_way = $_SESSION['order']['payment_way'];

        $text = $_SESSION['order']['text'];

        if(isset($_SESSION['result'])) {
        $sql = "SELECT MAX(`Номер заказа`) FROM `orders`";
        } else $sql = "SELECT MAX(`Номер заказа`) +1 FROM `orders`";
        $result = mysqli_query($link, $sql); 
        $rows = mysqli_fetch_array($result);
        $order_id = $rows[0];
        $current_date = date('Y-m-d');
        
        if(!isset($_SESSION['result'])) {
        $sql1 = "SELECT `title` from `catalog` WHERE id IN (".implode(',',$_SESSION['cart']['id']).")";
        $result1 = mysqli_query($link, $sql1); 
        $rows1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
        
        
        for($i=0; $i<count($_SESSION['cart']['id']); $i++) {

            $item_id = $_SESSION['cart']['id'][$i];            
            $count = $_SESSION['cart']['item_count'][$i];

            $item_name = $rows1[$i]['title'];
                
            $sql = "INSERT INTO `orders` VALUES (NULL, $order_id, $item_id , '$item_name', $count, '$type_order', '$name', '$tel', '$email', '$addres', '$date_del', '$date_pickup', '$payment_way','$current_date')";
            $result = mysqli_query($link, $sql);
        }        
        
        send_mail($order_id, $type_order, $payment_way, $name, $tel, $email, $addres, $date_del, $date_pickup, $text, $receipt);
  
        $_SESSION['result'] = 'ok';
        $_SESSION['cart']['id'] = array();
        $_SESSION['cart']['price'] = array();
        }
        
        require('components/success_info.php');
    } else {
        echo('<h1>Service page, пожалуйста, вернитесь назад</h1>');
    }
    
    
?>