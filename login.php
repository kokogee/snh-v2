<?php include_once('lib/header.php');
      require_once('functions/alert.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
     //redirect to dashboard, if already logged in.
     redirect_to("dashboard.php");
}
     // include_once('lib/header.php')
?>  
<div class="container">
     <div class="row col-6">
     <h3>Login to continue</h3>
     </div>
     <div class="row col-6">
<p>
          <?php print_alert(); ?> 
</P>
 <FORM method="post" action="processlogin.php" >

     <p>
          <LABEL>Email:</LABEL></p>
          <INPUT 
          <?php 
               if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email']; 
               }
          ?>
          type="text" class="form-control" name="email"placeholder="email"/>
     </p>
     <p>
          <LABEL>Password:</LABEL></P>
          <INPUT class="form-control" type="password" name="password" placeholder="password" />
     </P>
      <p>
            <button class="btn btn-sm btn-primary" type="submit">Login</button>      
      </p> 
      <p>
          <a href="forgot.php">Forgot Password</a><br />
          <a href="register.php">Don't have an account? Register</a>
     </p>
     </FORM>
     </div>
</div>
<?php include_once('lib/footer.php'); ?>