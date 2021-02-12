<div id="products" class="hidden table" >
            <h1 class="usersTitle">Products</h1>
            <table class="t01">
                
                    <tr class="th">
                        <td>ID</td>
                        <td>Img</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Edit</td>
                        <td>Delete</td>
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
                            <td><a class="editButton" href=<?php echo "../pages/Edit-Product.php?id=" . $product['prod_ID'];
                                        ?>>Edit</td>
                            <td><a class="removeButton" href=<?php echo "../backend/deleteProduct.php?id=" . $product['prod_ID'];
                                        ?>>Delete</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>