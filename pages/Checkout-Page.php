<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>&copy; Star-Food | Checkout</title>
        <link rel="stylesheet" href="../css/checkout-page.css">
    </head>
    
    <body>
            <div class="header-shadow">
            </div>
        <main>
                        
                        

                <?php

                include_once ('..\backend\productMapper.php');
                include ('..\backend\removeProduct.php');

                $cart = $_SESSION['cart'];

                if(count($cart) == 0){
                    echo '
                    <div class="productList">
                    <table class="t01">
                        <h1 class="productsTitle">Products</h1>
                        <tr>
                            <td width="100%" height="100px">There are no products on your cart</td>
                        </tr>
                        <tr>
                            <td width="100%" height="50px"><a class="addProductsButton" href="../index.php">Add Products</a></td>
                        </tr>
                    </table>
                    </div>
                    ';
                }else{

                    echo'
                        <div class="productList">
                        <table class="t01">
                        <col style="width:20%">
                        <col style="width:50%">
                        <col style="width:10%">
                        
                        
                            <h1 class="productsTitle">Products</h1>

                            <tr hidden>
                                <th>prod_img</th>
                                <th>Checkout</th> 
                                <th>prod_price</th>
                                <th>remove_button</th>
                            </tr>
                    ';

                    $mapper =  new ProductMapper();
                    

                    $prodIndex = 0;
                    $TotalPrice = 0;

                    foreach($cart as $prd_ID){
                        $product = $mapper->getProductbyID($prd_ID);

                        while(!(array_key_exists($prodIndex, $cart))){
                            $prodIndex++;
                        }
                        
                        if($product[0]['prod_category'] == 0){
                            echo'
                                <tr>
                                    <td hidden>'.$prodIndex.'</td>
                                    <td class="tdImg"><img src="../'.$product[0]['prod_img'].'" width="85px" height="65px"></td>
                                    <td class="tdName">'.$product[0]['prod_name'].'</td>
                                    <td>€'.$product[0]['prod_price'].'</td>
                                    <td><a class="removeButton" href="../backend/removeProduct.php?id='.$prodIndex.'">Remove</a></td>
                                </tr>
                            ';
                        }else{ // beacuse of image difference
                            echo'
                                <tr>
                                    <td hidden>'.$prodIndex.'</td>
                                    <td class="tdImg"><img src="../'.$product[0]['prod_img'].'" width="35px" height="65px"></td>
                                    <td class="tdName">'.$product[0]['prod_name'].'</td>
                                    <td>€'.$product[0]['prod_price'].'</td>
                                    <td><a class="removeButton" href="../backend/removeProduct.php?id='.$prodIndex.'">Remove</a></td>
                                </tr>
                            ';
                        }
                        $prodIndex++;
                        $TotalPrice += $product[0]['prod_price'];
                    }

                  
                    
                    echo '
                        <tr>
                            <th class="lastRow">Total</th>
                            <th></th> 
                            <th>€'.$TotalPrice.'</th>
                            <th><a class="orderButton">Complete Order<img src="../img/cart.png" width="20px"></a></th>
                        </tr>
                                
                        </table>
                    </div>
                    ';


                }
                    
                ?>

                        
            
        </main>
        
    </body>

    <style>

    </style>
</html>