<?php session_start();
 require_once('functions/user.php');
//collecting the data
$errorCount = 0; //checking for error messages.

//**verifying the data, validating each of the increase, because all the fields are required, if it's not filled, 
//then we increase our error message and ...*/
$firstname = $_POST['firstname'] != "" ? $_POST['firstname'] : $errorcount++;
$lastname = $_POST['lastname'] != "" ? $_POST['lastname'] : $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
$Gender = $_POST['Gender'] != "" ? $_POST['Gender'] : $errorcount++;
$Designation = $_POST['Designation'] != "" ? $_POST['Designation'] : $errorCount++;

$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;
$_SESSION['email'] = $email;
$_SESSION['Gender'] = $Gender;
$_SESSION['Designation'] = $Designation;

//display proper error messages to the user.
//Give more accurate feedback to the user.
if($errorCount > 0){
    //..if the error is greater than Zero, then there's an error somewhere..
    //...let it be sent back to the registration page with the error message.
    $Session_error = "You have " . $errorCount . " error";
        if($errorCount > 1) {
            $Session_error .= "s";
    }

    $Session_error .=   " in your Form Submission";
    $_SESSION["error"] = $Session_error ;
   
    redirect_to("register.php");

}else{

    //Assign the next newUserId to the new user
    $newUserId = ($countAllUsers-1);

    $userObject = [
        'id'=>$newUserId,
        'firstname'=>$firstname,
        'lastname'=>$lastname,
        'email'=>$email,
        'password'=> password_hash($password, PASSWORD_DEFAULT), //password hashing-encryption
        'Gender'=>$Gender,
        'Designation'=>$Designation
    ];

    //check if the user already exist in a db or file
        //** Look into the allUser array and check if the email already exist using their email...we'll use loop.
        $userExists = find_user($email);
    
                if($userExists){
                    $_SESSION["error"] = "Registration Failed, User already exist "; 
                    header("Location: register.php");
                    die();
                }
    
  //Here, we save them in a database and return them to the login page; if the user does not exist. Have a folder for Admin and different users.  
 save_user($userObject);
 
  $_SESSION["message"] = "Registration Completed. You can now Login  " . $firstname; 
  header("Location: login.php");
  
}                                       

?>