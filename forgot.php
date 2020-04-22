<?php include_once('lib/header.php');  require_once('functions/alert.php'); ?>

<div class="container">
     <div class="row col-6">
<h3>Forgot Password</h3>
</div>
<div class="row col-6">
<p>Provide the email address assiociated with the account</p>

<form action="processforgot.php" method="POST">
<p> 
          <?php print_alert(); ?>
</P>
<p>
          <LABEL>Email:</LABEL></p>
          <INPUT 
          <?php 
               if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email']; 
               }
          ?>
          type="text"  class="form-control" name="email"placeholder="email"/>
     </p>
     <p>
            <button class="btn btn-sm btn-primary" type="submit">Send Reset Code</button>      
      </p> 
</form>

<?php include_once('lib/footer.php'); ?>