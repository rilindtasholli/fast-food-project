<?php
require_once 'personClass.php';


class Admin extends Person
{
    public function __construct($userid, $username, $password, $age, $role)
    {
        parent::__construct($userid, $username, $password, $age, $role); //equivalent to super in java
        
    }


    public function setSession()
    {   
        
        $_SESSION['username'] = $this->getUsername();
        $_SESSION["role"] = 1;
        $_SESSION['roleName'] = "Administrator";
        
       
    }

    public function setCookie()
    {
        setcookie("username", $this->getUsername(), time() + 2 * 24 * 60 * 60);
    }

    public function getLastname()
    {
        return $this->lastname;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getRole()
    {
        return $this->role;
    }
}
