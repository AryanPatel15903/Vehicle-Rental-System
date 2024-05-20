<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
<head>
    <meta charset="utf-8">
    <title>Vehicle Rental System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Validation -->
    <link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css"/>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+919023920XXX</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>xyz@gmail.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <?php
        require_once('connection.php');
        

        if (!isset($_SESSION['email'])) {
            header("Location: driverlogin.php");
            exit();
        }

        $email = $_SESSION['email'];
        $sql="SELECT * from tbldriver where Email='$email'";
        $query=mysqli_query($con,$sql);
        $result=mysqli_fetch_assoc($query);
    ?>


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary mb-1">VehicleBook</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="driverindex.php" class="nav-item nav-link active">Home</a>
                        <a href="driver_aboutus.php" class="nav-item nav-link">About</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Booking</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="driver_upcoming.php" class="dropdown-item">Upcoming</a>
                                <a href="driver_completed.php" class="dropdown-item">Completed</a>
                            </div>
                        </div>
                        <a href="driver_review.php" class="nav-item nav-link">Reviews</a>
                        
                        <a href="userteam.php" class="nav-item nav-link">Team</a>
                        

                        <div class="hero">
                        <img src="img/user.png" class="user-pic" alt="" onclick="toggleMenu()">
                        <div class="sub-menu-wrap" id="submenu">
                            <div class="sub-menu">
                                <div class="uer-info">
                                    <img src="img/user.png" alt="sdv" >
                                    <h3>
                                    <?php echo $result['First_name']." ".$result['Last_name'] ?>
                                    </h3>
                                </div>
                                <hr>
                                <a href="#" class="sub-menu-links">
                                    <img src="img/profile.png" alt="">
                                    <p><?php echo $result['Email'] ?></p>
                                </a>
                                <a href="logout.php" class="sub-menu-links">
                                    <img src="img/logout.png" alt="">
                                    <p>logout</p>
                                    <span>></span>
                                </a>
                            </div>
                        </div>
                    </div>
                        <!-- <div class="nav-item col-xl-2 col-lg-4 col-md-6 px-2" style="padding: 20px 0px 0px 0px">
                            <button class="btn btn-primary btn-block mb-3" type="submit" style="height: 44px; padding:10px">Login</button>
                        </div> -->
                        <!-- <div class="nav-item col-xl-2 col-lg-4 col-md-6 px-2" style="padding: 20px 0px 0px 0px">
                            <a href="login.php" class="btn btn-primary btn-block mb-3" style="height: 44px; padding:10px 5px;">Login</a>
                        </div> -->
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <script>
        let subMenu = document.getElementById("submenu");

        function toggleMenu()
        {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>