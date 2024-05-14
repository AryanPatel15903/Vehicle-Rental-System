<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<?php
require_once('connection.php');
session_start();

$amount=$_SESSION['amount'];
$email=$_SESSION['email'];

$vehicle_id=$_SESSION['vehicle_id'];
$fname=$_SESSION['fname'];
$lname=$_SESSION['lname'];
$mno=$_SESSION['mno'];
$address=$_SESSION['address'];
$driverOption=$_SESSION['driverOption'];
$did=$_SESSION['did'];
$loc=$_SESSION['loc'];
$pdate=$_SESSION['pdate'];
$ddate=$_SESSION['ddate'];
$ptime=$_SESSION['ptime'];
$dtime=$_SESSION['dtime'];
$duration=$_SESSION['duration'];
$noadults=$_SESSION['noadults'];
$nochildren=$_SESSION['nochildren'];
$srequest=$_SESSION['srequest'];

$name=$_SESSION['name'];
$cardno=$_SESSION['cardno'];
$expdate=$_SESSION['expdate'];
$cvv=$_SESSION['cvv'];

$currentDate = date('Y-m-d');

if(isset($_POST['submit'])) {
    $otp_entered = $_POST['otp'];
    $otp_generated = $_SESSION['otp'];
    if($otp_entered == $otp_generated) {
        $sql1="insert into  tblbooking (vehicle_id,First_name,Last_name,Email,Ph_no,Address,Driver,Driver_id,Pickup_loc,Pickup_date,Dropoff_date,Pickup_time,Dropoff_time,Duration,Adult_no,Children_no,Request,amount,bookingdate) 
        values('$vehicle_id','$fname','$lname','$email','$mno','$address','$driverOption','$did','$loc','$pdate','$ddate','$ptime','$dtime','$duration','$noadults','$nochildren','$srequest', '$amount','$currentDate')";
        $results = mysqli_query($con,$sql1);
        if ($results) {
            // Get the last inserted ID using mysqli_insert_id
            $last_id = mysqli_insert_id($con);
            $_SESSION['last_id']=$last_id;
            $sql2 = "insert into tblpayment(booking_id,name,card_no,expdate,cvv) values('$last_id','$name','$cardno','$expdate','$cvv')";
            $results1 = mysqli_query($con, $sql2);
      
            $_SESSION['success'] = "Bookings Done!";
          } else {
            // Handle insertion error
            $_SESSION['error'] = "Booking Failed: " . mysqli_error($con);
          }
    } else {
        $_SESSION['error']="Payment Failed";
    }
}
?>

<body><table align='center'><tr><td><STRONG>Transaction is being processed,</STRONG></td></tr><tr><td><font color='blue'>Please Wait <i class="fa fa-spinner fa-pulse fa-fw"></i>
<span class="sr-only"></font></td></tr><tr><td>(Do not 'RELOAD' this page or 'CLOSE' this page)</td></tr></table><h2>
<script>
    setTimeout(function(){ window.location="afterpayment.php"; }, 3000);
</script>