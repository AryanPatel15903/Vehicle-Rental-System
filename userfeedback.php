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

	$UserId = $_GET['User_id'];
	$sql2="select *from tbluser where User_id='$UserId'";
    $users= mysqli_query($con,$sql2);
    $result1= mysqli_fetch_array($users);

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $comment=mysqli_real_escape_string($con,$_POST['comment']);
        $sql="insert into  tblfeedback (fname,lname,email,comment) values('$fname','$lname','$email','$comment')";
        $result = mysqli_query($con,$sql);
		if($result){
            echo '<script>alert("Feedback sent successfully")</script>';
        	echo '<script> window.location.href = "userindex.php";</script>';       
        }
        else{
            echo '<script>alert("please check the connection")</script>';
        }
        
    }

?>

<body>

    <!--Header-->
    <?php include('userheader.php');?>
    <!-- /Header --> 


	<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Feedback</h1>
			<div class="formbody">
            <div class="row">
                    <div class="contact-form bg-secondary mb-4" style="padding: 30px;">
                        <form method="POST">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="fname" value="<?php echo $result1['First_name']?>" readonly>
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control p-4" name="lname" value="<?php echo $result1['Last_name']?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name="email" value="<?php echo $result1['Email']?>" readonly>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" rows="5" name="comment" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <input class="btn btn-primary py-3 px-5" type="submit" name="submit" value="Send Feedback">
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>
	</div>



    <!--Header-->
    <?php include('footer.php');?>
    <!-- /Header -->
</body>
</html>
