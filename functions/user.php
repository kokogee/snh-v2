<?php include_once('alert.php');

function is_user_loggedIn(){
    
    if($_SESSION['loggedIn'] && !empty($_SESSION['loggedIn'])) {
        return true; //if both of these items are met and the user is logged in. OR,
    } 
        return false; //if they are not met.
}

function is_token_set(){
    return is_token_set_in_get() && is_token_set_in_session();
}

function is_token_set_in_session(){
    return isset($_SESSION['token']);
}

function is_token_set_in_get(){
    return isset($_GET['token']);
}

function find_user($email = ""){
  //check the database if the user exists    
   
    if(!$email){
        set_alert('error','User Email is not set');
        die();
    }
    $allUsers = scandir("db/users/"); 
    $countAllUsers = count($allUsers);

    for ($counter = 0; $counter < $countAllUsers ; $counter++) {

        $currentUser = $allUsers[$counter]; //current user we are testing if it exists

            if($currentUser == $email . ".json"){  //if the user is found..
               
                $userString  = file_get_contents("db/users/".$currentUser);
                $userObject = json_decode($userString);

                return $userObject;   
                }
            }
            return false;
        }

        function save_user($userObject){
            file_put_contents("db/users/". $userObject['email'] . ".json", json_encode($userObject));    
        }
        