<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF generate</title>

    <style>
        h2 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid grey;
            padding: 8px;
            text-align: center;
        }

        .mydata {
            text-align: right;
        }

        .total{
            text-align: right;
        }
    </style>
</head>

<body>
    <h2>Report</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Driver</th>
                <th>Vehicle id</th>
                <th>Booking date</th>
                <th>Pickup date</th>
                <th>Dropoff date</th>
                <th>Duration</th>
                <th>Amount</th>
            </tr>
        </thead>

        <?php
        require_once ('connection.php');
        session_start();
        $fdate = $_SESSION['fdate'];
        $tdate = $_SESSION['tdate'];
        $total = $_SESSION['total'];
        $sql = "SELECT * FROM tblbooking WHERE bookingdate BETWEEN '$fdate' AND '$tdate'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_num_rows($result);

        $i = 1;
        while ($i <= $row) {
            while ($res = mysqli_fetch_array($result)) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $i; ?></php>
                        </td>
                        <td><?php echo $res['First_name'] . " " . $res['Last_name']; ?></php>
                        </td>
                        <td><?php echo $res['Email']; ?></php>
                        </td>
                        <td><?php echo $res['Driver']; ?></php>
                        </td>
                        <td><?php echo $res['vehicle_id']; ?></php>
                        </td>
                        <td><?php echo $res['bookingdate']; ?></php>
                        </td>
                        <td><?php echo $res['Pickup_date']; ?></php>
                        </td>
                        <td><?php echo $res['Dropoff_date']; ?></php>
                        </td>
                        <td class="mydata"><?php echo $res['Duration']; ?></php>
                        </td>
                        <td class="mydata"><?php echo $res['amount']; ?></php>
                        </td>
                    </tr>
                </tbody>
                <?php $i++; } ?>
                <tr>
                    <th colspan="9" class="total">
                        Total Amount
                    </th>
                    <th colspan="9" class="total">
                        <?php echo $total; ?>
                    </th>
                </tr>
            <?php 
        } ?>
    </table>
</body>

</html>