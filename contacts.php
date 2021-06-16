<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/contacts.css">
    <title>Май - интернет магазин цветов, быстрая доставка по Старому Осколу</title>
</head>
<body>
    
    <?php include('components/header.php'); ?>

    <section class="contacts">
        <div class="container">
            <div class="section-title">  
                <div class="line"></div>                  
                <h2>Контакты</h2>
            </div>  
            <div class="contacts-items">
                <div class="info">
                    <ul>
                        <h3>Адрес</h3>
                        <li><span class="location-all"></span>Россия, Старый Оскол</li>
                        <li><span class="location-on"></span>Космос мкр. 9а, с 9:00 до 21:00<p>Как найти: Вход с торца дома, с левой стороны от<br> магазина "Пятерочка", напротив парковки</p>
                        <img src="img/map1.png" alt="" width="95%">
                        </li>
                        <li><a href=""><span class="map"></span>На карту</a></li>
                        <h3>Телефоны</h3>
                        <li><a href="tel: +79999999999" class="telephone"><span class="tel"></span>+7(999)999 99 99</a><a href="tel: +79999999999"><span class="tel"></span>+7(999)999 99 99</a></li>                        
                        <h3>Почта</h3>
                        <li><a href="email"><span class="email"></span>support@may31.ru</a></li>                        
                    </ul>
                </div>
                <div class="map">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2f45971d252232f546a73fcfaae4b81a464597ac3d1174508bb227737db3b4f3&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>
        </div>
    </section>
    
    <?php include('components/footer.php'); ?>

</body>
</html>