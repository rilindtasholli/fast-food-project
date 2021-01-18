<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact-page.css">
    <title>&copy; Star-Food | Contact Us</title>
</head>

<body>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <div class="container">
    
        <div class="header-shadow">
        </div>

        <div class="navigation-bar">
          <ul class="ul-list">
              <a href="../index.php">Home</a>
              <a href="../pages/About-Us.php">About</a>
              <a href="../pages/Contact Us.php" class="active">Contact</a>
              <a href="../pages/Account.php">Account</a> 
          </ul>     
      </div>
      
        <div class="mainDiv">
            <div class="info-container">  
              <h3>Address:</h3>
              <label>Rruga 105, Prishtine, 10000</label>

              <h3>Tel:</h3>
              <label>+383 49 113 450</label>
              <label>+383 45 369 413</label>

              <h3>Email:</h3>
              <label>info@starfood.com</label>

              <div class="social-media">
                <a target="_blank" href="https://www.facebook.com/Rilind.56"> <img src="../img/fbIcon.png"> </a>
                <a target="_blank" href="https://www.instagram.com/besart.ibishi/"><img src="../img/igIcon.png"></a> 
               </div>
            </div>

            <div class="contact-container">
             
                <h3>Contact Us</h3>
              
              
              <form id="login" class="contact-container-form">  
                
                <input type="text" class="input-field"  placeholder="Full Name" />
                
                <input type="email"  class="input-field"  placeholder="Email" />
                
                <textarea id="message" name="message" class="input-field" placeholder="Write a message..."></textarea>
                <button type="submit" class="input-submit" onclick="validate();return false;">Submit</button>
              </form>
            </div>
           

        </div>
        
</div>    
         
              

<script>
  
  function validate(){
          
          const emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          
          var inputElements = document.getElementsByClassName('input-field');
         
      
              
              var emailInput = inputElements[1].value;
              var fullNameInput = inputElements[0].value;
              var messageInput = inputElements[2].value;
              if(emailInput == "" || fullNameInput == "" || messageInput == ""){
                  alert("(Login Fail) - Ju lutem plotesoni hapesirat!");
                  
                  return false; //prevent page refresh
                  
              }else{
                  
                  if(!emailRegex.test(emailInput)){
                      alert("(Login Fail) - emaili nuk eshte valid");
                      return false; //prevent page refresh
                  }
                  else{
                      alert("Message sent successfully!");
                  }
                  
              }
              console.log("Full Name " + fullNameInput);
              console.log("Email: " + emailInput);
              event.defaultPrevented();

  }

</script>
</body>

         




 </html>