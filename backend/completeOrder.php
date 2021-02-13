<?php
    require_once 'mappers/orderMapper.php';
    require_once 'mappers/OrderProductMapper.php';
    session_start();

    $ordermapper = new OrderMapper();
    $orderproductmapper = new OrderProductMapper();

    print_r($_SESSION['order']);
    if(isset($_SESSION['order'])){
        $user = $_SESSION['userID'];
        $fullname = $_SESSION['order'][0];
        $street = $_SESSION['order'][1];
        $city = $_SESSION['order'][2];
        $zip = $_SESSION['order'][3];
        $date = date("Y/m/d");
        $price = $_SESSION['order'][4];
        

        $ordermapper->insertOrder($user, $fullname, $street, $city, $zip, $date, $price);
        $order = $ordermapper->getLastOrderByUserID($user); //get the most recent ord_ID created
        $orderID = $order['ord_ID'];
        foreach ($_SESSION["cart"] as $product) {
            $orderproductmapper->insertOrderProduct($orderID,$product); //add products from 'CART' to the order_produkt table
        }
       
        unset($_SESSION["order"]);
        unset($_SESSION["cart"]);
        
        
        header("Location: ../index.php");

    }else{
        header("Location: ../index.php");
    }

?>