<?php
require_once "databaseConfig.php";

class OrderMapper extends DatabasePDOConfiguration
{

    private $conn;
    private $query;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getAllOrders()
    {
        $this->query = "select * from orders";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOrderbyID($ID)
    {
        $this->query = "select * from orders where ord_ID=:ID";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":ID", $ID);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOrdersbyUserID($ID)
    {
        $this->query = "select * from orders where ord_user=:ID";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":ID", $ID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getLastOrderByUserID($userID)
    {
        $this->query = "select * from orders where ord_ID=(select max(ord_ID) from orders where ord_user = :userID) ";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":userID", $userID);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function insertOrder($userID, $fullname, $street, $city, $zip, $date, $price, $confirm)
    {
        $this->query = "insert into orders (ord_user, ord_fullname, ord_street, ord_city, ord_zip, ord_date, ord_price, ord_confirm) values (:user,:fullname,:street,:city,:zip,:date,:price,:confirm)";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":user", $userID);
        $statement->bindParam(":fullname", $fullname);
        $statement->bindParam(":street", $street);
        $statement->bindParam(":city", $city);
        $statement->bindParam(":zip", $zip);
        $statement->bindParam(":date", $date);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":confirm", $confirm);
        $statement->execute();
    }

    public function changeConfirmOrder($ID, $confirm)
    {
        $this->query = 'update orders set ord_confirm = :confirm where ord_ID = :ID';
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":ID", $ID);
        $statement->bindParam(":confirm", $confirm);
        $statement->execute();
    }

    public function deleteOrder($orderID)
    {
        $this->query = "delete from orders where ord_ID=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $orderID);
        $statement->execute();
    }

}
