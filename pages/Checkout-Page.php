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

            <a id="home-button" class="home-button" href="../index.php">Home</a>

            <div id="finish" class="finish-wait-container hidden">
                <img src="../img/cart.png" width="60px"></img>
                <p class="finish-wait-text">Finishing Order - Please Wait...</p>
            </div>   
        <main>
                   
                              

                <?php

                include_once ('..\backend\mappers\productMapper.php');
                include ('..\backend\removeProduct.php');

                if(!(isset($_SESSION['userID']))){ 
                    echo '<script>window.location.href = "Login.php";</script>';
                }

                $cart = $_SESSION['cart'];

                if(count($cart) == 0){
                    echo '
                    <div id="products" class="productList">
                    <table class="t01">
                        <h1 class="productsTitle">Products</h1>
                        <tr>
                            <td width="100%" height="100px">There are no products on your cart</td>
                        </tr>
                        <tr>
                            <td width="100%" height="50px"><a class="addProductsButton" href="../index.php#food-section">Add Products</a></td>
                        </tr>
                    </table>
                    </div>
                    ';
                }else{

                    echo'
                        <div id="products" class="productList">
                        <table class="t01">
                        <col style="width:20%">
                        <col style="width:50%">
                        <col style="width:10%">
                        
                        
                            <h1 class="productsTitle">Products </h1>

                            <tr >
                                
                                <th colspan="3"></th> 
                               
                                <th><a class="removeAllButton" href="../backend/removeProduct.php?id=all">Remove All</a></th>
                            </tr>
                    ';

                    $mapper =  new ProductMapper();
                    

                    $prodIndex = 0;
                    $TotalPrice = 0;

                    //shfaq te gjitha produktet qe jane ne 'Cart'
                    foreach($cart as $prd_ID){
                        $product = $mapper->getProductbyID($prd_ID);

                        while(!(array_key_exists($prodIndex, $cart))){
                            $prodIndex++;
                        }
                        
                      
                        echo'
                            <tr>
                                <td hidden>'.$prodIndex.'</td>
                                <td class="tdImg"><img src="../'.$product['prod_img'].'" height="65px"></td>
                                <td class="tdName">'.$product['prod_name'].'</td>
                                <td>€'.$product['prod_price'].'</td>
                                <td><a class="removeButton" href="../backend/removeProduct.php?id='.$prodIndex.'">Remove</a></td>
                            </tr>
                        ';
                      
                        $prodIndex++;
                        $TotalPrice += $product['prod_price'];

                        $TotalPrice = sprintf('%0.2f', $TotalPrice); //format float number (example: 5.2 -> 5.20)
                    }

                    echo '
                        <tr>
                            <th class="lastRow">Total</th>
                            <th></th> 
                            <th>€'.$TotalPrice.'</th>
                            <th><a class="continueOrderButton" onclick="showAddress()">Continue</a></th>
                        </tr>
                                
                        </table>
                    </div>
                    ';

                    if(count($cart) < 2){
                        $string = "(".count($cart)." product)";
                    }else{
                        $string = "(".count($cart)." products)";
                    }
                    

                    if(isset($_POST['complete-order-btn'])){
                        
                        echo '<script>document.getElementById("address").classList.add("hidden");</script>';

                        $_SESSION['order'] = array();
                        array_push($_SESSION['order'], $_POST['address-fullname']);
                        array_push($_SESSION['order'], $_POST['address-street']);
                        array_push($_SESSION['order'], $_POST['address-city']);
                        array_push($_SESSION['order'], $_POST['address-zip']);
                        array_push($_SESSION['order'], $TotalPrice);

                        echo '<script>
                        window.location.href = "../backend/completeOrder.php";
                        document.getElementById("products").classList.add("hidden");
                        document.getElementById("finish").classList.remove("hidden");  
                        </script>';
                        
                    }

                    echo 
                    '
                    <div id="address" class="address-div hidden">
                        <div class="address-container">
                        <a class="goBackToCartButton" onclick="showCart()">Go Back To Cart '.$string .'</a>
                            <h3>Address</h3>
                        
                            <form id="login" class="address-container-form" method="POST" >
                                <input type="text" class="input-field" name ="address-fullname" placeholder="Full Name" />
                                <input type="text"  class="input-field" name = "address-street" placeholder="Street" />
                                <input type="text"  class="input-field" name = "address-city" placeholder="City" />
                                <input type="text"  class="input-field" name = "address-zip" placeholder="Zip Code" />

                                <button hidden id="orderButton" type="submit"  name="complete-order-btn">complete order</button>
                            </form>
                        </div>
                        <div class="finish-order-container">
                    
                                
                                <p class="totalPrice">Total €'.$TotalPrice.'</p>
                                
                                <div>
                                <a class="completeOrderButton" onclick="validate()" >Complete Order<img src="../img/cart.png" width="20px"></a>
                                </div>
    
                            
                        </div>
                    </div>
                   
                        
                    ';
                }
                
                ?>      
      
            
        </main>
        
    </body>

    <script>
        function showAddress(){
            document.getElementById("address").classList.remove("hidden");
            document.getElementById("products").classList.add("hidden");
        }

        function showCart(){
            document.getElementById("address").classList.add("hidden");
            document.getElementById("products").classList.remove("hidden");
        }

        
        function completeOrder(){
            document.getElementById("orderButton").click();
        }


        function login(){
            document.getElementById("login").classList.remove("hidden");
            document.getElementById("register").classList.add("hidden");

            document.getElementById("login-button").classList.add("clicked");
            document.getElementById("register-button").classList.remove("clicked");
        }

        function register(){
            document.getElementById("register").classList.remove("hidden");
            document.getElementById("login").classList.add("hidden");

            document.getElementById("register-button").classList.add("clicked");
            document.getElementById("login-button").classList.remove("clicked");
        }


        

        function validate(){
        
            const fullNameRegex =  /^([\w]{3,})+\s+([\w\s]{3,})+$/i;
            const zipCodeRegex = /^[0-9]*$/;

            var inputElements = document.getElementsByClassName('input-field');
                
            var fullNameInput = inputElements[0].value;
            var streetInput = inputElements[1].value;
            var cityInput = inputElements[2].value;
            var zipInput = inputElements[3].value;

            if(fullNameInput == "" || streetInput == "" || cityInput == "" || zipInput == ""){
                alert("Ju lutem plotesoni te gjitha hapesirat!");
                return false; //prevent page refresh
            }else{
                
                if(!fullNameRegex.test(fullNameInput)){
                    alert("Emri dhe Mbiemri nuk jane valid!");
                    return false; //prevent page refresh
                }
                else if(!zipCodeRegex.test(zipInput)){
                    alert("Zip Code eshte dhene gabim");
                    return false; //prevent page refresh
                }else{
                    completeOrder()
                }
            }
            event.defaultPrevented();
           
                
        }
             
    
       
    
    </script>
</html>