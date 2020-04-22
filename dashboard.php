<?php include_once('lib/header.php');

if(!isset($_SESSION['loggedIn'])){
    //redirect to dashboard, if already logged in.
    header("Location: login.php");
} 
?>

<h3>DashBoard</h3>

Welcome! <?php echo $_SESSION['fullname'] ?>, You are logged in as (<?php echo $_SESSION['role'] ?>), and your ID is
<?php echo $_SESSION['loggedIn'] //This here, displays the (fullnames), ID and Designation on the dashboard ?>.


<div id="sidebarcontents"> 
    
  <div style="background:white; padding:5px;">
      <h3 class="text-info" style=" "></h3><hr>
<ul id="menu">

	<ul>
   <br><li><a href="#">PAY BILLS</a></li></br>
   <br><li><a href="bookings.php">BOOK APPOINTMENT</a></li></br>
    </ul>
</li>

</div>
</div>

</div>

<?php Include_once('lib/footer.php'); ?>    