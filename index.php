<?php include_once('lib/header.php');  require_once('functions/alert.php'); ?>

<p>
        <?php print_alert(); ?>  
</P>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">WELCOME TO SNG: Hospital for the Ignorant</h1>
  <p class="lead">This is a specialist hospital to cure ignorance!</p>
  <p class="lead">come as you are, it is completely free!</p>
  <p>
      <a class="btn btn-bg btn-outline-secondary" href="login.php">Login</button>
      <a class="btn btn-bg btn-outline-primary" href="register.php">Register</button>
  </p>
</div>

&copy; 2020-<?php echo date("Y");?>

<?php include_once('lib/footer.php'); ?>