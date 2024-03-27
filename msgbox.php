<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php

if(isset($_SESSION['success']))
{?>
    <div class="alert alert-success alert-dismissible">
        <h4>Success!</h4>
        <?php echo $_SESSION['success'];?>
    </div>
    <div>
            <div>
                <div>
                <table class="content-table">
                <thread>
                    <tr>
                        <th>ID</th> 
                        <th>Driver</th> 
                        <th>Driver id</th>
                        <th>Pickup location</th> 
                        <th>Pickup date</th>
                        <th>Dropoff date</th>
                        <th>Pickup time</th>
                        <th>Dropoff time</th>
                        <th>Duration</th>
                        <th>Amount</th>
                    </tr>
                </thread>
                <tbody>

                <?php
                    while($res=mysqli_fetch_array($queryy)){
                ?>
                <tr  class="active-row">
                    <td><?php echo $res['id'];?></php></td>
                    <td><?php echo $res['Driver'];?></php></td>
                    <td><?php echo $res['Driver_id'];?></php></td>
                    <td><?php echo $res['Pickup_loc'];?></php></td>
                    <td><?php echo $res['Pickup_date'];?></php></td>
                    <td><?php echo $res['Dropoff_date'];?></php></td>
                    <td><?php echo $res['Pickup_time'];?></php></td>
                    <td><?php echo $res['Dropoff_time'];?></php></td>
                    <td><?php echo $res['Duration'];?></php></td>
                    <td><?php echo $res['amount'];?></php></td>
                </tr>
               <?php } ?>
                    </table>
                    </div>
                </div>
            </div>
<?php 

    unset($_SESSION['success']);
}
if(isset($_SESSION['error']))
{?>
    <div class="alert alert-danger alert-dismissible">
        <h4>Alert!</h4>
        <?php echo $_SESSION['error'];?>
    </div>
<?php
unset($_SESSION['error']);
}
?>
