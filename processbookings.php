<?php session_start();
 require_once('functions/user.php');

 $errorCount = 0;

$date = $_POST['date'] != "" ? $_POST['date'] : $errorcount++;
$time = $_POST['time'] != "" ? $_POST['time'] : $errorCount++;
$nature_of_appmnt = $_POST['nature_of_appmnt'] != "" ? $_POST['nature_of_appmnt'] : $errorCount++;
$init_complaint = $_POST['init_complaint'] != "" ? $_POST['init_complaint'] : $errorCount++;
$booked_dept = $_POST['booked_dept'] != "" ? $_POST['booked_dept'] : $errorCount++;



$_SESSION['date'] = $date;
$_SESSION['time'] = $time;
$_SESSION['nature_of_appmnt'] = $nature_of_appmnt;
$_SESSION['init_complaint'] = $init_complaint;
$_SESSION['booked_dept'] = $booked_dept;

$allBookings = scandir("db/bookings");
$countAllbookings = count($allBookings);


$newBookingId = ($countAllbookings-1);

$bookingObject = [
    'id'=>$newBookingId,
    'date'=>$date,
    'time'=>$time,
    'nature_of_appmnt'=>$nature_of_appmnt,
    'init_complaint'=>$init_complaint,
    'booked_dept'=>$booked_dept,
];