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
        $_SESSION['userID'] = $this->getID();
        $_SESSION['fullname'] = $this->getFullName();
        $_SESSION['email'] = $this->getEmail();
        $_SESSION["role"] = "1";
        $_SESSION['roleName'] = "Administrator";
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
}
