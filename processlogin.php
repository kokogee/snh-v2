<?php session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');


//collecting the data
$errorCount = 0; //checking for error messages.

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['email'] = $email;

//display proper error messages to the user.
//Give more accurate feedback to the user.
if($errorCount > 0){
    //..if the error is greater than one, then there's an error somewhere..
    //...let it be sent back to the login page with the error message.
    $Session_error = "You have " . $errorCount . " error";
    if($errorCount > 1) {
        $Session_error .= "s";
    }
   
    $Session_error .=   " in your Form Submission";
       
    set_alert('error',$Session_error);   
    redirect_to("login.php");

//Runing a "For-loop" to go through all the users in a database.
}else{ //On Email validation; start by
    $currentUser = find_user($email);

        if($currentUser){  //if the user is found..
               
        $userString = file_get_contents("db/users/".$currentUser->email . ".json");
        $userObject = json_decode($userString);
        $passwordFromDB = $userObject->password;

        $passwordFromUser = password_verify($password, $passwordFromDB);

        if($passwordFromDB == $passwordFromUser){
        //redirect to proper dashboard
        $_SESSION['loggedIn'] = $userObject->id;
        //Now, keeping the firstname and lastname in the "fullname" variable.
        $_SESSION['fullname'] = $userObject->firstname . " " . $userObject->lastname;
        $_SESSION['role'] = $userObject->Designation;
        redirect_to("dashboard.php");
        die();
    }

}
    set_alert('error',"Invalid Email or Password"); 
    redirect_to("login.php");
    die();
}       

?>