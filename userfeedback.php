<!doctype html>
	<html>
		<head>
  		  <title>Home</title>
		  <link rel="stylesheet" href="css/bootstrap.min.css">
		  <script src="js/bootstrap.min.js"></script>
		  <script src="js/jquery-3.3.1.min.js"></script>
		  <link rel="stylesheet" href="Stylesheet.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		</head>
	<style>
        body{
            background-repeat:no-repeat;
            background-attachment:fixed;
        }
    </style>	


<?php
    require_once('connection.php');

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $comment=mysqli_real_escape_string($con,$_POST['comment']);
        $sql="insert into  tblfeedback (fname,lname,email,comment) values('$fname','$lname','$email','$comment')";
        $result = mysqli_query($con,$sql);
        echo '<script>alert("Feedback sent successfully")</script>';
        header("Location: userbooking.php");
    }

?>

<body>

    <!--Header-->
    <?php include('userheader.php');?>
    <!-- /Header --> 


    <br><br><br>
	<div id="form" >	
		
		<div class="col-md-12" id ="mainform">
			<div class="col-sm-6">
			   <h2  class="contact-us" style="font-size:72px; color:#000;"><strong style="font-size:5cm; color:#555;">F</strong>eedback</h2>
			</div>
			<div class="col-sm-6" >
				<form method="POST">
				<label><h4>First Name:</h4> </label><input type="text" name="fname" size="20"  class=" form-control" placeholder="First name" required />
				<label><h4>Last Name:</h4> </label><input type="text" name="lname" size="20"  class=" form-control" placeholder="Last name" required />
				<label><h4>Email:</h4></label> <input type="email" name="email" size="20"  class=" form-control" placeholder="User Email" required/>
				<h4>Review:</h4><textarea class="form-control"   name="comment" rows="6"  placeholder="Message"  required></textarea>
				<br>
				<input type="submit" class="btn btn-info" id="btn" style="text-shadow:0 0 3px #000000; font-size:24px;" value="SUBMIT" name="submit">
				<form>
			</div>
		</div>
	</div>


    <!--Header-->
    <?php include('footer.php');?>
    <!-- /Header -->
</body>
</html>
