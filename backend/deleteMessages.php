<?php
include_once 'mappers/messagesMapper.php';
session_start();
if($_SESSION['role']==0){
    header("Location:../index.php");
}

else{
    if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $mapper = new MessagesMapper();
    $mapper->deleteMessages($userId);
    header("Location:../pages/Dashboard.php?id=messages");
    }   

}