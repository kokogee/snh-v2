<?php session_start();

include_once('lib/header.php'); ?>
    
<p>
        <?php 
          if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
               echo "<span style='color:Blue'>" . $_SESSION['message'] . "</span>";
                session_destroy();
          }
        ?>
 </P>
 <h3>Login to continue</h3> 
 
 <FORM method="post" action="processlogin.php" >
<p> 
          <?php 
          if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
               echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                    session_unset();
                    session_destroy();
          }
           ?>
</P>
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
      <p>
            <button type="submit">Login</button>      
      </p> 

 </FORM>
<?php include_once('lib/footer.php'); ?>