<?php
session_start();

require('components/db_config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM `catalog` WHERE id = $id";
$result = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($result);

$sql1 = "SELECT * FROM `items images` WHERE id = $id";
$result1 = mysqli_query($link, $sql1);
$rows_images = mysqli_fetch_array($result1);


$countItemsImages = false;
if (isset($rows_images)) {
    if (count($rows_images) > 0) {
        $countItemsImages = true;
    }
}


require('components/item_info.php');
