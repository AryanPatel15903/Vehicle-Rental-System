<!DOCTYPE html>
<html lang="en">

<body>
    
    <?php include('adminheader.php'); ?>
    
    <?php 
    require_once('connection.php');
    $vehicleId = $_GET['vehicle_id'];

    $sql2="select *from tblvehicles where vehicle_id='$vehicleId'";
    $vehicles= mysqli_query($con,$sql2);

    $result= mysqli_fetch_array($vehicles)
    
    ?>

    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="mb-5">
                    <h1 class="display-4 text-uppercase mb-5"><?php echo $result['vehicle_name']?></h1>
                    <div class="row image-grid mt-5">
                        <div class="col-md-12 px-2 pb-2">
                            <img class="img-fluid w-100" src="<?php echo $result['image1'] ?>" alt="">
                        </div>
                    </div>

                    <div class="row image-grid mt-3">
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="<?php echo $result['image2'] ?>" alt="">
                        </div>
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="<?php echo $result['image3'] ?>" alt="">
                        </div>
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="<?php echo $result['image4'] ?>" alt="">
                        </div>
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="<?php echo $result['image5'] ?>" alt="">
                        </div>
                    </div>

                    <p style="font-size: 1.2rem;"><?php echo $result['description'] ?></p>

                    <div class="row pt-2" style="font-size: 1.2rem;">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-car text-primary mr-2"></i>
                            <span><?php echo $result['model'] ?></span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-cogs text-primary mr-2"></i>
                            <span><?php echo $result['vehicle_type'] ?></span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-road text-primary mr-2"></i>
                            <span><?php echo $result['mileage'] ?> km/litre</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-users text-primary mr-2"></i>
                            <span><?php echo $result['capacity'] ?> person</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-gas-pump text-primary mr-2"></i>
                            <span><?php echo $result['fuel_type'] ?></span>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
  <?php include('footer.php'); ?>
</body>

</html>