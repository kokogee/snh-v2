<?php session_start();

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
        $_SESSION["error"] = $Session_error ;

    header("Location: login.php");
//Runing a For-loop to go through all the users in a database.
}else{ //On Email validation; start by
    $allUsers = scandir("db/users/"); //Getting all the users from the database, then
    $countAllUsers = count($allUsers); //counting all the users in my database

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {

        $currentUser = $allUsers[$counter]; //current user we are testing if it exists

            if($currentUser == $email . ".json"){  //if the user is found..
               
                $userstring  = file_get_contents("db/users/". $currentUser);
                $userObject = json_decode($userstring);
                $passwordFromDB = $userObject->password;

                $passwordFromUser = password_hash($password, 'DEFAULT_PASSWORD');
                if($passwordFromDB = $passwordFromUser){
                    //redirect to dashboard
                    echo "Now inside Dashboard";
                    die();
                }

            }
        }
 
    $_SESSION["error"] = "Invalid Email or Password"; 
    header("Location: login.php");
    die();
}

?>