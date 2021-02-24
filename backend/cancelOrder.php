<?php
    require_once 'mappers/orderMapper.php';
    require_once 'mappers/OrderProductMapper.php';
    session_start();

    $ordermapper = new OrderMapper();

    if(isset($_GET['id'])){
        $orderID = $_GET['id'];
        $ordermapper->changeConfirmOrder($orderID, "Order Canceled");
        header("Location: ../pages/Dashboard.php?id=orders");
    }else{
        header("Location: ../index.php");
    }

?>