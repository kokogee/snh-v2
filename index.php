<?php session_start();
 
Include_once('lib/header.php'); ?>

<p>
        <?php 
          if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
               echo "<span style='color:Green'>" . $_SESSION['message'] . "</span>";
                session_destroy();
          }
        ?>
 </P>

<b>
    <p><strong> WELCOME TO EVICO_HOLDINGS</strong> <br /></p>
    <p><b>The Quieter you are, the More you are able to Hear.</b></p>

    <?php Include_once('lib/footer.php'); ?>