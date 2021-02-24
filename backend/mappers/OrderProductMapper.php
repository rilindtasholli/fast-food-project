<?php
require_once "databaseConfig.php";

class OrderProductMapper extends DatabasePDOConfiguration
{

    private $conn;
    private $query;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getOrderProductbyID($ID)
    {
        $this->query = "select * from order_product where orpr_ID=:ID";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":ID", $ID);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProductsByOrderID($orderID)
    {
        $this->query = "select products.prod_ID, products.prod_name, products.prod_price, products.prod_img, products.prod_category 
        from orders INNER JOIN order_product 
        on orders.ord_ID = order_product.orderID INNER JOIN products 
        on products.prod_ID = order_product.productID 
        where orders.ord_ID = :orderID  ";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":orderID", $orderID);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertOrderProduct($ordID, $prodID)
    {
        $this->query = "insert into order_product (orderID,productID) values (:ordID,:prodID)";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":ordID", $ordID);
        $statement->bindParam(":prodID", $prodID);
        $statement->execute();
    }

    public function deleteProductsByOrderID($ID){
        $this->query = "delete from order_product where orderID = :ID";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":ID", $ID);
        $statement->execute();
    }

   

}
