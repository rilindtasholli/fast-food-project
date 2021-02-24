<?php
include_once 'mappers/orderMapper.php';
include_once 'mappers/OrderProductMapper.php';
session_start();
if($_SESSION['role']==0){
    header("Location:../index.php");
}

else{
    if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    $orderproductmapper = new OrderProductMapper();
    $orderproductmapper->deleteProductsByOrderID($orderId);

    $ordermapper = new orderMapper();
    $ordermapper->deleteOrder($orderId);

    header("Location:../pages/Dashboard.php?id=orders");
    }
}