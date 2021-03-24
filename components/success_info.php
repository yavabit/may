<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/your_order.css">
    <title>Ваш заказ</title>
</head>
<body>

    <?php include('components/header.php');?>
    
    <section class="user-order">
        <div class="container">
            <div class="section-title">
                <div class="line"></div>
                <h2>Ваш заказ</h2>
            </div>
            <div class="description">

                <h2>Ваш чек №<?=$receipt?></h2>
                
                <p>Ваш заказ № <?=$order_id?> оформлен! Пожалуйста, сохраните данные заказа</p>

                            
            </div>                     
            <table>
            
                <tr>
                    <th colspan="2">Заказ № <?=$order_id?></th>
                </tr>
            
                <tr>
                    <td>Тип заказа:</td>
                    <td><?= $_SESSION['order']['type_order'] ?></td>                    
                </tr>
                <tr>
                    <td>Способ оплаты:</td>
                    <td><?= $_SESSION['order']['payment_way'] ?></td>
                    
                </tr>
                <tr>
                    <td>Контактное лицо:</td>
                    <td><?= $_SESSION['order']['name'] ?></td>                    
                </tr>
                <tr>
                    <td>Телефон для связи:</td>
                    <td><?= $_SESSION['order']['tel'] ?></td>                    
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $_SESSION['order']['email'] ?></td>                    
                </tr>
                <tr>
                    <td>Сумма заказа:</td>
                    <td><?= $_SESSION['cart']['final_sum'] ?></td>
                </tr>    
                <?php if($_SESSION['order']['type_order'] == 'Доставка курьером'): ?>            
                <tr>
                    <td>Адрес доставки:</td>
                    <td><?= $_SESSION['order']['addres'] ?></td>                    
                </tr>
                <tr>
                    <td>Комментарий:</td>
                    <td><?=  $_SESSION['order']['text'] ?></td>
                </tr>
                <tr>
                    <td>Дата и время доставки:</td>
                    <td><?= $_SESSION['order']['date_del'] ?></td>                    
                </tr>
                <?php endif; ?>
                <?php if($_SESSION['order']['type_order'] == 'Самовывоз'): ?>
                <tr>
                    <td>Дата и время самовывоза:</td>
                    <td><?=$_SESSION['order']['date_pickup']?></td>                    
                </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="2">При необходимости мы свяжемся с вами по указанному номеру телефона</td>
                </tr>
            </table>        

            <div class="has-been-paip">
                <p>Ваш заказ успешно оплачен</p>                      
            </div>
            <div class="main-page">
                <a href="index.php">Вернуться на главную</a>
            </div>      

        </div>   
    </section>
    
    <?php include('components/footer.php'); ?>

</body>
</html>