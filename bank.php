<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/bank.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <?php 
        require_once('connection.php');
        session_start();

        if(isset($_POST['submit']))
        {
          $cardno=$_POST['number'];
        }
    ?>

<div id="mainContainer" class="row large-centered">

  <div class="text-center"><h2>BANK</h2></div>
  
  <hr class="divider">
  <dl class="mercDetails">
  	<dt>Merchant</dt> 				<dd>Shop Street</dd>
    <dt>Transaction Amount</dt> 	<dd>INR <?php echo  $_SESSION['amount'];?></dd>
    <dt>Debit Card</dt> 		<dd><?php echo  $cardno;?></%></dd>
  </dl>
  <hr class="divider">
  
  
<form name="form1" id="form1" method="post" action="complete_payment.php">
<fieldset class="page2">
<div class="page-heading">
<h6 class="form-heading">Authenticate Payment</h6>
<p class="form-subheading">OTP sent to your mobile number ending with <strong>1343</strong></p>


</div>

<div class="row formInputSection">
<div class="large-7 columns">
<label>
  Enter One Time Password (OTP)
  <input type="tel" name="otp"  class="form-control optPass" value="" maxlength="6" autocomplete="off"/>
</label>
</div>
<div class="large-5 columns">
<label>&nbsp;</label><button class="expanded button next" onClick="ValidateForm()">Make Payment</button>
</div>
</div>
<div class="text-right resendBtn requestOTP"><a class="request-link" href="javascript:void(0)">Resend OTP</a></div>
<p>


<a class="tryAgain" href="complete_order.jsp">Go back</a> to merchant
</p>
</fieldset>


</form>
</div>
<script src="bank/script/jquery-1.9.1.js"></script>
<script>
document.onmousedown = rightclickD; function rightclickD(e) { e = e||event; if (e.button == 2) { alert('Function Disabled...'); return false; } }
function ValidateForm() { 
	var regPin = RegExp("^[0-9]{4,6}$");
	if( document.form1.customerpin.value == "" || !document.form1.customerpin.value.match(regPin) ) {	 
		alert("Please enter a valid 6 digit One Time Password (OTP) receive on your registered Mobile Number."); document.form1.customerpin.focus(); return false;  
	}
    else
        {
            document.form1.submit();
        }

}
</script>

</body>
</html>