<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ваш заказ">
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
                <?php if(isset($confirm)): ?>
                    <p>Ваш заказ № <?=$order_id?> оформлен! Пожалуйста, сохраните данные заказа</p>
                <?php endif; ?>
                <?php if(!isset($confirm)): ?>
                    <p>Пожалуйста, проверьте ваши данные и <?= $payment_way == 'Онлайн оплата' ? 'оплатите заказ' : 'оформите заказ'?></p>
                <?php endif; ?>
            </div>
            <form action="your_order.php" method="post" id="ord_form">           
            <table>
            <?php if(isset($confirm)): ?>
                <tr>
                    <th colspan="2">Заказ № <?=$order_id?></th>
                </tr>
            <?php endif; ?>
                <tr>
                    <td>Тип заказа:</td>
                    <td><?= $type_order ?></td>
                    <input type="hidden" name="delivery" value="<?=$type_order?>">
                </tr>
                <tr>
                    <td>Способ оплаты:</td>
                    <td><?= $payment_way ?></td>
                    <input type="hidden" name="payment_way" value="<?=$payment_way?>">
                </tr>
                <tr>
                    <td>Контактное лицо:</td>
                    <td><?= $name ?></td>
                    <input type="hidden" name="name" value="<?=$name?>">
                </tr>
                <tr>
                    <td>Телефон для связи:</td>
                    <td><?= $tel ?></td>
                    <input type="hidden" name="tel" value="<?=$tel?>">
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $email ?></td>
                    <input type="hidden" name="email" value="<?=$email?>">
                </tr>
                <tr>
                    <td>Сумма заказа:</td>
                    <td><?= $_SESSION['cart']['final_sum'] ?> ₽</td>
                </tr>
                <?php if($type_order == 'Доставка курьером'): ?>
                <tr>
                    <td>Адрес доставки:</td>
                    <td><?= $addres ?></td>
                    <input type="hidden" name="addres" value="<?= $addres ?>">
                </tr>
                <tr>
                    <td>Комментарий:</td>
                    <td><?= $text ?></td>
                </tr>
                <tr>
                    <td>Дата и время доставки:</td>
                    <td><?= $date_del ?></td>
                    <input type="hidden" name="date_del" value="<?= $date_del ?>">
                </tr>
                <?php endif; ?>
                <?php if($type_order == 'Самовывоз'): ?>
                <tr>
                    <td>Дата и время самовывоза:</td>
                    <td><?=$date_pickup?></td>
                    <input type="hidden" name="date_pickup" value="<?= $date_pickup ?>">
                </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="2">При необходимости мы свяжемся с вами по указанному номеру телефона</td>
                </tr>
            </table>         

            <input type="hidden" name="confirm" value="ok">
            <?php if($payment_way != 'Онлайн оплата' && !isset($confirm)): ?>
                <div class="submit">
                    <input type="submit" value="Оформить заказ"> 
                    <a href="cart.php">В корзину</a>  
                </div>                
            <?php endif; ?>
            </form>

            <div class="has-been-paip">                
                <?php if($payment_way == 'Онлайн оплата' && !isset($confirm)): ?>
                    <p>Ваш заказ еще не оплачен</p>
                <?php endif; ?>

                <?php if($payment_way != 'Онлайн оплата' && isset($confirm)): ?>
                    <p>Ваш заказ не оплачен, оплатите заказ в магазине удобным способом</p>
                <?php endif; ?>
            </div>
            <?php if(isset($confirm)): ?>
            <div class="main-page">
                <a href="index.php">Вернуться на главную</a>
            </div>      
            <?php endif; ?> 
            <?php if($payment_way == 'Онлайн оплата' && !isset($confirm)): ?>
                
                <form action="requests/payer.php" method="post" id="ordr_form"></form>
                    <div class="submit">
                        <input type="submit" value="Оплатить заказ" form="ordr_form">
                        <a href="cart.php">Назад</a>
                    </div>           
                                           
            <?php endif; ?>

        </div>   
    </section>
    
    <?php include('components/footer.php'); ?>
    
    <?php if(isset($_POST['confirm'])):  ?>
            
    <?php endif; ?>

</body>
</html>