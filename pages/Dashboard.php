<?php
include_once '../backend/mappers/userMapper.php';
include_once '../backend/mappers/productMapper.php';
include_once '../backend/mappers/orderMapper.php';
include_once '../backend/mappers/messagesMapper.php';

session_start();

if (isset($_SESSION["role"]) && $_SESSION['role'] == '1') {
    if(isset($_GET['id'])){
        if($_GET['id'] == "users"){
            $usermapper =  new UserMapper();
            $userList = $usermapper->getAllUsers();
        }else if($_GET['id'] == "products"){
            $productmapper =  new ProductMapper();
            $productList = $productmapper->getAllProducts();
        }else if($_GET['id'] == "orders"){
            $ordersmapper =  new OrderMapper();
            $ordersList = $ordersmapper->getAllOrders();
        }else if($_GET['id'] == "messages"){
            $messagesmapper =  new MessagesMapper();
            $messagesList = $messagesmapper->getAllMessages();
        }
    }else{
            $usermapper =  new UserMapper();
            $userList = $usermapper->getAllUsers();
    }
    

} else {
    header("Location:../index.php");
}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> &copy; Star-Food | Order Food Online </title>
    <link rel="stylesheet" href="../css/dashboard.css"/>
</head>
<body>
    <div>

        <a id="home-button" class="home-button" href="../index.php">Home</a>

        <main>
        <a id="usersButton" class="button" href="Dashboard.php?id=users">Users</a>
        <a id="productsButton" class="button" href="Dashboard.php?id=products">Products</a>
        <a id="ordersButton" class="button" href="Dashboard.php?id=orders">Orders</a>
        <a id="messagesButton" class="button" href="Dashboard.php?id=messages">Messages</a>
            <?php
                if(isset($_GET['id'])){
                    
                    if($_GET['id'] == "users"){
                        include '../components/dashboard/users.php';
                        echo '<script type="text/javascript">document.getElementById("usersButton").classList.add("clicked");</script>';
                    }else if($_GET['id'] == "products"){
                        include '../components/dashboard/products.php';
                        echo '<script type="text/javascript">document.getElementById("productsButton").classList.add("clicked");</script>';
                    }else if($_GET['id'] == "orders"){
                        include '../components/dashboard/orders.php';
                        echo '<script type="text/javascript">document.getElementById("ordersButton").classList.add("clicked");</script>';
                    }else if($_GET['id'] == "messages"){
                        include '../components/dashboard/messages.php';
                        echo '<script type="text/javascript">document.getElementById("messagesButton").classList.add("clicked");</script>';
                    }
                }else{
                    include '../components/dashboard/users.php';
                    echo '<script type="text/javascript">document.getElementById("usersButton").classList.add("clicked");</script>';
                }
                
                
            ?>
        <main>
    </div>
</body>

<script>
        function hideAll(){
            document.getElementById("users").classList.add("hidden");
                document.getElementById("products").classList.add("hidden");
                document.getElementById("orders").classList.add("hidden");
                document.getElementById("messages").classList.add("hidden");

                document.getElementById("usersButton").classList.remove("clicked");
                document.getElementById("productsButton").classList.remove("clicked");
                document.getElementById("ordersButton").classList.remove("clicked");
                document.getElementById("messagesButton").classList.remove("clicked");
        }

        function showUsers(){
            hideAll();
            document.getElementById("users").classList.remove("hidden");
            document.getElementById("usersButton").classList.add("clicked");
        }

        function showProducts(){
            hideAll();
            document.getElementById("products").classList.remove("hidden");
            document.getElementById("productsButton").classList.add("clicked");
        }

        function showOrders(){
            hideAll();
            document.getElementById("orders").classList.remove("hidden");
            document.getElementById("ordersButton").classList.add("clicked");
        }

        function showMessages(){
            hideAll();
            document.getElementById("messages").classList.remove("hidden");
            document.getElementById("messagesButton").classList.add("clicked");
        }

</script>
