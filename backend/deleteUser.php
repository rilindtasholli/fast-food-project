<?php
include_once 'mappers/userMapper.php';
session_start();
if($_SESSION['role']==0){
    header("Location:../index.php");
}
else{

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $mapper = new UserMapper();
        $mapper->deleteUser($userId);
        header("Location:../pages/Dashboard.php");
    }
    
}


