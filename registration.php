<!DOCTYPE html>
<html lang="en">

<body>

<?php

require_once('connection.php');
if(isset($_POST['regs']))
{
    $fname=mysqli_real_escape_string($con,$_POST['fname']);
    $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $ph=mysqli_real_escape_string($con,$_POST['ph']);
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $cpass=mysqli_real_escape_string($con,$_POST['cpass']);
    $Pass=md5($pass);
    if(empty($fname)|| empty($lname)|| empty($email)|| empty($ph)|| empty($Pass))
    {
        echo '<script>alert("please fill the place")</script>';
    }
    else{
        if($pass==$cpass){
        $sql2="SELECT * from tbluser where Email='$email'";
        $res=mysqli_query($con,$sql2);
        if(mysqli_num_rows($res)>0){
            echo '<script>alert("EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!")</script>';
            echo '<script> window.location.href = "login.php";</script>';

        }
        else{
        $sql="insert into tbluser (First_name,Last_name,Email,Ph_number,Password) values('$fname','$lname','$email',$ph,'$Pass')";
        $result = mysqli_query($con,$sql);
          

          // $to_email = $email;
          // $subject = "NO-REPLY";
          // $body = "THIS MAIL CONTAINS YOUR AUTHENTICATION DETAILS....\nYour Password is $pass and Your Registered email is $to_email"
          //          ;
          // $headers = "From: sender email";
          
          // if (mail($to_email, $subject, $body, $headers))
          
          // {
          //     echo "Email successfully sent to $to_email...";
          // }
          
          // else
 
          // {
          // echo "Email sending failed!";
          // }
        if($result){
            echo '<script>alert("Registration Successful Press ok to login")</script>';
            echo '<script> window.location.href = "login.php";</script>';       
           }
        else{
            echo '<script>alert("please check the connection")</script>';
        }
    
        }

        }
        else{
            echo '<script>alert("PASSWORD DID NOT MATCH")</script>';
            echo '<script> window.location.href = "registration.php";</script>';
        }
    }
}


?>


    <!--Header-->
    <?php include('header.php');?>
    <!-- /Header --> 


    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Register</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Register</h6>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- form start -->
    <div class="register">
        <h2>Register Here</h2>
        <table>
        <form id="register" action="registration.php" method="POST">    
            <tr>
                <td><label>First Name : </label></td>
                <td>
                    <input type ="text" name="fname"
                    id="name" placeholder="Enter Your First Name" required>
                </td>
            </tr>
                    

            <tr>
                <td><label>Last Name : </label></td>
                <td>
                    <input type ="text" name="lname"
                    id="name" placeholder="Enter Your Last Name" required>
                </td>
            </tr>

            <tr>
                <td><label>Email : </label></td>
                <td>
                    <input type="email" name="email"
                    id="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex: example@ex.com"placeholder="Enter Valid Email" required>
                </td>
            </tr>       

            <tr>
                <td><label>Phone Number : </label></td>
                <td>
                    <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)"
                    id="name" placeholder="Enter Your Phone Number" required>
                </td>
            </tr>


            <tr>
                <td><label>Password : </label></td>
                <td>
                    <input type="password" name="pass" maxlength="12"
                    id="psw" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                </td>
            </tr>

            <tr>
                <td><label>Confirm Password : </label></td>
                <td>
                    <input type="password" name="cpass" 
                    id="cpsw" placeholder="Renter the password" required>
                </td>
            </tr>
            <br>
            </table>
                <input type="submit" class="btnn"  value="Register" name="regs" >
            
        
        
        </input>
            
        </form>

    </div> 
    <!-- form end -->
 
    <!-- footer start -->
    <?php include('footer.php');?>
    <!-- footer end -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>