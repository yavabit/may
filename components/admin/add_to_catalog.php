<?php
session_start();

require('../db_config.php');

//$photo = $_FILES['mainPhoto'];

$title = $_POST['title'];
//$price = $_POST['price'];
$category = $_POST['category'];
$type = $_POST['type'];

$special = $_POST['special'];

if ($special == 'new') {
    $new = 1;
    $pop = 0;
} else if ($special == 'pop') {
    $new = 0;
    $pop = 1;
} else if ($special == 0) {
    $new = 0;
    $pop = 0;
}

if($_POST['price'] != '')
    $price = $_POST['price'];
else if($_POST['price'] == '' && $_POST['sale_price'] != '' && $_POST['cur_price'] != '') {
    $price = $_POST['cur_price'];
    $old_price = $_POST['sale_price'];
}

if (add_photos(count($_FILES), $title, $price, $old_price, $category, $type, $new, $pop)) {
    header('Location: admin_info.php?change=catalog&type=add');
} else echo ('Ошибка');


function add_photos($countFiles, $title, $price, $old_price, $category, $type, $new, $pop)
{
    require('../db_config.php');

    $photo = $_FILES['mainPhoto'];
    $target = "../../img/catalog-items/" . basename($photo['name']);
    move_uploaded_file($photo['tmp_name'], $target);

    $img = 'img/catalog-items/' . basename($photo['name']);

    $sql = "INSERT INTO `catalog` (`title`,`imgUrl`,`category`,`type`,`price`,`is_new`,`is_popular`) values ('$title','$img','$category','$type','$price','$new','$pop')";
    $result = mysqli_query($link, $sql);

    $sql = "SELECT max(`id`) as id FROM `catalog`";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);

    if($old_price != '') {
        $sale = $old_price - $price;
        $sql = "INSERT INTO `sales` (`id`,`old_price`,`Скидка`) values ('{$row['id']}','$old_price','$sale')";
        $result = mysqli_query($link, $sql);
    }

    if ($countFiles > 2 && !empty($_FILES['add_photo_1']['name'])) {


        $add_imgs = array();

        foreach ($_FILES as $key => $photo) {

            if ($key != 'mainPhoto') {
                $target = "../../img/catalog-items/" . basename($photo['name']);
                move_uploaded_file($photo['tmp_name'], $target);

                if (basename($photo['name']) != '') {
                    $add_imgs[] = 'img/catalog-items/' . basename($photo['name']);
                }
            }
        }
        $sql = "INSERT INTO `items images` (`id`,`imgUrl_1`,`imgUrl_2`,`imgUrl_3`) values ('{$row['id']}','$add_imgs[0]','$add_imgs[1]','$add_imgs[2]')";
        $result = mysqli_query($link, $sql);
    }

    if ($result) {
        return true;
    } else return false;
}
