<?php
    session_start();
    
    if(isset($_SESSION['fullname'])){
        header("Location: Account.php");
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>&copy; Star-Food | Account</title>
        <link rel="stylesheet" href="../css/login-page.css">
    </head>
    

    <body>
        <div class="header-shadow">
        </div>
       <div class="container">
            <a id="home-button" class="home-button" href="../index.php">Home</a>
           <div class="main-container">
                <div class="button-at">
                    <button id="login-button" type="button" class="Login-Register login-button clicked" onclick="login()">Login</button>
                    <button id="register-button" type="button" class="Login-Register register-button" onclick="register()">Register</button>
                </div>
                <div class="main-form-container">
                    
                    <div class="mainForm">
                        <form id="login" class="formLogin" action="../backend/loginVerify.php" method = "POST">  
                            <h2>Login to your account</h2>
                            <input type="text"  class="input-field" name = "login-email"  placeholder="Email"/>
                            <input type="password" class="input-field" name = "login-password" placeholder="Password"/>
                            <button type="submit" class="input-submit" name = "login-btn" onclick="validate(0);return false;">Login</button>
                        </form>
            
                        <form id="register" class="formRegister hidden" action="../backend/loginVerify.php" method = "POST">  
                            <h2>Create a new account</h2>
                            <input type="text"  class="input-field" name = "register-fullname" placeholder="Emri & Mbiemri"/>
                            <input type="text"  class="input-field" name = "register-email"  placeholder="Email"/>
                            <input type="password" class="input-field" name = "register-password" placeholder="Password"/>
                            <input type="password" class="input-field" placeholder="Confirm-Password"/>
                            <button type="submit" class="input-submit" name = "register-btn" onclick="validate(1);return false;">Register</button>
                        </form>
                    
                    </div>
                </div>
           </div>
            
        </div>
        <?php include '../components/footer.php';?>      
        
    </body>
    
    <script >
        function login(){
            document.getElementById("login").classList.remove("hidden");
            document.getElementById("register").classList.add("hidden");

            document.getElementById("login-button").classList.add("clicked");
            document.getElementById("register-button").classList.remove("clicked");
        }

        function register(){
            document.getElementById("register").classList.remove("hidden");
            document.getElementById("login").classList.add("hidden");

            document.getElementById("register-button").classList.add("clicked");
            document.getElementById("login-button").classList.remove("clicked");
        }


        

        function validate(number){
            
            const emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            const fullNameRegex =  /^([\w]{3,})+\s+([\w\s]{3,})+$/i;

            var inputElements = document.getElementsByClassName('input-field');
            
            if(number == 0){
                
                var emailInput = inputElements[0].value;
                var passwordInput = inputElements[1].value;
                if(emailInput == "" || passwordInput == ""){
                    alert("(Login Fail) - Ju lutem plotesoni hapesirat!");
                    
                    return false; //prevent page refresh
                    
                }else{
                    
                    if(!emailRegex.test(emailInput)){
                        alert("(Login Fail) - emaili nuk eshte valid");
                        return false; //prevent page refresh
                    }else{
                        //alert("Login successful");
                    }
                    
                }
                console.log("Email " + emailInput);
                console.log("Password: " + passwordInput);
                event.defaultPrevented();

            }else if(number == 1){
                
                var fullNameInput = inputElements[2].value;
                var emailInput = inputElements[3].value;
                var passwordInput = inputElements[4].value;
                var confirmPasswordInput = inputElements[5].value;

                if(fullNameInput == "" || emailInput == "" || passwordInput == "" || confirmPasswordInput == ""){
                    alert("Register Fail!  - Ju lutem plotesoni te gjitha hapesirat!");
                    return false; //prevent page refresh
                }else{
                    
                    if(!fullNameRegex.test(fullNameInput)){
                        alert("(Register Fail) - Emri dhe Mbiemri nuk jane valid!");
                        return false; //prevent page refresh
                    }
                    if(!emailRegex.test(emailInput)){
                        alert("(Login Fail) - emaili nuk eshte valid");
                        return false; //prevent page refresh
                    }
                    if(passwordInput.length < 8){
                        alert("(Register Fail) - Password duhet te kete te pakten 8 karaktere!");
                        return false; //prevent page refresh
                    }else if(passwordInput != confirmPasswordInput){
                        alert("(Register Fail) - Password duhet te jete i njejte!");
                        return false; //prevent page refresh
                    }


                    
                    changeForm(0);
                }
                event.defaultPrevented();
                
                
            }

        }
             
    
       
    
    </script>

</html>