<?php
include_once '../backend/mappers/userMapper.php';
include_once '../backend/mappers/productMapper.php';
include_once '../backend/mappers/messagesMapper.php';

session_start();

if (isset($_SESSION["role"]) && $_SESSION['role'] == '1') {
    $usermapper =  new UserMapper();
    $userList = $usermapper->getAllUsers();

    $productmapper =  new ProductMapper();
    $productList = $productmapper->getAllProducts();

    $messagesmapper =  new MessagesMapper();
    $messagesList = $messagesmapper->getAllMessages();

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
        <a id="usersButton" class="button clicked" onclick="showUsers()">Users</a>
        <a id="productsButton" class="button" onclick="showProducts()">Products</a>
        <a id="messagesButton" class="button" onclick="showMessages()">Messages</a>
            <?php
                include '../components/dashboard/users.php';
                include '../components/dashboard/products.php';
                include '../components/dashboard/messages.php';
            ?>
        <main>
    </div>
</body>

<script>
     function showUsers(){
            document.getElementById("users").classList.remove("hidden");
            document.getElementById("products").classList.add("hidden");
            document.getElementById("messages").classList.add("hidden");

            document.getElementById("usersButton").classList.add("clicked");
            document.getElementById("productsButton").classList.remove("clicked");
            document.getElementById("messagesButton").classList.remove("clicked");
        }

        function showProducts(){
            document.getElementById("products").classList.remove("hidden");
            document.getElementById("users").classList.add("hidden");
            document.getElementById("messages").classList.add("hidden");

            document.getElementById("usersButton").classList.remove("clicked");
            document.getElementById("productsButton").classList.add("clicked");
            document.getElementById("messagesButton").classList.remove("clicked");
        }

        function showMessages(){
            document.getElementById("products").classList.add("hidden");
            document.getElementById("users").classList.add("hidden");
            document.getElementById("messages").classList.remove("hidden");

            document.getElementById("usersButton").classList.remove("clicked");
            document.getElementById("productsButton").classList.remove("clicked");
            document.getElementById("messagesButton").classList.add("clicked");
        }

</script>
