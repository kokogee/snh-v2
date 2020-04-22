<?php session_start();
    require_once('functions/user.php');
    require_once('functions/alert.php');
    require_once('functions/redirect.php');

//collecting the data
$errorCount = 0; //checking for error messages.

if(!is_user_loggedIn(){
    $token = $_POST['token'] != "" ? $_POST['token'] : $errorCount++;
    $_SESSION['token'] = $token;
}


$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

//session storage
$_SESSION['email'] = $email;

if($errorCount > 0){
    //..if the error is greater than Zero, then there's an error somewhere..
    //...let it be sent back to the registration page with the error message.
    $Session_error = "You have " . $errorCount . " error";
        if($errorCount > 1) {
            $Session_error .= "s";
    }

    $Session_error .=   " in your Form Submission";
    set_alert('error',$Session_error);
    redirect_to("reset.php");

}else{
    $checkToken = is_user_loggedIn() ? true :  find_token($email);
//Actual reset things here
/**
 * check that the email is registered in tokens folder
 * check if the content of the registered token (in our folder) is thesame as $token;
 */
       
        if($checkToken){
            
        $userExists = find_user($email);

        if($userExists){  //if the user is found..
        //check the user password
        
        $userObject = find_user($email);
    
        $userObject->password = password_hash($password, PASSWORD_DEFAULT);
        //Now, we have to delete the content or the user data and token
        unlink("db/users/".$currentUser);
        unlink("db/tokens/".$currentUser);

        save_user($userObject);

        set_alert('message',"Password Reset successful. You can now Login ");                
        /**
        * Here, now informs user of password reset. */
        $subject = "Password Reset Successful";
        $message = "Your account password has been updated, if you did not initiate the 
        password change, please visit: snh-v2.org and reset your password immediately";
        send_mail($subject,$message,$email);               
        
        redirect_to("login.php");
        return;
                
        } 
    }        
        set_alert('error',"Password Reset Failed, token/email invalid or expired"); 
        redirect_to("login.php");
}