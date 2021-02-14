
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>&copy; Star-Food | Account</title>
        <link rel="stylesheet" href="../css/account-page.css">
    </head>
    

    <body>
        <div class="header-shadow">
        </div>
       <div class="container">
        <a id="home-button" class="home-button" href="../index.php">Home</a>
           <div class="main-container">
                
                <div class="main-form-container">
               
                     <div class="mainForm">
                        <a style="color:white;"><?php session_start(); echo $_SESSION['fullname']?></a>
                        <a style="color:gray;"><?php echo $_SESSION['email']?></a>
                        <?php echo '<a class="ordersButton" href="View-Orders.php?id='.$_SESSION['userID'].'">My Orders</a>'?>
                        

                        <a class="logout-button" href="../backend/logout.php">Logout</a>
                    </div>
                </div>
           </div>
            
        </div>
        <?php include '../components/footer.php';?>      
        
    </body>
    


</html>