<?php include_once('lib/header.php');
if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
     //redirect to dashboard, if already logged in.
     header("Location: dashboard.php");
}
  //include_once("lib/header.php");

?> 
<h3>Register</h3>
     <p><strong> WELCOME GUEST! Register Here.</p></strong>
     <p><b> All fields are required .</b></p>

     <FORM method="post" action="processregister.php" >
<p> 
          <?php 
          if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
               echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                    session_unset();
                    session_destroy();
          }
           ?>
       </P>
     <P>
          <LABEL>First Name:</LABEL></P>
          <INPUT 
          <?php 
               if(isset($_SESSION['firstname'])){
                    echo "value=" . $_SESSION['firstname']; 
               }
          ?>
          type="text" name="firstname" placeholder="firstname" />
     </p>        
     <p>
          <LABEL>Last Name:</LABEL></p>
          <INPUT 
          <?php 
               if(isset($_SESSION['lastname'])){
                    echo "value=" . $_SESSION['lastname']; 
               }
          ?>
          type="text" name="lastname"placeholder="lastname" />
     </p>
     <p>
          <LABEL>Email:</LABEL></p>
          <INPUT 
          <?php 
               if(isset($_SESSION['email'])){
                    echo "value=" . $_SESSION['email']; 
               }
          ?>
          type="text" name="email"placeholder="email"/>
     </p>
     <p>
          <LABEL>Password: </LABEL></P>
          <INPUT type="password" name="password" placeholder="password" />
     </P>
     <p>  <label>Gender:</label><br>
          <select name="Gender" >
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
          <select name="Designation" >

          <option value="">Select One</option>
          <Option
          <?php 
                    if(isset($_SESSION['Designation']) && $_SESSION['Designation'] == 'Admin'){
                         echo "selected"; 
                     }
          ?> 
          >Admin</option>
          <option
          <?php 
                    if(isset($_SESSION['Designation']) && $_SESSION['Designation'] == 'Tech_Team'){
                         echo "selected"; 
                     }
          ?> 
          >Tech_Team</Option>  
          <option
          <?php 
                    if(isset($_SESSION['Designation']) && $_SESSION['Designation'] == 'Intern'){
                         echo "selected"; 
                     }
          ?> 
          >Intern</Option> 
          <option
          <?php 
                    if(isset($_SESSION['Designation']) && $_SESSION['Designation'] == 'Client'){
                         echo "selected"; 
                     }
          ?> 
          >Client</Option> 
          </select>
     
     </p>     
     <p> <INPUT type="submit" value="Register"><br> <BUTTON type="Reset"></p>
 
</P>
 </FORM>
<?php include_once("lib/footer.php"); ?>