<?php session_start(); 

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');
require_once('functions/email.php');

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++; //checking for error messages.
$_SESSION['email'] = $email;


//display proper error messages to the user.
//Give more accurate feedback to the user.
if($errorCount > 0){

    $Session_error = "You have " . $errorCount . " error";
       
    if($errorCount > 1) {
            $Session_error .= "s";
    }

    $Session_error .=   " in your Form Submission";

    set_alert('error', $Session_error);
    
    redirect_to("forgot.php");

}else{

    
    $allUsers = scandir("db/users/"); //check if the user exists in the database/file  
    $countAllUsers = count($allUsers); //count all of the users

//check if the user already exist in a db or file
        //** Look into the allUser array and check if the email already exist using their email..we'll do this using loop
        for ($counter = 0; $counter < $countAllUsers ; $counter++) {

            $currentUser = $allUsers[$counter]; //current user we are testing if it already exists
    
            if($currentUser == $email . ".json"){
            //This, now sends the email and redirect to the reset password page
                   
            $token = generate_token();

            $subject = "Password Reset Link";
            $message = "A password reset has been initiated from your account, if you did not initiate this 
            reset, please ignore this message, otherwise, 
            visit: localhost/snh-v2/reset.php?token=".$token;
                                     
            file_put_contents("db/tokens/". $email . ".json", json_encode(['token'=>$token]));
           
            send_mail($subject,$message,$email);
            die();
                }
            }
            set_alert('error',"Email not registered ERR:  "  . $email);
            redirect_to("forgot.php"); 
        }