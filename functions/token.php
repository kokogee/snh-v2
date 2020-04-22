<?php
//Implement token functions
function generate_token(){
    $token = ""; //Token Generation

    $alphabets = ['a','b','c','d','e','f','g','h','i','j','k','l','A','B','C','D','E','F','G','H','I','J','K','L'];
    //Now, we employ a for-loop, by saying how we want our token to be generated                
     for($i = 0 ; $i < 26 ; $i++){               
    //we'll use rand function to fetch the no. that suit the length of elements that we have.                
    // get random number, get element in alphabets at the index of random number, addd that to the token string //              
    $index = mt_rand(0,count($alphabets)-1);
    $token .=$alphabets[$index];               
    }                             
     return $token;              
}
     function find_token($email = ''){
        $allUserTokens = scandir("db/tokens/");   
        $countAllUserTokens = count($allUserTokens);
        //Now, we'll carry out the loop
        for ($counter = 0; $counter < $countAllUserTokens ; $counter++) {
    
        $currentTokenFile = $allUserTokens[$counter]; //current user we are testing if it already exists
    
        if($currentTokenFile == $email . ".json"){
        //Here, checks if the token in the currentTokenFile is thesame as $token;
        $tokenContent  = file_get_contents("db/tokens/".$currentTokenFile);
        $tokenObject = json_decode($tokenContent);
        //$tokenFromDB = $tokenObject->token;
            return $tokenObject;
      }
    }    
    return false;   
}
    