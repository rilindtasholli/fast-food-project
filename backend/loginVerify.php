<?php
include_once 'adminClass.php';
include_once 'simpleUserClass.php';
require_once 'mappers/userMapper.php';
session_start();

if (isset($_POST['login-btn'])) {
    $login = new LoginLogic($_POST);
    $login->verifyData();
} else if (isset($_POST['register-btn'])) {
    $register = new RegisterLogic($_POST);
    $register->insertData();
} else {
    header("Location:../index.php");
}

class LoginLogic
{
    private $email = "";
    private $password = "";

    public function __construct($formData)
    {
        $this->email = $formData['login-email'];
        $this->password = $formData['login-password'];
    }

   
    public function verifyData()
    {
        
        if ($this->variablesNotDefinedWell($this->email, $this->password)) {
            echo '1';
            header("Location:../pages/Login.php?id=error");
        }
         if ($this->usernameAndPasswordCorrect($this->email, $this->password)) {
            echo '1';
           
        } else {
            echo '2';
            header("Location:../pages/Login.php?id=error");
        }
    }


    private function variablesNotDefinedWell($email, $password)
    {
        if (empty($email) || empty($password)) {
            return true;
        }
        return false;
    }


    private function usernameAndPasswordCorrect($email, $password)
    {
        $mapper = new UserMapper();
        $user = $mapper->getUserByEmail($email);
        if ($user == null || count($user) == 0) return false;
        else if (password_verify($password, $user['usr_password'])) { 
            if ($user['usr_role'] == 1) {
                $obj = new Admin($user['usr_ID'],$user['usr_fullname'], $user['usr_email'], $user['usr_password'], $user['usr_role']);
                $obj->setSession();
                header('Location:../pages/Dashboard.php');
            } else {
                $obj = new SimpleUser($user['usr_ID'],$user['usr_fullname'], $user['usr_email'], $user['usr_password'], $user['usr_role']);
                $obj->setSession();
                header('Location:../index.php');
            }
            return true;
        } else return false;
    }

}

class RegisterLogic
{
    private $fullname = "";
    private $password = "";
    private $email = "";

    public function __construct($formData)
    {
        $this->fullname = $formData['register-fullname'];
        $this->password = $formData['register-password'];
        $this->email = $formData['register-email'];
    
       
    }


    public function insertData()
    {
     
        $user = new SimpleUser($userid,$this->fullname, $this->email ,$this->password ,0);

        $mapper = new UserMapper();
        $emailExists = $mapper->emailExist($user->getEmail());
        $emailExists;
      
        if($emailExists == true){
            header("Location:../pages/Login.php?id=email");
        }else{
            $mapper->insertUser($user);
            header("Location:../pages/Login.php");
        }
        
       
    }
}
