<!DOCTYPE html>
<html>

<body>

    <!--Header-->
    <?php include('adminheader.php');?>
    <!-- /Header --> 


    <?php

        require_once('connection.php');
        if(isset($_POST['addteam']) && isset($_FILES["image1"]))
        {
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $deg = $_POST["deg"]; 
            $image1 = $_FILES["image1"]["name"];

            $tmpfile1 = $_FILES['image1']['tmp_name'];
            $target = "Team_img";
            $filename1 = "$target/$image1";
            move_uploaded_file($tmpfile1, "$filename1");

            $sql = "INSERT INTO tblteam (fname, lname, designation,Profile_img) VALUES ('$fname', '$lname', '$deg', '$filename1')";
            $result = mysqli_query($con,$sql);
            if ($result) {
                echo '<script>alert("new record created successfully")</script>';
                echo '<script> window.location.href = "adminteam.php";</script>';
            } else {
            echo "Error: " . $sql . "<br>" . $con->error;
            }        
        }
        
    ?>

    <br><br>
    <!-- form start -->
    <div class="formbody">
        <div class="register1">
            <h2>Add Team Here</h2>
            <table>
            <form action="addteam.php" method="POST" enctype="multipart/form-data">    
                <tr>
                    <td><label>First Name : </label></td>
                    <td>
                        <input type ="text" name="fname" placeholder="Enter First Name" required>
                    </td>
                </tr>
                        
                <tr>
                    <td><label>Last Name : </label></td>
                    <td>
                        <input type ="text" name="lname" placeholder="Enter Last Name" required>
                    </td>
                </tr>

                <tr>
                    <td><label>Profile Image : </label></td>
                    <td>
                        <input type="file" id="image1" name="image1">
                    </td>
                </tr>   

                <tr>
                    <td><label>Designation : </label></td>
                    <td>
                        <input type ="text" name="deg" placeholder="Enter designation" required>
                    </td>
                </tr>
                <br>
            </table>
                <input type="submit" class="btnn"  value="Register" name="addteam">
                
            </form>
        </div>
    </div>
    <!-- form end -->
 

    <!-- footer start -->
    <?php include('footer.php');?>
    <!-- footer end -->

</body>
</html>