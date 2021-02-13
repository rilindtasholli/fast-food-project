<?php 
    session_start();

   if(isset($_SESSION['cart'])){
        if (isset($_GET['id'])) {
            $prodIndex = $_GET['id'];
            
            if($prodIndex == 'all'){
                $_SESSION['cart'] = array();
                header('Location:../pages/Checkout-Page.php');
            }else{
                unset($_SESSION['cart'][$prodIndex]);
                print_r($_SESSION['cart']);
                header('Location:../pages/Checkout-Page.php');
            }
            
        }
   }

    
    

?>