<?php
require_once "databaseConfig.php";

class ProductMapper extends DatabasePDOConfiguration
{

    private $conn;
    private $query;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getFoodProduct()
    {
        $this->query = "select * from products where prod_category=0";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getDrinkProduct()
    {
        $this->query = "select * from products where prod_category=1";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProductbyID($ID)
    {
        $this->query = "select * from products where prod_ID=:ID";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":ID", $ID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllProducts()
    {
        $this->query = "select * from products";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
