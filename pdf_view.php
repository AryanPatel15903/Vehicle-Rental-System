<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;

require_once ('connection.php');
session_start();
$fdate = $_SESSION['fdate'];
$tdate = $_SESSION['tdate'];
$total = $_SESSION['total'];
$sql = "SELECT * FROM tblbooking WHERE bookingdate BETWEEN '$fdate' AND '$tdate'";
$result = mysqli_query($con, $sql);
$row = mysqli_num_rows($result);

$html = '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>PDF generate</title>
        
            <style>
                h1 {
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

                body.container{
                    width: 100%;
                    overflow: auto;
                }
                body.container div{
                    width: 50%;
                    float: left;
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                }
                .other{
                    text-align: left;
                }
        
                .other1{
                    text-align: right;
                }
            </style>
        </head>
        
        <body class="container">
        <div class="other">
        Name: VehicleBook Rental<br>
        Email: vehiclebook@example.com<br>
        Contact No.: 9023920XXX<br>
    </div>
        <div class="other1">
            Date: ' . date('d-m-Y') . '<br>
            Report No.: VB<' . date('dmy') . '<br>
        </div>

            <h1>Report</h1>
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
                </thead>';
$i = 1;
while ($i <= $row) {
    while ($res = mysqli_fetch_array($result)) {
        $html .= '<tbody>
                <tr>
                    <td>' . $i . '
                    </td>
                    <td>' . $res['First_name'] . " " . $res['Last_name'] . '
                    </td>
                    <td>' . $res['Email'] . '
                    </td>
                    <td>' . $res['Driver'] . '
                    </td>
                    <td>' . $res['vehicle_id'] . '
                    </td>
                    <td>' . $res['bookingdate'] . '
                    </td>
                    <td>' . $res['Pickup_date'] . '
                    </td>
                    <td>' . $res['Dropoff_date'] . '
                    </td>
                    <td class="mydata">' . $res['Duration'] . '
                    </td>
                    <td class="mydata">' . $res['amount'] . '
                    </td>
                </tr>
            </tbody>';
        $i++;
    }

    $html .= '<tr>
            <th colspan="9" class="total">
                Total Amount
            </th>
            <th colspan="9" class="total">
                ' . $total . '
            </th>
        </tr>';
}

$html .= '</table>
            </body>
            
            </html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('report.pdf', ['Attachment' => 0]);
?>