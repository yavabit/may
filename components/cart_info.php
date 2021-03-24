<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Корзина товаров">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/cart.css">
    <title>Корзина</title>
</head>
<body>

    <?php include('components/header.php');?>

    <section class="cart">
        <div class="container">
            <div class="section-title">
                <div class="line"></div>
                <h2>Корзина</h2>
            </div>
            
            <?php if(count($_SESSION['cart']['id'])<=0): ?>
            <div class="cart-empty">
                <h3>Ваша корзина еще пуста, пожалуйста, добавьте товары из <a href="catalog.php">каталога</a>.</h3>
                <img src="img/cart-cat.png" alt="">
            </div>                
            <?php endif; ?>

            <?php if(count($_SESSION['cart']['id'])>0): ?>
                <table class="cart-table">
                    <tr>
                        <th>Товар</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Итого</th>
                        <th></th>
                    </tr>
                    
                    <?php foreach($rows as $item): ?>
                    <tr id="tr_<?=$item['id']?>">
                        <td class="title">
                            <img src="<?= $item['imgUrl'] ?>" alt="">
                            <h3><a href="item.php?id=<?= $item['id'] ?>"><?= $item['title'] ?></a></h3>
                        </td>
                        <td class="price"><span class="mob_price"></span> <output id="price_<?=$item['id']?>" value="<?= $item['price'] ?>"><?= $item['price'] ?></output> ₽</td>
                        <td class="count">
                            <button class="step-but minus" type="button" onclick="countItemsCart(<?=$item['id']?>, 'minus')">-</button>
                            <input form="order" id="count_item_<?=$item['id']?>" type="number" min="1" max="4" value="1" readonly name="countItems[]">
                            <input form="order"  type="hidden" value="<?=$item['id']?>" name="id[]" readonly>
                            <button class="step-but plus" type="button" onclick="countItemsCart(<?=$item['id']?>, 'plus')">+</button>
                        </td>
                        <td class="price"><span class="mob_price_final"> </span><output form="order"  class="final_price" id="final_price_<?=$item['id']?>" value="<?= $item['price'] ?>"><?= $item['price'] ?> </output> ₽</td>
                        <td class="trash" id="trash_id_<?=$item['id']?>"><button onclick="removeFromCart(<?=$item['id']?>)"></button></td>
                    </tr>       
                    <?php endforeach; ?>         
                </table>

                       

                <div class="final-price">
                    <?php foreach($rows as $item) {
                        $final += $item['price'];
                    }                
                    ?>
                    <p>Сумма заказа: <input form="order" id="final_span" value=<?=$final?> name="final" readonly>рублей</p>
                </div>
                <div class="to-order-buts">
                    <button class="clear-cart" onclick="removeAll(<?=$item['id']?>)">Очистить корзину</button>
                    <button form="order" type="submit" class="to-order-item" >Оформить заказ</button>
                </div>
                <form id="order" action="order.php" method="POST" >
                </form>
            <?php endif; ?>
        </div>

        <div class="modal-delete-cart" id="delete">
            <h2>Вы действительно хотите удалить товары из корзины ?<span  id="modal-cart-title"></span></h2>            
            <div class="btn">
                <button class="btn-page modal-btn" id="delete_from_cart">Удалить товар</button>
                <a href="cart.php" id="modal-to-cart">Вернуться</a>
            </div>
        </div>
    </section>
    
    <?php include('components/footer.php'); ?>

</body>
</html>