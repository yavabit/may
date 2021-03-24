<?php
session_start();
include ('php-sdk-master/UnitPay.php');

// Project Data
$domain = 'unitpay.ru'; // Your working domain: unitpay.money or unitpay.ru
$secretKey  = 'ea9ef978cc333da87f95b09984d47212';
$publicId   = '401693-59755';

// My item Info
$itemName = 'Iphone 6 Skin Cover';

// My Order Data
$orderId        = 'a183f94-1434-1e44';
$orderSum       = $_SESSION['cart']['final_sum'];
$orderDesc      = 'Payment for item "' . 1 . '"';
$orderCurrency  = 'RUB';

$unitPay = new UnitPay($domain, $secretKey);

$unitPay
    ->setBackUrl('http://domain.com')
    ->setCustomerEmail('customer@domain.com')
    ->setCustomerPhone('79001235555')
    ->setCashItems(array(
       new CashItem($itemName, 1, $orderSum) 
    ));

$redirectUrl = $unitPay->form(
    $publicId,
    $orderSum,
    $orderId,
    $orderDesc,
    $orderCurrency
);

header("Location: " . $redirectUrl);