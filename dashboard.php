<?php include_once('lib/header.php');

if(!isset($_SESSION['loggedIn'])){
    //redirect to dashboard, if already logged in.
    header("Location: login.php");
} 
?>

<h3>DashBoard</h3>
LoggedIn User ID: <?php echo $_SESSION['loggedIn'] ?>

<?php Include_once('lib/footer.php'); ?>