<?php

abstract class Person
{   
    protected $userid;
    protected $fullname;
    protected $email;
    protected $password;
    protected $role;

    function __construct($userid, $fullname, $email, $password,$role)
    {   
        $this->userid = $userid;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    abstract protected function setSession();
    abstract protected function setCookie();
}
