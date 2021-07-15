<?php
session_start();

require('components/db_config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM `catalog` LEFT JOIN `sales` USING(id) WHERE id='$id'";//$sql = "SELECT * FROM `catalog` LEFT JOIN `sales` USING(id) WHERE category='$type'";
$result = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($result);

$sql1 = "SELECT * FROM `items images` WHERE id = $id";
$result1 = mysqli_query($link, $sql1);
$rows_images = mysqli_fetch_all($result1);

$countItemsImages = false;
if (isset($rows_images)) {
    if (count($rows_images) > 0) {
        $countItemsImages = true;
        if($rows_images[0][1] != '' && $rows_images[0][2] == '') {
            $counts = 1;
        } else if ($rows_images[0][3] != '') {
            $counts = 2;
        }

    }
}


require('components/item_info.php');
