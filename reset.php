<?php include_once('lib/header.php'); 
require_once('functions/alert.php'); 
require_once('functions/user.php');
require_once('functions/email.php');
require_once('functions/token.php');


//if token is not set, and user token is empty, 
if(!is_user_loggedIn() && !is_token_set()){

//Then, send them here.
    $_SESSION["error"] = "You are not authorized to view that page"; 
    redirect_to("login.php");
}//Here, check that the token matches the set email in our database/file 
?>

<h3>Reset Password</h3>
<p>Reset password assiociated with your account : [email]</p>
 
<form action="processreset.php" method="POST">
<p> 
                <?php print_alert(); ?>
</P>
<?php if(!is_user_loggedIn()){ ?>
<input 
        <?php 
          if(is_token_set_in_session()){
               echo "value='" . $_SESSION['token'] . "'";
          }else{
              echo "value='" . $_GET['token'] . "'";
          }
        ?>

        type="hidden" name="token" />
        <?php } ?>
<p>
        <LABEL>Email</LABEL></br>
        <INPUT 
          
          <?php
            if(isset($_SESSION['email'])){
                echo "value=" . $_SESSION['email'];
            }
            ?>
            type="text" name="email" placeholder="Email" />
</p>
          <LABEL>Enter New Password: </LABEL></br>
          <INPUT type="password" name="password" placeholder="password" />
</P>
<p>
            <button type="submit">Reset Password</button>      
</p> 
</form>

<?php include_once('lib/footer.php'); ?>