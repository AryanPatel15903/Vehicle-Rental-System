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
    <?php
    session_start();
    include_once('adminheader.php');
    ?>
    <div>
        <h1 class="header">REPORT</h1>
    </div>

    <div class="container-fluid bg-white pt-3 px-lg-5">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row mx-n2">
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    Select Date From:
                    <input type="date" class="form-control p-4" name="fdate" id="pickupDate" />
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    Select Date To:
                    <input type="date" class="form-control p-4" name="tdate" id="pickupDate" />
                </div>

                <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                    <label> </label>
                    <input class="btn btn-primary btn-block mb-3" type="submit" name="submit" style="height: 50px;"
                        value="Search"></button>
                </div>
            </div>
        </form>
    </div>

    <?php
    
    require_once ('connection.php');
    if (isset($_POST['submit'])) {
        $fdate = $_POST['fdate'];
        $tdate = $_POST['tdate'];
        $sql = "SELECT * FROM tblbooking WHERE bookingdate BETWEEN '$fdate' AND '$tdate'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_num_rows($result);
        // session_start();
        $_SESSION['fdate'] = $fdate;
        $_SESSION['tdate'] = $tdate;

        

        if ($row > 0) {
            ?>


            <div>
                <div>
                    <table class="content-table">

                        <thread>
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
                                        <td><?php echo $res['Duration']; ?></php>
                                        </td>
                                        <td><?php echo $res['amount']; ?></php>
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

                    </table>
                </div>
            </div>

            <div class="form-group" style="text-align:right; margin-right: 100px; margin-top:10px;">
                Total Amount: <input type="text" style="width: 10%; color:red; text-align:center;" name="total"
                    value="<?php echo $total ?>" readonly> Rs.
            </div>
            <div class="form-group" style="text-align:right; margin-right: 100px; margin-top:10px;">
                <a href="pdf_view.php" class="btn btn-success"><i class="fa fa-file"></i> View PDF</a> &nbsp;&nbsp;
            </div>
            <div class="form-group" style="text-align:right; margin-right: 100px; margin-top:10px;">
                <a href="pdf_generate.php" class="btn btn-danger"><i class="fa fa-download"></i> Download PDF</a>
                &nbsp;&nbsp;
            </div>

        <?php }
    } 
    
    include_once('footer.php');
    ?>


</body>

</html>