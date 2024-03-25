<!DOCTYPE html>
<html lang="en">

<body>
    <?php include('userheader.php'); ?>

    <?php 
    require_once('connection.php');

    if(isset($_POST["submit"]))
    {
        $vehicle_id=$_POST['vehicle_id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mno=$_POST['mno'];
        $address=$_POST['address'];
        $driverOption=$_POST['driverOption'];
        $did=$_POST["did"];
        $loc=$_POST["loc"];
        $pdate=$_POST["pdate"];
        $ddate=$_POST["ddate"];
        $ptime=$_POST["ptime"];
        $dtime=$_POST["dtime"];
        $duration=$_POST["duration"];
        $noadults=$_POST["noadults"];
        $nochildren=$_POST["nochildren"];
        $srequest=$_POST["srequest"];


        // $sql1="insert into  tblbooking (vehicle_id,First_name,Last_name,Email,Ph_no,Address,Driver,Driver_id,Pickup_loc,Pickup_date,Dropoff_date,Pickup_time,Dropoff_time,Duration,Adult_no,Children_no,Request) 
        // values('$vehicle_id','$fname','$lname','$email','$mno','$address','$driverOption','$did','$loc','$pdate','$ddate','$ptime','$dtime','$duration','$noadults','$nochildren','$srequest')";
        // $results = mysqli_query($con,$sql1);

    }

    ?>

<?php include('footer.php'); ?>

</body>

</html>