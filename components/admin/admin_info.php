<?php session_start();
if (!isset($_SESSION['login'])) {
    header('Location: admin_log.php');
}
require('../db_config.php');
if ($_GET['type'] == 'changing') {
    if (isset($_GET['search'])) {
        $search_query = $_GET['search'];
        $sql = "SELECT * FROM `catalog` LEFT JOIN sales USING(id) WHERE `title` LIKE '%$search_query%'";
        $result = mysqli_query($link, $sql);
    } else if (!isset($_GET['search'])) {
        $sql = "SELECT * FROM `catalog` LEFT JOIN sales USING(id)";
        $result = mysqli_query($link, $sql);
    }
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="ru en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/bootstrap.css">
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/admin.css">
    <title>Admin Panel</title>
</head>

<body>
    <section class="admin">
        <div class="container">
            <a class="logout" href="logout.php">Выход</a>
            <div class="admin-main-menu">
                <h2>Меню</h2>
                <ul class="admin-list">
                    <li><a href="admin_info.php?change=catalog">Изменить каталог</a></li>
                    <li><a href="admin_info.php?change=orders">Заказы</a></li>
                    <li><a href="admin_info.php?change=catalog">Ссылки на хостинг и БД</a></li>
                </ul>
            </div>
            <div class="submenu">
                <?php if ($_GET['change'] === 'catalog') : ?>
                    <h2>Изменить каталог</h2>
                    <ul class="change-list">
                        <li id="catalog_type_add"><a href="admin_info.php?change=catalog&type=add">Добавить товар в каталог</a> </li>
                        <li id="catalog_type_changing"><a href="admin_info.php?change=catalog&type=changing">Изменить товар</a></li>
                    </ul>
                    <?php if ($_GET['type'] === 'add') : ?>
                        <h2>Добавить товар</h2>
                        <form action="add_to_catalog.php" method="POST" enctype="multipart/form-data" id="add_form">
                            <label for="image">Главное фото товара</label>
                            <input type="file" name="mainPhoto" id="image" accept="image/*" required>

                            <label for="">Дополнительные фото товара</label>
                            <p>Добавьте первое фото чтобы добавить еще. <br> <b>Пропустите</b> этот пункт, <b>если</b> у товара только главное фото</p>
                            <fieldset id="additional_photo">
                                <input type="file" name="add_photo_1" accept="image/*" id="add_photo_1" onclick="additional_photos()">
                            </fieldset>

                            <label for="title">Название товара</label>
                            <input type="text" name="title" id="title" placeholder="Роза" required>


                            <label for="123">Цена</label>
                            <fieldset id="add_price_ad">
                                <input type="radio" name="with_sale" id="with_sale_yes" value="with">
                                <label for="with_sale_yes">Со скидкой</label>

                                <div class="box_with_sale">
                                    <input type="number" name="sale_price" placeholder="Цена без скидки">
                                    <input type="number" name="cur_price" placeholder="Цена со скидкой">
                                </div>

                                <input type="radio" name="with_sale" id="with_sale_no" value="without">
                                <label for="with_sale_no">Без скидки</label>
                                <div class="box_without_sale">
                                    <input type="number" name="price" id="price" placeholder="1000">
                                </div>

                            </fieldset>



                            <label for="category">Категория товара</label>
                            <fieldset id="category">
                                <select name="category" id="" required>
                                    <option value="roses">Розы</option>
                                    <option value="monobouquets">Букеты из хризантем</option>
                                    <option value="pre_bouquets">Букеты сборные</option>
                                    <option value="boxes">Композиции в корзинах и коробках</option>
                                    <option value="toys_china">Мягкие игрушки ручной работы</option>
                                    <option value="toys_handcraft">Мягкие игрушки производства Китай</option>
                                    <option value="balloons">Шары</option>
                                </select>
                            </fieldset>

                            <label for="type">Тип</label>
                            <fieldset id="type">
                                <input type="radio" name="type" id="type_t" value="Роза" required>
                                <label for="type_t">Роза</label>
                                <input type="radio" name="type" id="type_h" value="Тюльпан">
                                <label for="type_h">Тюльпан</label>
                                <input type="radio" name="type" id="type_s" value="Хризантема">
                                <label for="type_s">Хризантема</label>
                            </fieldset>

                            <label for="new">Отметки</label>
                            <fieldset id="new">
                                <input type="radio" name="special" id="is_new_1" value="new" required>
                                <label for="is_new_1">Новое</label>
                                <input type="radio" name="special" id="is_new_0" value="pop">
                                <label for="is_new_0">Популярное</label>
                                <input type="radio" name="special" id="is_new_032" value="none">
                                <label for="is_new_032">Нет</label>
                            </fieldset>

                            <button type="submit">Добавить</button>
                        </form>
                    <?php endif; ?>


                    <?php if ($_GET['type'] === 'changing') : ?>
                        <h2>Изменить товары</h2>
                        <section class="changing">
                            <form class="to-find" action="admin_info.php" method="get">
                                <input type="hidden" name="change" value="catalog">
                                <input type="hidden" name="type" value="changing">
                                <label for="admin_sr">Поиск по каталогу:</label>
                                <input type="search" name="search" tabindex="1" id="admin_sr" placeholder="Название">

                                <button type="submit">Найти</button>
                            </form>
                            <?php foreach ($rows as $item) : ?>
                                <div class="catalog-item">

                                    <div class="catalog-item-img">
                                        <img src="../../<?= $item['imgUrl']; ?>" alt="">
                                    </div>

                                    <div class="description">
                                        <div class="title">
                                            <h4><?= $item['title'] ?></a></h4>
                                        </div>
                                        <div class="price">
                                            <?php if ($item['old_price'] == NULL) : ?>
                                                <p><?= $item['price'] ?> ₽</p>
                                            <?php endif; ?>
                                            <?php if ($item['old_price'] != NULL) : ?>
                                                <p><span class="old-price"><?= $item['old_price'] ?> ₽</span> <span class="new-price"><?= $item['price'] ?> ₽</span></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="to-cart-buts">
                                            <a href="admin_info.php?change=catalog&type=item_change&id=<?= $item['id'] ?>">Изменить товар</a>
                                            <button onclick="remove_cat(<?= $item['id'] ?>)">Удалить товар</button>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </section>
                    <?php endif; ?>

                    <?php if ($_GET['type'] === 'item_change') : ?>

                        <section class="item_change">
                            <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM `catalog` LEFT JOIN sales USING(id) WHERE `id` = $id;";
                            $result = mysqli_query($link, $sql);
                            $rows = mysqli_fetch_array($result);

                            ?>
                            <h2>Изменить товар id № <?= $rows['id'] ?></h2>
                            <form action="admin_change.php" method="post">
                                <div class="img-box">
                                    <img src="../../<?= $rows['imgUrl']; ?>" alt="">
                                </div>
                                <input type="hidden" name="img" value="<?= $rows['imgUrl']; ?>">
                                <input type="hidden" name="id" value="<?= $rows['id'] ?>">
                                <label for="title1">Название товара</label>
                                <input type="text" name="title" id="title1" value="<?= $rows['title'] ?>" required>

                                <label for="price1">Цена</label>
                                <input type="number" name="price" id="price1" value="<?= $rows['price'] ?>" required>

                                <label for="category">Категория товара</label>
                                <fieldset id="category">
                                    <select name="category" id="" required>
                                        <option value="roses" <?= $rows['category'] == 'roses' ? 'selected' : '' ?>>Розы</option>
                                        <option value="monobouquets" <?= $rows['category'] == 'monobouquets' ? 'selected' : '' ?>>Монобукеты</option>
                                        <option value="pre_bouquets" <?= $rows['category'] == 'pre_bouquets' ? 'selected' : '' ?>>Букеты сборные</option>
                                        <option value="boxes" <?= $rows['category'] == 'boxes' ? 'selected' : '' ?>>Композиции в корзинах и коробках</option>
                                        <option value="toys_china" <?= $rows['category'] == 'toys_china' ? 'selected' : '' ?>>Мягкие игрушки ручной работы</option>
                                        <option value="toys_handcraft" <?= $rows['category'] == 'toys_handcraft' ? 'selected' : '' ?>>Мягкие игрушки производства Китай</option>
                                        <option value="balloons" <?= $rows['category'] == 'balloons' ? 'selected' : '' ?>>Шары</option>
                                    </select>
                                </fieldset>

                                <label for="type">Тип</label>
                                <fieldset id="type">
                                    <input type="radio" name="type" id="type_t1" value="Роза" <?= $rows['type'] == 'Роза' ? 'checked' : '' ?> required>
                                    <label for="type_t1">Роза</label>
                                    <input type="radio" name="type" id="type_h1" value="Тюльпан" <?= $rows['type'] == 'Тюльпан' ? 'checked' : '' ?>>
                                    <label for="type_h1">Тюльпан</label>
                                    <input type="radio" name="type" id="type_s1" value="Хризантема" <?= $rows['type'] == 'Хризантема' ? 'checked' : '' ?>>
                                    <label for="type_s1">Хризантема</label>
                                </fieldset>

                                <label for="new">Отметки</label>
                                <fieldset id="new">
                                    <input type="radio" name="special" id="is_new_11" value="new" <?= $rows['is_new'] == 1 ? 'checked' : '' ?> required>
                                    <label for="is_new_11">Новое</label>
                                    <input type="radio" name="special" id="is_new_02" <?= $rows['is_popular'] == 1 ? 'checked' : '' ?> value="pop">
                                    <label for="is_new_02">Популярное</label>
                                    <input type="radio" name="special" id="is_new_01" <?= ($rows['is_new'] != 1 && $rows['is_popular'] != 1) ? 'checked' : '' ?> value="0">
                                    <label for="is_new_01">Нет</label>
                                </fieldset>

                                <label for="sales">Скидки</label>
                                <fieldset id="sales">

                                    <?php if (!isset($rows['old_price'])) : ?>
                                        <input type="checkbox" id="add_sale" name="add_sale">
                                        <label for="add_sale">- Добавить скидку</label>
                                        <p class="is_wrong">Новая цена превышает старую. Для начала, пожалуйста, измените цену товара, а затем добавьте скидку!</p>
                                        <div class="new-price">
                                            <p>Введите одно из значений</p>
                                            <div class="m">
                                                <label for="old_price">Старая цена</label>
                                                <input type="number" id="old_price" name="old_price" value="<?= $rows['price'] ?>" readonly style="font-weight: bold" placeholder="1000">
                                            </div>
                                            <div>
                                                <label for="new_price">Новая цена</label>
                                                <input type="number" id="new_price" name="new_price">
                                            </div>

                                            <div>
                                                <label for="sale_percent">Скидка в процентах</label>
                                                <input type="number" id="sale_percent" name="sale_percent" placeholder="10">
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($rows['old_price'])) : ?>
                                        <input type="checkbox" id="change_sale" name="change_sale">
                                        <label for="change_sale">Изменить скидку</label>

                                        <button id="s_but_del" style="color: orangered" onclick="remove_sale(<?= $rows['id'] ?>)">Удалить скидку</button>

                                        <p class="is_wrong">Новая цена превышает старую. Для начала, пожалуйста, измените цену товара, а затем добавьте скидку!</p>
                                        <div class="new-price">
                                            <p>Введите одно из значений</p>
                                            <div class="m">
                                                <label for="old_price">Старая цена</label>
                                                <input type="number" id="old_price" name="old_price" value="<?= $rows['price'] ?>" readonly style="font-weight: bold" placeholder="1000">
                                            </div>
                                            <div>
                                                <label for="new_price">Новая цена</label>
                                                <input type="number" id="new_price" name="new_price">
                                            </div>

                                            <div>
                                                <label for="sale_percent">Скидка в процентах</label>
                                                <input type="number" id="sale_percent" name="sale_percent" placeholder="10">
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </fieldset>

                                <button type="submit" id="sub_but">Сохранить изменения</button>
                            </form>

                        </section>
                    <?php endif; ?>

                <?php endif; ?>


                <?php if ($_GET['change'] === 'orders') : ?>

                    <?php
                    $sql = "SELECT * FROM `orders`";
                    $result = mysqli_query($link, $sql);
                    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    ?>
                    <section class="orders">
                        <h2>Данные по заказам</h2>
                        <table>
                            <tr>
                                <th>Номер заказа</th>
                                <th>id товара</th>
                                <th>Название товара</th>
                                <th>Кол-во</th>
                                <th>Тип</th>
                                <th>Контакты(имя мейл фон)</th>
                                <th>Адрес</th>
                                <th>Дата доставки/самовывоза</th>
                                <th>Способ оплаты</th>
                                <th>Дата заказа</th>
                            </tr>
                            <?php for ($i = 0; $i < count($rows); $i++) : ?>
                                <tr>
                                    <td class="class1"><?= $rows[$i]['Номер заказа'] ?></td>
                                    <td class="class2"><?= $rows[$i]['id товара'] ?></td>
                                    <td class="class3"><?= $rows[$i]['Название товара'] ?></td>
                                    <td class="class4"><?= $rows[$i]['Количество'] ?></td>
                                    <td class="class5"><?= $rows[$i]['Тип заказа'] ?></td>
                                    <td class="class6"><?= $rows[$i]['Имя'] ?> / <?= $rows[$i]['Телефон'] ?> / <?= $rows[$i]['Email'] ?></td>
                                    <td class="class7"><?= $rows[$i]['Адрес'] ?></td>
                                    <td class="class8"><?= $rows[$i]['Дата доставки'] ?> / <?= $rows[$i]['Дата самовывоза'] ?></td>
                                    <td class="class9"><?= $rows[$i]['Способ оплаты'] ?></td>
                                    <td class="class10"><?= $rows[$i]['Дата заказа'] ?></td>
                                </tr>

                                <?php if ($rows[$i]['Номер заказа'] != $rows[$i + 1]['Номер заказа']) : ?>
                                    <tr class="padding">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php endif; ?>

                            <?php endfor; ?>
                        </table>
                    </section>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="add_to_catalog.js"></script>
    <script src="remove_catalog.js"></script>
    <script src="catalog_sales.js"></script>
</body>

</html>