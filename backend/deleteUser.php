<?php
include_once 'mappers/userMapper.php';
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $mapper = new UserMapper();
    $mapper->deleteUser($userId);
    header("Location:../pages/Dashboard.php");
}

