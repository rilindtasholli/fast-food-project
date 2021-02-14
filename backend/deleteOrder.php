<?php
include_once 'mappers/orderMapper.php';
include_once 'mappers/OrderProductMapper.php';
if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    $orderproductmapper = new OrderProductMapper();
    $orderproductmapper->deleteProductsByOrderID($orderId);

    $ordermapper = new orderMapper();
    $ordermapper->deleteOrder($orderId);

    header("Location:../pages/Dashboard.php?id=orders");
}

