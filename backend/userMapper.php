<?php
require_once "databaseConfig.php";

class UserMapper extends DatabasePDOConfiguration
{

    private $conn;
    private $query;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getUserByID($userId)
    {
        $this->query = "select * from users where usr_ID=:userid";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":userid", $userId);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    
    public function getUserByEmail($email)
    {
        $this->query = "select * from users where usr_email=:email";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUserByFullName($fullname)
    {
        $this->query = "select * from users where usr_fullname=:fullname";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":fullname", $fullname);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllUsers()
    {
        $this->query = "select * from users";
        $statement = $this->conn->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertUser(\SimpleUser $user)
    {
        $this->query = "insert into users (usr_fullname, usr_email, usr_password, usr_role) values (:fullname,:email,:pass,:role)";
        $statement = $this->conn->prepare($this->query);
        $fullname = $user->getFullName();
        $email = $user->getEmail();
        $pass = password_hash($user->getPassword(), PASSWORD_BCRYPT);
        $role = $user->getRole();
        $statement->bindParam(":fullname", $fullname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":pass", $pass);
        $statement->bindParam(":role", $role);
        $statement->execute();
    }

    public function deleteUser($userId)
    {
        $this->query = "delete from users where usr_ID=:id";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":id", $userId);
        $statement->execute();
    }

    
    public function edit($id, $fullname, $email)
    {
        $this->query = "update users set usr_fullname=:fullname, usr_email=:email where usr_ID=:id";
        
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":fullname", $fullname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }



}
