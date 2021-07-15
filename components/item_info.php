<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Цветы с доставкой. Букет. <?=$rows['title']?>">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/item.css">
    <link rel="stylesheet" href="../CSS/info.css">
    <title><?=$rows['title']?></title>
</head>
<body>
    <?php include('components/header.php') ?>

    <section class="catalog">
        <div class="container">
            <div class="section-title">
                <div class="line"></div>
                <h2><?=$rows['title']?></h2>
            </div>
            <div class="catalog-item-block">
                <div class="item-img">
                    <img src="<?=$rows['imgUrl']?>" alt="" onclick="imgScale()" id="mainImg">
                    <?php if($countItemsImages):?>
                        <div class="other-imgs">
                            <img src="<?=$rows['imgUrl']?>" alt="" id="img_mainSmallImg" class="focused" onclick="changeImg('mainSmallImg')">
                            <?php for($i = 1; $i<=$counts;$i++):?>
                                <img src="<?=$rows_images[0][$i]?>" alt="" id=<?="img_".$i?> onclick="changeImg(<?=$i?>)">
                            <?php endfor;?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="item-img-scale">
                    <img src="<?=$rows['imgUrl']?>" id = "imgScale" alt="">
                </div>
                <div class="item-description">
                    <div class="description">
                        <?php if($rows['old_price'] == NULL):?>
                            <p><?= $rows['price'] ?> ₽</p>
                        <?php endif;?>
                        <?php if($rows['old_price'] != NULL):?>
                            <p><span class="old-price"><?= $rows['old_price'] ?> ₽</span> <span class="new-price"><?= $rows['price'] ?> ₽</span></p>
                        <?php endif;?>
                        <p>Шаблон текста описания. Шаблон текста описания.Шаблон текста описания.Шаблон текста описания. Шаблон текста описания.</p>
                    </div>
                    <div class="to-cart-buts">
                        <div class="imgbox">
                            <img src="img/payments.png" alt="">
                        </div>
                        <button id="addCart_<?=$rows['id'];?>" class="to-cart" onclick="addToCart(<?=$rows['id'];?>)" title="Добавить <?=$rows['title']?> в корзину">
                                    В корзину
                                </button>
                        <a href="cart.php" class="quick-to-cart" onclick="addToCart(<?=$rows['id'];?>, 'quick')">Быстрый заказ</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include('components/info_info.php'); ?>

    <?php include('components/footer.php'); ?>

    <script src="JS/items_imgs.js"></script>

</body>
</html>