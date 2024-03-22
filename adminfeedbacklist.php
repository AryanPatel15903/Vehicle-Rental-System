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
        $query="select *from tblfeedback";
        $queryy=mysqli_query($con,$query);
        $num=mysqli_num_rows($queryy);
    ?>

        <div>
            <h1 class="header">FEEDBACKS</h1>
            <div>
                <div>
                <table class="content-table">
                <thread>
                    <tr>
                        <th>FIRST NAME</th>  
                        <th>LAST NAME</th>  
                        <th>EMAIL</th>
                        <th>FEEDBACKS</th>
                    </tr>
                </thread>
                <tbody>

                <?php
                    while($res=mysqli_fetch_array($queryy)){
                ?>
                <tr  class="active-row">
                    <td><?php echo $res['fname'];?></php></td>
                    <td><?php echo $res['lname'];?></php></td>
                    <td><?php echo $res['email'];?></php></td>
                    <td><?php echo $res['comment'];?></php></td>
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

    <?php include("footer.php");?>
</body>
</html>