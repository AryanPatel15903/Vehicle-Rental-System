<!DOCTYPE html>
<html lang="en">

<body>

<!--Header-->
<?php include('header.php');?>
<!-- /Header --> 


<?php

require_once('connection.php');
if(isset($_POST['regdriver']) && (isset($_FILES["image"])))
{
    
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $email = $_POST["email"];
      $ph = $_POST["ph"];
      $lno = $_POST["lno"];
      $image = $_FILES["image"]["name"]; // Get the filename of the uploaded file
      $pass = $_POST["pass"];
      $cpass = $_POST["cpass"];
      $Pass=md5($pass);

    if($pass==$cpass){
      // Validate email
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
      } else {
    
        // Check if license number already exists
        $sql = "SELECT * FROM tbldriver WHERE Email = '$email'";
        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
          echo "Email already exists.";
        } else {

        $tmpfile=$_FILES['image']['tmp_name'];
        $target="Lisence_img";
    
          $filename="$target/$image";
          move_uploaded_file($tmpfile,"$filename");
          // Insert data into table
          $sql = "INSERT INTO tbldriver (First_name, Last_name, Email, Ph_number, Lisence_no, Lisence_card, Password) VALUES ('$fname', '$lname', '$email', $ph, '$lno', '$filename', '$Pass')";
    
          if ($con->query($sql) === TRUE) {
            echo '<script>alert("new record created successfully")</script>';
            echo '<script> window.location.href = "driverlogin.php";</script>';
          } else {
            echo "Error: " . $sql . "<br>" . $con->error;
          }
    
        }
      }
      }
    }
    
    ?>
    



    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Register as Driver</h1>
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
        <form id="register" action="registerdriver.php" method="POST" enctype="multipart/form-data">    
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
                <td><label>Lisence Number : </label></td>
                <td>
                    <input type="text" name="lno"
                    id="name" placeholder="Enter Your Lisence Number" required>
                </td>
            </tr>

            <tr>
                <td><label>Lisence card : </label></td>
                <td>
                    <input type="file" name="image">
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
                <input type="submit" class="btnn"  value="Register" name="regdriver" >

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