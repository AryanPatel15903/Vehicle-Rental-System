<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            width: auto;
            margin: 20px;
            text-align: center;
            
            border-radius: 5px;
        }
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        .thead-dark{
            background-color: lightblue;
        }
    </style>
</head>

<body>
    
    <b>New booking details :</b><br>

    <?php
    require_once ('connection.php');

    $sql4 = "SELECT * FROM tblbooking ORDER BY id DESC LIMIT 1;";
    $result = mysqli_query($con, $sql4);
    $row = mysqli_num_rows($result);
    ?>

    <table>
        <thead>
            <tr class="thead-dark">
                <th>No.</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Vehicle id</th>
                <th>Booking date</th>
                <th>Pickup Location</th>
                <th>Pickup date</th>
                <th>Dropoff date</th>
                <th>Pickup time</th>
                <th>Dropoff time</th>
                <th>No of Adults</th>
                <th>No of Children</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalammount = 0;
            $i = 1;
            while ($i <= $row) {
                while ($res = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></php>
                        </td>
                        <td><?php echo $res['First_name'] . " " . $res['Last_name']; ?></php>
                        </td>
                        <td><?php echo $res['Ph_no']; ?></php>
                        </td>
                        <td><?php echo $res['vehicle_id']; ?></php>
                        </td>
                        <td><?php echo $res['bookingdate']; ?></php>
                        </td>
                        <td><?php echo $res['Pickup_loc']; ?></php>
                        </td>
                        <td><?php echo $res['Pickup_date']; ?></php>
                        </td>
                        <td><?php echo $res['Dropoff_date']; ?></php>
                        </td>
                        <td><?php echo $res['Pickup_time']; ?></php>
                        </td>
                        <td><?php echo $res['Dropoff_time']; ?></php>
                        </td>
                        <td><?php echo $res['Adult_no']; ?></php>
                        </td>
                        <td><?php echo $res['Children_no']; ?></php>
                        </td>
                        <td><?php echo $res['Duration']; ?></php>
                        </td>
                    </tr>
                    <?php
                    $totalammount += $res['amount'];
                    $total = number_format($totalammount, 2);
                    $_SESSION['total'] = $total;

                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>