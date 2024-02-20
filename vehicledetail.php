<!DOCTYPE html>
<html lang="en">

<body>
  <?php include('adminheader.php'); ?>

  <?php 
    require_once('connection.php');

    $sql2="select *from tblvehicles";
    $vehicles= mysqli_query($con,$sql2);
    
    ?>

    <div class="row rent-items flex-wrap mx-auto">
        <?php
            while($result= mysqli_fetch_array($vehicles))
            {
                
        ?>

    <div class="col-md-3 rent-item mb-4">
      <img class="img-fluid mb-4" src="<?php echo $result['image1']?>" alt="">
      <h4 class="text-uppercase mb-4"><?php echo $result['vehicle_name']?></h4>
      <div class="d-flex justify-content-center mb-4">
        <div class="px-2">
          <i class="fa fa-car text-primary mr-1"></i>
          <span><?php echo $result['model']?></span>
        </div>
        <div class="px-2 border-left border-right">
          <i class="fa fa-cogs text-primary mr-1"></i>
          <span><?php echo $result['vehicle_type']?></span>
        </div>
        <div class="px-2">
          <i class="fa fa-road text-primary mr-1"></i>
          <span><?php echo $result['mileage']?> km/litre</span>
        </div>
      </div>
      <a class="btn btn-primary px-3" href="vehicleinfo.php?vehicle_id=<?php echo $result['vehicle_id']; ?>">Show Details</a>
    </div>


  <?php
        }
    
    ?>

</div>

  <?php include('footer.php'); ?>
  </body>

</html>
