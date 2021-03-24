<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Информация по заказу">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/order.css">
    <title>Оформление заказа</title>
</head>
<body>

    <?php include('components/header.php');?>
    
    <section class="order">
        <div class="container">
            <div class="section-title">
                <div class="line"></div>
                <h2>Оформление заказа</h2>
            </div>
            <div class="order-main">
                <div class="order-form">
                    <form action="your_order.php" method="post">
                        <fieldset class="contacts">
                            <legend>Контактные данные:</legend>
                            <label for="name">Ваше имя: <span class="important">*</span></label>
                            <input type="text" name="name" id="name" required>
                            <div class="flex-wrap">
                                <div class="contact-tel">
                                    <label for="tel">Телефон: <span class="important">*</span></label>
                                    <input type="tel" name="tel" id="tel" required>
                                </div>
                                <div class="contact-email">                                
                                    <label for="email">Email: </label>
                                    <input type="email" name="email" id="email">
                                </div>
                            </div>
                       
                            <input type="hidden" name="price" value="<?= $price ;?>" readonly>
                            <input type="hidden" name="prod_id" value="<?=$id?>" readonly>
                           
                        </fieldset>

                        <fieldset class="type-order">
                        <legend>Выберите тип заказа: <span class="important">*</span></legend>
                            <input type="radio" name="delivery" id="pickup" value="Самовывоз" required>
                            <label class="pickup" for="pickup">Самовывоз</label>
                            
                            <input type="radio" name="delivery" id="delivery" value="Доставка курьером">
                            <label class="delivery" for="delivery">Доставка курьером</label>
                        </fieldset>

                        <fieldset class="delivery">
                            <legend>Доставка:</legend>
                            <label for="street">Улица: <span class="important">*</span></label>
                            <input type="text" name="street" id="street" required>

                            <div class="flex-wrap">
                                <div class="street">
                                    <label for="build">Дом/Корпус: <span class="important">*</span></label>
                                    <input type="text" name="build" id="build" required>
                                </div>
                                <div class="gate1">
                                    <label for="gate">Подъезд:</label>
                                    <input type="text" name="gate" id="gate">
                                </div>
                                <div class="appartment">
                                    <label for="app">Квартира:</label>
                                    <input type="text" name="app" id="app">
                                </div>
                                <div class="gate2">
                                    <label for="dom">Домофон:</label>
                                    <input type="text" name="dom" id="dom">
                                </div>
                                <div class="comment">
                                    <label for="text">Комментарий к заказу:</label>
                                    <textarea id="text" name="text"></textarea>
                                </div>
                                
                            </div>
                            <div class="flex-wrap">
                                <div class="date">
                                    <label for="date_delivery">Дата доставки: <span class="important">*</span></label>
                                    <input type="date" name="date_delivery" id="date_delivery" value="<?=date("Y-m-d")?>" min="<?=date("Y-m-d")?>" required>
                                </div>
                                <div class="time">
                                <p>Время доставки: <span class="important">*</span></p>
                                    <label for="time-from">С</label>
                                    <select name="time-from" id="time-from" required>
                                        <?php for($i = 0; $i<24; $i++):?>
                                        <option value="<?=$i?>.00"><?=$i?>:00</option>
                                        <?php endfor; ?>
                                    </select>
                                    <label for="time-to">До</label>
                                    <select name="time-to" id="time-to">
                                        <?php for($i = 0; $i<24; $i++):?>        
                                        <option value="<?=$i?>.00"><?=$i?>:00</option>
                                        <?php endfor; ?>
                                    </select>
                                </div>                            
                            </div>
                        </fieldset>

                        <fieldset class="pickup">
                            <legend>Выберите дату и время:</legend>
                            <div class="date">
                                <label for="date">Дата: <span class="important">*</span></label>
                                <input type="date" name="date" id="date" value="<?=date("Y-m-d")?>" min="<?=date("Y-m-d")?>" required>
                            </div>
                            <div class="time">
                                <p>Время: <span class="important">*</span></p>
                                <label for="time-fr">С</label>
                                <select name="time-fr" id="time-fr" required>
                                    <?php for($i = 0; $i<24; $i++):?>        
                                    <option value="<?=$i?>.00"><?=$i?>:00</option>
                                    <?php endfor; ?>
                                </select>
                                <label for="time-t">До</label>
                                <select name="time-t" id="time-t">
                                    <?php for($i = 0; $i<24; $i++):?>        
                                    <option value="<?=$i?>.00"><?=$i?>:00</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                                     
                        </fieldset>

                        <fieldset class="payment">
                            <legend>Способ оплаты:</legend>
                            
                            <input type="radio" name="payment_way" id="cash" value="Наличные" required>
                            <label class="cash" for="cash">Наличными</label>                            

                            <input type="radio" name="payment_way" id="card" value="Карта">
                            <label class="card" for="card">Картой</label>                                                      
                            
                            <input type="radio" name="payment_way" id="card-online" value="Онлайн оплата">
                            <label class="card-online" for="card-online">Онлайн оплата</label>                                                        
                        </fieldset>
                        <fieldset class="payment_delivery">
                        <legend>Способ оплаты:</legend>
                            <p>В настоящее время, оплата заказа на доставку осуществляется только онлайн. Для продолжения нажмите на кнопку "Далее"</p>
                            <input type="radio" id="payment_delivery" name="payment_way" value="Онлайн оплата" checked required>
                            <label for="payment_delivery">Оплата онлайн</label>
                        </fieldset>
                        <p>Нажимая на кнопку "Далее", Вы соглашаетесь с правилами обработки персональных данных</p>
                        <input type="submit" value="Далее" id="submit_but" disabled>
                    </form>
                </div>

                <div class="order-info">                    
                    <table>
                        <?php for($i=0;$i<count($rows); $i++): ?>                               
                        <tr>
                            <td>
                                <img src="img/catalog-items/item_example.jpg" alt="">
                                <div>
                                    <h3><a href="#"><?=$rows[$i]['title']?></a></h3>
                                    <p class="price"><span><?=$_SESSION['cart']['item_count'][$i]?></span> x <span><?=$rows[$i]['price']?></span></p>
                                </div>                                
                            </td>
                        <?php endfor; ?>    
                        </tr>   
                        <tr class="delivery_on">
                            <td>Доставка: 200 рублей</td>
                        </tr>    
                    </table>
                    <div class="final-price">
                        <p>Сумма заказа: <span id="final_summer"><?=$_SESSION['cart']['final_sum']?> </span> рублей</p>
                    </div>

                    <div class="delivery-info">
                        <h3>Информация по доставке:</h3>
                        <ul>
                            <li>Мы доставляем цветы в пределах староосколького городского округа.</li>
                            <li>Стоимость доставки в пределах города: <span>200 рублей.</span></li>
                            <li>Стоимость доставки за пределами города: <span>200 рублей + 15р за 1км.<span></li>
                            <li>Оплата доставки осуществляется онлайн через сайт (прибавляется к общей сумме заказа).</li>
                        </ul>                        
                    </div>

                </div>                
                
            </div>
        </div>   
    </section>
    
    <?php include('components/footer.php'); ?>

</body>
</html>