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
                    <a href="/" class="active">Home</a>
                    <a href="pages/About-Us.php">About</a>
                    <a href="pages/Contact Us.php">Contact</a>
                    <a href="pages/Account.php">Account</a> 
                </ul>     
            </div>
        </header>
        <main>
            <div id="food-section">
                <h1 class="food-text-seperator">Order Food</h1>
                <div class="food-menu">

                    <?php include "data/products.php";
                        $product1['img'] = 'img/menu/item2/sandwich.png';
                        echo'<div class="item">
                        <img src="'.$product1['img'].'" width="150px">
                        <h2>Hamburger</h2>
                        <h3>€2.50</h3>
                        <a class="item-button" href="#food-menu">Order</a>
                        </div>
                        ';
                    ?>

                   
                    <div class="item">
                        <img src="img/menu/item2/sandwich.png" width="150px">
                        <h2>Sandwich</h2>
                        <h3>€2.50</h3>
                        <a class="item-button" href="#food-menu">Order</a>
                    </div>
                    <div class="item">
                        <img src="img/menu/item3/french-fries.png" width="150px">
                        <h2>French-Fries</h2>
                        <h3>€2.50</h3>
                        <a class="item-button" href="#food-menu">Order</a>
                    </div>
                </div>


                <h1 class="food-text-seperator" style="margin-top: 12vh;">Order Drinks</h1>
                <div class="drinks-menu">
                    <div class="item">
                        <img src="img/menu/drinks/coca-cola.png" width="58px">
                        <h2>Coca-Cola</h2>
                        <h3>€0.50</h3>
                        <a class="item-button" href="#food-menu">Order</a>
                    </div>
                    <div class="item">
                        <img src="img/menu/drinks/fanta.png" width="54px">
                        <h2>Fanta</h2>
                        <h3>€0.50</h3>
                        <a class="item-button" href="#food-menu">Order</a>
                    </div>
                    <div class="item">
                        <img src="img/menu/drinks/sprite.png" width="54px">
                        <h2>Sprite</h2>
                        <h3>€0.50</h3>
                        <a class="item-button" href="#food-menu">Order</a>
                    </div>
                    <div class="item">
                        <img src="img/menu/drinks/ice-tea.png" width="60px">
                        <h2>Ice-Tea</h2>
                        <h3>€0.50</h3>
                        <a class="item-button" href="#food-menu">Order</a>
                    </div>
                    
                    
                </div>
                
            </div>
        </main>

        <footer>
            <h2>  <span>&copy; Start-Food,</span> Prishtine - 2020</h2>
        </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>

        <script src="js/main.js"></script>

</body>

 

</html> 