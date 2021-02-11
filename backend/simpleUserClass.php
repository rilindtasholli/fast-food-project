<?php
include_once 'personClass.php';

class SimpleUser extends Person
{
    //private $lastname;
    public function __construct($userid, $fullname, $email,$password ,$role, /*$lastname*/)
    {
        parent::__construct($userid, $fullname, $email,$password, $role);
        //$this->lastname = $lastname;
    }

    public function setSession()
    {
        $_SESSION['fullname'] = $this->getFullName();
        $_SESSION["role"] = "0";
        $_SESSION['roleName'] = "SimpleUser";
        
        
    }

    public function setCookie()
    {
        setcookie("fullname", $this->getFullName(), time() + 2 * 24 * 60 * 60);
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
