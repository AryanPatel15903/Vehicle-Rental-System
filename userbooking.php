<!DOCTYPE html>
<html lang="en">

<body>
  <?php include('userheader.php'); ?>

  <!-- Search Start -->
  <div class="container-fluid bg-white pt-3 px-lg-5">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="row mx-n2">
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select name="vehicle_type1" class="custom-select px-4 mb-3" style="height: 50px;">
                    <option value="1">Vehicle Type</option>
                    <option value="2 wheeler">2 wheeler</option>
                    <option value="4 wheeler">4 wheeler</option>
                    <option value="traveller">traveller</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select name="vehicle_brand" class="custom-select px-4 mb-3" style="height: 50px;">
                <option value="1">Brand</option>
                <option value="Maruti Suzuki">Maruti Suzuki</option>
                <option value="Hero">Hero</option>
                <option value="Force">Force</option>
                <option value="Honda">Honda</option>
                <option value="Nissan">Nissan</option>
                <option value="Scoda">Scoda</option>
                <option value="Tata">Tata</option>
                <option value="Passion">Passion</option>
                <option value="Pulser">Pulser</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select name="vehicle_type" class="custom-select px-4 mb-3" style="height: 50px;">
                <option value="1">Gear Type</option>
                <option value="Manual">Manual</option>
                <option value="Automatic">Automatic</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select name="fuel_type" class="custom-select px-4 mb-3" style="height: 50px;">
                <option value="1">Fuel Type</option>
                <option value="Petrol">Petrol</option>
                <option value="Diesel">Diesel</option>
                <option value="CNG">CNG</option>
                <option value="Electric">Electric</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select name="price" class="custom-select px-4 mb-3" style="height: 50px;">
                <option value="1">Price range(Per hour)</option>
                <option value="300">Under 300</option>
                <option value="500">Under 500</option>
                <option value="700">Under 700</option>
                <option value="1000">Under 1000</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <input class="btn btn-primary btn-block mb-3" type="submit" name="search" style="height: 50px;" value="Search"></button>
            </div>
        </div>
        </form>
    </div>
    <!-- Search End -->

    <?php 
    require_once('connection.php');

    // Sreach bar
    $vehicle_type1 = "";
    $vehicle_brand = "";
    $vehicle_type = "";
    $fuel_type = "";
    $price = "";

    if (isset($_POST['search'])) {
      $vehicle_type1 = $_POST['vehicle_type1'];
      $vehicle_brand = $_POST['vehicle_brand'];
      $vehicle_type = $_POST['vehicle_type'];
      $fuel_type = $_POST['fuel_type'];
      $price = $_POST['price'];

      // Build the SQL query dynamically based on selected filters
      $sql2 = "SELECT * FROM tblvehicles WHERE 1 "; // Start with a base condition

      // Add conditions based on selected filters (using prepared statements for security)
      $conditions = [];
      $params = [];

      if ($vehicle_type1 != "1") {
        $conditions[] = "vehicle_type1 = ?";
        $params[] = $vehicle_type1;
      }
      if ($vehicle_brand != "1") {
        $conditions[] = "vehicle_brand = ?";
        $params[] = $vehicle_brand;
      }
      if ($vehicle_type != "1") {
        $conditions[] = "vehicle_type = ?";
        $params[] = $vehicle_type;
      }
      if ($fuel_type != "1") {
        $conditions[] = "fuel_type = ?";
        $params[] = $fuel_type;
      }
      if ($price != "1") {
        // Assuming price is a range, modify based on your price selection logic
        $conditions[] = "priceph <= ?";
        $params[] = $price; // Update this based on your price range selection
      }

      // Combine conditions and prepare the statement
      if (!empty($conditions)) {
        $sql2 .= " AND " . implode(" AND ", $conditions);
        $stmt = mysqli_prepare($con, $sql2);
        mysqli_stmt_bind_param($stmt, str_repeat("s", count($params)), ...$params);
        mysqli_stmt_execute($stmt);
        $vehicles = mysqli_stmt_get_result($stmt);
      } else {
        // No filters selected, retrieve all vehicles
        $vehicles = mysqli_query($con, $sql2);
      }
    } else {
      // No search submitted, retrieve all vehicles (initial page load)
      $vehicles = mysqli_query($con, "SELECT * FROM tblvehicles");
    }
    
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
      <a class="btn btn-primary px-3" href="userbooking1.php?vehicle_id=<?php echo $result['vehicle_id']; ?>">Book Now</a>
    </div>


    <?php
        }
    
    ?>

    </div>

    <?php include('footer.php'); ?>
  </body>

</html>