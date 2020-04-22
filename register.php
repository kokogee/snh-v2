<?php include_once('lib/header.php');  
require_once('functions/alert.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
     //redirect to dashboard, if already logged in.
     header("Location: dashboard.php");
}
  //include_once("lib/header.php");
?> 
<div class="container">
     <div class="row col-6">
          <h3>Register</h3>
     </div>
     <div class="row col-6">
          <p><strong>WELCOME, Register Here.</p></strong>
     </div>
     <div class="row col-6">
          <p>All fields are required**</p>
     </div>
     <div class="row col-6">

     <FORM method="post" action="processregister.php" >
     <p> 
          <?php print_alert(); ?>
     </P> 
     <P>
          <LABEL class="label" for="firstname">First Name:</LABEL></P>
          <INPUT 
          <?php 
               if(isset($_SESSION['firstname'])){
                    echo "value=" . $_SESSION['firstname']; 
               }
          ?>
          type="text" id="firstname" class="form-control" name="firstname" placeholder="firstname" />
     </p>         
     <p>
          <LABEL>Last Name:</LABEL></p>
          <INPUT 
          <?php 
               if(isset($_SESSION['lastname'])){
                    echo "value=" . $_SESSION['lastname']; 
               }
          ?>
          type="text" class="form-control" name="lastname"placeholder="lastname" />
     </p>
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
          <LABEL>Password: </LABEL></P>
          <INPUT type="password" class="form-control" name="password" placeholder="password" />
     </P>
     <p>  <label>Gender:</label><br>
          <select class="form-control" name="Gender" >
          <?php 
               if(isset($_SESSION['Gender'])){
                    echo "value=" . $_SESSION['Gender']; 
               }
          ?> 
               <option value="">Select One</option>
               <option
               <?php 
                    if(isset($_SESSION['Gender']) && $_SESSION['Gender'] == 'Female'){
                         echo "selected"; 
                    }
               ?> 
               >Female</option>
               <option 
               <?php 
                    if(isset($_SESSION['Gender']) && $_SESSION['Gender'] == 'Male'){
                         echo "selected"; 
                     }
               ?> 
               >Male</option>
          </select>
     </P>  

          <label>Designation:</label><br>
          <select class="form-control" name="Designation" >

          <option value="">Select One</option>
          <Option
          <?php 
                    if(isset($_SESSION['Designation']) && $_SESSION['Designation'] == 'Medical Team (MT)'){
                         echo "selected"; 
                     }
          ?> 
          >Medical Team (MT)</option>
          <option
          <?php 
                    if(isset($_SESSION['Designation']) && $_SESSION['Designation'] == 'Patient'){
                         echo "selected"; 
                     }
          ?> 
          >Patient</Option>  
          </select>
     </p>  
     <P>
          <LABEL class="label" for="department">Department:</LABEL></P>
          <INPUT 
          <?php 
               if(isset($_SESSION['department'])){
                    echo "value=" . $_SESSION['department']; 
               }
          ?>
          type="text" id="department" class="form-control" name="department" placeholder="department" />
     </p>      
     <p>   
     <button class="btn btn-sm btn-success" type="submit">Register</button>
     </P>
     <p>
          <a href="forgot.php">Forgot Password</a><br />
          <a href="login.php">Already have an account? Login</a>
     </p>
     </FORM>
</div>
</div>
<?php include_once("lib/footer.php"); ?>