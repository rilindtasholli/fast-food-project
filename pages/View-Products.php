<?php
include_once '../backend/mappers/OrderProductMapper.php';
include_once '../backend/mappers/orderMapper.php';
session_start();



if (isset($_GET['id'])) {
    $orderID = $_GET['id'];
    $ordermapper = new orderMapper();
    $order = $ordermapper->getOrderbyID($orderID);

        if($ordermapper->orderExists($_SESSION['userID'],$orderID )==false){
            header("Location: ../index.php");
        }


    $productmapper = new OrderProductMapper();
    $productList = $productmapper->getProductsByOrderID($orderID);

    
}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> &copy; Star-Food | Order Food Online </title>
    <link rel="stylesheet" href="../css/dashboard.css"/>
</head>
<body>
        <a id="home-button" class="home-button" href="javascript:history.back()">Back</a>
    <main>
        <div class="table" >
            <h1 class="usersTitle">Order</h1>
            <table class="t01">
                
                    <tr class="th">
                        <td>ID</td>
                        <td>User_ID</td>
                        <td>Full Name</td>
                        <td>Street</td>
                        <td>City</td>
                        <td>Zip Code</td>
                        <td>Price</td>
                    </tr>
                
                <tbody>
                        <tr>
                            <td><?php echo $order['ord_ID']; ?></td>
                            <td><?php echo $order['ord_user']; ?></td>
                            <td><?php echo $order['ord_fullname']; ?></td>
                            <td><?php echo $order['ord_street']; ?></td>
                            <td><?php echo $order['ord_city']; ?></td>
                            <td><?php echo $order['ord_zip']; ?></td>
                            <td><?php echo $order['ord_price']; ?></td>
                </tbody>
            </table>
        </div>

        <div class="table" >
            <h1 class="usersTitle">Products</h1>
            <table class="t01">
                
                    <tr class="th">
                        <td>ID</td>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Category</td>                    
                    </tr>
                
                <tbody>
                    <?php
                    foreach ($productList as $product) {
                    ?>
                        <tr>
                            <td><?php echo $product['prod_ID']; ?></td>
                            <td><?php echo '<img src="../'.$product['prod_img'].'"  height="65px">' ?></td>
                            <td><?php echo $product['prod_name']; ?></td>
                            <td><?php echo $product['prod_price']; ?></td>
                            <td><?php echo $product['prod_category']; ?></td>   
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>