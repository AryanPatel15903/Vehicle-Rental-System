<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/bank.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <?php 
        require_once('connection.php');
        session_start();

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        if(isset($_POST['submit']))
        {
          $name=$_POST["name"];
          $cardno=$_POST['number'];
          $expdate=$_POST['date'];
          $cvv=$_POST['cvv'];

          $email=$_SESSION['email'];
          

          $otp = rand(100000, 999999);

          

          require 'phpmailer/src/Exception.php';
          require 'phpmailer/src/PHPMailer.php';
          require 'phpmailer/src/SMTP.php';

          $subject = "Your OTP for Payment";
          $message = "Your One Time Password (OTP) is: " . $otp;

          $mail = new PHPMailer();
          $mail->isSMTP(); // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server address
          $mail->Port = 587; // Replace with your SMTP port (may vary)
          $mail->SMTPAuth = true; // Enable SMTP authentication
          $mail->Username = 'aryanpatel15903@gmail.com'; // Replace with your sending email address
          $mail->Password = 'ttpvmhhioydlkigx'; // Replace with your email password
          $mail->setFrom('aryanpatel15903@gmail.com', 'VehicleBook'); // Set sender name and email
          $mail->addAddress($email); // Add recipient email
          $mail->Subject = $subject;
          $mail->Body = $message;
          $mail->send();
        }
    ?>

<div id="mainContainer" class="row large-centered">

  <div class="text-center"><h2>BANK</h2></div>
  
  <hr class="divider">
  <dl class="mercDetails">
  	<dt>Merchant</dt> 				<dd>VehicleBook</dd>
    <dt>Transaction Amount</dt> 	<dd>INR <?php echo  $_SESSION['amount'];?></dd>
    <dt>Debit Card</dt> 		<dd><?php echo  $cardno;?></%></dd>
  </dl>
  <hr class="divider">
  
  
<form name="form1" id="form1" method="post" action="validateotp.php">
<fieldset class="page2">
<div class="page-heading">
<h6 class="form-heading">Authenticate Payment</h6>
<p class="form-subheading">OTP sent to your email <strong><?php echo $email ?></strong></p>


</div>

<div class="row formInputSection">
<div class="large-7 columns">
<label>
  Enter One Time Password (OTP)
  <input type="tel" name="otp"  class="form-control optPass" value="" maxlength="6" autocomplete="off"/>
</label>
</div>
<div class="large-5 columns">
<label>&nbsp;</label><input type="submit" name="submit" class="expanded button next" value="Make Payment">
</div>
</div>
<div class="text-right resendBtn requestOTP"><a class="request-link" href="javascript:void(0)">Resend OTP</a></div>
<p>


<a class="tryAgain" href="payment.php">Go back</a> to merchant
</p>
</fieldset>


</form>
</div>

<?php
  $_SESSION['otp'] = $otp;
  $_SESSION['name'] = $name;
  $_SESSION['cardno'] = $cardno;
  $_SESSION['expdate'] = $expdate;
  $_SESSION['cvv'] = $cvv;
?>

</body>
</html>