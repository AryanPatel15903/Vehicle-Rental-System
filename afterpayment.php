<!DOCTYPE html>
<html lang="en">

<head>


    <style>
        .content-table {
            border-collapse: collapse;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            margin-left: 50px;
            margin-top: 20px;
            width: 90%;
            height: auto;
        }

        .content-table thead tr {
            background-color: var(--secondary);
            color: white;
            text-align: left;
        }

        .content-table td {
            padding: 5px 5px;

        }

        .content-table th {
            padding: 10px 15px;

        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;

        }

        .content-table tbody tr:last-of-type {
            border-bottom: 10px solid var(--secondary);
            margin-bottom: 10px;
        }

        .content-table thead .active-row {
            font-weight: bold;
            color: var(--primary);
        }

        .header {
            margin-top: 30px;
            margin-left: 45%;
        }

        .nn {
            width: 100px;
            /* background: #ff7200; */
            border: none;
            height: 40px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: white;
            transition: 0.4s ease;

        }

        .nn a {
            text-decoration: none;
            color: black;
            font-weight: bold;

        }

        .but a {
            text-decoration: none;
            color: var(--primary);
        }
    </style>
</head>

<body>

    <?php
    require_once ('connection.php');

    session_start();
    $email = $_SESSION['email'];
    $lastid = $_SESSION['last_id'];
    $query = "select *from tblbooking where id='$lastid'";
    $queryy = mysqli_query($con, $query);
    $num = mysqli_num_rows($queryy);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $did = $_SESSION['did'];
    $sql3 = "select * from tbldriver where Driver_id='$did'";
    $result3 = mysqli_query($con, $sql3);
    $res3 = mysqli_fetch_array($result3);
    $num3 = mysqli_num_rows($result3);

    $demail = $res3['Email'];

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    $subject = "Your upcoming ride is there.";
    // Execute PHP script and capture its output
    ob_start(); // Start output buffering
    include "mail_table_details.php"; // Include PHP file
    $message = ob_get_clean(); // Get and clear output buffer
    
    $mail = new PHPMailer();
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server address
    $mail->Port = 587; // Replace with your SMTP port (may vary)
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'aryanpatel15903@gmail.com'; // Replace with your sending email address
    $mail->Password = 'ttpvmhhioydlkigx'; // Replace with your email password
    $mail->setFrom('aryanpatel15903@gmail.com', 'VehicleBook'); // Set sender name and email
    $mail->addAddress($demail); // Add recipient email
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->send();
    ?>

    <?php include ('msgbox.php'); ?>
    <div style="text-align: center; margin-top: 50px;">
        <button class="btn btn-primary py-2 px-4" onclick="window.location.href = 'userindex.php'">Go to User
            Index</button>
    </div>
    <script>
        let subMenu = document.getElementById("submenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>

</body>

</html>