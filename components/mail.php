<?php 

function send_mail($order_id, $type_order, $payment_way, $name, $tel, $email, $addres, $date_del, $date_pickup, $text, $receipt) {

    require('db_config.php');
    
    $sql = "SELECT * FROM `orders` WHERE `Номер заказа` = $order_id";
    $result = mysqli_query($link, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql1 = "SELECT `imgUrl` from `catalog` WHERE id IN (".implode(',',$_SESSION['cart']['id']).")";
    $result1 = mysqli_query($link, $sql1); 
    $rowsImgUrl = mysqli_fetch_array($result1);
    
    //use PHPMailer\PHPMailer\PHPMailer;
    require('PHPMailer-master/src/PHPMailer.php');
    require('PHPMailer-master/src/Exception.php');

    $message = '
    <html>
        <head>
            <title>Заказ №'.$order_id.'</title>
            <style type="text/css">
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid black;
                }
            </style>
        </head>
        <body>
            <h1>Заказ №'.$order_id.'</h1>
            <p>Тип заказа: '.$type_order.'</p>
            <p>Способ оплаты: '.$payment_way.'</p>
            <h2>Контактные данные:</h2>
            <p>Имя: '.$name.'</p>
            <p>Телефон: '.$tel.'</p>
            <p>E-mail: '.$email.'</p>
            <p>Адрес: '.$addres.'</p>
            <h2>Дата и время:</h2>
            <p>Дата доставки: '.$date_del.'</p>
            <p>Дата самовывоза: '.$date_pickup.'</p>
            <p>Комментарий: '.$text.'</p>
            <h2>Заказ:</h2>
            <p>Сумма заказа: '.$_SESSION['cart']['final_sum'].'</p>
            <table>
                <tr>
                    <th>Товар</th>
                    <th>Название/id в базе</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>       ';         
    //echo count($rows);

    $ms[] = array();
    for($i = 0; $i<count($rows); $i++) {
        $item_price = $rows1[$i]['price'];
        $ms[$i] = '             
        <tr>
            <td>
                <img src="https://may31.ru/'.$rowsImgUrl[$i].'" width="100px" alt="">                                        
            </td>
            <td>'.$rows[$i]['Название товара'].'/'.$rows[$i]['id товара'].'</td>
            <td>'.$_SESSION['cart']['price'][$i].' ₽</td>
            <td>'.$rows[$i]['Количество'].' </td>
            
        </tr>             
    ';
   
    $mas = $mas.$ms[$i];
    };
    
    $message = $message.$mas.'</table>
    </body>
    </html>';
 
    // Создаем письмо
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->setFrom('info@may31.ru', 'Студия цветов Май'); // от кого (email и имя)
    $mail->addAddress('toscha.zhilenkov@yandex.ru', 'Петров');  // кому (email и имя)
    $mail->Subject = 'Новый заказ';                         // тема письма
    // html текст письма
    $mail->msgHTML($message);
    // Отправляем
    if ($mail->send()) {
        
    } else {
    echo 'Ошибка: ' . $mail->ErrorInfo;
    }  ; 

    if(isset($receipt)&&$receipt!='') {
        $rec = $receipt;
    } else {
        $rec = 'Заказ еще не оплачен';
    }

    $message = '
    <html>
        <head>
            <title>Заказ №'.$order_id.'</title>
            <style type="text/css">
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid black;
                }
            </style>
        </head>
        <body>
            <h1>Ваш заказ №'.$order_id.' успешно оформлен</h1>
            <p>Номер чека: '.$rec.'</p>            
            <p>Тип заказа: '.$type_order.'</p>
            <p>Способ оплаты: '.$payment_way.'</p>
            <h2>Контактные данные:</h2>
            <p>Имя: '.$name.'</p>
            <p>Телефон: '.$tel.'</p>
            <p>E-mail: '.$email.'</p>
            <p>Адрес: '.$addres.'</p>
            <h2>Дата и время:</h2>
            <p>Дата доставки: '.$date_del.'</p>
            <p>Дата самовывоза: '.$date_pickup.'</p>
            <p>Комментарий: '.$text.'</p>
            <h2>Заказ:</h2>
            <p>Сумма заказа: '.$_SESSION['cart']['final_sum'].'</p>
            <table>
                <tr>
                    <th>Товар</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>       ';         
    //echo count($rows);

    $ms[] = array();
    $mas = '';
    for($i = 0; $i<count($rows); $i++) {
        $item_price = $rows1[$i]['price'];
        $ms[$i] = '             
        <tr>
            <td>
                <img src="https://may31.ru/'.$rowsImgUrl[$i].'" width="100px" alt="">                                        
            </td>
            <td>'.$rows[$i]['Название товара'].'</td>
            <td>'.$_SESSION['cart']['price'][$i].' ₽</td>
            <td>'.$rows[$i]['Количество'].' </td>
            
        </tr>             
    ';
   
    $mas = $mas.$ms[$i];
    };
    
    $message = $message.$mas.'</table><p>Спасибо за заказ!<p></body>
    </html>';

        $mail1 = new PHPMailer\PHPMailer\PHPMailer();
        $mail1->setFrom('info@may31.ru', 'Студия цветов Май'); // от кого (email и имя)
        $mail1->addAddress($email, '');  // кому (email и имя)
        $mail1->Subject = 'Ваш заказ';                         // тема письма
        // html текст письма
        $mail1->msgHTML($message);
        // Отправляем
        if ($mail1->send()) {
        
        } else {
        echo 'Ошибка: ' . $mail1->ErrorInfo;
        }  ;   
    }