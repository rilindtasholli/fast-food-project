<?php
include_once 'mappers/messagesMapper.php';
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $mapper = new MessagesMapper();
    $mapper->deleteMessages($userId);
    header("Location:../pages/Dashboard.php");
}

