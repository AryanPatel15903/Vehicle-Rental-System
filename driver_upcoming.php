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
            text-align: center;
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
    <!--Header-->
    <?php include ('driverheader.php'); ?>
    <!-- /Header -->

    <?php
    require_once ('connection.php');

    $email=$_SESSION['email'];
    $sql1="SELECT * FROM tbldriver WHERE Email='$email';";
    $result1 = mysqli_query($con, $sql1);
    $res1 = mysqli_fetch_array($result1);
    $id=$res1['Driver_id'];
    

    $sql = "SELECT * FROM tblbooking WHERE Pickup_date >= NOW() AND Driver_id=$id;";
    $result = mysqli_query($con, $sql);
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        ?>


        <div>
            <div>
                <table class="content-table">

                    <thread>
                        <tr>
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
                    </thread>
                    <tbody>

                        <?php
                        $totalammount = 0;
                        $i = 1;
                        while ($i <= $row) {
                            while ($res = mysqli_fetch_array($result)) {
                                ?>
                                <tr class="active-row">
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
    }
    ?>

            </table>
        </div>
    </div>

    <!-- footer start -->
    <?php include ('footer.php'); ?>
    <!-- footer end -->

</body>

</html>