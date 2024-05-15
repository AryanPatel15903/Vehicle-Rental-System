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
    <?php include('adminheader.php');?>
    <!-- /Header --> 
    

    <?php
        require_once('connection.php');
        $query="select *from tbldriver";
        $queryy=mysqli_query($con,$query);
        $num=mysqli_num_rows($queryy);
    ?>

        <div>
            <h1 class="header">DRIVERS</h1>
            <div>
                <div>
                <table class="content-table">
                <thread>
                    <tr>
                        <th>NO.</th> 
                        <th>FIRST NAME</th> 
                        <th>LAST NAME</th> 
                        <th>EMAIL</th>
                        <th>PHONE NUMBER</th> 
                        <th>LICENSE NUMBER</th>
                        <th>LICENSE CARD</th>
                        <th>DISAPPROVE DRIVERS</th>
                    </tr>
                </thread>
                <tbody>

                <?php
                    $i=1;
                    while($i<=$num){
                    while($res=mysqli_fetch_array($queryy)){
                ?>
                <tr  class="active-row">
                    <td><?php echo $i;  ?></php></td>
                    <td><?php echo $res['First_name'];?></php></td>
                    <td><?php echo $res['Last_name'];?></php></td>
                    <td><?php echo $res['Email'];?></php></td>
                    <td><?php echo $res['Ph_number'];?></php></td>
                    <td><?php echo $res['Lisence_no'];?></php></td>
                    <td><?php echo $res['Lisence_card'];?></php></td>
                    <td><button type="submit" class="but" name="approve"><a href="admindeletedriver.php?id=<?php echo $res['Email']?>">DISAPPROVE</a></button></td>
                </tr>
               <?php $i++;
            }} ?>
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

    <?php include("footer.php");?>
</body>
</html>