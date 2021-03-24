<?php
    $name = $_POST['name'];
    $phone = $_POST['tel'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    $name = htmlspecialchars($name);
    $phone = htmlspecialchars($phone);
    $email = htmlspecialchars($email);
    $text = htmlspecialchars($text);  
   
    
    $to = "toscha.zhilenkov@yandex.ru";
    $subject = 'Обращение с сайта';
    $message = '
    <html>
        <head>
            <title>Обращение с сайта</title>
        </head>
        <body>
            <p>Имя: '.$name.'</p>
            <p>Телефон: '.$phone.'</p>
            <p>E-mail: '.$email.'</p>
            <p>Обращение: '.$text.'</p>
        </body>
    </html>';

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";  

    mail($to, $subject, $message, $headers);
   
    
?>