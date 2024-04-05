<!DOCTYPE html>
<html lang="en">

<head>
    

<style>
        .content-table{
    border-collapse: collapse;
     font-size: 0.9em;
     min-width: 400px;
     border-radius: 5px 5px 0 0;
     overflow: hidden;
     box-shadow:0 0  20px rgba(0,0,0,0.15);
     margin-left : 50px ;
     margin-top: 20px;
     width: 90%;
     height: auto;
 }
 .content-table thead tr{
     background-color: var(--secondary);
     color: white;
     text-align: left;
 }
 
 .content-table td{
     padding: 5px 5px;
     
 }
 .content-table th{
     padding: 10px 15px;
 
 }
 
 .content-table tbody tr{
     border-bottom: 1px solid #dddddd;
 }
 .content-table tbody tr:nth-of-type(even){
     background-color: #f3f3f3;
 
 }
 .content-table tbody tr:last-of-type{
     border-bottom: 10px solid var(--secondary);
     margin-bottom: 10px;
 }
 
 .content-table thead .active-row{
     font-weight:  bold;
     color: var(--primary);
 }
 
 .header{
     margin-top: 30px;
     margin-left: 45%;
 }
 
 .nn{
     width:100px;
     /* background: #ff7200; */
     border:none;
     height: 40px;
     font-size: 18px;
     border-radius: 10px;
     cursor: pointer;
     color:white;
     transition: 0.4s ease;
 
 }
 
 .nn a{
     text-decoration: none;
     color: black;
     font-weight: bold;
     
 }
 
 .but a{
     text-decoration: none;
     color: var(--primary);
 } 

    </style>
</head>

<body>

    <!--Header-->
    <?php include_once('adminheader.php');?>
    <!-- /Header --> 
    

    <?php
        require_once('connection.php');
        $query="select *from tblbooking ";
        $queryy=mysqli_query($con,$query);
        $num=mysqli_num_rows($queryy);
    ?>

        <div>
            <h1 class="header">BOOKING HISTORY</h1>
            <div>
                <div>
                <table class="content-table">
                <thread>
                    <tr>
                        <th>ID</th> 
                        <th>Name</th>
                        <th>Email</th> 
                        <th>Driver</th> 
                        <th>Driver id</th>
                        <th>Vehicle id</th>
                        <th>Pickup location</th> 
                        <th>Pickup date</th>
                        <th>Dropoff date</th>
                        <th>Pickup time</th>
                        <th>Dropoff time</th>
                        <th>Duration</th>
                        <th>Amount</th>
                        <th>Return Status</th>
                    </tr>
                </thread>
                <tbody>

                <?php
                    while($res=mysqli_fetch_array($queryy)){
                ?>
                <tr  class="active-row">
                    <td><?php echo $res['id'];?></php></td>
                    <td><?php echo $res['First_name']." ".$res['Last_name'];?></php></td>
                    <td><?php echo $res['Email'];?></php></td>
                    <td><?php echo $res['Driver'];?></php></td>
                    <td><?php echo $res['Driver_id'];?></php></td>
                    <td><?php echo $res['vehicle_id'];?></php></td>
                    <td><?php echo $res['Pickup_loc'];?></php></td>
                    <td><?php echo $res['Pickup_date'];?></php></td>
                    <td><?php echo $res['Dropoff_date'];?></php></td>
                    <td><?php echo $res['Pickup_time'];?></php></td>
                    <td><?php echo $res['Dropoff_time'];?></php></td>
                    <td><?php echo $res['Duration'];?></php></td>
                    <td><?php echo $res['amount'];?></php></td>
                    <td><span id="return_<?php echo $res['id']; ?>">
                                    <button type="button" class="but" onclick="toggleReturn('<?php echo $res['id']; ?>')" name="approve">Return</button>
                                    <span style="display: none;">Returned</span>
                                </span>
                            </td>
                </tr>
               <?php } ?>
                    </table>
                    </div>
                </div>
            </div>

               
               <script>
                   let subMenu = document.getElementById("submenu");
                   
                   function toggleMenu()
                   {
                       subMenu.classList.toggle("open-menu");
                    }
                </script>

<script>
        function toggleReturn(id) {
            var returnButton = document.getElementById('return_' + id);
            var button = returnButton.querySelector('button');
            var returnedText = returnButton.querySelector('span');

            if (button.style.display !== 'none') {
                button.style.display = 'none';
                returnedText.style.display = 'inline';
            } else {
                button.style.display = 'inline';
                returnedText.style.display = 'none';
            }
        }
    </script>

    <?php include("footer.php");?>
</body>
</html>