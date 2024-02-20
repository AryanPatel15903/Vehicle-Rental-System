<?php

require_once('connection.php');
$email=$_GET['id'];

$sql="DELETE from tbldriver where EMAIL='$email'";
$result=mysqli_query($con,$sql);

echo '<script>alert("Driver disapproved successfully")</script>';
echo '<script> window.location.href = "admindriverlist.php";</script>';

?>