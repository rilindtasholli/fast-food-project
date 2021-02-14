<?php
require_once 'personClass.php';


class Admin extends Person
{
    public function __construct($userid, $username, $password, $age, $role)
    {
        parent::__construct($userid, $username, $password, $age, $role); 
        
    }


    public function setSession()
    {
        $_SESSION['userID'] = $this->getID();
        $_SESSION['fullname'] = $this->getFullName();
        $_SESSION['email'] = $this->getEmail();
        $_SESSION["role"] = "1";
    }

    public function setCookie()
    {
        setcookie("fullname", $this->getFullName(), time() + 2 * 24 * 60 * 60);
    }

    public function getID()
    {
        return $this->userid;
    }
    public function getFullName()
    {
        return $this->fullname;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getRole()
    {
        return $this->role;
    }

    public function emailExist()
    {
        $this->query = "select exists(select 1 from users where usr_email = :email";
        $statement = $this->conn->prepare($this->query);
        $statement->bindParam(":email", $this->$email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result; //return 1 if true 0 if false
    }
}
