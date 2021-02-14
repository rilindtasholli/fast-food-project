<div id="orders" class=" table" >
            <h1 class="usersTitle">Orders</h1>
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
                        <td>Confirm/Cancel</td>
                        <td>Delete Order</td>
                        
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
                                    <td style="color:green;font-weight:500;">'.$order['ord_confirm'].'</td>
                                    <td><a class="removeButton" href="../backend/cancelOrder.php?id='.$order['ord_ID'].'"
                                    >Cancel Order</td>
                                    ';
                                }else if($order['ord_confirm'] == "Order Canceled"){
                                    echo '
                                    <td style="color:red;">'.$order['ord_confirm'].'</td>
                                    <td><a class="confirmButton" href="../backend/confirmOrder.php?id='.$order['ord_ID'].'"
                                        >Confirm Order</td>
                                    ';
                                }else{
                                    echo '
                                    <td >'.$order['ord_confirm'].'</td>
                                    <td><a class="confirmButton" href="../backend/confirmOrder.php?id='.$order['ord_ID'].'"
                                        >Confirm Order</td>
                                    ';
                                }
                            ?>
                            <td><a class="removeButton" href=<?php echo "../backend/deleteOrder.php?id=" . $order['ord_ID'];
                                        ?>>Delete</td>            
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>