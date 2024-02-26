<!DOCTYPE html>
<html lang="en">

<?php
require_once('connection.php');
    if(isset($_POST['login']))
    {
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        
        
        if(empty($name)|| empty($pass))
        {
            echo '<script>alert("please fill the blanks")</script>';
        }

        else{
            $query="select *from tbladmin where Admin_name='$name'";
            $res=mysqli_query($con,$query);
            if($row=mysqli_fetch_assoc($res)){
                $db_password = $row['Admin_pass'];
                if(($pass)  == $db_password)
                {
                    header("location: adminindex.php");
                    session_start();
                    $_SESSION['name'] = $name;
                    
                }
                else{
                    echo '<script>alert("Enter a proper password")</script>';
                }
            }
            else{
                echo '<script>alert("enter a proper email")</script>';
            }
        }
    }

?>

<body>
    <!--Header-->
    <?php include('header1.php');?>
    <!-- /Header --> 


    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Login</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Login</h6>
        </div>
    </div>
    <!-- Page Header End -->
<div class="formbody">
    <div class="form">
        <h2>Admin Login</h2>
            <form method="POST"> 
                <input type="text" name="name" placeholder="Enter name Here">
                <input type="password" name="pass" placeholder="Enter Password Here">
                <input class="btnn" type="submit" value="Login" name="login"></input>
            </form>
                
    </div>
</div>
    
 
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