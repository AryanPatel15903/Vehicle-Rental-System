<?php

require_once('connection.php');
$id=$_GET['id'];

$sql="DELETE from tblbooking where id='$id'";
$result=mysqli_query($con,$sql);

echo '<script>alert("History Removed successfully")</script>';
echo '<script> window.location.href = "adminuserbookinghistory.php";</script>';
echo '<script> window.location.href = "adminuserbookinghistory.php";</script>';

?>