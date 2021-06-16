
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Доставка цветов в Старом Осколе. Заказ цветов на самовывоз и доставку. Свежий ассортимент цветов букетов. Мягкие игрушки, шары, ленточки. Подарочные букеты, сборные букеты, монобукеты, розы, композиции в коробках и корзинах.">
    <meta name="keywords" content="цветы, Старый Оскол, доставка цветов, цветы на заказ, заказать цветы, купить цветы Старый Оскол" >
    <meta name="yandex-verification" content="90da742fbebc42b2" />
    <meta name="verification" content="1b830d41a658b6bcdf5384887780c6" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Май - интернет магазин цветов, быстрая доставка по Старому Осколу</title>
</head>
<body>
    <?php include('components/header.php');?>
    
    <section class="catalog">
        <div class="container">
            <div class="section-title">
                <div class="line"></div>
                <h2>Хиты продаж</h2>
            </div>
            <div class="catalog-items">
                <?php foreach($pop_items_on_page as $item): ?>
                    <div class="catalog-item">                    
                        <div class="catalog-item-img">                        
                            <a href="item.php?id=<?=$item['id']?>">
                                <span><img src="img/pop.png" alt=""></span>
                                <img src="<?= $item['imgUrl']?>" alt="">
                            </a>
                        </div>
                        <div class="description">
                            <div class="title">
                                <h4><a href="item.php?id=<?=$item['id']?>"><?= $item['title'] ?></a></h4>
                            </div>
                            <div class="price">
                                <?php if($item['old_price'] == NULL):?>
                                    <p><?= $item['price'] ?> ₽</p>
                                <?php endif;?>
                                <?php if($item['old_price'] != NULL):?>
                                    <p><span class="old-price"><?= $item['old_price'] ?> ₽</span> <span class="new-price"><?= $item['price'] ?> ₽</span></p>
                                <?php endif;?>
                            </div>
                            <div class="to-cart-buts">
                                <button id="addCart_<?=$item['id'];?>" class="to-cart" onclick="addToCart(<?=$item['id'];?>)" title="Добавить <?=$item['title']?> в корзину">
                                    В корзину
                                </button>
                                <a href="cart.php" class="quick-to-cart" onclick="addToCart(<?=$item['id'];?>, 'quick')">Быстрый заказ</a>
                            </div>
                        </div>
                    </div>   
                <?php endforeach; ?>                
            </div>

            <div class="to-catalog">
                    <a href="catalog.php">Перейти в каталог</a>
            </div>
            
            
            <div class="section-title">
                <div class="line"></div>
                <h2>Новинки</h2>
            </div>
            <div class="catalog-items">
                <?php foreach($new_items_on_page as $item): ?>
                    <div class="catalog-item">
                        <div class="catalog-item-img">
                            <a href="item.php?id=<?=$item['id']?>">
                                <span><img src="img/new.png" alt=""></span>
                                <img src="<?= $item['imgUrl']?>" alt="">
                            </a>
                        </div>
                        <div class="description">
                            <div class="title">
                                <h4><a href="item.php?id=<?=$item['id']?>"><?= $item['title']?></a></h4>
                            </div>
                            <div class="price">
                                <?php if($item['old_price'] == NULL):?>
                                    <p><?= $item['price'] ?> ₽</p>
                                <?php endif;?>
                                <?php if($item['old_price'] != NULL):?>
                                    <p><span class="old-price"><?= $item['old_price'] ?> ₽</span> <span class="new-price"><?= $item['price'] ?> ₽</span></p>
                                <?php endif;?>
                            </div>
                            <div class="to-cart-buts">
                                <button id="addCart_<?=$item['id'];?>" class="to-cart" onclick="addToCart(<?=$item['id'];?>)" title="Добавить <?=$item['title']?> в корзину">
                                    В корзину
                                </button>
                                <a href="cart.php" class="quick-to-cart" onclick="addToCart(<?=$item['id'];?>, 'quick')">Быстрый заказ</a>
                            </div>
                        </div>
                    </div> 
                <?php endforeach;?>
            </div>

            <div class="to-catalog">
                    <a href="catalog.php">Перейти в каталог</a>
            </div>
            
        </div>
        
    </section>
    
    <section class="features">
        <div class="container">
            <div class="section-title">
                <div class="line"></div>
                <h2>Почему мы?</h2>
            </div>

            <div class="features-block">
                <div class="feature-item">
                    <div class="image low-price"></div>
                    <h4>Низкие цены</h4>
                </div>
                <div class="feature-item">
                    <div class="image flower"></div>
                    <h4>Только свежий ассортимент цветов</h4>
                </div>
                <div class="feature-item">
                    <div class="image del"></div>
                    <h4>Быстрая доставка</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="feedback">
        <div class="container">
            <div class="section-title">
                <div class="line"></div>
                <h2>Свяжитесь с нами</h2>
            </div>

            <div class="description-top">
                <p>Если у вас возникли какие-либо вопросы, мы ответим вам в ближайшее время</p>
            </div>
            <div class="fed-info">
                <form class="fed-form">
                    <label for="fed_name">Ваше имя:</label>
                    <input type="text" id="fed_name" name="name">
                    <div class="fed-contacts">
                        <div class="fed-contact-item tel">
                            <label for="fed_tel">Телефон:</label>
                            <input type="tel" id="fed_tel" name="tel">
                        </div>
                        
                        <div class="fed-contact-item mail">
                            <label for="fed_email">Электронная почта:</label>
                            <input type="email" id="fed_email" name="email">
                        </div>                                  
                    </div>
                    <label for="fed_text">Вопрос:</label>
                    <textarea id="fed_text" name="text"></textarea>
                    <button class="sub-but" type="submit">Отправить</button>
                </form>
                <div class="flower-block">
                    <div class="flower"></div>
                </div>
            </div>
            <div class="decription-bottom">
                <p>Внимание! Если у вас срочный вопрос, рекомендуем звонить на номер: <a href="tel:+79999999999"> 8-999-999-99-99</a></p>
            </div>

        </div>
    </section>
    
    <div class="modal-fed">
        <h2>Спасибо за обращение!</h2>       
        <p>Мы свяжемся с вами в ближайшее время</p> 
        <div class="btn">
            <button id="close_fed">Закрыть</button>
        </div>
    </div>

    <?php include('components/footer.php'); ?>

</body>
</html>