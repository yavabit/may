<?php 
    session_start();
    require('components/db_config.php');
    require('components/mail.php');

    $confirm = $_POST['confirm'];
    
        //Тип заказа
        $type_order = $_POST['delivery']; // Самовывоз, доставка

        //Контакты
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        //Доставка
        $street = $_POST['street']; //Улица
        $build = $_POST['build']; //Номер дома
        $gate = $_POST['gate']; //Подьезд
        $app = $_POST['app']; //Квартира
        $dom = $_POST['dom']; //Домофон
        $text = $_POST['text']; //Комментарий

        $addres = $street.', дом '.$build.', подъезд '.$gate.', квартира '.$app.', домофон '.$dom;
        if(isset($_POST['confirm'])) {
            $addres = $_POST['addres'];
        } 

        //Дата доставки
        $date_delivery = $_POST['date_delivery'];
        $time_from = $_POST['time-from'];
        $time_to = $_POST['time-to'];

        $date_del = $date_delivery.', с '.$time_from.' до '.$time_to;
        if(isset($_POST['confirm'])) {
            $date_del = $_POST['date_del'];
        } 

        //Дата самовывоза
        $date = $_POST['date'];
        $time_fr = $_POST['time-fr'];
        $time_t = $_POST['time-t'];

        $date_pickup = $date.', с '.$time_fr.' до '.$time_t;
        if(isset($_POST['confirm'])) {
            $date_pickup = $_POST['date_pickup'];
        }

        //Способ оплаты
        $payment_way = $_POST['payment_way'];

        $name = htmlspecialchars($name);
        $tel = htmlspecialchars($tel);
        $email = htmlspecialchars($email);
        $street = htmlspecialchars($street);
        $build = htmlspecialchars($build);
        $gate = htmlspecialchars($gate);
        $app = htmlspecialchars($app);
        $dom = htmlspecialchars($dom);
        $text = htmlspecialchars($text);
        $addres = htmlspecialchars($addres);
        $date_del = htmlspecialchars($date_del);
        $date_pickup = htmlspecialchars($date_pickup);

    
    if($payment_way == 'Онлайн оплата') {
        //Тип заказа
        $_SESSION['order']['type_order'] = $type_order; // Самовывоз, доставка

        //Контакты
        $_SESSION['order']['name'] = $name;
        $_SESSION['order']['tel'] = $tel;
        $_SESSION['order']['email'] = $email;

        //Доставка        
        $_SESSION['order']['addres'] = $addres;        

        //Дата доставки        
        $_SESSION['order']['date_del'] = $date_del;        

        //Дата самовывоза       
        $_SESSION['order']['date_pickup'] = $date_pickup;        

        //Способ оплаты
        $_SESSION['order']['payment_way'] = $payment_way;

        $_SESSION['order']['text'] = $text;

        
    } 
    
    if(isset($_POST['confirm'])) { 
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
        $receipt = '';
        send_mail($order_id, $type_order, $payment_way, $name, $tel, $email, $addres, $date_del, $date_pickup, $text, $receipt);
        //send_to_user($order_id, $type_order, $payment_way, $name, $tel, $email, $addres, $date_del, $date_pickup, $text);
        $_SESSION['result'] = 'ok';
        $_SESSION['cart']['id'] = array();
        $_SESSION['cart']['price'] = array();
        }
        
    }

    require('components/your_order_info.php');
?>