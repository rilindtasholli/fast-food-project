<?php
include_once '../backend/mappers/OrderProductMapper.php';
include_once '../backend/mappers/orderMapper.php';
session_start();

if($_SESSION['userID']!=$_GET['id']){
    header("Location: ../index.php");
}

if (isset($_GET['id'])) {
    $userID = $_GET['id'];

    $ordermapper = new orderMapper();
    $ordersList = $ordermapper->getOrdersbyUserID($userID);
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
        <div id="orders" class=" table" >
            <h1 class="usersTitle">My Orders</h1>
            <table class="t01">
                
                    <tr class="th">
                        <td>ID</td>
                        <td>User_ID</td>
                        <td>Full Name</td>
                        <td>Street</td>
                        <td>City</td>
                        <td>Zip Code</td>
                        <td>Price</td>
                        <td>View Products</td>
                        <td>Order Confirmation</td>
                    </tr>
                
                <tbody>
                    <?php
                    foreach ($ordersList as $order) {
                    ?>
                        <tr>
                            <td><?php echo $order['ord_ID']; ?></td>
                            <td><?php echo $order['ord_user']; ?></td>
                            <td><?php echo $order['ord_fullname']; ?></td>
                            <td><?php echo $order['ord_street']; ?></td>
                            <td><?php echo $order['ord_city']; ?></td>
                            <td><?php echo $order['ord_zip']; ?></td>
                            <td><?php echo $order['ord_price']; ?></td>

                            <td><a class="detailsButton" href=<?php echo "../pages/View-Products.php?id=" . $order['ord_ID'];
                                        ?>>View Products</td>

                            <?php
                                 if($order['ord_confirm'] == "Order Confirmed"){
                                    echo '
                                    <td style="color:green;font-weight:500;">'.$order['ord_confirm'].'</td>';
                                }else if($order['ord_confirm'] == "Order Canceled"){
                                    echo '
                                    <td style="color:red;">'.$order['ord_confirm'].'</td>';
                                }else{
                                    echo '
                                    <td >'.$order['ord_confirm'].'</td>';
                                }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>