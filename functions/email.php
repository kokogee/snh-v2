<?php require_once('alert.php');
require_once('functions/redirect.php');
require_once('functions/email.php');

function send_mail($subject,$message,$email,$headers){}
    $subject = "Password Reset Successful";
    $message = "Your account password has been updated, if you did not initiate the 
    password change, please visit: snh-v2.org and reset your password immediately";
    $email = "";

    $headers = "From: no-reply@snh-v2.org" . "\r\n" .
    "CC: udofia@snh-v2.org";  

    $try = mail($subject,$message,$email,$headers);

    if($try){

    set_alert('message', "Password reset has been sent to your email: " . $email);
    //Then, send a success message  
     redirect_to("login.php");
 
}else{
         //Display error message
        set_alert('error', "Something went wrong, we could not send Password reset to :" . $email);
        redirect_to("forgot.php");
    }