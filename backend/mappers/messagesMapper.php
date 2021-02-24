<?php
require_once "databaseConfig.php";

class MessagesMapper extends DatabasePDOConfiguration
{

    private $conn;
    private $query;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getMessagesByID($ID)
    {
        $this->query = "select * from messages where msg_ID=:ID";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":ID", $ID);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllMessages()
    {
        $this->query = "select * from messages";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    public function insertMessage($fullname, $email, $subject, $message)
    {
        $this->query = "insert into messages (msg_fullname, msg_email, msg_subject, msg_message) values (:fullname,:email,:subject,:message)";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":fullname", $fullname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":subject", $subject);
        $statement->bindParam(":message", $message);
        $statement->execute();
    }

    public function deleteMessages($userId)
    {
        $this->query = "delete from messages where msg_ID=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $userId);
        $statement->execute();
    }

    
   

}
