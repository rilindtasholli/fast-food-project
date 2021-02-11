<?php

    if(isset($_POST['submit-btn'])){
        $fullname = $_POST['contact-fullname'];
        $emailfrom = $_POST['contact-email'];
        $subject = $_POST['contact-subject'];
        $message = $_POST['message'];
 
        $emailto = "besartibishi1@gmail.com";
        $headers = "From: ".$emailfrom;
        $txt = "You have recived an e-mail from ".$fullname. ".\n\n".$message;

        mail($emailto, $subject, $txt, $headers);
        header("Location: ../index.php?mailsend");
    }


?>
