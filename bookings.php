<?php include_once('lib/header.php');
require_once('functions/alert.php'); ?>



<div class="container">
     <div class="row col-6">
          <h3>Bookings:</h3>
     </div>
     <div class="row col-6">
          <p><strong>WELCOME, Book Here.</p></strong>
     </div>
     <div class="row col-6">
          <p>All fields are required**</p>
     </div>
     <div class="row col-6">

<FORM method="post" action="processbookings.php" >
     <p> 
          <?php print_alert(); ?>
     </P> 

<p>
<label for="date">Date of Appointment :</label>
<input 
<?php
 if(isset($_SESSION['date'])){
     echo "value=" . $_SESSION['date']; 
}
?>
type="date" class="form-control" id="date" name="date"
       value="2020-04-22"
       min="2020-01-01" max="2020-12-31">
</p>

<p>
<label for="time">Time of Appointment :</label>
<input 
<?php
 if(isset($_SESSION['time'])){
     echo "value=" . $_SESSION['time']; 
}
?>
type="time" class="form-control" id="appt" name="appt"
       min="09:00" max="18:00" required>
<small>(Office hours are 9am to 6pm)</small>
</p>

<p>
<label for="nature_of_appmnt">Nature of Appointment :</label>
<?php
 if(isset($_SESSION["nature_of_appmnt"])){
     echo "value=" . $_SESSION["nature_of_appmnt"]; 
}
?>
<textarea class="form-control" id="nature_of_appmnt" name="nature_of_appmnt"
          rows="2" cols="14">
Nature of Appointment
</textarea>
</p>

<p>
<label for="Init_complaint">Initial Complaint :</label>
<?php
 if(isset($_SESSION["Init_complaint"])){
     echo "value=" . $_SESSION["Init_complaint"]; 
}
?>
<textarea class="form-control" id="init_complaint" name="Init_complaint"
          rows="5" cols="33">
Write your initial complaint here...
</textarea>
</p>

<P>
<LABEL class="label" for="booked_dept">Booking_Department:</LABEL></P>
<INPUT 
<?php 
     if(isset($_SESSION['booked_dept'])){
          echo "value=" . $_SESSION['book_dept']; 
     }
?>
type="text" id="booked_dept" class="form-control" name="booked_dept" placeholder="Department" />
</p>      
<p>   
<button class="btn btn-sm btn-success" type="submit">Submit</button>
</P>

</FORM>
</div>
</div>

<?php include_once("lib/footer.php"); ?>






















