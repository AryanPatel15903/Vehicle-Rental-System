<?php 
    require_once('connection.php');
    $id = $_GET['id'];
    $sql2="select *from tblbooking where id='$id'";
    $vehicles= mysqli_query($con,$sql2);
    $result= mysqli_fetch_array($vehicles);
    $email=$result['Email'];
    $driverId=$result['Driver_id'];

                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception;

                
                    // Assuming you have the driver_id available in $driverId variable
                    

                    require 'phpmailer/src/Exception.php';
                    require 'phpmailer/src/PHPMailer.php';
                    require 'phpmailer/src/SMTP.php';

                    $subject = "Regarding Your Recent Booking";
                    $message = "Dear Customer,We have received your request for a return. To provide feedback about your driver, please click on the link below:";

                    // Construct the URL with driver_id parameter
                    $url = "http://localhost/vehicle-rental-system/driverratingindex.php?driver_id=" . $driverId;
                    $message .= $url;

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

                    header("location: adminuserbookinghistory.php");
                
            ?>