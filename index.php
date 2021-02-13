<?php

    session_start();

    if(!(isset($_SESSION['cart']))) {
        $_SESSION['cart'] = array();
    }


   
    if(isset($_POST['addToCart'])){
        array_push($_SESSION['cart'],$_POST['prod_ID']);
        header('Location: index.php?id='.$_POST['prod_ID']); //prevent adding product automatically to cart when refreshing
    }
   
    /*
    echo "<pre>";
    print_r($_SESSION['cart']);
    echo "</pre>";
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> &copy; Star-Food | Order Food Online </title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>

    <body>
        <div id="goTop" onclick="goTopFunction()">
            <img src="img/up-arrow.webp"/>
        </div>
        <?php
                    $prodCount = count($_SESSION['cart']);
                    $color;

                    if($prodCount != 0){
                        $color = "#f19100;";
                    }else{
                        $color = "#ffffff;";
                    }

                    echo '
                        <div class="cart" onclick="goToCheckOut()" style="background-color:'.$color.';">
                        <img src="img/cart.png" width="30px" height="28px">
                        <a>'.$prodCount.'</a>
                        </div>
                    ';

                ?>
        <header>
    
            <div id="slideshow">
                <div>
                    <img src="img/header-background/header-background-1.jpg">
                </div>

                <div>
                    <img src="img/header-background/header-background-2.jpg">
                </div>
            
                <div>
                    <img src="img/header-background/header-background-3.jpg" >
                </div>
            </div>
            
            <div class="header-shadow">
            </div>
           
            <div class="header-text">
                <h1>Welcome to <span>[Star-Food]</span></h1>
                <h3>Ekipi yne ka per synim te ju ofroj ushqim kualitativ, 
                    te shendetshem dhe te fresket. Jemi gati per ty!!!
                </h3>
                <a class="menu-button" href="#food-section">Order Now</a>
            </div>
            <div class="navigation-bar">
               
                
                <ul class="ul-list">
                    <?php
                        if(isset($_SESSION['role'])){
                        if($_SESSION['role']== 1){
                            echo ' <a href="pages/Dashboard.php">Dashboard</a>';
                        }
                    }
                    ?>
                    <a href="/" class="active">Home</a>
                    <a href="pages/About-Us.php">About</a>
                    <a href="pages/Contact Us.php">Contact</a>
                    <a href="pages/Login.php">Account</a> 
                </ul>     
            </div>
        </header>
        <main>
            <div id="food-section">
                <h1 class="food-text-seperator">Order Food</h1>
                <div class="food-menu">

                    <?php 
                    define('root', __DIR__);
                    include_once (root . '/backend/mappers/productMapper.php');

                    

                    $mapper =  new ProductMapper();
                    $productList = $mapper->getFoodProduct(); //foods
                        foreach($productList as $product){
                            echo'
                            <div class="item">
                                <img src="'.$product['prod_img'].'" width="150px">
                                <h2>'.$product['prod_name'].'</h2>
                                <h3>€'.$product['prod_price'].'</h3>
                                <form method="post" >
                                    <input type="hidden" name="prod_ID" id="prod_ID" value='.$product['prod_ID'].'>
                                    <input class="item-button" type="submit" name="addToCart" value="Add To Cart">
                                    <br>
                                </form>
                            </div>
                            ';
                        }
                        
                    ?>

                </div>

                <h1 class="food-text-seperator" style="margin-top: 12vh;">Order Drinks</h1>
                <div class="drinks-menu">
                        
                <?php 
                   
                    include_once (root . '/backend/mappers/productMapper.php');
                    
                    $mapper =  new ProductMapper();
                    $productList = $mapper->getDrinkProduct(); //drinks
                        foreach($productList as $product){
                            echo'
                            <div class="item">
                                <img src="'.$product['prod_img'].'" width="65px">
                                <h2>'.$product['prod_name'].'</h2>
                                <h3>€'.$product['prod_price'].'</h3>
                                <form method="post" >
                                    <input type="hidden" name="prod_ID" id="prod_ID" value='.$product['prod_ID'].'>
                                    <input class="item-button" type="submit" name="addToCart" value="Add To Cart">
                                    <br>
                                   
                                </form>
                            </div>
                            ';
                        }
                    ?>
                    
                </div>
                
            </div>
        </main>
                    
        <?php include 'components/footer.php';?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/main.js"></script>

</body>

 

</html> 