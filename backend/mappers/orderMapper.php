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

    public function getOrderbyID($ID)
    {
        $this->query = "select * from orders where ord_ID=:ID";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":ID", $ID);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllOrders()
    {
        $this->query = "select * from orders";
        $statement = $this->conn->prepare($this->query);
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


    public function insertOrder($userID, $fullname, $street, $city, $zip, $date, $price)
    {
        $this->query = "insert into orders (ord_user, ord_fullname, ord_street, ord_city, ord_zip, ord_date, ord_price) values (:user,:fullname,:street,:city,:zip,:date,:price)";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":user", $userID);
        $statement->bindParam(":fullname", $fullname);
        $statement->bindParam(":street", $street);
        $statement->bindParam(":city", $city);
        $statement->bindParam(":zip", $zip);
        $statement->bindParam(":date", $date);
        $statement->bindParam(":price", $price);
        $statement->execute();
    }

   

}
